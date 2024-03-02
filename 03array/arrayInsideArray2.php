<?php

$user=array(
    'shakib'=> array('club'=>"Rangpur Riders",'age'=>"36",'country'=>"Bangladesh",'character'=>"arrogance"),
    'ronaldo'=> array('club'=>"Al nasr",'age'=>"39",'country'=>"Portugal",'character'=>"arrogance")
);

foreach ($user['ronaldo'] as $key => $value){
    echo "$key: $value\n";
}

?>