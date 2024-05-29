<?php

include "function.php";
$sql = "SELECT * FROM tb_user WHERE id = '$id'";
$result = mysqli_query($this->conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "UPDATE crud SET id=$id, name='$name', username='$username', email='$email', password='$password' WHERE id=$id";
    $result = mysqli_query($this->conn, $sql);
    if ($result){
//            echo "Updated successfully";
        header('Location: admin.php');
    }
    else{
        die(mysqli_error($this->conn));
    }
}
?>
<html>
<body>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label>Enter your Name</label>
            <input type="text" class="form-control" placeholder="Enter your Name" name="name" autocomplete="off" value=<?php echo $name;?> >
        </div>
        <div class="form-group">
            <label>Enter your Mobile Number</label>
            <input type="text" class="form-control" placeholder="Enter your Username" name="username" autocomplete="off" <?php echo $username; ?> >
        </div>
        <div class="form-group">
            <label>Enter your Email</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value=<?php echo $email; ?> >
        </div>
        <div class="form-group">
            <label>Enter your Password</label>
            <input type="password" class="form-control" placeholder="Enter your Password" name="password" autocomplete="off" <?php echo $password;   ?> >
        </div>
        <button type="submit" class="btn" name="submit">Update</button>
    </form>
</div>
</body>
</html>
