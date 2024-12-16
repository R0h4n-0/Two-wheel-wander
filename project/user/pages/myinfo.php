<?php
// session_start();
include '../../components/connection.php';
include '../../components/header.php';


$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM `user` WHERE `id` = '$user_id'";
$Record = mysqli_query($conn, $query);

if ($Record && mysqli_num_rows($Record) > 0) {
    $user = mysqli_fetch_assoc($Record);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Info</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover border my-5">
                            <thead class="bg-dark text-white text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                                    <td><?php echo htmlspecialchars($user['Username']); ?></td>
                                    <td><?php echo htmlspecialchars($user['Password']); ?></td>
                                    <td><?php echo htmlspecialchars($user['Email']); ?></td>
                                    <td><?php echo htmlspecialchars($user['Address']); ?></td>
                                    <td><?php echo htmlspecialchars($user['PhoneNumber']); ?></td>
                                    <td>
                                        <a href='../personalDetails/update.php?id=<?php echo htmlspecialchars($user['id']); ?>' class='btn btn-primary'>Update</a>
                                    </td>
                                    <td>
                                        <a href='../booking/delete.php?id=<?php echo htmlspecialchars($user['id']); ?>' class='btn btn-danger'>Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
    <?php
} else {
    echo "No user found.";
}

mysqli_close($conn);
?>
