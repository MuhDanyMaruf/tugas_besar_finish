<?php
    $server = 'localhost';
    $user = "root";
    $pass = "";
    $database = "Data_pinjeminaja";
    $conn = mysqli_connect($server, $user, $pass, $database);
    if(!$conn){
        die("<script> alert('Connection failed')</script>");
    }
?>