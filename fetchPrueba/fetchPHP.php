<?php
    include '../DB_Connect.php';

    $id=$_POST['id'];
    $price=$_POST['price'];
    $cantidadMax=10;
    


    $sql="SELECT price,copyBook from books where book_id='$id'";
    $result=mysqli_query($conn,$sql);
    $data=mysqli_fetch_assoc($result);

    $respuesta=[$data['price'],$data['copyBook']];
    echo json_encode($respuesta);

?>