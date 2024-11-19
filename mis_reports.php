<?php
// Connect to the database
include 'config.php';

// Variables
$reportType = '';
$result = null;

// Check form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reportType = $_POST['report_type'];

    // Execute query based on the type of report selected
    if ($reportType === 'daily_waiting_list') {
        // Query for learners on the waiting list
        $query = "SELECT * FROM waiting_list_tbl";
    } elseif ($reportType == 'daily_bus_usage') {
        $query = "SELECT * FROM learner_tbl, bus_tbl, routes_tbl WHERE bus_time = CURDATE() AND route_name IS NOT NULL";
    } elseif ($reportType == 'weekly_bus_usage') {
        // Query for total learners using bus transport for the week
        $query = "SELECT bus_id COUNT(*) as total_learners FROM learner_tbl WHERE WEEK(bus_time) = WEEK(CURDATE()) GROUP BY bus_id";

        // Prepare and execute the query
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <title>Admin MIS Reports</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<div class="container mt-5">


    <div class="text-center">
        <h2 class="mb-4"><i class="bi bi-clipboard-data"></i> MIS Reports Dashboard</h2>
    </div>

    <!-- Form to select report type -->
    <form method="post" class="mb-4">
        <div class="form-group">
            <label for="reportType" class="mb-3"><i class="bi bi-journal-check"></i> Select Report:</label>
            <select class="form-select" name="report_type" id="reportType" required>
                <option value="" disabled selected>Select a report</option>
                <option value="waiting_list"><i class="bi bi-person-fill-exclamation"></i> Learners on Waiting List</option>
                <option value="daily_bus_usage"><i class="bi bi-bus-front-fill"></i> Learners Using Bus Today</option>
                <option value="weekly_bus_usage"><i class="bi bi-calendar-week"></i> Learners Using Bus This Week</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-search"></i> Generate Report</button>
    </form>

    <!-- Display results -->
    <?php if ($result && $result->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-success">
                    <tr>
                        <th scope="col"><i class="bi bi-card-list"></i> ID</th>
                        <th scope="col"><i class="bi bi-person-fill"></i> Name</th>
                        <th scope="col"><i class="bi bi-person-badge-fill"></i> Surname</th>
                        <th scope="col"><i class="bi bi-mortarboard-fill"></i>Grade</th>
                        <!-- <th scope="col"><i class="bi bi-signpost-2-fill"></i>Bus Route</th> -->
                        <th scope="col"><i class="bi bi-clock-fill"></i> Time (Morning/Afternoon)</th>
                        <th scope="col"><i class="bi bi-calendar-event-fill"></i> Date/Week</th>
                        <!-- <th scope="col"><i class="bi bi"></i>Status</th> -->
                        <th scope="col"><i class="bi bi"></i>Bus Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['learner_id']; ?></td>
                            <td><?php echo $row['learner_name']; ?></td>
                            <td><?php echo $row['learner_surname']; ?></td>
                            <td><?php echo $row['learner_grade']; ?></td>
                            <!-- <td><?php echo $row['route_name']; ?></td> -->
                            <!-- <td><?php echo $row['status']; ?></td> -->
                            <td><?php echo $row['bus_time']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php elseif ($result): ?>
            <p class="alert alert-warning">No records found for this report.</p>
        <?php endif; ?>
        </div>
</div>
</div>

<body>


    <!-- Bootstrap JS (Optional, if you need Bootstrap's JavaScript functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>