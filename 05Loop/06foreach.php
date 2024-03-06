<?php

$food = array(
    "fastfood"=> array("Burger","Sandw","Peti","SingaRa"),
    "heavenfood"=> array("milk"),
    "lovefood"=>array("kacchi Biriyani","Pegion Curry","Sorshe Ilish")   

);

foreach($food as $fooditem => $foodnames){
foreach($foodnames as $foodname){
    echo"$foodname <br> ";
}

}

?>