<?php
    $con = new mysqli('localhost', 'stocksmantra_vijay', 'by={(Hb-61sU', 'stocksmantra_dailynews');
    // $query="Select str.*,sr.name from news_details str, company sr where str.id=sr.name";
    // $con = new mysqli('localhost', 'root', '', 'vijayji');


    if(!$con){
        die(mysqli_error($con));
    }
?>

