<?php

require_once "/laragon/www/project_akhir/domain_object/node_item.php";

class modelItem {
    private $items = [];
    private $nextId = 1;

    public function __construct() {
        if (isset($_SESSION['items'])) {
            $this->items = unserialize($_SESSION['items']);
            $this->nextId = isset($_SESSION['lastItemId']) ? $_SESSION['lastItemId'] + 1 : 1; // Ambil dari sesi
            
        } else {
            $this->initialiazeDefaultItem();
            $this->nextId = 4; // Misalnya, jika memiliki 3 Item default
        }
    }

    public function initialiazeDefaultItem() {
        $this->addItem("Silverqueen",19000,20);
        $this->addItem("chimory",10000,17);
        $this->addItem("sari roti",5000,14);
    }
    public function addItem($item_name, $item_price, $item_stock) {
        error_log("Adding Item: Name=iItem_name, price=$item_price, stock=$item_stock");
        $item = new Item($this->nextId, $item_name, $item_price, $item_stock);
        $this->items[] = $item;
        $_SESSION['lastItemId'] = $this->nextId; // Simpan ID terakhir yang digunakan
        $this->nextId++; // increment
        $this->saveToSession();
    }
    

    private function saveToSession() {
        $_SESSION['items'] = serialize($this->items);
    }
    
    public function getAllItem() {
        return $this->items;
    }
    
    public function getItemById($id) {
        foreach ($this->items as $item) {
            if ($item->item_id == $id) {
                return $item;
            }
        }
        return null;
    }

    public function updateItem($id, $item_name, $item_price, $item_stock) {
        foreach ($this->items as $item) {
            if ($item->item_id == $id) {
                $item->item_name = $item_name;
                $item->item_price = $item_price;
                $item->item_stock = $item_stock;
                
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    
    public function deleteItem($id) {
        foreach ($this->items as $key => $item) {
            if ($item->item_id == $id) {
                unset($this->items[$key]);
                $this->items = array_values($this->items);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
}

?>