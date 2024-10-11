<?php
    require_once "/laragon/www/projectOop/init.php";
    
    $role_name = $_POST["role_name"];    
    $role_description = $_POST["role_description"];    
    $role_status = $_POST["role_status"];    
    $role_gaji = $_POST["role_gaji"];

    require_once "domain_object/node_role.php";
    
    $obj_role[] = new Role($role_name, $role_description,$role_status,$role_gaji);
    
    include_once "./views/role/role_list.php";

?>