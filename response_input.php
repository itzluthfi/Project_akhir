<?php
require_once "/laragon/www/project_akhir/init.php";
session_start(); // Mulai sesi di awal

// Check request method (POST atau GET)
if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    // Tentukan modul dan action dari request
    $modul = isset($_POST["modul"]) ? $_POST["modul"] : $_GET["modul"];
    $action = isset($_POST["fitur"]) ? $_POST["fitur"] : $_GET["fitur"] ;

    // Arahkan setiap modul ke controller masing-masing
    switch ($modul) {
        case 'role':
            require_once 'controller/ControllerRole.php';
            $roleController = new ControllerRole();
            $roleController->handleAction($action);
            break;

        case 'item':
            require_once 'controller/ControllerItem.php';
            $itemController = new ControllerItem();
            $itemController->handleAction($action);
            break;

        case 'user':
            require_once 'controller/ControllerUser.php';
            $userController = new ControllerUser();
            $userController->handleAction($action);
            break;
            
        case 'login':
            $username = $_POST["username_login"];
            $password = $_POST["password_login"];
            $users = $modelUser->getAllUser(); 

            foreach ($users as $user) {
                // Cocokkan username dan password
                if ($user->user_username == $username && $user->user_password == $password) {
                    echo "<script>alert('Login berhasil'); window.location.href='/project_akhir/views/role/role_list.php';</script>";
                    // Simpan data user ke session
                    $_SESSION['user_login'] = serialize($user);
                    return;
                }
            }
            // Jika login gagal
            echo "<script>alert('Login gagal!'); window.location.href='/project_akhir/';</script>";
            break;

            case 'logout':
                // Hapus sesi pengguna dan redirect ke halaman login
                session_destroy(); // Menghentikan sesi
                echo "<script>alert('Logout berhasil!'); window.location.href='/project_akhir/';</script>";
                break;

        default:
            echo "<script>alert('Module tidak dikenal.'); window.location.href='/project_akhir/{$modul}/{$modul}_list.php';</script>";
            break;
    }
}
?>