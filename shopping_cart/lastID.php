<?php
    include '../DB_Connect.php';
    include '../general_functions.php';

    $resultado=$_POST['result'];
    $sql="INSERT INTO cart (cart_id,member_dni, total) VALUES (NULL, '$_COOKIE[idUsuario]','$resultado')";
    $result=mysqli_query($conn,$sql);
    $idSQL=mysqli_query($conn,"SELECT LAST_INSERT_ID() as id;");
    $id=$idSQL->fetch_assoc();
    $cosa=$id['id'];
    
    echo json_encode($cosa);
    
    
