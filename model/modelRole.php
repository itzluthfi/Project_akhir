<?php

require_once "/laragon/www/project_akhir/domain_object/node_role.php";

class modelRole {
    private $roles = [];
    private $nextId = 1;


    public function __construct() {
        if (isset($_SESSION['roles'])) {
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextId = isset($_SESSION['lastRoleId']) ? $_SESSION['lastRoleId'] + 1 : 1; // Ambil dari sesi
            
        } else {
            $this->initialiazeDefaultRole();
            $this->nextId = 4; // Misalnya, jika memiliki 3 role default
        }
    }

    public function initialiazeDefaultRole() {
        $this->addRole("Admin", "Administrator", 1,200000);
        $this->addRole("Manager", "Manage Admin", 0,5000000);
        $this->addRole("Superadmin", "Owner", 1,15000000);
        $this->addRole("Kasir", "Pembayaran", 1,1000000);
    }

    public function addRole($role_name, $role_description, $role_status,$role_gaji) {
       
        $role = new Role($this->nextId, $role_name, $role_description, $role_status,$role_gaji);
        $this->roles[] = $role;
        $_SESSION['lastRoleId'] = $this->nextId; // Simpan ID terakhir yang digunakan
        $this->nextId++; // Inkrementasi untuk role berikutnya
        $this->saveToSession();
        return true;
    }
    

    private function saveToSession() {
        $_SESSION['roles'] = serialize($this->roles);
    }
    
    public function getAllRole() {
        return $this->roles;
    }
    
    public function getRoleById($role_id) {
        foreach ($this->roles as $role) {
            if ($role->role_id == $role_id) {
                return $role;
            }
        }
        return null;
    }

    public function updateRole($id, $role_name, $role_description, $role_status,$role_gaji) {
        foreach ($this->roles as $role) {
            if ($role->role_id == $id) {
                $role->role_name = $role_name;
                $role->role_description = $role_description;
                $role->role_status = $role_status;
                $role->role_gaji = $role_gaji;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    
    public function deleteRole($role_id) {
        foreach ($this->roles as $key => $role) {
            if ($role->role_id == $role_id) {
                unset($this->roles[$key]);
                $this->roles = array_values($this->roles);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
}

?>