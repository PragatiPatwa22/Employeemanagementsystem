<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$error = "";
$success = "";

if (isset($_POST['change'])) {

    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($old_password != "1234") {
        $error = "Old password is incorrect.";
    } elseif (strlen($new_password) < 4) {
        $error = "New password must contain at least 4 characters.";
    } elseif ($new_password != $confirm_password) {
        $error = "New passwords do not match.";
    } else {

        $success = "Password changed successfully.";

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
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

<h1>Change Password</h1>

<?php

if ($error != "") {
    echo "<p>$error</p>";
}

if ($success != "") {
    echo "<p>$success</p>";
}

?>

<form method="POST">

    <label>Old Password:</label>
    <input type="password" name="old_password" required>

    <label>New Password:</label>
    <input type="password" name="new_password" required>

    <label>Confirm New Password:</label>
    <input type="password" name="confirm_password" required>

    <input type="submit" name="change" value="Change Password">

</form>

</body>
</html>