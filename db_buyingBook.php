<?php
    include 'DB_Connect.php';
    include 'general_functions.php';

    if(isset($_POST['isset_buy'])){
        //resetCookieCart();
        $iD=mysqli_real_escape_string($conn,$_POST['bookID']);
        appendLocalStorage($iD);
    }
?>