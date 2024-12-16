<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-primary mt-3">
                <form action="adminupdate.php" method="POST" class="p-4">
                    <div class="mb-3">
                        <h2 class="text-center fw-bold text-warning mb-4">Admin Login</h2>
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter a secure password" required>
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg fw-bold text-white">Login</button>
                    <br>
                    <a href="../../user/form/login.php" class="text-end">LogIn as a user?</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
