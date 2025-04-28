<?php
    $drive = "mysql:host=localhost; dbname=dbgiay";
    $username = "root";
    $pass = "";

    try {
        $conn = new PDO($drive,$username,$pass);
        $conn -> setAttribute(PDO::ATTR_ERRMODE,value: PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo"loi ket noi".$e -> getMessage();
    }

    
?>