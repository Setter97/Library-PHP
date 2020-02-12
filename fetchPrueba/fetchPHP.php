<?php

$nom=$_POST['ID'];
if($nom==7){
    echo json_encode("error");
}
else{echo json_encode($nom);}

?>