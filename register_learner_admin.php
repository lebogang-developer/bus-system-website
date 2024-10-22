<?php
session_start();
require 'config.php';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Admin | Register Learner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Register Leaner On The Bus System</h2>
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
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-paper-plane"></i> Register
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>
    
</body>
</html>