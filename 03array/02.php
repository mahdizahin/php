<?php

$user=  [    
        'user1'=>['phoneNumber'=>22,'userEmail'=>'Mosco','balance'=>'5000'],
        'user2'=>['phoneNumber'=>22,'userEmail'=>'Barca','balance'=>'9000'],
        'user1'=>['phoneNumber'=>22,'userEmail'=>'Madrid','balance'=>'15000'],
        ];

echo $user['user2']['userEmail'];

?>