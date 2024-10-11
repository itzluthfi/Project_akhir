<?php
class Barang {
    public static $newId = 1;
    public $barang_id;
    public $barang_name;
    public $barang_price;
    public $barang_stock;

    public function __construct($barang_name,$barang_price,$barang_stock)
    {
        $this->barang_id = self::$newId++;
        $this->barang_name = $barang_name;
        $this->barang_price = $barang_price;
        $this->barang_stock = $barang_stock;
    }
}