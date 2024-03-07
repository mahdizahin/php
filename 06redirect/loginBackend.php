<?php

$username=$_POST['userName'];
$password=$_POST['password'];


if($password=="1234"){
    //echo"YEs";
   header('location: home.php');
}else{
    echo"Incorrerct pass";
   // header('location: login.php');
}

?>