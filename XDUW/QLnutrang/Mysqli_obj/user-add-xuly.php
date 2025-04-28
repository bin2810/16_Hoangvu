<?php
if (isset($_POST['ThemMoi'])) {
    include("connect_obj.php");
    $cccd = $_POST['CCCD'];
    //Kiểm tra dữ liệu
    $sql_1 = " select * from tbuser  ";
    $sql_1 .= " where CMND =" . $cccd;
    $kq_1 = $conn->query($sql_1);
    if ($kq_1->num_rows > 0) {
        echo"trùng CMND";
    } else {
        $newUser = $_POST['username'];
        $sql_2 = " select * from tbuser  ";
        $sql_2 .= " where username ='" . $newUser . "'";
        $kq_2 = $conn->query($sql_2);
        if ($kq_2->num_rows > 0) {
            echo "trùng Username";
        } else {
            // Chuẩn bị truy vấn
            $newUser = $_POST['username'];
            $newPass = $_POST['password'];
            $fullname = $_POST['HoTen'];
            $date = $_POST['NgaySinh'];
            $gt = $_POST['GioiTinh'];
            $address = $_POST['DiaChi'];
            $email = $_POST['Email'];
            $cccd = $_POST['CCCD'];
            $phone = $_POST['DienThoai'];

            $sql = "INSERT INTO tbuser (username, password, HoTen, NgaySinh, GioiTinh, DiaChi, Email, CMND, DienThoai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sssssssis", $newUser, $newPass, $fullname, $date, $gt, $address, $email, $cccd, $phone);
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
    }
}
