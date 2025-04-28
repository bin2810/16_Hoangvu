<?php

    $hostname = "localhost";
    $database = "db_plantiquee";
    $name = "root";
    $pass = "";

    $conn = new mysqli($hostname,$name,$pass,$database);

    if($conn -> connect_error){
        die("lỗi kết nối ". $conn -> connect_error);
    };

    // $conn -> close();

?>