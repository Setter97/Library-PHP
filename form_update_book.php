<?php
    include 'DB_Connect.php';

    if(isset($_POST['isset_update'])&& $_COOKIE['idCliente']<2){
        echo"<!DOCTYPE html>
        <html>";
        include 'head.php';
        echo"<body>";
        include 'header.php';
        echo"<form action='db_update_book.php' method='post'>
                
                <input type='number' name='bookID' value='$_POST[bookID]' id='bookID' hidden>
                <br>
                <label for='title'>Titulo:</label>
                <input type='text' name='book_title' value='$_POST[book_title]' id='cosa'>
                <br>
                <label for='isbn'>ISBN:</label>
                <input type='text' name='isbn' value='$_POST[isbn]' id='isbn'>
                <br>
                <label for='aithor'>Author:</label>
                <input type='text' name='author' value='$_POST[author]' id='author'>
                <br>
                <label for='editorial'>Editorial:</label>
                <input type='text' name='editorial' value='$_POST[editorial]' id='editorial'>
                <br>
                <label for='category'>Category:</label>
                <input type='text' name='category' value='$_POST[category]' id='category'>
                <br>
                <label for='languajes'>Languaje:</label>
                <input type='text' name='languajes' value='$_POST[languajes]' id='languajes' >
                <br>
                <label for='copyBook'>Copy book:</label>
                <input type='number' name='copyBook' value='$_POST[copyBook]' id='copyBook' >
                <br>
                <label for='location'>Location:</label>
                <input type='number' name='location' value='$_POST[location]' id='location' >
                <br>
                <label for='avaliable'>Avaliable:</label>
                <input type='number' name='avaliable' value='$_POST[avaliable]' id='avaliable' >
                <br>
                <label for='price'>Price:</label>
                <input type='number' name='price' value='$_POST[price]' id='price' step='0.01' >
                <br>
                <button type='submit' name='isset_update_to_flama'>Update</button>
            </form>";
            echo '<br>';
            include 'footer.php';
            echo'</body>';
            echo '</html>';
    }
?>