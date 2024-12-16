<?php
session_start();
include '../../components/connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $deleteBookingsQuery = "DELETE FROM booking WHERE Vehicle_ID = $id";
    if (mysqli_query($conn, $deleteBookingsQuery)) {

        $deleteVehicleQuery = "DELETE FROM vehicles WHERE ID = $id";
        if (mysqli_query($conn, $deleteVehicleQuery)) {
            $_SESSION['message'] = "Vehicle deleted successfully.";
        } else {
            $_SESSION['message'] = "Failed to delete vehicle: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['message'] = "Failed to delete bookings: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $_SESSION['message'] = "Invalid request.";
}

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
