<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$sql = "SELECT * FROM employees";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Employee Management System</h1>

<p>Welcome, <?php echo $_SESSION['username']; ?></p>

<p>
    <a href="add_employee.php">Add Employee</a> |
    <a href="logout.php">Logout</a>
</p>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Salary</th>
        <th>Joining Date</th>
        <th>Address</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['date_of_birth']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['designation']; ?></td>
        <td><?php echo $row['salary']; ?></td>
        <td><?php echo $row['joining_date']; ?></td>
        <td><?php echo $row['address']; ?></td>

        <td>
            <a href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit</a>
            |
            <a href="delete_employee.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>