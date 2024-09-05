<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
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
    <title>Admin Page</title>
</head>

<body>
    <div class="container mt-3">
        <h1>Welcome, Admin!</h1>
        <p class="lead">This is the admin page.</p>
        <h2>Admin Dashboard</h2>
        <div class="list-group">
            <a href="register_learner_admin.php" 
            class="list-group-item list-group-item-action">Register Learners on the Online Bus Registration System.</a>

            <a href="apply_bus_transport_2025.php" 
            class="list-group-item list-group-item-action">Apply for Bus Transport for 2025 on behalf of the Learner.</a>

            <a href="manage_waiting_list.php" 
            class="list-group-item list-group-item-action">Move Learners from Waiting List to the Online Bus Registration 
            System.</a>

            <a href="#" class="list-group-item list-group-item-action">Make MIS reports for the School management.</a>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>