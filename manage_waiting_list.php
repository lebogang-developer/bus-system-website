<?php

include 'config.php'; // Ensure connection is established

// Bus capacities
$bus_capacities = [
    "Bus 1" => 35,
    "Bus 2" => 8,
    "Bus 3" => 15,
];

// Bus selected for the learner
$selected_bus = "Bus 2";
$learner_id = $_POST['learner_id'];

// Check current bus occupancy
$query = "SELECT COUNT(*) AS total FROM learner_tbl WHERE bus_name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $selected_bus);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$current_occupancy = $row['total'];

// Check if the bus is full
if ($current_occupancy < $bus_capacities[$selected_bus]) {
    // Assign the learner to the bus
    $assign_query = "UPDATE learner_tbl SET bus_name = ?, status = 'assigned' WHERE learner_id = ?";
    $assign_stmt = $conn->prepare($assign_query);
    $assign_stmt->bind_param("si", $selected_bus, $learner_id);
    if ($assign_stmt->execute()) {
        echo "<p?>Learner successfully assigned to $selected_bus.</p>";
    } else {
        echo "Error assigning learner: " . $conn->error;
    }
} else {
    // Move the learner to the waiting list
    $waiting_query = "UPDATE learner_tbl SET status = 'waiting' WHERE learner_id = ?";
    $waiting_stmt = $conn->prepare($waiting_query);
    $waiting_stmt->bind_param("i", $learner_id);
    if ($waiting_stmt->execute()) {
        echo "<p>Bus $selected_bus is full. Learner has been moved to the waiting list.</p>";
    } else {
        echo "Error updating waiting list: " . $conn->error;
    }
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
                <input type="hidden"  name="learner_id"  value="<?php echo $learner_id; ?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Assign to Bus</button>
            </div>
        </form>
    </div>
</body>

</html>