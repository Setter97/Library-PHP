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

            $sql="SELECT date_end,real_end from reservations where book_id='$_POST[book_id]' and `reservations`.`member_dni`='$_POST[dni]' and reservations.date_at='$_POST[date]'";
            $result=mysqli_query($conn,$sql);
            $data=mysqli_fetch_assoc($result);
            $dia1= substr($data['real_end'],0,10);
            $dia2=substr($data['date_end'],0,10);

            echo "<br>";
            echo $dia1;
            echo "<br>";
            echo $dia2;
            echo "<br>";

            $datetime1 = new DateTime($dia1);
            $datetime2 = new DateTime($dia2);
            $interval = $datetime1->diff($datetime2);
            $diff=$interval->format('%R%a días');
            //echo $diff;
            echo penalizacion($_POST['dni']);
            echo "<br>";
            if($diff>=0){
                echo "mu bien";
            }else{
                
                echo "mu mal";
            };
        
            //header('Location: html_borrowsList.php');
        }else{
            echo"Error";
        }
    }
?>