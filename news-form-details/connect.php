<?php
    $con = new mysqli('localhost', 'root', '', 'vijayji');
    $query="Select str.*,sr.name from news_details str, company sr where str.id=sr.name";

    if(!$con){
        die(mysqli_error($con));
    }
?>

