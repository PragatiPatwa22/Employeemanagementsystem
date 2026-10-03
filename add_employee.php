<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    $joining_date = $_POST['joining_date'];
    $address = $_POST['address'];

    $sql = "INSERT INTO employees
    (id, name, email, phone, gender, date_of_birth, department, designation, salary, joining_date, address)
    VALUES
    ('$id', '$name', '$email', '$phone', '$gender', '$date_of_birth', '$department', '$designation', '$salary', '$joining_date', '$address')";

    if (mysqli_query($conn, $sql)) {
        header("Location: employees.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Add Employee</h1>

<form method="POST">

    <label>ID:</label>
    <input type="number" name="id" required>

    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Phone:</label>
    <input type="text" name="phone" required>

    <label>Gender:</label>
    <select name="gender">
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth">

    <label>Department:</label>
    <input type="text" name="department">

    <label>Designation:</label>
    <input type="text" name="designation">

    <label>Salary:</label>
    <input type="number" name="salary">

    <label>Joining Date:</label>
    <input type="date" name="joining_date">

    <label>Address:</label>
    <textarea name="address"></textarea>

    <input type="submit" name="submit" value="Add Employee">

</form>

<p>
    <a href="employees.php">Back to Employee List</a>
</p>

</body>
</html>