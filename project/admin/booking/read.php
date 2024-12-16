<?php
include '../../components/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> 
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
                <h1 class="text-center my-5">Booking List</h1>
                <div class="table-responsive">
                    <table class="table table-hover border">
                        <thead class="bg-dark text-white text-center">
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Vehicle ID</th>
                                <th>Vehicle Brand</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Cost</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            include '../../components/connection.php';
                            $query = "
                                SELECT booking.ID, booking.User_ID, user.Username, booking.Vehicle_ID, vehicles.Brand, booking.StartDate, booking.EndDate, booking.Total_cost
                                FROM booking
                                JOIN user ON booking.User_ID = user.ID
                                JOIN vehicles ON booking.Vehicle_ID = vehicles.ID
                            ";
                            $Record = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($Record)) {
                                echo "
                                <tr>
                                    <td>{$row['ID']}</td>
                                    <td>{$row['User_ID']}</td>
                                    <td>{$row['Username']}</td>
                                    <td>{$row['Vehicle_ID']}</td>
                                    <td>{$row['Brand']}</td>
                                    <td>{$row['StartDate']}</td>
                                    <td>{$row['EndDate']}</td>
                                    <td>{$row['Total_cost']}</td>
                                    <td>
                                        <a href='delete.php?id={$row['ID']}' class='btn btn-danger'>Delete</a>
                                    </td>
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
