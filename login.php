<!DOCTYPE html>
<html>
<head>
    <title>Employee Management System</title>
</head>
<body>

<h2>Employee Management System</h2>

<form method="POST" action="login.php">

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">

</form>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "1234") {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<p>Invalid username or password</p>";
    }
}
?>

</body>
</html>