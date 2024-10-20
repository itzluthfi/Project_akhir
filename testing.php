<?php
session_start();
session_destroy();
include_once "model/user_model.php";
include_once "model/role_model.php";

$roleModel = new Role_Model(); 
$userModel = new User_Model(); 

// composite
$roleModel->addRole("Manager", "Mengelola tim", 1, 4000000);
$roleModel->addRole("Kasir", "Melayani pembayaran", 1, 6000000);
$roleModel->addRole("Admin", "Mengatur User/Role", 1, 8000000);
$roleModel->addRole("Super Admin", "Mengatur Semuanya (termasuk admin)", 1, 12000000);

echo "Daftar Role: <br>";
$roles = $roleModel->getAllRole();
foreach ($roles as $role) {
    echo "Role ID: " . $role->role_id . ", Role Name: " . $role->role_name . ", Gaji: " . $role->role_gaji . "<br>";
}

// Agregasi user dengan role
$userModel->addUser("Ini Budi", "iniBudi@gmail.com", "budi123", $roleModel, 1); // Role ID 1 (Manager)
$userModel->addUser("Siti", "Siti@gmail.com", "siti123", $roleModel, 2); // Role ID 2 (Kasir)
$userModel->addUser("Dimass Mabar", "dimasMabar@gmail.com", "dimas123", $roleModel, 4); // Role ID 4 (Super Admin)

echo "<br>Daftar User: <br>";
$users = $userModel->getAllUsers();
foreach ($users as $user) {
    echo "Username: " . $user->user_username . ", Email: " . $user->email . ", Password: " . $user->password . ", Role: " . $user->user_role->role_name . "<br>";
}
?>