<?php

require_once "/laragon/www/project_akhir/domain_object/node_user.php";

class modelUser{
    private $users = [];
    private $nextId = 1;
    

    public function __construct() {
        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = isset($_SESSION['lastUserId']) ? $_SESSION['lastUserId'] + 1 : 1; // Ambil dari sesi
            
        } else {
            $this->initialiazeDefaultUser();
            $this->nextId = 4; // Misalnya, jika memiliki 3 user default
        }
    }

    public function initialiazeDefaultUser() {
        $this->addUser("luthfi","luthfi123",1);
        $this->addUser("habib","habib123",3);
        $this->addUser("adam","adam123",4);
    }
    
    public function addUser($user_username, $user_password, $id_role) {
        error_log("Adding user: Name=$user_username, pw=$user_password, role=$id_role");
        $user = new user($this->nextId, $user_username, $user_password, $id_role);
        $this->users[] = $user;
        $_SESSION['lastUserId'] = $this->nextId; // Simpan ID terakhir yang digunakan
        $this->nextId++; // increment
        $this->saveToSession();
        return true;
    }
    

    private function saveToSession() {
        $_SESSION['users'] = serialize($this->users);
    }
    
    public function getAllUser() {
        return $this->users;
    }
    
    public function getUserById($id) {
        foreach ($this->users as $user) {
            if ($user->user_id == $id) {
                return $user;
            }
        }
        return null;
    }

    public function updateUser($id, $user_username, $user_password, $id_role) {
        foreach ($this->users as $user) {
            if ($user->user_id == $id) {
                $user->user_username = $user_username;
                $user->user_password = $user_password;
                $user->id_role = $id_role;
                
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    
    public function deleteUser($id) {
        foreach ($this->users as $key => $user) {
            if ($user->user_id == $id) {
                unset($this->users[$key]);
                $this->users = array_values($this->users);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
}

?>