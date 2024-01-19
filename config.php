<?php
    $host = "127.0.0.1";
    $DB = "community";
    $user = "root";
    $pass = "";


    $conn = mysqli_connect($host, $user, $pass, $DB);

    if(!$conn){
        echo "Connection error";
    }
?>