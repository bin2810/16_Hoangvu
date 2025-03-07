<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect_obj.php");
        $maloai = $_POST['maloai1'];
        $tenloai = $_POST['tenloai'];
        $hinhanh = $_FILES['hinhanh']['error'] == 0 ? $_FILES['hinhanh']['name'] : "";
        if ($hinhanh != "") {
            move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/$hinhanh");
        } else {
            $hinhanh = "no";
        }

        // Tạo câu truy vấn SQL
        $sql = "UPDATE tbloaisanpham SET TenLoai=?, Hinhanh=? WHERE MaLoai=?";

        // Chuẩn bị câu truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $tenloai, $hinhanh, $maloai);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            header("location: loaisanpham.php");
            exit();
        } else {
            echo "Cập nhật không thành công: " . $stmt->error;
        }

        // Đóng kết nối
        $stmt->close();
        $conn->close();
    }
?>
