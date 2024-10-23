<?php
// Connect to the database
require 'config.php';
session_start();

// Variables
$reportType = '';
$result = null;

// Check form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reportType = $_POST['report_type'];

    // Execute query based on the type of report selected
    if ($reportType == 'waiting_list') {
        $query = "SELECT * FROM learner_tbl WHERE status = 'waiting_list'";
    } elseif ($reportType == 'daily_bus_usage') {
        $query = "SELECT * FROM learner_tbl WHERE bus_date = CURDATE() AND bus_route IS NOT NULL";
    }
    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
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
</head>

<div class="container mt-5">
    <div class="text-center">
        <h2 class="mb-4"><i class="bi bi-clipboard-data"></i> MIS Reports Dashboard</h2>
    </div>

    <!-- Form to select report type -->
    <form method="post" class="mb-4">
        <div class="form-group">
            <label for="reportType"><i class="bi bi-journal-check"></i> Select Report:</label>
            <select class="form-select" name="report_type" id="reportType" required>
                <option value="" disabled selected>Select a report</option>
                <option value="waiting_list"><i class="bi bi-person-fill-exclamation"></i> Learners on Waiting List</option>
                <option value="daily_bus_usage"><i class="bi bi-bus-front-fill"></i> Learners Using Bus Today</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-search"></i> Generate Report</button>
    </form>

    <!-- Display results -->
    <?php if ($result && $result->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Grade</th>
                        <th>Bus Route</th>
                        <th>Status</th>
                        <th>Bus Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['surname']; ?></td>
                            <td><?php echo $row['learner_grade']; ?></td>
                            <td><?php echo $row['bus_route']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['bus_date']; ?></td>
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
</body>

</html>