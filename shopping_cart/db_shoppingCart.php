<?php
    include 'DB_Connect.php';
    
    $COSA=json_decode($_COOKIE['cart']);
    echo $COSA[0]['title'];
?>