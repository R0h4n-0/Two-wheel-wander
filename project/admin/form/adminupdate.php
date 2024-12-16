<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include '../../components/connection.php';

    $admin_name = $_POST['username'];
    $admin_password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$admin_name' AND password = '$admin_password'");

    session_start();

    if(mysqli_num_rows($result)){
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin_name;
        echo "
        <script>
        window.location.href='../mystore.php'
        </script>
        ";
    }
    else {
        echo "
        <script>
        alert('Invalid Username or Password');
        window.location.href= 'login.php';
        </script>
        "; 
    };

    ?>
</body>
</html>