<?php
require_once "/laragon/www/project_akhir/model/modelRole.php";

class ControllerRole {
    private $modelRole;

    public function __construct() {
        $this->modelRole = new modelRole();
    }

    public function handleAction($action) {
        switch ($action) {
            case 'add':
                $role_name = $_POST['role_name'];
                $role_description = $_POST['role_description'];
                $role_status = $_POST['role_status'];
                $role_gaji = $_POST['role_gaji'];
                $this->modelRole->addRole($role_name, $role_description, $role_status, $role_gaji);
                $message = "Role added successfully!";
                break;

            case 'update':
                $role_id = $_POST['role_id'];
                $role_name = $_POST['role_name'];
                $role_description = $_POST['role_description'];
                $role_status = $_POST['role_status'];
                $role_gaji = $_POST['role_gaji'];
                if ($this->modelRole->updateRole($role_id, $role_name, $role_description, $role_status, $role_gaji)) {
                    $message = "Role updated successfully!";
                } else {
                    $message = "Failed to update role.";
                }
                break;

            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    if ($this->modelRole->deleteRole($id)) {
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

        // Redirect after action
        echo "<script>alert('$message'); window.location.href='/project_akhir/views/role/role_list.php';</script>";
    }
}