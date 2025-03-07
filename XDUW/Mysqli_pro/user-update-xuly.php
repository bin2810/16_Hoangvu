<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect_pro.php");
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

        // Tạo câu truy vấn SQL
        $sql = "UPDATE tbuser SET username='$newUser', password='$newPass', HoTen='$fullname', NgaySinh='$date', GioiTinh='$gt', DiaChi='$address', Email='$email', CMND='$cccd', DienThoai='$phone' WHERE user_id='$user_id'";

        // Thực thi truy vấn
        if (mysqli_query($conn, $sql)) {
            header("location: user.php");
            exit();
        } else {
            echo "Cập nhật không thành công: " . mysqli_error($conn);
        }

        // Đóng kết nối
        mysqli_close($conn);
    }
?>
