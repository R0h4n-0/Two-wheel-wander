<?php
// Ensure connection to database
include '../../components/connection.php';

// Check if ID parameter is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch booking details before deletion
    $fetch_booking_query = "SELECT * FROM booking WHERE ID = '$id'";
    $fetch_booking_result = mysqli_query($conn, $fetch_booking_query);

    if(mysqli_num_rows($fetch_booking_result) > 0) {
        $booking = mysqli_fetch_assoc($fetch_booking_result);
        $vehicle_id = $booking['Vehicle_ID'];
        $booking_status = $booking['BookingStatus'];

        // Construct the delete query
        $delete_query = "DELETE FROM booking WHERE ID = '$id'";

        // Execute the delete query
        if(mysqli_query($conn, $delete_query)) {
            // Update vehicle availability status
            $update_vehicle_query = "UPDATE vehicles SET AvailabilityStatus = 1 WHERE ID = '$vehicle_id'";
            if(mysqli_query($conn, $update_vehicle_query)) {
                // Optionally update booking status to 'Canceled' if not already completed
                if($booking_status != 'Completed') {
                    $update_booking_status_query = "UPDATE booking SET BookingStatus = 'Canceled' WHERE ID = '$id'";
                    mysqli_query($conn, $update_booking_status_query);
                }

                // Redirect back to the booking list page after successful deletion
                header("Location: ../pages/userInfo.php");
                exit();
            } else {
                // Handle error updating vehicle availability
                echo "Error updating vehicle availability: " . mysqli_error($conn);
            }
        } else {
            // Handle error deleting booking
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        // Booking with provided ID not found
        echo "Booking with ID $id not found.";
    }
} else {
    // Redirect if ID parameter is not provided
    header("Location: ../user/pages/userInfo.php");
    exit();
}

// Close database connection
mysqli_close($conn);
?>
