<?php

require_once "/laragon/www/project_akhir/model/dbConnect.php";
require_once "/laragon/www/project_akhir/domain_object/node_role.php";

class modelRole {
    private $db;
    private $roles = [];

    public function __construct() {
        // Inisialisasi koneksi database
        $this->db = new Database('localhost', 'root', '', 'poswarkop');

        if (isset($_SESSION['roles'])) {
            // Ambil data dari sesi
            $this->roles = unserialize($_SESSION['roles']);
        } else {
            // Jika sesi kosong, ambil dari database
            $this->roles = $this->getAllRoleFromDB();
            $_SESSION['roles'] = serialize($this->roles);
        }
    }

   
    public function addRole($role_name, $role_description, $role_status, $role_gaji) {
        // Escape input untuk mencegah SQL Injection
        $role_name = mysqli_real_escape_string($this->db->conn, $role_name);
        $role_description = mysqli_real_escape_string($this->db->conn, $role_description);
        $role_status = (int)$role_status;
        $role_gaji = (int)$role_gaji;

        $query = "INSERT INTO roles (name, description, status, gaji) 
                  VALUES ('$role_name', '$role_description', $role_status, $role_gaji)";
        try {
            $this->db->execute($query);
            // Perbarui data dalam sesi
            $this->roles = $this->getAllRoleFromDB();
            $_SESSION['roles'] = serialize($this->roles);
            return true;
        } catch (Exception $e) {
            echo "<script>console.log('Error adding role: " . addslashes($e->getMessage()) . "');</script>";
            return false;
        }
    }

    private function getAllRoleFromDB() {
        $query = "SELECT * FROM roles";
        $result = $this->db->select($query);

        $roles = [];
        foreach ($result as $row) {
            $roles[] = new Role($row['id'], $row['name'], $row['description'], $row['status'], $row['gaji']);
        }
        return $roles;
    }

    public function getAllRole() {
        echo "<script>console.log('Fetching all roles');</script>";
        return $this->roles;
    }

    public function getRoleById($role_id) {
        $role_id = (int)$role_id;
        $query = "SELECT * FROM roles WHERE id = $role_id";
        $result = $this->db->select($query);

        if (count($result) > 0) {
            $row = $result[0];
            $role = new Role($row['id'], $row['name'], $row['description'], $row['status'], $row['gaji']);
            echo "<script>console.log('Role fetched successfully: " . addslashes(json_encode($role)) . "');</script>";
            return $role;
        }

        echo "<script>console.log('Role with ID $role_id not found.');</script>";
        return null;
    }

    public function updateRole($id, $role_name, $role_description, $role_status, $role_gaji) {
        $id = (int)$id;
        $role_name = mysqli_real_escape_string($this->db->conn, $role_name);
        $role_description = mysqli_real_escape_string($this->db->conn, $role_description);
        $role_status = (int)$role_status;
        $role_gaji = (int)$role_gaji;

        $query = "UPDATE roles 
                  SET name = '$role_name', description = '$role_description', status = $role_status, gaji = $role_gaji 
                  WHERE id = $id";
        try {
            $this->db->execute($query);
            // Perbarui data dalam sesi
            $this->roles = $this->getAllRoleFromDB();
            $_SESSION['roles'] = serialize($this->roles);
            return true;
        } catch (Exception $e) {
            echo "<script>console.log('Error updating role: " . addslashes($e->getMessage()) . "');</script>";
            return false;
        }
    }

    public function deleteRole($role_id) {
        $role_id = (int)$role_id;
        $query = "DELETE FROM roles WHERE id = $role_id";
        try {
            $this->db->execute($query);
            // Perbarui data dalam sesi
            $this->roles = $this->getAllRoleFromDB();
            $_SESSION['roles'] = serialize($this->roles);
            return true;
        } catch (Exception $e) {
            echo "<script>console.log('Error deleting role: " . addslashes($e->getMessage()) . "');</script>";
            return false;
        }
    }

    public function __destruct() {
        // Menutup koneksi database
        $this->db->close();
    }
}