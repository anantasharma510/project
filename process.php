<?php
session_start();
$db_username="#100";
$db_password="bca@2024";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_username=$_POST["username"];
    $user_password=$_POST["password"];
    if($user_username==$db_username && $user_password==$db_password){
        $_SESSION["username"]=$user_username;
        header("location:admin.php");
        }
    else{
        echo "Invalid username or password";
    }

    
}
?> 