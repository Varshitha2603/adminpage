<?php
require_once "function.php";
if (isset($_SESSION["id"])){
    header("Location: index.php");
}

$register = new Register();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = htmlspecialchars(trim($_POST["name"]));
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $confirmpassword = htmlspecialchars(trim($_POST["confirmpassword"]));

    if (!empty($name) && !empty($username) && !empty($email) && !empty($password) && !empty($confirmpassword)) {
        $result = $register->registration($name, $username, $email, $password, $confirmpassword);

        if ($result == 1) {
            echo "<script>alert('Registration successfully');</script>";
            header("Location: login.php");
        } elseif ($result == 10) {
            echo "<script>alert('Email has already been taken');</script>";
        } elseif ($result == 100) {
            echo "<script>alert('Passwords do not match');</script>";
        } else {
            echo "<script>alert('An unknown error occurred');</script>";
        }
    } else {
        echo "<script>alert('All fields are required');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <form method="post" action="" autocomplete="off">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" id="confirmpassword" name="confirmpassword" required><br>

        <input type="submit" name="submit" value="Register">
    </form>
    <br><br>
    <a href="login.php">Login</a>
</body>
</html>
