<?php
include ("../../components/connection.php");
session_start();

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['Address'];
    $phone = $_POST['PhoneNumber'];

    
    $Dupli_email = mysqli_query($conn, "SELECT * FROM `user` WHERE Email = '$email'");
    $Dupli_name = mysqli_query($conn, "SELECT * FROM `user` WHERE Username = '$name'");

    if(mysqli_num_rows($Dupli_email)){
        echo "
        <script>
        alert('Email has already been registered');
        window.location.href = '../form/register.php';
        </script>
        ";
    } elseif(mysqli_num_rows($Dupli_name)) {
        echo "
        <script>
        alert('Username already exists');
        window.location.href = '../form/register.php';
        </script>
        ";
    } else {
        $query = "INSERT INTO `user`(`Username`,`Password`,`Email`,`Address`,`PhoneNumber`)
                  VALUES ('$name','$password','$email','$address','$phone')";
        
        if(mysqli_query($conn, $query)) {
            $_SESSION['register_success'] = "Account created successfully. Please login.";
            header("Location: ../form/login.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}
?>
