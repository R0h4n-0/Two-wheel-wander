<?php
include '../../components/session.php';

if(isset($_POST['Submit'])) {
    include ("../../components/connection.php");

    $Vehicle_Type = mysqli_real_escape_string($conn, $_POST['Vehicle_Type']);
    $Brand = mysqli_real_escape_string($conn, $_POST['Brand']);
    $Model = mysqli_real_escape_string($conn, $_POST['Model']);
    $Color = mysqli_real_escape_string($conn, $_POST['Color']);
    $RegistrationNumber = mysqli_real_escape_string($conn, $_POST['RegistrationNumber']);
    $AvailabilityStatus = mysqli_real_escape_string($conn, $_POST['AvailabilityStatus']);
    $Location = mysqli_real_escape_string($conn, $_POST['Location']);
    $PricePerDay = mysqli_real_escape_string($conn, $_POST['PricePerDay']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);

    $Image = $_FILES['Image'];
    $Img_loc = $_FILES['Image']['tmp_name'];
    $Img_name = mysqli_real_escape_string($conn, $_FILES['Image']['name']);
    $Img_dest = "uploadimage/" . $Img_name;

    if (move_uploaded_file($Img_loc, $Img_dest)) {
        $sql = "INSERT INTO `vehicles`(`Vehicle_Type`, `Brand`, `Model`, `Color`, `RegistrationNumber`, `AvailabilityStatus`, `Location`, `PricePerDay`, `Description`, `Image`) 
                VALUES ('$Vehicle_Type', '$Brand', '$Model', '$Color', '$RegistrationNumber', '$AvailabilityStatus', '$Location', '$PricePerDay', '$Description', '$Img_dest')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Vehicle added successfully!');
                    window.location.href = 'vehicles.php';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error uploading image.";
    }

    mysqli_close($conn);
}
?>
