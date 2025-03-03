<?php
    $hostname = "localhost";
    $name = "root";
    $pass = "";

    $conn = mysqli_connect($hostname,$name,$pass);

    if($conn -> connect_error){
        die("lỗi kết nối ". $conn -> connect_error);
    }echo("kết nối thành công");

    $sql = 'CREATE DATABASE IF NOT EXISTS dbtrangsuc_pro';

    if(mysqli_query($conn,$sql)){
        echo "Tạo thành công : dbtrangsuc_pro";
    }else{
        echo"lỗi";
    }

    mysqli_close($conn);

?>