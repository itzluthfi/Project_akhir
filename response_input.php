<?php
require_once "/laragon/www/project_akhir/init.php";

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

        case 'sale':
            require_once 'controller/ControllerSale.php';
            $saleController = new ControllerSale();
            $saleController->handleAction($action);
            break;
            
        case 'login':
                $username = $_POST["username_login"];
                $password = $_POST["password_login"];
                $rememberMe = isset($_POST["remember_me"]); // Cek apakah "Remember Me" dicentang
                $users = $modelUser->getAllUser(); 

                foreach ($users as $user) {
                    // Cocokkan username dan password
                    if ($user->user_username == $username && $user->user_password == $password) {
                        // Simpan data user ke session
                        $_SESSION['user_login'] = serialize($user);

                            
                    // Jika "Remember Me" dicentang, simpan cookie yang berlaku selama 1 hari
                    if ($rememberMe) {
                        setcookie('user_login', serialize($user), time() + (86400), "/"); // 86400 detik = 1 hari
                    }

                    echo "<script>alert('Login berhasil'); window.location.href='/project_akhir/views/role/role_list.php';</script>";

                        return;
                    }
                }
            // Jika login gagal
            echo "<script>alert('Login gagal!'); window.location.href='/project_akhir/';</script>";
        break;

            case 'logout':
                // Hapus sesi dan cookie
                session_unset();
                session_destroy(); 
                
                if (isset($_COOKIE['user_login'])) {
                    
                    setcookie('user_login', '', time() - 3600, "/");
                }
                
                echo "<script>alert('Logout berhasil!'); window.location.href='/project_akhir/';</script>";
                break;

        default:
            echo "<script>alert('Module tidak dikenal.'); window.location.href='/project_akhir/{$modul}/{$modul}_list.php';</script>";
            break;
    }
}
?>