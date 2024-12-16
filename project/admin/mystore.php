<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Add your custom styles here -->
</head>
<body>
    <?php include '../components/session.php'; ?> <!-- Ensure this includes session management -->

    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid text-white">
            <a href="#" class="navbar-brand text-white"><h1>Bike Rent</h1></a>
            <span>
                <i class="fas fa-user-shield"></i>
                Hello, admin<!-- Replace 'admin' with session name -->
                <a href="../form/logout.php" class="text-decoration-none text-white ms-3">Logout</a> <!-- Adjust the logout link -->
                <a href="" class="text-decoration-none text-white ms-3">Dashboard</a> <!-- Adjust the user panel link -->
            </span>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Dashboard</h2>
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <div class="bg-blue text-center p-3">
                    <a href="./vehicles/Vehicles.php" class="text-black text-decoration-none me-3">Add Vehicle</a>
                    <a href="user/read.php" class="text-black text-decoration-none me-3">Users </a>
                    <a href="booking/read.php" class="text-black text-decoration-none me-3">Bookings </a>
                    <a href="vehicles/readvehicles.php" class="text-black text-decoration-none me-3">Look at my vehicles</a>
                </div>
            </div>
        </div>
        <!-- Add more sections and content for your dashboard -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
