<?php
include 'DB_Connect.php';
    if(isset($_POST['isset_borrow'])){
        $bookID=mysqli_real_escape_string($conn,$_POST['borrow']);
    }
    $result=mysqli_query($conn,"select count(*) as total from reservations WHERE member_dni='$_COOKIE[idUsuario]' and book_id='$bookID' and real_end IS NULL;");
    $data=mysqli_fetch_assoc($result);
    if($data['total']!=0){
        echo "Ya has reservado este libro";
    }else{
        if(mysqli_query($conn,"select copyBook from books where book_id='$bookID';")!=0){
            $sqlUpdate="update books set copybook=copybook-1 where book_id='$bookID'";
            if(!mysqli_query($conn,$sqlUpdate)){
                echo"Error:"+mysqli_error($conn);
            };
            $sql="INSERT INTO `reservations` (`book_id`, `member_dni`, `date_at`, `date_end`, `real_end`) VALUES ('$bookID', '$_COOKIE[idUsuario]', CURRENT_TIMESTAMP, DATE(DATE_ADD(now(),INTERVAL 1 MONTH)), null)";
            if(!mysqli_query($conn,$sql)){
                echo"Error:"+mysqli_error($conn);
            };
        }
        $result=mysqli_query($conn,"select copyBook from books where book_id='$bookID';");
        $data=mysqli_fetch_assoc($result);
        if($data['copyBook']==0){
            mysqli_query($conn,"update books set avaliable='0' where book_id='$bookID'");
        }
        header('Location: index.php');
    }
    
    $conn->close();
?>