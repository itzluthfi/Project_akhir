<?php
require_once "/laragon/www/project_akhir/init.php";

// Check request method (POST or GET)
if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    // Determine the module and action from the request
    $modul = isset($_POST["modul"]) ? $_POST["modul"] : $_GET["modul"];
    $action = isset($_POST["action"]) ? $_POST["action"] : $_GET["fitur"];

    // Direct each module to its respective controller
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
            

        default:
            echo "<script>alert('Module not recognized.'); window.location.href='/project_akhir/{$modul}/{$modul}_list';</script>";
            break;
    }
}
?>