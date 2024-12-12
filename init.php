<?php

session_start();
include_once "model/modelRoleSql.php";
include_once "model/modelItemSql.php";
include_once "model/modelUserSql.php";
include_once "model/modelSale.php";
include_once "model/modelMemberSql.php";
include_once "model/modelCartSql.php";
// initiate
//role
$modelRole = new modelRole();
$modelItem = new modelItem();
$modelUser = new modelUser();
$modelSale = new modelSale();
$modelMember = new modelMember();
$modelCart = new modelCart();




?>