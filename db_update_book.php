<?php
include 'DB_Connect.php';

    if(isset($_POST['isset_update_to_flama'])){

        $titulo=mysqli_real_escape_string($conn,$_POST['book_title']);
        $isbn=mysqli_real_escape_string($conn,$_POST['isbn']);
        $editorial=mysqli_real_escape_string($conn,$_POST['editorial']);
        $category=mysqli_real_escape_string($conn,$_POST['category']);
        $languaje=mysqli_real_escape_string($conn,$_POST['languajes']);
        $copybook=mysqli_real_escape_string($conn,$_POST['copyBook']);
        $avaliable=mysqli_real_escape_string($conn,$_POST['avaliable']);
        $iD=mysqli_real_escape_string($conn,$_POST['bookID']);
        $location=mysqli_real_escape_string($conn,$_POST['location']);
        $price=mysqli_real_escape_string($conn,$_POST['price']);

        $result=mysqli_query($conn,"select count(*) as total from books WHERE location=$location");
        $data=mysqli_fetch_assoc($result);

        $result2=mysqli_query($conn,"select count(*) as total from books WHERE location=$location and book_id='$iD'");
        $data2=mysqli_fetch_assoc($result2);

        if($data2['total']==1){

            $sql="UPDATE `books` SET `title` = '$titulo', `ISBN` = '$isbn',  `editorial` = '$editorial', `category` = '$category', `languajes` = '$languaje', `location` = $location, `copyBook` = '$copybook', `avaliable` = '$avaliable',`price` = '$price' WHERE `book_id` = $iD";
       
            if(!mysqli_query($conn,$sql)){
                echo "Error: "+mysqli_error($conn);
            };
            header('Location: index.php');
        }else{
            if($data['total']!=0){
                echo'Localizacion no disponible';

            }else{
    
                $sql="UPDATE `books` SET `title` = '$titulo', `ISBN` = '$isbn',  `editorial` = '$editorial', `category` = '$category', `languajes` = '$languaje', `location` = $location, `copyBook` = '$copybook', `price` = '$price' WHERE `book_id` = $iD";
            
                if(!mysqli_query($conn,$sql)){
                    echo "Error: "+mysqli_error($conn);
                };
                header('Location: index.php');
            }
        }  
    }
    $conn->close();
?>