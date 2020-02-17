<?php
    include '../DB_Connect.php';
    include '../general_functions.php';

    $sql="INSERT INTO cart (cart_id,member_dni, total) VALUES (NULL, '$_COOKIE[idUsuario]','$_POST[result]')";
    $result=mysqli_query($conn,$sql);
    
    $idSQL=mysqli_query($conn,"SELECT LAST_INSERT_ID() as id;");
    $id=$idSQL->fetch_assoc();

    $COSA=json_decode($_COOKIE['cart']);

    for($i=0;$i<sizeof($COSA);$i++){
        //echo $COSA[$i]->title." QTY: ".$_POST["qty$i"]." ". ."<br>";
        $idBook=$_POST["id$i"];
        $qty=$_POST["qty$i"];
        $price=$_POST["price$i"];
        $priceQty=$_POST["precioQty$i"];
        //echo $idBook.'<br>';
        //echo $qty." ".$price." ".$priceQty.'<br>';
        $sql="INSERT INTO `cart_product` (`cart_product`, `member_dni`, `book_id`, `quantity`, `price`, `priceQty`) VALUES ('$id[id]', '$_COOKIE[idUsuario]', '$idBook', '$qty', '$price', '$priceQty')";
        $result=mysqli_query($conn,$sql);

        if($result){
            echo 'Correcto';
        }else{
            //echo 'error<br>'.mysqli_error($conn).'<br>';
        }
    }
    resetLocalStorage();
?>