<?php
    include "DB_Connect.php";
    
    if(isset($_POST['submitMember'])){

        $hash=password_hash($_POST['pwd'],PASSWORD_DEFAULT);

        if($_COOKIE['idCliente']==2){
           
            $sql="INSERT INTO `members` (`member_dni`, `name`, `lastname1`, `lastname2`, `e_mail`, `pwd`, `phone`, `country`, `adress`, `postal`, `city`, `type_user`) 
            VALUES ('$_POST[dni]', '$_POST[name]', '$_POST[lastname1]', '$_POST[lastname2]', '$_POST[email]', '$hash', '$_POST[phone]', '$_POST[country]', '$_POST[adress]', '$_POST[inputZip]', '$_POST[city]', '1')";
            
        }else if($_COOKIE['idCliente']==0){
            $sql="INSERT INTO `members` (`member_dni`, `name`, `lastname1`, `lastname2`, `e_mail`, `pwd`, `phone`, `country`, `adress`, `postal`, `city`, `type_user`) 
            VALUES ('$_POST[dni]', '$_POST[name]', '$_POST[lastname1]', '$_POST[lastname2]', '$_POST[email]', '$hash', '$_POST[phone]', '$_POST[country]', '$_POST[adress]', '$_POST[inputZip]', '$_POST[city]', '$_POST[userType]')";
        }else{
           echo "Error en la operacion";
        }

        $result=mysqli_query($conn,$sql);
        
        if($result){
            if($_COOKIE['idCliente']!=0){
                setcookie('idCliente',1,time()+86400);
                setcookie('idUsuario',$data['dni'],time()+86400);
                header('Location: index.php');
            }
            header('Location: index.php');
        }else{
            echo 'error<br>'.mysqli_error($conn);
        } 
    }
?>