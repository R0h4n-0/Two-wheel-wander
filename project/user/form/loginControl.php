<?php
include ('../../components/connection.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $name = $_POST['name'];

    $name = mysqli_real_escape_string($conn, $name);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM `user` WHERE (Username = '$name' OR Email = '$name') AND Password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $user['Username'];
        $_SESSION['user_id'] = $user['id'];

        echo "
        <script>
        window.location.href = '../pages/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Incorrect email or password');
        window.location.href = 'login.php';
        </script>
        ";
    }

    mysqli_close($conn);
}
?>
