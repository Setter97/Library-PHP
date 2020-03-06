<?php
    include '../DB_Connect.php';
    include '../general_functions.php';
    
    //echo json_encode("hola que tal");
    $sql="INSERT INTO cart (cart_id,member_dni, total) VALUES (NULL, '$_COOKIE[idUsuario]','$_POST[result]')";
    $result=mysqli_query($conn,$sql);

    $idSQL=mysqli_query($conn,"SELECT LAST_INSERT_ID() as id;");
    $id=$idSQL->fetch_assoc();
    $cosa=$id['id'];
    

    $superArray=json_decode($_POST['array']);

   for($i=0;$i<sizeof($superArray);$i++){
       $idBook=$superArray[$i]->id;
       $quantity=$superArray[$i]->quantity;
       $price=$superArray[$i]->price;
       
        $sql2="INSERT INTO cart_product (cart_product, member_dni, book_id, quantity, price) VALUES ('$cosa', '$_COOKIE[idUsuario]', '$idBook', '$quantity', '$price')";
        $result2=mysqli_query($conn,$sql2);
   }
    echo json_encode($result2."hola?");
    
?>