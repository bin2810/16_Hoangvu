<?php
    $hostname = "localhost";
    $name = "root";
    $pass = "";

    $conn = new mysqli($hostname,$name,$pass);

    if($conn -> connect_error){
        die("lỗi kết nối ". $conn -> connect_error);
    }echo("kết nối thành công");

    $sql = 'CREATE DATABASE IF NOT EXISTS dbtrangsuc_obj';

    if($conn -> query($sql) === true){
        echo "Tạo thành công : dbtrangsuc_obj";
    }else{
        echo"lỗi";
    }

    $conn -> close();

?>