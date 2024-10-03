<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"]) {
    $learner_id = $_POST['learner_id'];

    // Check if space is available
    $sql_check = "SELECT COUNT(*) FROM learner_tbl WHERE status  'registered'";

    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->execute();
    $stmt_check->bind_result($count);
    $stmt_check->fetch();
    $stmt_check->close();

    $bus_capacity = 35; // For bus route 1

    if ($count < $bus_capacity) {
        // Move learner to registered status
        $sql = "UPDATE learner_btl SET status = 'registered' WHERE id ]= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $learner_id);

        if ($stmt->execute()) {
            echo "Learner moved from waiting list!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "No available spots to move the learner from the waiting list.";
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
    <title>Manage Waiting List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Manage Waiting List</h2>
        <form action="manage_waiting_list.php" method="post">
            <div class="mb-3">
                <label for="learner_id" class="form-label">Learner ID</label>
                <input type="text" class="form-control" id="learner_id" name="learner_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Move Learner to Registered</button>
        </form>
    </div>
</body>

</html>