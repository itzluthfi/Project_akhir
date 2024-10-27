<?php
require_once "/laragon/www/project_akhir/model/modelUser.php";

class ControllerUser {
    private $modelUser;

    public function __construct() {
        $this->modelUser = new modelUser();
    }

    public function handleAction($action) {
        switch ($action) {
            case 'add':
                $user_username = $_POST['user_username'];
                $user_password = $_POST['user_password'];
                $user_role = $_POST['user_role'];
                if($this->modelUser->addUser($user_username, $user_password, $user_role)){

                    $message = "User added successfully!";
                }else{
                    $message = "Failed to Add User";

                }
                break;

            case 'update':
                $user_id = $_GET['id'];
                $user_username = $_POST['user_username'];
                $user_password = $_POST['user_password'];
                $user_role = $_POST['user_role'];
                if ($this->modelUser->updateUser($user_id, $user_username, $user_password, $user_role)) {
                    $message = "User updated successfully!";
                } else {
                    $message = "Failed to update User.";
                }
                break;

            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    if ($this->modelUser->deleteUser($id)) {
                        $message = "User deleted successfully!";
                    } else {
                        $message = "Failed to delete user.";
                    }
                } else {
                    $message = "User ID not provided.";
                }
                break;

            default:
                $message = "Action not recognized for user.";
                break;
        }

        // Redirect setelah aksi dilakukan
        echo "<script>alert('$message'); window.location.href='/project_akhir/views/user/user_list.php';</script>";
    }
}