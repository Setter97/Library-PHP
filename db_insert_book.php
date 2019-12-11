<?php
include 'DB_Connect.php';
$title=$_GET['name'];
$isbn=$_GET['isbn'];
$author=$_GET['author'];
$editorial=$_GET['editorial'];
$category=$_GET['category'];
$location=$_GET['location'];
$copybooks=$_GET['copy'];
$languaje=$_GET['languajes'];


$result=mysqli_query($conn,"select count(*) as total from author WHERE name='$author'");
$data=mysqli_fetch_assoc($result);

if($data['total']!=0){
    $authorID=mysqli_fetch_assoc(mysqli_query($conn,"select author_id from author where name='$author'"));
}else{
    $sql="INSERT INTO `author` ( `name`) VALUES ( '$author')";
    mysqli_query($conn,$sql);
    $authorID=mysqli_fetch_assoc(mysqli_query($conn,"select author_id from author where name='$author'"));
}

$result=mysqli_query($conn,"select count(*) as total from books WHERE location=$location");
$data=mysqli_fetch_assoc($result);

if($data['total']!=0){
    echo "Localizacion no disponible<br>";
}else{
    $sql="INSERT INTO `books` ( `title`, `ISBN`, `author_id`, `editorial`, `category`, `languajes`, `addBookdate`, `location`, `copyBook`,`avaliable`) 
    VALUES ('$title', '$isbn', '$authorID[author_id]', '$editorial', '$category', '$languaje', CURRENT_TIMESTAMP, '$location', '$copybooks','1')";

    $result=mysqli_query($conn,$sql);

    if($result){
        echo "Insert realizado<br>";
    }else{
        echo 'error<br>'.mysqli_error($conn);
    }
}


$conn->close();
?>