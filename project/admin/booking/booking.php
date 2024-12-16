<?php
include("../../components/connection.php");

session_start();
if (isset($_SESSION['user_id'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vehicle_id = mysqli_real_escape_string($conn, $_POST['vehicle_id']);
        $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
        $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);

        $availability_query = mysqli_query($conn, "SELECT AvailabilityStatus FROM vehicles WHERE ID = '$vehicle_id'");
        if (!$availability_query) {
            echo "<script>
                    alert('Database query failed: " . mysqli_error($conn) . "');
                    window.location.href = '../../user/pages/index.php';
                  </script>";
            exit();
        }

        $availability = mysqli_fetch_assoc($availability_query);
        $availability_status = $availability['AvailabilityStatus'];

        if ($availability_status == 0) {
            echo "<script>
                    alert('This vehicle is not available for booking.');
                    window.location.href = '../../user/pages/index.php';
                  </script>";
            exit();
        }

        $vehicle_query = mysqli_query($conn, "SELECT PricePerDay FROM vehicles WHERE ID = '$vehicle_id'");
        if (!$vehicle_query) {
            echo "<script>
                    alert('Database query failed: " . mysqli_error($conn) . "');
                    window.location.href = '../../user/pages/index.php';
                  </script>";
            exit();
        }

        $vehicle = mysqli_fetch_assoc($vehicle_query);
        $price_per_day = $vehicle['PricePerDay'];

        $start = new DateTime($start_date);
        $end = new DateTime($end_date);
        $interval = $start->diff($end);
        $days = $interval->days;

        $total_cost = $days * $price_per_day;
        $booking_status = 'Pending';

        mysqli_begin_transaction($conn);

        try {
            $sql = "INSERT INTO booking (User_ID, Vehicle_ID, StartDate, EndDate, Total_cost, BookingStatus)
                    VALUES ('$user_id', '$vehicle_id', '$start_date', '$end_date', '$total_cost', '$booking_status')";
            if (!mysqli_query($conn, $sql)) {
                throw new Exception("Booking insertion failed: " . mysqli_error($conn));
            }

            $update_vehicle_sql = "UPDATE vehicles SET AvailabilityStatus = 0 WHERE ID = '$vehicle_id'";
            if (!mysqli_query($conn, $update_vehicle_sql)) {
                throw new Exception("Vehicle update failed: " . mysqli_error($conn));
            }

            mysqli_commit($conn);

            echo "<script>
                    alert('Booking successful!');
                    window.location.href = '../../user/pages/index.php';
                  </script>";
        } catch (Exception $e) {
            mysqli_rollback($conn);

            echo "<script>
                    alert('Error: Could not complete booking. " . $e->getMessage() . "');
                    window.location.href = '../../user/pages/index.php';
                  </script>";
        }

        mysqli_close($conn);
    }
} else {
    header("Location: ../../user/form/login.php");
    exit();
}
?>
