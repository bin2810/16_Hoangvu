<?php
if (isset($_POST['ThemMoi'])) {
    include("connect.php");
    $newUser = $_POST['username'];
    $newPass = $_POST['password'];
    $fullname = $_POST['HoTen'];
    $email =trim($_POST['Email']);
    
    //Kiểm tra dữ liệu
    $sql_1 = " select * from tb_user  ";
    $sql_1 .= " where Email ='" . $email . "'";
    $kq_1 = $conn->query($sql_1);
    if ($kq_1->num_rows > 0) {
        echo"trùng email";
        exit();
    } else {
        $sql_2 = " select * from tb_user  ";
        $sql_2 .= " where Username ='" . $newUser . "'";
        $kq_2 = $conn->query($sql_2);
        if ($kq_2->num_rows > 0) {
            echo "trùng Username";
            exit();
        } else {
            // Chuẩn bị truy vấn

            $sql = "INSERT INTO tb_user (Username, Fullname, Email, Password) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ssss", $newUser, $fullname,$email,$newPass);
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

            // $conn->close();
        }
    }
}
