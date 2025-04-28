<?php
if (isset($_POST['ThemMoi'])) {
    include_once("connect.php");

    $newUser  = $_POST['username'];
    $newPass  = $_POST['password'];
    $fullname = $_POST['HoTen'];
    $date     = $_POST['NgaySinh'];
    $vaitro   = $_POST['vaitro'];
    $address  = $_POST['DiaChi'];
    $email    = $_POST['Email'];
    $cccd     = $_POST['CCCD'];
    $phone    = $_POST['DienThoai'];

    $stmt1 = $conn->prepare("SELECT * FROM tbuser WHERE username = ?");
    $stmt1->bind_param("s", $newUser);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
        echo "Trùng username";
        exit();
    }

    $stmt2 = $conn->prepare("SELECT * FROM tbuser WHERE Email = ?");
    $stmt2->bind_param("s", $email);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($result2->num_rows > 0) {
        echo "Trùng email";
        exit();
    }

    $stmt3 = $conn->prepare("
        INSERT INTO tbuser (username, password, HoTen, NgaySinh, DiaChi, Email, CMND, DienThoai, role)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt3->bind_param("sssssssss", $newUser, $newPass, $fullname, $date, $address, $email, $cccd, $phone, $vaitro);

    if ($stmt3->execute()) {
        header("Location: user.php");
        exit();
    } else {
        echo "Thêm mới không thành công: " . $stmt3->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
