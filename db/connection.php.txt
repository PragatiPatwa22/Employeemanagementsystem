<?php

$conn = mysqli_connect("localhost", "root", "", "employee_management");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>