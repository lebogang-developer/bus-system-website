<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $learner_name = $_POST['learner_name'];
    $learner_surname = $_POST['learner_surname'];
    $learner_grade = $_POST['learner_grade'];
    $learner_cell_no = $_POST['learner_cell_no'];
    $bus_id = $_POST['bus_id'];
    $route_id = $_POST['route_id'];
    $pickup_id = $_POST['pickup_id'];
    $dropoff_id = $_POST['dropoff_id'];
    $bus_time = $_POST['bus_time'];

    // Check for available seats on the selected bus
    $stmt = $conn->prepare("SELECT COUNT(*) AS seat_count FROM learner_tbl, bus_tbl WHERE bus_id = ?");
    $stmt->bind_param("i", $bus_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Bus capacity
    $seat_limit = 0;
    if ($bus_id == 1) $seat_limit = 35;
    elseif ($bus_id == 2) $seat_limit = 8;
    elseif ($bus_id == 3) $seat_limit = 15;

    if ($row['seat_count'] < $seat_limit) {
        // Register learner on the bus
        $stmt = $conn->prepare("INSERT INTO learner_tbl (learner_name, learner_grade, bus_id, route_id, pickup_id, dropoff_id, bus_time) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siiiiii", $learner_name, $learner_surname, $learner_cell_no, $learner_grade, $bus_id, $route_id, $pickup_id, $dropoff_id, $bus_time);
        $stmt->execute();

        // Send acknowledgment email to the parent
        // email logic here

        echo "<h3 class='text-center'>Application successful. A confirmation email has been sent.</h3>";
    } else {
        // Add leaner to the waiting list
        $stmt = $conn->prepare("INSERT INTO waiting_list_tbl (learner_name, learner_surname, learner_cell_no, learner_grade, bus_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siiii", $learner_name, $learner_surname, $learner_cell_no, $learner_grade, $bus_id);
        $stmt->execute();

        // Send email to the parent informing them of the waiting list status
        // email logic her

        echo "<p class='text-center'>The bus is currently full. Your learner has been added to the waiting list.</p>";
    }
}


// Enable error reporting in PHP for development purposes
ini_set('display_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Apply for Bus Transport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Local use -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Apply for Bus Transport 2025</h2>
                        <form action="apply_bus_transport.php" method="POST">
                            <!-- Learner Name -->
                            <div class="mb-3">
                                <label for="learner_name" class="form-label">
                                    <i class="fas fa-user"></i> Learner's Name
                                </label>
                                <input type="text" class="form-control" id="learner_name" name="learner_name" placeholder="Enter learner's first name" required>
                            </div>
                            <!-- Learner Surname -->
                            <div class="mb-3">
                                <label for="learner_surname" class="form-label">
                                    <i class="fas fa-user"></i> Learner's Surname
                                </label>
                                <input type="text" class="form-control" id="learner_surname" name="learner_surname" placeholder="Enter learner's surname" required>
                            </div>
                            <!-- Cell Number -->
                            <div class="mb-3">
                                <label for="learner_cell_no" class="form-label">
                                    <i class="fas fa-phone"></i> Cell Number
                                </label>
                                <input type="tel" class="form-control" id="cell_no" name="learner_cell_no" placeholder="Enter cell number" required>
                            </div>
                            <!-- Grade -->
                            <div class="mb-3">
                                <label for="grade" class="form-label">
                                    <i class="fas fa-graduation-cap"></i> Grade
                                </label>
                                <select class="form-select" id="grade" name="learner_grade" required>
                                    <option selected disabled>Select Grade</option>
                                    <option value="8">Grade 8</option>
                                    <option value="9">Grade 9</option>
                                    <option value="10">Grade 10</option>
                                    <option value="11">Grade 11</option>
                                    <option value="12">Grade 12</option>
                                </select>
                            </div>

                            <!-- Select Bus -->
                            <div class="mb-3">
                                <label for="bus_id" class="form-label">Select Bus</label>
                                <select name="bus_id" id="bus_id" class="form-select" required>
                                    <option value="">Select Bus</option>
                                    <!-- Populate from database -->
                                    <?php
                                    include 'config.php';
                                    $result = $conn->query("SELECT bus_id, bus_name FROM bus_tbl");
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['bus_id'] . "'>" . $row['bus_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Route Selection -->
                            <div class="mb-3">
                                <label for="route_id" class="form-label">Select Bus Route</label>
                                <select name="route_id" id="route_id" class="form-select" required>
                                    <option value="">Select Route</option>
                                    <?php
                                    $result = $conn->query("SELECT route_id, route_name FROM routes_tbl");
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['route_id'] . "'>" . $row['route_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Pickup Time -->
                            <div class="mb-3">
                                <label for="pickup_id" class="form-label">Pickup Time</label>
                                <select name="pickup_no" id="pickup_no" class="form-select" required>
                                    <option value="">Select Pickup Time</option>
                                    <?php
                                    $result = $conn->query("SELECT pickup_no, time FROM pickup_tbl");
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['time'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Drop-off Time -->
                            <div class="mb-3">
                                <label for="dropoff_id" class="form-label">Dropoff Time</label>
                                <select name="dropoff_no" id="dropoff_no" class="form-select" required>
                                    <option value="">Select Dropoff Time</option>
                                    <?php
                                    $result = $conn->query("SELECT id, time FROM dropoff");
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['time'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"> </i> Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>