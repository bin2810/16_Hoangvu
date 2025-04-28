<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect_pro.php");
        $user_id = null;
        $newUser = $_POST['username'];
        $newPass = $_POST['password'];
        $fullname = $_POST['HoTen'];
        $date = $_POST['NgaySinh'];
        $gt = $_POST['GioiTinh'];
        $address = $_POST['DiaChi'];
        $email = $_POST['Email'];
        $cccd = $_POST['CCCD'];
        $phone = $_POST['DienThoai'];


        $sql = "INSERT INTO `tbuser`(`username`, `password`, `HoTen`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Email`, `CMND`, `DienThoai`)";
    $sql .=" VALUES ('$newUser','$pwd','$fullname','$date','$gender','$address','$email','$cccd','$phone')";
    $user = mysqli_query($conn,$sql);
    if ($user) {
        header("location: user.php");
        exit();
    }else{
        echo("thêm mới không thành công");
    }
    }
?>