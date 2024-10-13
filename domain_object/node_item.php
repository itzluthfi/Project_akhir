<?php
class Item {
    public $item_id;
    public $item_name;
    public $item_price;
    public $item_stock;

    public function __construct($item_id,$item_name,$item_price,$item_stock)
    {
        $this->item_id = $item_id;
        $this->item_name = $item_name;
        $this->item_price = $item_price;
        $this->item_stock = $item_stock;
    }
}