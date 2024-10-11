<?php
require_once "domain_object/node_role.php";
require_once "domain_object/node_barang.php";

// initiate
//role
$obj_role = [];
$obj_role[] = new Role("kasir","pelayan pelanggan",1,100000);
$obj_role[] = new Role("admin","pengatur",0,200000);
$obj_role[] = new Role("super admin","pengatur admin",1,150000);
$obj_role[] = new Role("customer","pelanggan",0,600000);

//barang
$obj_barang = [];
$obj_barang[] = new Barang("cornetto",6000,10);
$obj_barang[] = new Barang("sari roti",5000,11);
$obj_barang[] = new Barang("silverqueen",14000,5);
$obj_barang[] = new Barang("xilytol",9000,9);

?>