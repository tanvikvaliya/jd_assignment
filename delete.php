<?php
require_once "connection.php";
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST["user_id"]) && !empty(trim($_POST["user_id"]))){
        $id = trim($_POST["user_id"]);
        $sql = "DELETE FROM user_master WHERE id = $id";
                if(mysqli_query($link, $sql)){
                    header("location: index.php");    
        }
    }
    else{
        echo "Error:". $sql . "<br>". $link->error;
    } 
    $link->close(); 
?>