<?php
session_start();
if (!isset($_SESSION['parent_name']) || $_SESSION['role'] != 'parent') {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous" />
    <title>Parent Page</title>
</head>

<body>
<div class="container mt-5">
        <div class="row justify-content-center align-items-center"  style="min-height: 100vh;">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Learner Bus Registration</h2>
                        <form action="register_learner.php" method="POST">
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
                                <label for="cell_no" class="form-label">
                                    <i class="fas fa-phone"></i> Cell Number
                                </label>
                                <input type="tel" class="form-control" id="cell_no" name="cell_no" placeholder="Enter cell number" required>
                            </div>
                            <!-- Grade -->
                            <div class="mb-3">
                                <label for="grade" class="form-label">
                                    <i class="fas fa-graduation-cap"></i> Grade
                                </label>
                                <select class="form-select" id="grade" name="grade" required>
                                    <option selected disabled>Select Grade</option>
                                    <option value="8">Grade 8</option>
                                    <option value="9">Grade 9</option>
                                    <option value="10">Grade 10</option>
                                    <option value="11">Grade 11</option>
                                    <option value="12">Grade 12</option>
                                </select>
                            </div>
                            <!-- Bus Route -->
                            <div class="mb-3">
                                <label for="bus_route" class="form-label">
                                    <i class="fas fa-bus"></i> Select Bus & Route
                                </label>
                                <select class="form-select" id="bus_route" name="bus_route" required>
                                    <option selected disabled>Select Bus Route</option>
                                    <option value="bus_1">Bus 1 - Route A</option>
                                    <option value="bus_2">Bus 2 - Route B</option>
                                    <option value="bus_3">Bus 3 - Route C</option>
                                </select>
                            </div>
                            <!-- Pick-Up Time -->
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-clock"></i> Pick-Up Time
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pickup_time" id="morning" value="morning" required>
                                    <label class="form-check-label" for="morning">
                                        Morning Pick-Up
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pickup_time" id="afternoon" value="afternoon" required>
                                    <label class="form-check-label" for="afternoon">
                                        Afternoon Pick-Up
                                    </label>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-paper-plane"></i> Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional, if you need Bootstrap's JavaScript functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>