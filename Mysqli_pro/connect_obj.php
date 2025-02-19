<?php
    $hostname = "localhost";
    $database = "db_trangsuc";
    $name = "root";
    $pass = "";

    $conn = mysqli_connect($hostname,$name,$pass,$database);

    if($conn -> connect_error){
        die("lỗi kết nối ". $conn -> connect_error);
    }echo("kết nối thành công");

    mysqli_close($conn);

?>