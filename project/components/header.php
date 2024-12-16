<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>
<?php 
    session_start();
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                
                Tw O-O <i class="fa fa-motorcycle" aria-hidden="true"></i>- Wheel-Wander
                </a>
                <div class="mx-5 navbar-brand text-center">
                <?php 
                        echo "Hello ";
                        if(isset($_SESSION['name'])){
                            echo "{$_SESSION['name']}";
                        }
                        ?>
                </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/index.php">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/aboutUs.php">About Us</a>
                    </li>
                    <?php if(isset($_SESSION['name'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/userInfo.php">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                            See My Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/myinfo.php">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            My Account</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <?php 
                        if(isset($_SESSION['name'])){
                            echo "<a class='nav-link' href='../form/logout.php'>
                            <i class='fa fa-sign-in' aria-hidden='true'></i> Log Out</a>";
                        } else {
                            echo "<a class='nav-link' href='../form/login.php'>
                            <i class='fa fa-sign-out' aria-hidden='true'></i> Log In</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
                    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
