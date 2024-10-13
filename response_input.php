<?php
require_once "/laragon/www/project_akhir/init.php";

// Check request method (POST or GET)
if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    // Determine the module and action from the request
    $modul = isset($_POST["modul"]) ? $_POST["modul"] : $_GET["modul"];
    $action = isset($_POST["action"]) ? $_POST["action"] : $_GET["fitur"];

    // Handle different modules using switch case
    switch ($modul) {
        case 'role':
            // Handle role module actions
            switch ($action) {
                case 'add':
                    $role_name = $_POST['role_name'];
                    $role_description = $_POST['role_description'];
                    $role_status = $_POST['role_status'];
                    $role_gaji = $_POST['role_gaji'];
                    $modelRole->addRole($role_name, $role_description, $role_status, $role_gaji);
                    $message = "Role added successfully!";
                    break;

                case 'update':
                    $role_id = $_POST['role_id'];
                    print_r($role_id);
                    $role_name = $_POST['role_name'];
                    $role_description = $_POST['role_description'];
                    $role_status = $_POST['role_status'];
                    $role_gaji = $_POST['role_gaji'];
                    if ($modelRole->updateRole($role_id, $role_name, $role_description, $role_status, $role_gaji)) {
                        $message = "Role updated successfully!";
                    } else {
                        $message = "Failed to update role.";
                    }
                    break;

                case 'delete':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        if ($modelRole->deleteRole($id)) {
                            $message = "Role deleted successfully!";
                        } else {
                            $message = "Failed to delete role.";
                        }
                    } else {
                        $message = "Role ID not provided.";
                    }
                    break;

                default:
                    $message = "Action not recognized for role.";
                    break;
            }
            break;

        // // Example for another module, e.g., user
        // case 'user':
        //     // Handle user module actions
        //     switch ($action) {
        //         case 'add':
        //             $username = $_POST['username'];
        //             $email = $_POST['email'];
        //             $password = $_POST['password'];
        //             $modelRole->addUser($username, $email, $password);
        //             $message = "User added successfully!";
        //             break;

        //         case 'update':
        //             $user_id = $_POST['user_id'];
        //             $username = $_POST['username'];
        //             $email = $_POST['email'];
        //             if ($modelRole->updateUser($user_id, $username, $email)) {
        //                 $message = "User updated successfully!";
        //             } else {
        //                 $message = "Failed to update user.";
        //             }
        //             break;

        //         case 'delete':
        //             if (isset($_GET['id'])) {
        //                 $id = $_GET['id'];
        //                 if ($modelRole->deleteUser($id)) {
        //                     $message = "User deleted successfully!";
        //                 } else {
        //                     $message = "Failed to delete user.";
        //                 }
        //             } else {
        //                 $message = "User ID not provided.";
        //             }
        //             break;

        //         default:
        //             $message = "Action not recognized for user.";
        //             break;
        //     }
        //     break;

        // Default case when no module is recognized
        default:
            $message = "Module not recognized.";
            break;
    }

    // Show alert and redirect back to the list page after action
    echo "<script>alert('$message'); window.location.href='/project_akhir/views/{$modul}/{$modul}_list.php';</script>";
}
?>