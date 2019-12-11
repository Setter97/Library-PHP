<!DOCTYPE html>
<html>
    <?php
        include 'head.php';
        echo '<body>';
        include 'header.php';
        //include 'DB_Connect.php';
        include 'general_functions.php';
        buscadorLibros($name);
        include 'footer.php';
        echo '</body>';
    ?>
</html>