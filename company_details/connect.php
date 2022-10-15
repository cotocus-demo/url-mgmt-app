<?php
    $con = new mysqli('localhost', 'root', '', 'vijayji');

    if(!$con){
        die(mysqli_error($con));
    }
    

?>