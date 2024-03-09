<?php

$submit= $_POST["submit"];

if(isset($submit)){

    $a=$_FILES["name_of_file"]["what_you_want to know"];

    //for upload
    $store_path="path/";

    if(!empty($a)){
        move_uploaded_file($temporay_location, $store_path.$a);
    }else{
        echo "PLEASE UPLOAD FILE SIR!";
    }





}


?>