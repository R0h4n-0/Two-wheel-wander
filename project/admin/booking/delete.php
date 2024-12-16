<?php
include '../../components/session.php'
?>

<?php
include '../../components/connection.php';

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];


    $booking_query = mysqli_query($conn, "SELECT Vehicle_ID FROM booking WHERE ID = $booking_id");
    $booking = mysqli_fetch_assoc($booking_query);
    $vehicle_id = $booking['Vehicle_ID'];


    $delete_booking_sql = "DELETE FROM booking WHERE ID = $booking_id";
    if (mysqli_query($conn, $delete_booking_sql)) {
        $update_vehicle_sql = "UPDATE vehicles SET AvailabilityStatus = 1 WHERE ID = $vehicle_id";
        if (mysqli_query($conn, $update_vehicle_sql)) {
            echo "<script>
                    alert('Booking deleted successfully!');
                    window.location.href = 'read.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error updating vehicle availability: " . mysqli_error($conn) . "');
                    window.location.href = 'read.php'; 
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error deleting booking: " . mysqli_error($conn) . "');
                window.location.href = 'read.php'; 
              </script>";
    }

    mysqli_close($conn);
} else {
    echo "<script>
            alert('Error: Booking ID is missing.');
            window.location.href = 'read.php';
          </script>";
}
?>
