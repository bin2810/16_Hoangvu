<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect.php");
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


        $sql = "INSERT INTO tbuser ";
        $sql .= " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($user_id, $newUser, $newPass, $fullname, $date, $gt, $address, $email, $cccd, $phone);
        $sta = $conn->prepare($sql);
        $kp = $sta->execute($params);
        if ($kp) {
            header("location: user.php");
            exit();
        } else {
            echo "Thêm mới không thành công";
        }
        
        $conn = null;
    }
?>