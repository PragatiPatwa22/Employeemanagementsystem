<?php

session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "1234") {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Employee Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Employee Management System</h1>

<h2>Admin Login</h2>

<form method="POST">

    <label>Username:</label>
    <input type="text" name="username" required>

    <label>Password:</label>
    <input type="password" name="password" required>

    <input type="submit" name="login" value="Login">

</form>

<?php

if ($error != "") {
    echo "<p>$error</p>";
}

?>

</body>
</html>