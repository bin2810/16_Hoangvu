<?php
    $drive = "mysql:host=localhost; dbname=db_trangsuc";
    $username = "root";
    $pass = "";

    

    try {
        $conn = new PDO($drive,$username,$pass);
        $conn -> setAttribute(PDO::ATTR_ERRMODE,value: PDO::ERRMODE_EXCEPTION);
        // echo"ket noi thanh cong";
    } catch (PDOException $e) {
        echo"loi ket noi".$e -> getMessage();
    }

    
?>