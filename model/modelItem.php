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
            $this->nextId = 7; // Misalnya, jika memiliki 6 Item default
        }
    }

    public function initialiazeDefaultItem() {
        $this->addItem("Latte",10000,20,4);
        $this->addItem("Expresso",8000,17,5);
        $this->addItem("Caramel",12000,14,0);
        $this->addItem("Gula-Aren",11000,14,5);
        $this->addItem("Mocha",14000,14,3);
        $this->addItem("Cappuccino",15000,14,5);
    }
    public function addItem($item_name, $item_price, $item_stock,$item_star) {
        error_log("Adding Item: Name=iItem_name, price=$item_price, stock=$item_stock");
        $item = new Item($this->nextId, $item_name, $item_price, $item_stock,$item_star);
        $this->items[] = $item;
        $_SESSION['lastItemId'] = $this->nextId; // Simpan ID terakhir yang digunakan
        $this->nextId++; // increment
        $this->saveToSession();
        return true;

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