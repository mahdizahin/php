 <?php

$nm = $_POST["username"];
$classname = $_POST["classname"];

if($classname=="1"){
    header('location:page1.php');
}elseif($classname=="2"){
    header('location:page2.php');
}elseif($classname=="3"){
    header('location:page3.php');
}elseif($classname=="4"){
    header('location:page4.php');
}elseif($classname=="5"){
    header('location:page5.php');
}else{
    echo "what you wanna see";
}

?>