<?php
    $con = new mysqli('localhost', 'root', 'eigmXD6HbxVwc3r3', 'vijayji');
    // $query="Select str.*,sr.name from news_details str, company sr where str.id=sr.name";
    // $con = new mysqli('localhost', 'root', '', 'vijayji');


    if(!$con){
        die(mysqli_error($con));
    }
?>

