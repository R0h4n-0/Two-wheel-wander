<?php
include '../../components/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card border-primary p-4">
                <h2 class="text-center fw-bold fs-3 text-warning mb-4">Add Vehicle</h2>

                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="Vehicle_Type" class="form-label">Vehicle Type</label>
                        <select id="Vehicle_Type" class="form-select" name="Vehicle_Type" required>
                            <option value="Bike">Bike</option>
                            <option value="Scooter">Scooter</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Brand" class="form-label">Brand</label>
                        <input type="text" id="Brand" name="Brand" class="form-control" placeholder="Enter Brand" required>
                    </div>

                    <div class="mb-3">
                        <label for="Model" class="form-label">Model</label>
                        <input type="text" id="Model" name="Model" class="form-control" placeholder="Enter Model" required>
                    </div>

                    <div class="mb-3">
                        <label for="Color" class="form-label">Color</label>
                        <input type="text" id="Color" name="Color" class="form-control" placeholder="Enter Color" required>
                    </div>

                    <div class="mb-3">
                        <label for="RegistrationNumber" class="form-label">Registration Number</label>
                        <input type="text" id="RegistrationNumber" name="RegistrationNumber" class="form-control" placeholder="Enter Registration Number" required>
                    </div>

                    <div class="mb-3">
                        <label for="AvailabilityStatus" class="form-label">Availability Status</label>
                        <select id="AvailabilityStatus" class="form-select" name="AvailabilityStatus" required>
                            <option value="1">Available</option>
                            <option value="0">Unavailable</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Location" class="form-label">Location</label>
                        <input type="text" id="Location" name="Location" class="form-control" placeholder="Error? Leave it blank. Enter Location">
                    </div>

                    <div class="mb-3">
                        <label for="PricePerDay" class="form-label">Price Per Day</label>
                        <input type="text" id="PricePerDay" name="PricePerDay" class="form-control" placeholder="Error? Leave it blank. Enter Price Per Day">
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" id="Description" name="Description" class="form-control" placeholder="Error? Leave it blank. Enter Description">
                    </div>

                    <div class="mb-3">
                        <label for="Image" class="form-label">Image</label>
                        <input type="file" id="Image" name="Image" class="form-control" placeholder="Upload Image" required>
                    </div>

                    <button class="btn btn-danger fs-4 fw-bold my-3 text-white w-100" name="Submit">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-6 text-center">
            <a href="readvehicles.php" class="btn btn-secondary">See All Vehicles</a>
        </div>
    </div>
</div>

</body>
</html>
