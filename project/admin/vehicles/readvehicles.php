<?php
include '../../components/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid text-white">
            <a href="#" class="navbar-brand text-white"><h1>Bike Rent</h1></a>
            <span>
                <i class="fas fa-user-shield"></i>
                Hello, admin
                <a href="../form/logout.php" class="text-decoration-none text-white ms-3">Logout</a>
                <a href="../mystore.php" class="text-decoration-none text-white ms-3">Dashboard</a>
            </span>
        </div>
    </nav>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center my-5">Vehicles Info</h1>
                <div class="table-responsive">
                    <table class="table table-hover border">
                        <thead class="bg-dark text-white text-center">
                            <tr>
                                <th>Vehicle Type</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Color</th>
                                <th>Registration Number</th>
                                <th>Availability Status</th>
                                <th>Location</th>
                                <th>Price Per Day</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            include '../../components/connection.php';
                            $Record = mysqli_query($conn, "SELECT * FROM `vehicles`");

                            while ($row = mysqli_fetch_array($Record)) {
                                echo "
                                <tr>
                                    <td>{$row['Vehicle_Type']}</td>
                                    <td>{$row['Brand']}</td>
                                    <td>{$row['Model']}</td>
                                    <td>{$row['Color']}</td>
                                    <td>{$row['RegistrationNumber']}</td>
                                    <td>{$row['AvailabilityStatus']}</td>
                                    <td>{$row['Location']}</td>
                                    <td>{$row['PricePerDay']}</td>
                                    <td>{$row['Description']}</td>
                                    <td><img src='{$row['Image']}' height='90px' width='200px'></td>
                                    <td><a href='update.php?id={$row['ID']}' class='btn btn-warning'>Update</a></td>
                                    <td><a href='delete.php?id={$row['ID']}' class='btn btn-danger'>Delete</a></td>
                                </tr>
                                ";
                            }

                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
