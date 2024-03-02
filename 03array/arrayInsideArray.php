<?php

$user=array(
            'shakib'=> array('club'=>"Rangpur Riders",'age'=>"36",'country'=>"Bangladesh",'character'=>"arrogance"),
            'ronaldo'=> array('club'=>"Al nasr",'age'=>"39",'country'=>"Portugal",'character'=>"arrogance")
);

echo $user['ronaldo']['club'];
echo $user['ronaldo']['age'];

foreach ($user['shakib'] as $key => $value) {
    echo "$key: $value\n";
}

?>