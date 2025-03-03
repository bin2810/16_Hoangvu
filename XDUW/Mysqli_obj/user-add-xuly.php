<?php
    if (isset($_POST['ThemMoi'])) {
        include("connect_obj.php");

        
        $newUser = $_POST['username'];
        $newPass = $_POST['password'];
        $fullname = $_POST['HoTen'];
        $date = $_POST['NgaySinh'];
        $gt = $_POST['GioiTinh'];
        $address = $_POST['DiaChi'];
        $email = $_POST['Email'];
        $cccd = $_POST['CCCD'];
        $phone = $_POST['DienThoai'];
        
        // Chuẩn bị truy vấn
        $sql = "INSERT INTO tbuser (username, password, HoTen, NgaySinh, GioiTinh, DiaChi, Email, CCCD, DienThoai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssssssss", $newUser, $newPass, $fullname, $date, $gt, $address, $email, $cccd, $phone);
            $kp = $stmt->execute();
            
            if ($kp) {
                header("location: user.php");
                exit();
            } else {
                echo "Thêm mới không thành công";
            }
            
            $stmt->close();
        } else {
            echo "Lỗi khi chuẩn bị truy vấn";
        }
        
        $conn->close();
    }
?>
