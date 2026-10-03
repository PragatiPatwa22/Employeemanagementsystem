<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM employees
        WHERE id LIKE '%$search%'
        OR name LIKE '%$search%'
        OR email LIKE '%$search%'
        OR phone LIKE '%$search%'
        OR department LIKE '%$search%'";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="employees.php">Employees</a>
    <a href="add_employee.php">Add Employee</a>
    <a href="change_password.php">Change Password</a>
    <a href="logout.php">Logout</a>
</div>

<h1>Employee Management System</h1>

<p>Welcome, <?php echo $_SESSION['username']; ?></p>

<form method="GET">

    <input type="text" name="search" placeholder="Search employee..." value="<?php echo $search; ?>">

    <input type="submit" value="Search">

</form>

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