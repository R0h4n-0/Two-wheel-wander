<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="bg-white shadow p-4 border border-info">
                    <h2 class="text-warning text-center mb-4">User Login</h2>
                    <form action="loginControl.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Email or Username:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Email or Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                            <p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
                            <br>
                            <p><a href="../../admin/form/login.php">Login as an admin</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
