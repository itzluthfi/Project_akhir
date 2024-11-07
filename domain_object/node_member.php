<?php
class Member {
    public $id;
    public $name;
    public $phone;
    public $point;

    public function __construct($id, $name, $phone,$point) {    
        $this->id = $id;
        $this->name = $name;    
        $this->phone = $phone;
        $this->point = $point;
    }
}


?>