<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$id = $_GET['id'];

$sql = "DELETE FROM employees WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: employees.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

?>