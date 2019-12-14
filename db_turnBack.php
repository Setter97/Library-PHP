<?php
    if(isset($_POST['devolverLibroButton'])){
        include 'DB_Connect.php';
        include 'general_functions.php';
        $sql="UPDATE `reservations` SET `real_end` = CURRENT_TIMESTAMP WHERE `reservations`.`book_id` = '$_POST[book_id]' and `reservations`.`member_dni`='$_POST[dni]' and reservations.date_at='$_POST[date]'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "Se ha devuelto el libro correctamente";
            $sql="UPDATE `books` SET `copyBook` = copyBook+1 ,avaliable='1' WHERE `books`.`book_id` = '$_POST[book_id]'";
            $result=mysqli_query($conn,$sql);

            possarPenalitzacio($_POST['dni'],$_POST['book_id'],$_POST['date']);
            
            
            //header('Location: html_borrowsList.php');
        }else{
            echo"Error";
        }
    }
?>