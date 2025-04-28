<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect.php");
        $user_id = $_POST['user_id'];
        $newUser = $_POST['username'];
        $newPass = $_POST['password'];
        $fullname = $_POST['HoTen'];
        $date = $_POST['NgaySinh'];
        $gt = $_POST['GioiTinh'];
        $address = $_POST['DiaChi'];
        $email = $_POST['Email'];
        $cccd = $_POST['CCCD'];
        $phone = $_POST['DienThoai'];
        $vaitro   = $_POST['vaitro'];


        
        // Tạo câu truy vấn SQL
        $sql = "UPDATE tbuser SET username=?, password=?, HoTen=?, NgaySinh=?, DiaChi=?, Email=?, CMND=?, DienThoai=?, role=? WHERE user_id=?";

        // Chuẩn bị câu truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssiiii", $newUser, $newPass, $fullname, $date, $address, $email, $cccd, $phone,$vaitro, $user_id);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            header("location: user.php");
            exit();
        } else {
            echo "Cập nhật không thành công: " . $stmt->error;
        }

        // Đóng kết nối
        $conn->close();
    }
?>
