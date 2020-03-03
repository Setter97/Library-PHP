<?php
    include '../DB_Connect.php';
    include '../general_functions.php';
    /*
    if($_POST['flag']==0){
        $sql="INSERT INTO cart (cart_id,member_dni, total) VALUES (NULL, '$_COOKIE[idUsuario]','$_POST[result]')";
        $result=mysqli_query($conn,$sql);
    }
    */
    echo json_encode("Hola?");
    
    /*
    $idSQL=mysqli_query($conn,"SELECT MAX (cart_id) as id from cart ORDER BY cart_id where '$_COOKIE[idUsuario]';");
    $id=$idSQL->fetch_assoc();
*/

/*
    $selectBookInfo  = "SELECT max(cart_id) as id from cart  where member_dni=? ORDER BY cart_id" ;
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $selectBookInfo)) {
        mysqli_stmt_bind_param($stmt, "s", $_COOKIE['idUsuario']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $cosa=$row['id'];
            //echo json_encode( $row['id']);
        }else{
            echo json_encode("nop");
        }
    }else{
        echo json_encode("No ha entrado en el if ");
    }

*/
 
        //$SUPERID=intval($cosa);
/*
        $idBook=$_POST["id"];
        $qty=$_POST["qty"];
        $price=$_POST["price"];
        //$priceQty=$_POST["priceQty"];
        

        $sql="INSERT INTO `cart_product` (`cart_product`, `member_dni`, `book_id`, `quantity`, `price`, `priceQty`) VALUES ('$SUPERID', '$_COOKIE[idUsuario]', '$idBook', '$qty', '$price', '0')";
        $result=mysqli_query($conn,$sql);

        if($result){
            echo json_encode('Correcto');
            
        }else{
            echo json_encode('Error'.mysqli_error($conn)." $SUPERID");
        }
*/
?>
