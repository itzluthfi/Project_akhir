<?php
require_once "role_model.php";
require_once "/laragon/www/project_akhir/domain_object/user_node.php";

class User_Model {
    private $users = []; 
    private $nextUserId = 1; 

    public function __construct() {
        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            if ($this->users === false) {
                $this->users = []; 
            } else {
                $this->nextUserId = count($this->users) + 1; 
            }
        }
    }

    //agregation
    public function addUser($username, $email, $password, Role_Model $roleModel, $roleId) {
        $role = $roleModel->getRoleById($roleId);
        if ($role) {
            $user = new User($this->nextUserId, $username, $email, $password, $role);
            $this->users[] = $user; 
            $this->nextUserId++;
            $this->saveToSession();
        } else {
            throw new Exception("Role dengan ID $roleId tidak ditemukan.");
        }
    }

    private function saveToSession() {
        $_SESSION['users'] = serialize($this->users);
    }

    public function getAllUsers() {
        return $this->users;
    }

    public function getUserInfo($index) {
        if (isset($this->users[$index])) {
            $user = $this->users[$index];
            return "ID: " . $user->user_id . ", Username: " . $user->user_username . ", Email: " . $user->email . ", Role: " . $user->user_role->role_name;
        }
        return null;
    }
}
?>