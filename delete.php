<?php

include "function.php";
if (isset($_GET['deleteid'])){
    $sql = "DELETE FROM crud WHERE id=$id";
    $result = mysqli_query($this->conn,$sql);
    if ($result){
//            echo "Deleted successfully";
        header("Location: display.php");
    }
    else{
        die(mysqli_error($this->conn));
    }
}