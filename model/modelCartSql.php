<?php
require_once "/laragon/www/project_akhir/domain_object/node_cart.php";
require_once "/laragon/www/project_akhir/model/dbConnect.php";

class modelCart {
    private $db;
    private $carts = [];

    public function __construct() {
        // Inisialisasi koneksi database
        $this->db = new Database('localhost', 'root', '', 'poswarkop');

        if (isset($_SESSION['carts'])) {
            // Ambil data dari sesi
            $this->carts = unserialize($_SESSION['carts']);
        } else {
            // Jika sesi kosong, ambil dari database
            $this->carts = $this->getAllCartItemsFromDB();
            $_SESSION['carts'] = serialize($this->carts);
        }
    }

    public function addCartItem($member_id, $item_id, $quantity) {
        $existingCart = $this->getCartItemByItemAndMemberId($item_id, $member_id);

        if ($existingCart) {
            // Update quantity jika item sudah ada
            $newQuantity = $existingCart->quantity + $quantity;
            return $this->updateQuantity($existingCart->id, $newQuantity);
        } else {
            // Tambahkan item baru ke keranjang
            $query = "INSERT INTO carts (member_id, item_id, quantity) VALUES ('$member_id', '$item_id', '$quantity')";
            try {
                $this->db->execute($query);
                // Perbarui data dalam sesi
                $this->carts = $this->getAllCartItemsFromDB();
                $_SESSION['carts'] = serialize($this->carts);
                return true;
            } catch (Exception $e) {
                echo "<script>console.log('Error adding cart item: " . addslashes($e->getMessage()) . "');</script>";
                return false;
            }
        }
    }

    private function getAllCartItemsFromDB() {
        $query = "SELECT * FROM carts";
        $result = $this->db->select($query);

        $carts = [];
        foreach ($result as $row) {
            // Cari data item terkait berdasarkan item_id
            $itemQuery = "SELECT * FROM items WHERE id = " . $row['item_id'];
            $itemResult = $this->db->select($itemQuery);
            var_dump($itemResult);

            if (count($itemResult) > 0) {
                $item = $itemResult[0];

                $carts[] = new Cart(
                    $row['id'],
                    $row['member_id'],
                    $item['id'],
                    $item['name'],
                    $item['price'],
                    $item['stock'],
                    $item['star'],
                    $row['quantity']
                );
            }
        }
        return $carts;
    }

    public function getCartsByMemberId($member_id) {
        $query = "SELECT * FROM carts WHERE member_id = $member_id";
        $result = $this->db->select($query);

        $carts = [];
        foreach ($result as $row) {
            // Fetch item details from items table
            $itemQuery = "SELECT * FROM items WHERE id = {$row['item_id']}";
            $itemResult = $this->db->select($itemQuery);

            if (count($itemResult) > 0) {
                $item = $itemResult[0];
                $carts[] = new Cart(
                    $row['id'],
                    $row['member_id'],
                    $item['id'],
                    $item['name'],
                    $item['price'],
                    $item['stock'],
                    $item['star'],
                    $row['quantity']
                );
            }
        }
        return $carts;
    }

    public function getCartItemByItemAndMemberId($item_id, $member_id) {
        foreach ($this->carts as $cart) {
            if ($cart->item_id == $item_id && $cart->member_id == $member_id) {
                return $cart;
            }
        }
        return null;
    }

    public function increaseQuantity($cartId, $quantity) {
        foreach ($this->carts as $cart) {
            if ($cart->id == $cartId) {
                $newQuantity = $cart->quantity + $quantity;
                return $this->updateQuantity($cartId, $newQuantity);
            }
        }
        echo "<script>console.log('Cart item with ID $cartId not found for increasing quantity.');</script>";
        return false;
    }
    
    public function decreaseQuantity($cartId, $quantity) {
        foreach ($this->carts as $cart) {
            if ($cart->id == $cartId) {
                $newQuantity = $cart->quantity - $quantity;
                // Pastikan quantity tidak menjadi negatif
                if ($newQuantity < 0) {
                    echo "<script>console.log('Quantity cannot be negative for cart item with ID $cartId.');</script>";
                    return false;
                }
                return $this->updateQuantity($cartId, $newQuantity);
            }
        }
        echo "<script>console.log('Cart item with ID $cartId not found for decreasing quantity.');</script>";
        return false;
    }
    

    public function updateQuantity($cartId, $new_quantity) {
        $query = "UPDATE carts SET quantity = $new_quantity WHERE id = $cartId";
        try {
            $this->db->execute($query);
            // Perbarui data dalam sesi
            $this->carts = $this->getAllCartItemsFromDB();
            $_SESSION['carts'] = serialize($this->carts);
            return true;
        } catch (Exception $e) {
            echo "<script>console.log('Error updating quantity: " . addslashes($e->getMessage()) . "');</script>";
            return false;
        }
    }

    public function getAllCartItems() {
        echo "<script>console.log('Fetching all cart items');</script>";
        return $this->carts;
    }

    public function removeCartItem($id) {
        $query = "DELETE FROM carts WHERE id = $id";
        try {
            $this->db->execute($query);
            // Perbarui data dalam sesi
            $this->carts = $this->getAllCartItemsFromDB();
            $_SESSION['carts'] = serialize($this->carts);
            return true;
        } catch (Exception $e) {
            echo "<script>console.log('Error removing cart item: " . addslashes($e->getMessage()) . "');</script>";
            return false;
        }
    }

    public function __destruct() {
        // Menutup koneksi database
        $this->db->close();
    }
}

?>