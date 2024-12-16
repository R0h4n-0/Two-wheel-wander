<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2 Wheel Wander</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
include ("../../components/header.php");
include("../../components/connection.php");

$Record = mysqli_query($conn, "SELECT * FROM `vehicles`");

echo "<div class='container'>";
echo "<div class='row'>";

while ($row = mysqli_fetch_array($Record)) {
    $imageBaseName = isset($row['Image']) ? pathinfo($row['Image'], PATHINFO_FILENAME) : 'default';
    $possibleExtensions = ['jpg', 'jpeg', 'png','webp'];
    $imagePath = 'default_image_path.jpg';

    foreach ($possibleExtensions as $extension) {
        if (file_exists("../../admin/vehicles/uploadimage/{$imageBaseName}.{$extension}")) {
            $imagePath = "../../admin/vehicles/uploadimage/{$imageBaseName}.{$extension}";
            break;
        }
    }

    echo "
<div class='col-12 col-sm-6 col-md-4 mb-3 my-4'>
    <div class='card h-100'>
        <img src='{$imagePath}' alt='Vehicle Image' class='card-img-top'>
        <div class='card-body'>
            <h5 class='card-title'> {$row['Brand']} {$row['Model']} ({$row['Color']})</h5>
            <h5 class='card-title'>Nrs {$row['PricePerDay']}</h5>
            <p class='card-text'>{$row['Description']}</p>
            <form action='../../admin/booking/booking.php' method='POST'>
                <input type='hidden' name='vehicle_id' value='{$row['ID']}'>
                <div>
                    <label for='startDate' class='form-label'>Start Date</label>
                    <input type='date' class='form-control' id='startDate' name='start_date' required>
                </div>
                <div class='mb-1'>
                    <label for='endDate' class='form-label'>End Date</label>
                    <input type='date' class='form-control' id='endDate' name='end_date' required>
                </div>
                <button type='submit' class='btn btn-primary'>Rent Now</button>
            </form>
        </div>
    </div>
</div>";

}

echo "</div>";
echo "</div>";

mysqli_close($conn);
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
