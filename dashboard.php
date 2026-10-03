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

$department_sql = "SELECT department, COUNT(*) AS total
                   FROM employees
                   WHERE department IS NOT NULL
                   AND department != ''
                   GROUP BY department";

$department_result = mysqli_query($conn, $department_sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Employee Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="employees.php">Employees</a>
    <a href="add_employee.php">Add Employee</a>
    <a href="logout.php">Logout</a>
</div>

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

<h2>Employees by Department</h2>

<table>

    <tr>
        <th>Department</th>
        <th>Total Employees</th>
    </tr>

    <?php while ($department = mysqli_fetch_assoc($department_result)) { ?>

    <tr>
        <td><?php echo $department['department']; ?></td>
        <td><?php echo $department['total']; ?></td>
    </tr>

    <?php } ?>

</table>

</body>
</html>