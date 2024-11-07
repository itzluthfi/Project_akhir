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
        $this->addMember("John Doe", "08123456789", 100);
        $this->addMember("Jane Smith", "08234567890", 150);
        $this->addMember("Alice Johnson", "08345678901", 200);
    }

    public function addMember($name, $phone, $point) {
        error_log("Adding Member: Name=$name, Phone=$phone, Point=$point");
        $member = new Member($this->nextId, $name, $phone, $point);
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

    public function updateMember($id, $name, $phone, $point) {
        foreach ($this->members as $member) {
            if ($member->id == $id) {
                $member->name = $name;
                $member->phone = $phone;
                $member->point = $point;
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