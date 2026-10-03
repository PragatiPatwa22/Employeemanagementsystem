<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$id = $_GET['id'];
$error = "";

$sql = "SELECT * FROM employees WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Employee not found");
}

if (isset($_POST['update'])) {

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

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $error = "Phone number must contain exactly 10 digits.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif ($salary != "" && $salary < 0) {
        $error = "Salary cannot be negative.";
    } else {

        $sql = "UPDATE employees SET
            name='$name',
            email='$email',
            phone='$phone',
            gender='$gender',
            date_of_birth='$date_of_birth',
            department='$department',
            designation='$designation',
            salary='$salary',
            joining_date='$joining_date',
            address='$address'
            WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            header("Location: employees.php");
            exit();
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
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

<h1>Edit Employee</h1>

<?php

if ($error != "") {
    echo "<p>$error</p>";
}

?>

<form method="POST">

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" maxlength="10" required>

    <label>Gender:</label>
    <select name="gender">
        <option value="">Select Gender</option>
        <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
    </select>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>">

    <label>Department:</label>
    <input type="text" name="department" value="<?php echo $row['department']; ?>">

    <label>Designation:</label>
    <input type="text" name="designation" value="<?php echo $row['designation']; ?>">

    <label>Salary:</label>
    <input type="number" name="salary" value="<?php echo $row['salary']; ?>" min="0">

    <label>Joining Date:</label>
    <input type="date" name="joining_date" value="<?php echo $row['joining_date']; ?>">

    <label>Address:</label>
    <textarea name="address"><?php echo $row['address']; ?></textarea>

    <input type="submit" name="update" value="Update Employee">

</form>

</body>
</html>