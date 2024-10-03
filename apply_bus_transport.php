<?php
session_start();
require 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $learner_id = $_POST['learner_id'];
    $bus_route = $_POST['bus_route'];

    // Update tge leaner's bus route for 2025
    $sql = "UPDATE learner_tbl SET bus_route = ?, status = 'registered' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $bus_route, $learner_id);

    if ($stmt->execute()) {
        echo "Bus Transport for 2025 applied successfully!";
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
    <title>Apply for Bus Transport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">
    Apply for Bus Transport 2025
    </h2>
    <form action="apply_bus_transport.php" method="post">
        <div class="mb-3">
        <label for="learner_id" class="form-label">Learner ID</label>
        <input type="text" class="form-control" id="learner_id" name="learner_id" required>
        </div>
        <div class="mb-3">
                <label for="bus_route" class="form-label">Bus Route</label>
                <select class="form-select" id="bus_route" name="bus_route" required>
                    <!-- Similar options as in parent_page.php -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Apply</button>
    </form>
</div>
    
</body>
</html>