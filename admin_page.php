<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center text-center" style="min-height: 100vh;">
            <div class="col-md-8">
                <h1 class="mb-4">Admin Dashboard</h1>
                <div class="row g-4">
                    <!-- Register Learners -->
                    <div class="col-md-6">
                        <div class="card shadow-lg text-center">
                            <div class="card-body">
                                <i class="fas fa-user-plus fa-3x mb-3"></i>
                                <h4 class="card-title">Register Learners</h4>
                                <p class="card-text">Add learners to the Online Bus Registration System.</p>
                                <a href="register_learner.php" class="btn btn-primary">
                                    <i class="fas fa-arrow-right"></i> Go to Registration
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Apply for Bus Transport -->
                    <div class="col-md-6">
                        <div class="card shadow-lg text-center">
                            <div class="card-body">
                                <i class="fas fa-bus-alt fa-3x mb-3"></i>
                                <h4 class="card-title">Apply for Bus Transport</h4>
                                <p class="card-text">Apply for 2025 bus transport on behalf of learners.</p>
                                <a href="apply_bus.php" class="btn btn-primary">
                                    <i class="fas fa-arrow-right"></i> Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Move Learners from Waiting List -->
                    <div class="col-md-6">
                        <div class="card shadow-lg text-center">
                            <div class="card-body">
                                <i class="fas fa-exchange-alt fa-3x mb-3"></i>
                                <h4 class="card-title">Manage Waiting List</h4>
                                <p class="card-text">Move learners from the waiting list to the system if space becomes available.</p>
                                <a href="manage_waiting_list.php" class="btn btn-primary">
                                    <i class="fas fa-arrow-right"></i> Manage List
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Logout -->
                    <div class="col-md-6">
                        <div class="card shadow-lg text-center">
                            <div class="card-body">
                                <i class="fas fa-sign-out-alt fa-3x mb-3"></i>
                                <h4 class="card-title">Logout</h4>
                                <p class="card-text">End your current session.</p>
                                <a href="logout.php" class="btn btn-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional, if you need Bootstrap's JavaScript functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
