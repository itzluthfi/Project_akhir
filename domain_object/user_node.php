<?php
include_once "/laragon/www/project_akhir/domain_object/node_account.php";

class User extends Account {
    public $user_id;
    public $user_username;
    public $user_role;

    public function __construct($user_id, $user_username, $email, $password, $user_role) {
        parent::__construct($email, $password); 
        $this->user_id = $user_id;
        $this->user_username = $user_username;
        $this->user_role = $user_role;
    }
}
?>