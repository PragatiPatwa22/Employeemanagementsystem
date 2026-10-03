<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$sql = "SELECT COUNT(*) AS total FROM employees";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$total_employees = $row['total'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Employee Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Employee Management System</h1>

<h2>Dashboard</h2>

<p>Welcome, <?php echo $_SESSION['username']; ?></p>

<table>
    <tr>
        <th>Total Employees</th>
    </tr>

    <tr>
        <td><?php echo $total_employees; ?></td>
    </tr>
</table>

<p>
    <a href="employees.php">View Employees</a>
</p>

<p>
    <a href="add_employee.php">Add Employee</a>
</p>

<p>
    <a href="logout.php">Logout</a>
</p>

</body>
</html>