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


        $sql = "UPDATE tbuser ";
        $sql .= " SET username = ?, password = ?, HoTen = ?, NgaySinh = ?, GioiTinh = ?, DiaChi = ?, Email = ?, CMND = ?, DienThoai = ?";
        $sql .= " WHERE user_id = ?";
        $params = array( $newUser, $newPass, $fullname, $date, $gt, $address, $email, $cccd, $phone,$user_id);
        $sta = $conn->prepare($sql);
        $kp = $sta->execute($params);
        if ($kp) {
            header("location: user.php");
            exit();
        } else {
            echo "Cập nhật không thành công";
        }
        
        $conn = null;
    }
?>