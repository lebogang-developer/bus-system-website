<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'parent') {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    </div>

    <!-- Bootstrap JS (Optional, if you need Bootstrap's JavaScript functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>