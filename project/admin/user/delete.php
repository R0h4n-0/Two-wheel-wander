<?php
include '../../components/session.php'
?>

<?php

include '../../components/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM user WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: read.php");
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    header("Location: read.php");
}
?>
