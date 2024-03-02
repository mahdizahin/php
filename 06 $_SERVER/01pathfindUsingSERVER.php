<?php

echo $_SERVER['SCRIPT_NAME']; //this is the way to find the location of a file 

//watch server location
$host_location = $_SERVER['HTTP_HOST'];
echo "<br>{$host_location}";
?>