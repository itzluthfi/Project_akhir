// auth_check.php
<?php
session_start();

if (!isset($_SESSION['user_login'])) {
    header('Location: /project_akhir/');
    exit();
}
?>