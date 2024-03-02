<?php

$user=array(
    'shakib'=> array('club'=>"Rangpur Riders",'age'=>"36",'country'=>"Bangladesh",'character'=>"arrogance"),
    'messi'=> array('club'=>"Inter Miami",'age'=>"36",'country'=>"Argentina",'character'=>"Loyal")
);

foreach($user as $SubArrayName => $innerArray){
    echo"{$SubArrayName} <br>";
    foreach($innerArray as $innerArraySubstance){
        echo "{$innerArraySubstance} <hr>";
    }
}
?>