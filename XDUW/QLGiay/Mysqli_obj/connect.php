<?php
    $host = "localhost";
    $dbname = "dbgiay";
    $username = "root";
    $password = "";

    // Tạo kết nối với cơ sở dữ liệu MySQL
    $conn = new mysqli($host, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

?>
