<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $leaner_name = $_POST['name'];
    $leaner_surname = $_POST['surname'];
    $leaner_cell_no = $_POST['cell_no'];
    $leaner_grade = $_POST['grade'];
    $leaner_grade = 'registered';

    $sql = "INSERT INTO learner_tbl (name, surname, cell_no, grade, status)  VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $surname, $cell_no, $grade, $status);
    
    if ($stmt->execute()) {
        echo "Learner registered successfully!";
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
    <title>Register Learner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<h2 class="text-center">Register Learner On The Bus System</h2>

</div>
    
</body>
</html>