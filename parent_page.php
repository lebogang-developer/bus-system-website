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
    <title>Parent Page</title>
</head>
<body>
    <h1>Welcome, Parent!</h1>
    <p>This is the parent page.</p>
</body>
</html>
