<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect_obj.php");
        $user_id = $_POST['kh_id'];
        $fullname = $_POST['HoTen'];
        $address = $_POST['DiaChi'];
        $phone = $_POST['DienThoai'];

        // Tạo câu truy vấn SQL
        $sql = "UPDATE tbkhachhang SET TenKH=?, DiaChi=?, SoDT=? WHERE KhachHang_id=?";

        // Chuẩn bị câu truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $fullname, $address, $phone, $user_id);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            header("location: Khachhang.php");
            exit();
        } else {
            echo "Cập nhật không thành công: " . $stmt->error;
        }

        // Đóng kết nối
        $stmt->close();
        $conn->close();
    }
?>
