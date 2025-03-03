<?php
    if (isset($_POST['ThemMoi'])) {
    include("connect_obj.php");
        $tensp = $conn->real_escape_string($_POST['tensp']);
        $mahang = $conn->real_escape_string($_POST['mahang']);
        $mota = $conn->real_escape_string($_POST['mota']);
        $trongluong = $conn->real_escape_string($_POST['trongluong']);
        $dongia = $conn->real_escape_string($_POST['dongia']);
        $slhienco = $conn->real_escape_string($_POST['slhienco']);
        $tinhtrang = $conn->real_escape_string($_POST['tinhtrang']);
        $maloai = $conn->real_escape_string($_POST['sellsp']);
        
        $hinhanh = "no";
        if ($_FILES['hinhanh']['error'] == 0) {
            $hinhanh = basename($_FILES['hinhanh']['name']);
            move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/$hinhanh");
        }

        $sql = "INSERT INTO tbsanpham (TenSP, MaHang, MoTa, TrongLuong, DonGia, HinhAnh, SLHienCo, TinhTrang, MaLoai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $tensp, $mahang, $mota, $trongluong, $dongia, $hinhanh, $slhienco, $tinhtrang, $maloai);
        
        if ($stmt->execute()) {
            header("location: sanpham.php");
            exit();
        } else {
            echo "Thêm mới không thành công";
        }
    }
        $stmt->close();
?>