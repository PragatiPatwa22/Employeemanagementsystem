<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$error = "";
$success = "";

if (isset($_POST['change_password'])) {

    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $username = $_SESSION['username'];

    $stmt = mysqli_prepare($conn, "SELECT password FROM admin WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        $error = "Admin account not found.";
    } elseif (!password_verify($current_password, $row['password'])) {
        $error = "Current password is incorrect.";
    } elseif (strlen($new_password) < 4) {
        $error = "New password must contain at least 4 characters.";
    } elseif ($new_password != $confirm_password) {
        $error = "New passwords do not match.";
    } else {

        $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

        $update = mysqli_prepare($conn, "UPDATE admin SET password = ? WHERE username = ?");
        mysqli_stmt_bind_param($update, "ss", $new_password_hash, $username);

        if (mysqli_stmt_execute($update)) {
            $success = "Password changed successfully.";
        } else {
            $error = "Error changing password.";
        }

        mysqli_stmt_close($update);
    }

    mysqli_stmt_close($stmt);
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

    <label>Current Password:</label>
    <input type="password" name="current_password" required>

    <label>New Password:</label>
    <input type="password" name="new_password" required>

    <label>Confirm New Password:</label>
    <input type="password" name="confirm_password" required>

    <input type="submit" name="change_password" value="Change Password">

</form>

</body>
</html>