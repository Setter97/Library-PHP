<?php
include 'DB_Connect.php';
 
    if(isset($_POST['isset_delete'])){
        $cosa=mysqli_real_escape_string($conn,$_POST['delete']);
    }
    
    $sql="UPDATE books SET avaliable=0 and copyBook=0 WHERE book_id=$cosa";
    
    $result=mysqli_query($conn,$sql);
 
    if($result){
        echo "delete realizado<br>";
    }else{
        echo 'error<br>'.mysqli_error($conn);
    }

$conn->close();
?>