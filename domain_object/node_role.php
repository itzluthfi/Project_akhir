<?php

class Role {
    public static $newId = 1;
    public $role_id;
    public $role_name;
    public $role_description;
    public $role_status;
    public $role_gaji;
    public function __construct($role_name,$role_description,$role_status,$role_gaji)
    {
        $this->role_id = self::$newId++;
        $this->role_name = $role_name;
        $this->role_description = $role_description;
        $this->role_status = $role_status;
        $this->role_gaji = $role_gaji;
        
    }

    public function show() {
        echo "id : " . $this->role_id . "<br>";
        echo "name : " . $this->role_name . "<br>";
        echo "description : " . $this->role_description . "<br>";
        echo "status : " . $this->role_status . "<br>";
    }

}