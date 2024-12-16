<?php
include '../../components/session.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
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
        <div class="col-md-12">
            <table class="table table-hover border my-5">
                <thead class="bg-dark text-white text-center">
                    <tr class="table-primary">
                        <th class="table-primary">ID</th>
                        <th class="table-secondary">Username</th>
                        <th class="table-success">Password</th>
                        <th class="table-danger">Email</th>
                        <th class="table-warning">Address</th>
                        <th class="table-info">Phone Number</th>
                        <th class="table-dark">Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    include '../../components/connection.php';
                    $query = "SELECT * FROM `user`";
                    $Record = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($Record)) {
                        echo "
                        <tr>
                            <td class='table-primary'>{$row['id']}</td>
                            <td class='table-secondary'>{$row['Username']}</td>
                            <td class='table-success'>{$row['Password']}</td>
                            <td class='table-danger'>{$row['Email']}</td>
                            <td class='table-warning'>{$row['Address']}</td>
                            <td class='table-info'>{$row['PhoneNumber']}</td>
                            <td class='table-dark'><a href='update.php?id={$row['id']}' class='btn btn-light'>Update</a></td>
                            <td><a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>
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
</body>
</html>
