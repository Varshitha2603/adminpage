<?php
    require_once "function.php";
    $select = new Select();
    if (isset($_SESSION["id"])){
        $user = $select->selectUserById($_SESSION["id"]);
    }
    else{
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
    <h2>Welcome <?= $user["name"]; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>