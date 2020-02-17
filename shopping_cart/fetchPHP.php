<?php
    include '../DB_Connect.php';
    include '../general_functions.php';
    $id=$_POST['id'];
    $price=$_POST['price'];
    $cantidadMax=10;
    
    $sql="SELECT price,copyBook from books where book_id='$id'";
    $result=mysqli_query($conn,$sql);
    $data=mysqli_fetch_assoc($result);

    $respuesta=[$data['price'],$data['copyBook']];

    if($data['price']!=$price){
        echo json_encode($respuesta);
        //appendLocalStorage($id);
    }else{
        echo json_encode($respuesta);
    }
    

?>