<?php
require_once "/laragon/www/project_akhir/model/modelMember.php";

class ControllerMember {
    private $modelMember;

    public function __construct() {
        $this->modelMember = new modelMember();
    }

    public function handleAction($action) {
        switch ($action) {
            case 'add':
                $member_name = $_POST['member_name'];
                $member_phone = $_POST['member_phone'];
                $member_point = $_POST['member_point'];
                if ($this->modelMember->addMember($member_name, $member_phone, $member_point)) {
                    $message = "Member added successfully!";
                } else {
                    $message = "Failed to add member.";
                }
                break;

            case 'update':
                $member_id = $_POST['member_id'];
                $member_name = $_POST['member_name'];
                $member_phone = $_POST['member_phone'];
                $member_point = $_POST['member_point'];
                if ($this->modelMember->updateMember($member_id, $member_name, $member_phone, $member_point)) {
                    $message = "Member updated successfully!";
                } else {
                    $message = "Failed to update member.";
                }
                break;

            case 'delete':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    if ($this->modelMember->deleteMember($id)) {
                        $message = "Member deleted successfully!";
                    } else {
                        $message = "Failed to delete member.";
                    }
                } else {
                    $message = "Member ID not provided.";
                }
                break;

            case 'getMemberById':
                if (isset($_GET['id'])) {
                    $member = $this->modelMember->getMemberById($_GET['id']);
                    if ($member) {
                        echo json_encode($member);  // Return member data in JSON format
                    } else {
                        echo json_encode(['error' => 'Member not found']);
                    }
                } else {
                    echo json_encode(['error' => 'Member ID not provided']);
                }
                return;  // Return early since we're echoing JSON directly

            default:
                $message = "Action not recognized for member.";
                break;
        }

        // Redirect after action
        echo "<script>alert('$message'); window.location.href='/project_akhir/views/member/member_list.php';</script>";
    }
}
?>