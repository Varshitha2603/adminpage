 <?php
require_once "function.php";
session_start();
if (isset($_SESSION["id"])){
    header("Location: index.php");
}

$login = new Login();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $usernameemail = htmlspecialchars(trim($_POST['usernameemail']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (!empty($usernameemail) && !empty($password)) {
        $result = $login->login($usernameemail, $password);

        if ($result == 1) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $login->idUser();
            header("Location: admin.php");
            exit();
        } else {
            header("Location: index.php");
        }
            if ($result == 10) {
            echo "<script>alert('Wrong password');</script>";
        } elseif ($result == 100) {
            echo "<script>alert('User not registered');</script>";
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
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" autocomplete="off">
        <label>Username or Email: </label>
        <input type="text" name="usernameemail" required value=""><br>

        <label>Password: </label>
        <input type="password" name="password" required><br>

        <button type="submit" name="submit">Login</button>
    </form>
    <br><br>
    <a href="registration.php">Registration</a>
</body>
</html>