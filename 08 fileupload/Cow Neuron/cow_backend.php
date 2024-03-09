<?php

$filename=$_POST["submit"];

if(isset($filename)){
$name=$_FILES["cow_image"]["name"];
$tmpLoc=$_FILES["cow_image"]["tmp_name"];
$upload_location="src/";
if(!empty($name)){
    move_uploaded_file($tmpLoc,$upload_location.$name);
}else{
    echo "Please Select a File !";
}

}


?>