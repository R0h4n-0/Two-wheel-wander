<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin/form/login.php");
    exit();
}
?>