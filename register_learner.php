<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['learner_name'];
    $surname = $_POST['learner_surname'];
    $cell_no = $_POST['learner_cell_no'];
    $grade = $_POST['grade'];
    $bus_route = $_POST['bus_route'];

    $sql = "INSERT INTO learner_tbl (name, surname, cell_no, grade, bus_route, parent_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $parent_id = $_SESSION['parent_name']; // Assuming parent ID is the username

    $stmt->bind_param("sssssi", $name, $surname, $cell_no, $grade, $bus_route, $parent_id);

    if ($stmt->execute()) {
        echo "Learner registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
