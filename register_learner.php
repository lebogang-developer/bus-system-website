<?php
session_start();
require 'config.php';

// Parent to register the learner into the bus system
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $learner_name = $_POST['learner_name'];
    $learner_surname = $_POST['learner_surname'];
    $learner_cell_no = $_POST['cell_no'];
    $learner_grade = $_POST['grade'];

    $sql = "INSERT INTO learner_tbl (learner_name, learner_surname, learner_cell_no, learner_grade) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssss", $learner_name, $learner_surname, $learner_cell_no, $learner_grade);

    if ($stmt->execute()) {
        echo "<h3 class='text-center mt-5'>Learner registered successfully!</h3>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-8">
                <h3 class="text-center mb-4">Apply for Bus Transport 2025</h3>
                <form action="apply_transport_2025.php" method="POST">
                    <!-- Learner's Info -->
                    <div class="mb-3">
                        <label for="learner_name" class="form-label">Learner's Name</label>
                        <input type="text" name="learner_name" id="learner_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="learner_grade" class="form-label">Grade</label>
                        <select name="learner_grade" id="learner_grade" class="form-select" required>
                            <option value="">Select Grade</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                        </select>
                    </div>

                    <!-- Bus Selection -->
                    <div class="mb-3">
                        <label for="bus_id" class="form-label">Select Bus</label>
                        <select name="bus_id" id="bus_id" class="form-select" required>
                            <option value="">Choose a Bus</option>
                            <!-- Populate from Database -->
                            <?php
                            include 'config.php';
                            $result = $conn->query("SELECT id, bus_name FROM bus");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['bus_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Route Selection -->
                    <div class="mb-3">
                        <label for="route_id" class="form-label">Select Route</label>
                        <select name="route_id" id="route_id" class="form-select" required>
                            <option value="">Choose a Route</option>
                            <?php
                            $result = $conn->query("SELECT id, route_name FROM routes");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['route_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Pickup Time -->
                    <div class="mb-3">
                        <label for="pickup_id" class="form-label">Pickup Time</label>
                        <select name="pickup_id" id="pickup_id" class="form-select" required>
                            <option value="">Choose Pickup Time</option>
                            <?php
                            $result = $conn->query("SELECT id, time FROM pickup");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['time'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Dropoff Time -->
                    <div class="mb-3">
                        <label for="dropoff_id" class="form-label">Dropoff Time</label>
                        <select name="dropoff_id" id="dropoff_id" class="form-select" required>
                            <option value="">Choose Dropoff Time</option>
                            <?php
                            $result = $conn->query("SELECT id, time FROM dropoff");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['time'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Apply</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional, if you need Bootstrap's JavaScript functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>