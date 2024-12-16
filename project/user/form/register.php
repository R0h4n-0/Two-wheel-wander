<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto mt-5 m-auto bg-white shadow border-info">
                <p class="text-warning text-center fs-3 fw-bold my-3">User Register</p>
                <form action="userRegister.php", method="POST">
                    <div class="mb-3">
                        <label for="">Username: </label>
                        <input type="text" placeholder="Enter your username" class = "form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Email: </label>
                        <input type="text" placeholder="Enter Email" class = "form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Password: </label>
                        <input type="password" placeholder="" class = "form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Address: </label>
                        <input type="text" placeholder="Enter your address" class = "form-control" name="Address" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Phone Number: </label>
                        <input type="text" placeholder="Enter your phone number" class = "form-control" name="PhoneNumber" required>
                    </div>
                    <div class="mb-3">
                    <a href="login.php"><button class="w-100 bg-primary fs-4 text-warning" name="submit">Register</button></a>
                        <a href="login.php">Already Have An Account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    #<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>