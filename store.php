<?php
    require_once "connection.php";
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    
    if(isset($_POST["user_id"]) && !empty(trim($_POST["user_id"]))){
        $id = trim($_POST["user_id"]);
        $sql = "UPDATE user_master SET name='$name',
                address='$address',
                email='$email',
                mobile='$mobile',
                city='$city', 
                country='$country' WHERE id = $id";
    }else{
        $sql = "INSERT INTO user_master(name, address,email,mobile,city, country) 
                VALUES ('$name','$address','$email',$mobile,'$city','$country')";
    }
    if(mysqli_query($link, $sql)){
        header("location: index.php");
    }else{
        echo "Something went wrong! please check the code";
    } 
    $link->close(); 
?>