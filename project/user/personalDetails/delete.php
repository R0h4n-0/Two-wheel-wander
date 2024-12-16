<?php
session_start();
include '../../components/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}

$user_id = $_POST['user_id'];

$delete_query = "DELETE FROM `user` WHERE `id` = '$user_id'";

if (mysqli_query($conn, $delete_query)) {
    session_unset();
    session_destroy();

    echo '<script>alert("Your account has been deleted."); window.location.href = "../../login.php";</script>';
    exit();
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
