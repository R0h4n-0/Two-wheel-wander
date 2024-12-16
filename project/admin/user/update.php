<?php
include '../../components/session.php'
?>

<?php
include '../../components/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $phoneNumber = $_POST['PhoneNumber'];

    $updateQuery = "
        UPDATE user 
        SET Username='$username', Password='$password', Email='$email', Address='$address', PhoneNumber='$phoneNumber'
        WHERE id=$id
    ";

    if (mysqli_query($conn, $updateQuery)) {
        echo "User updated successfully.";
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: user/pages/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="my-5 text-center">Update User</h2>
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $user['Username']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Password" name="Password" value="<?php echo $user['Password']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $user['Email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" value="<?php echo $user['Address']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="PhoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="<?php echo $user['PhoneNumber']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
