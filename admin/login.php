<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username=="admin" && $password=="asd123!"){
        $_SESSION['auth'] = true;
        header("location: plant-list.php");
    }else{
        header("location: index.php");
    }
?>