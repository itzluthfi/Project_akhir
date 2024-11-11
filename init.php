<?php

session_start();
include_once "model/modelRole.php";
include_once "model/modelItem.php";
include_once "model/modelUser.php";
include_once "model/modelSale.php";
include_once "model/modelMember.php";
include_once "model/modelCart.php";
// initiate
//role
$modelRole = new modelRole();
$modelItem = new modelItem();
$modelUser = new modelUser();
$modelSale = new modelSale();
$modelMember = new modelMember();
$modelCart = new modelCart();


//batasi akses
if(isset($_SESSION['user_login'])) {
    $user = unserialize($_SESSION['user_login']);
    $user_role = $modelRole->getRoleById($user->id_role);
    //var_dump($user_role->role_name);
    // Cek role pengguna dan menentukan sidebar yang sesuai
    switch ($user_role->role_name) {

    case 
        "Admin":
        $sidebar_file = '../includes/sidebar_admin.php';
        break;
    case "Superadmin":
        $sidebar_file = '../includes/sidebar_superadmin.php';
        break;
    case "Kasir":
        $sidebar_file = '../includes/sidebar_kasir.php';
        break;
    default:
        $sidebar_file = '../includes/sidebar.php'; // Sidebar default jika role tidak dikenal
        break;
    }
}


?>