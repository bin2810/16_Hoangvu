<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect_pro.php");
        $user_id = $_POST['kh_id'];
        $fullname = $_POST['HoTen'];
        $address = $_POST['DiaChi'];
        $phone = $_POST['DienThoai'];


      
        $sql = "UPDATE tbkhachhang SET TenKH='$fullname', DiaChi='$address', SoDT='$phone' WHERE KhachHang_id='$user_id'";
     

        if (mysqli_query($conn, $sql)) {
            header("location: Khachhang.php");
            exit();
        } else {
            echo "Cập nhật không thành công: " . mysqli_error($conn);
        }

        // Đóng kết nối
        mysqli_close($conn);
    }
?>
