<?php

if(isset($_POST["submit"])){



$filename=$_FILES["picture"]["name"];
$tmpLocation = $_FILES['picture']['tmp_name'];

$upload = "files/";

 if(!empty($filename)){
    move_uploaded_file($tmpLocation, $upload.$filename);
 }else{
    echo "Select a file";
 }
}
echo $filename;
echo "</br>";
echo $tmpLocation;

?>