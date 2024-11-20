<?php

require_once "/laragon/www/project_akhir/domain_object/node_member.php";

class modelMember {
    private $members = [];
    private $nextId = 1;

    public function __construct() {
        if (isset($_SESSION['members'])) {
            $this->members = unserialize($_SESSION['members']);
            $this->nextId = isset($_SESSION['lastMemberId']) ? $_SESSION['lastMemberId'] + 1 : 1;
        } else {
            $this->initializeDefaultMembers();
            $this->nextId = 4; // Assuming there are 3 default members
        }
    }

    public function initializeDefaultMembers() {
        $this->addMember("Brillian","brillian123", "08123456789", 1000);
        $this->addMember("Habib","habibin123", "08234567890", 1500);
        $this->addMember("Luthfi","luppy123", "08345678901", 2000);
    }

    public function addMember($name,$password, $phone, $point) {
        error_log("Adding Member: Name=$name, Phone=$phone, Point=$point");
        $member = new Member($this->nextId, $name, $password,$phone, $point);
        $this->members[] = $member;
        $_SESSION['lastMemberId'] = $this->nextId;
        $this->nextId++;
        $this->saveToSession();
        return true;
    }

    private function saveToSession() {
        $_SESSION['members'] = serialize($this->members);
    }
    
    public function getAllMembers() {
        return $this->members;
    }
    
    public function getMemberById($id) {
        foreach ($this->members as $member) {
            if ($member->id == $id) {
                return $member;
            }
        }
        return null;
    }

    public function updateMember($id, $name,$password, $phone, $point) {
        foreach ($this->members as $member) {
            if ($member->id == $id) {
                $member->name = $name;
                $member->phone = $phone;
                $member->point = $point;
                $member->password = $password;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    
    public function deleteMember($id) {
        foreach ($this->members as $key => $member) {
            if ($member->id == $id) {
                unset($this->members[$key]);
                $this->members = array_values($this->members);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
}

?>