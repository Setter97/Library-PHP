<?php
    function buscadorLibros($name){
        include 'DB_Connect.php';
        $name=$_GET['name'];
        $sql="SELECT books.* from books inner join author on books.author_id=author.author_id where name like'%$name%' or title like '%$name%'";
        $sql2 = "SELECT * FROM books where title like '%$name%' ";
       
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $nombreAutor=mysqli_query($conn,"select name from author where author_id='$row[author_id]'");
                $nombre=$nombreAutor->fetch_assoc();
                if($row['avaliable']==1){
                    
                    $avaliable="true";
                    
                    echo"<div style='padding:1rem'>";
                    
                    echo "Title: " . $row["title"]. " <br> ISBN: " . $row["ISBN"]. " <br> Author: " .$nombre['name']." <br> Editorial: " . $row["editorial"]." <br> Category: " . $row["category"]." <br> Languaje: " . $row["languajes"]." <br> Book date: " . $row["addBookdate"]." <br> Location: " . $row["location"]." <br> Avaliable: " .$avaliable."<br>";
                    
                    if($_COOKIE['idCliente']==0){
                        echo "<form action='db_delete_book.php' method='post'>
                        <input type='number' name='delete' value='$row[book_id]' id='delete' hidden>
                        <button type='submit' class='btn btn-outline-danger my-2 my-sm-1' name='isset_delete'>Delete</button>
                        </form>";

                        echo "<form action='form_update_book.php' method='post'>
                        <input type='number' name='bookID' value='$row[book_id]' id='bookID' hidden>
                        <input type='text' name='book_title' value='$row[title]' id='book_title' hidden>
                        <input type='text' name='isbn' value='$row[ISBN]' id='isbn' hidden>
                        <input type='text' name='author' value='$row[author_id]' id='author' hidden>
                        <input type='text' name='editorial' value='$row[editorial]' id='editorial' hidden>
                        <input type='text' name='category' value='$row[category]' id='category' hidden>
                        <input type='text' name='languajes' value='$row[languajes]' id='languajes' hidden>
                        <input type='number' name='copyBook' value='$row[copyBook]' id='copyBook' hidden>
                        <input type='number' name='location' value='$row[location]' id='location' hidden>
                        <input type='number' name='avaliable' value='$row[avaliable]' id='avaliable' hidden>
        
                        <button class='btn btn-outline-info my-2 my-sm-1' type='submit' name='isset_update'>Update</button>
                    </form>";
                    }
                    

                    
                    if($_COOKIE['idCliente']==0 || $_COOKIE['idCliente']==1){
                        echo "<form action='db_borrow_book.php' method='post'>
                        <input type='number' name='borrow' value='$row[book_id]' id='borrow' hidden>
                        <button class='btn btn-outline-success my-2 my-sm-1' type='submit' name='isset_borrow'>Borrow</button>
                        </form>";
                    }
                    

                    echo "</div>";
                    
                }else{
                    $avaliable="false";
                    echo"<div style='padding:1rem'>";
                    echo "Title: " . $row["title"]. " <br> ISBN: " . $row["ISBN"]. " <br> Author: " . $nombre['name']." <br> Editorial: " . $row["editorial"]." <br> Category: " . $row["category"]." <br> Languaje: " . $row["languajes"]." <br> Book date: " . $row["addBookdate"]." <br> Location: " . $row["location"]." <br> Avaliable: " .$avaliable."<br>";
                    if($_COOKIE['idCliente']==0){
                        echo "<form action='form_update_book.php' method='post'>
                        <input type='number' name='bookID' value='$row[book_id]' id='bookID' hidden>
                        <input type='text' name='book_title' value='$row[title]' id='book_title' hidden>
                        <input type='text' name='isbn' value='$row[ISBN]' id='isbn' hidden>
                        <input type='text' name='author' value='$row[author_id]' id='author' hidden>
                        <input type='text' name='editorial' value='$row[editorial]' id='editorial' hidden>
                        <input type='text' name='category' value='$row[category]' id='category' hidden>
                        <input type='text' name='languajes' value='$row[languajes]' id='languajes' hidden>
                        <input type='number' name='copyBook' value='$row[copyBook]' id='copyBook' hidden>
                        <input type='number' name='location' value='$row[location]' id='location' hidden>
                        <input type='number' name='avaliable' value='$row[avaliable]' id='avaliable' hidden>
        
                        <button class='btn btn-outline-info my-2 my-sm-1' type='submit' name='isset_update'>Update</button>
                    </form>";
                    }
                    
                    echo"</div>";
                }
                
            echo "<br>";
            echo "<br>";
                
            }
        } else {
            echo "0 results";
        }
    }//buscadorLibros

    function selectReservas(){
        include 'DB_Connect.php';
        $sql="SELECT * from reservations where member_dni='$_COOKIE[idUsuario]'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
  
            while($row = $result->fetch_assoc()) {
                if($row['real_end']==""){
                    echo"<form method=post action='db_turnBack.php' style='padding-left:1rem;'>";
                    echo"<input name='book_id' value='$row[book_id]' hidden>";
                    echo"<input name='dni' value='$row[member_dni]' hidden>";
                    echo"<input name='date' value='$row[date_at]' hidden>";
                    echo "Book_ID: " . $row["book_id"]. 
                    " DNI: " . $row["member_dni"]. 
                    " Date at:</b> " . $row["date_at"].
                    " Date end: " .$row["date_end"].
                    "&emsp;<button class='btn btn-outline-info my-2 my-sm-1' type='sumbit' name='devolverLibroButton'>Devolver libro</button>";
                    echo "</form>";
                    echo "<br>";
                }else{
                    echo"";
                }
               
            } 
        } else {
            echo "0 results";
        }
    }//selectReservas

    function historyBorrow(){
        include 'DB_Connect.php';
        $sql="SELECT * from reservations where member_dni='$_COOKIE[idUsuario]'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
  
            while($row = $result->fetch_assoc()) {
                if($row['real_end']!=""){
                    echo"<form method=post action='db_turnBack.php' style='padding-left:1rem;'>";
                    echo"<input name='book_id' value='$row[book_id]' hidden>";
                    echo"<input name='dni' value='$row[member_dni]' hidden>";
                    echo "Book_ID: " . $row["book_id"]. 
                    " DNI: " . $row["member_dni"]. 
                    " Date at:</b> " . $row["date_at"].
                    " Date end: " .$row["date_end"].
                    " Real end: ".$row["real_end"];
                    echo "</form>";
                    echo "<br>";
                }else{
                    echo"";
                }
               
            } 
        } else {
            echo "0 results";
        }
    }//selectReservas
?>