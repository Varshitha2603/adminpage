<!DOCTYPE html>
<html>
<body>
    <h1>Admin Side</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM tb_user";
                    $result = mysqli_query($this->conn, $sql);
                    if ($result){
                            while ($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $this->name = $row['name'];
                                $this->username = $row['username'];
                                $this->email = $row['email'];
                                $this->password = $row['password'];
                                echo '<tr>
                                          <th scope="row">'.$id.'</th>
                                          <td>'.$this->name.'</td>
                                          <td>'.$this->username.'</td>
                                          <td>'.$this->email.'</td>
                                          <td>'.$this->password.'</td>
                                          <td>
                                               <button class="update.php"><a href="update.php">Update</a> </button>
                                               <button class="delete.php"><a href="delete.php">Delete</a></button> 
                                          </td>
                                        </tr>';
                            }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>