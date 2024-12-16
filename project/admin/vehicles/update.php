<?php
include '../../components/session.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vehicle Details</title>
</head>
<body>

    <?php
    $id = $_GET['id'];
    include ('../../components/connection.php');
    $Record = mysqli_query($conn, "SELECT * FROM `vehicles` WHERE ID = $id");
    $row = mysqli_fetch_array($Record);
    ?>    

    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-primary mt-3">
                <form action="update_action.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                    <div class="mb-3">
                        <p class="text-center fw-bold fs-3 text-warning">Update Vehicle Details:</p>
                        <label class="form-label">Vehicle Type</label>
                        <select class="form-select" name="Vehicle_Type">
                            <option value="Bike" <?php if ($row['Vehicle_Type'] == 'Bike') echo 'selected'; ?>>Bike</option>
                            <option value="Scooter" <?php if ($row['Vehicle_Type'] == 'Scooter') echo 'selected'; ?>>Scooter</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" name="Brand" class="form-control" value="<?php echo $row['Brand']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Model</label>
                        <input type="text" name="Model" class="form-control" value="<?php echo $row['Model']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="text" name="Color" class="form-control" value="<?php echo $row['Color']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Registration Number</label>
                        <input type="text" name="Registration_Number" class="form-control" value="<?php echo $row['RegistrationNumber']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Availability Status</label>
                        <select class="form-select" name="AvailabilityStatus">
                            <option value="1" <?php if ($row['AvailabilityStatus'] == 1) echo 'selected'; ?>>Available</option>
                            <option value="0" <?php if ($row['AvailabilityStatus'] == 0) echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="Location" class="form-control" value="<?php echo $row['Location']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price Per Day</label>
                        <input type="text" name="PricePerDay" class="form-control" value="<?php echo $row['PricePerDay']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="Description" class="form-control" value="<?php echo $row['Description']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="Image" class="form-control">
                    </div>

                    <button class="bg-danger fs-4 fw-bold my-3 text-white form-control" name="Submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
