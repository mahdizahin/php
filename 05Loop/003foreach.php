<?php

$user=array(
    'shakib'=> array('club'=>"Rangpur Riders",'age'=>"36",'country'=>"Bangladesh",'character'=>"arrogance"),
    'messi'=> array('club'=>"Inter Miami",'age'=>"36",'country'=>"Argentina",'character'=>"Loyal")
);

foreach($user as $x => $y){
    echo "Subarray's Name : {$x} <br>";
    foreach($y as $innerArraySubstance){
        echo "{$innerArraySubstance} <br>";
    }
}
 

?>