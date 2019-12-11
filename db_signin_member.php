<?php
include 'DB_Connect.php';
// Always start this first
if(isset($_POST['submitLogin'])){
   $mail=mysqli_real_escape_string($conn,$_POST['inputEmail']);
   $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
  
   $contrasenya=mysqli_query($conn,"select pwd from members WHERE e_mail='$mail'");
   $data=mysqli_fetch_assoc($contrasenya);
   echo $data['pwd'];
   if(password_verify($pwd,$data['pwd'])){

         $result=mysqli_query($conn,"select member_dni,type_user from members WHERE e_mail='$mail'");
         $data=mysqli_fetch_assoc($result);

         setcookie('idUsuario',$data['member_dni'],time()+86400);
         setcookie('idCliente',$data['type_user'],time()+86400);
         header('Location: index.php');
   }else{
      echo 'Error en el login';
   }
}

?>