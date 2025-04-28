<?php
if (isset($_POST['ThemMoi'])) {
    include("connect_obj.php");

    $tensp = $_POST['tensp'];
    $mahang = $_POST['mahang'];
    $mota = $_POST['mota'];
    $trongluong = $_POST['trongluong'];
    $dongia = $_POST['dongia'];
    $slhienco = $_POST['slhienco'];
    $tinhtrang = $_POST['tinhtrang'];
    $maloai = $_POST['sellsp'];
    // var_dump($tensp);
    $hinhanh = "no";
    if ($_FILES['hinhanh']['error'] == 0) {
        $hinhanh = basename($_FILES['hinhanh']['name']);
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/$hinhanh");
    }



    $query_namesp = "SELECT * FROM tbsanpham WHERE TenSP = '" . $tensp . "'";
    $kt_namesp = $conn->query($query_namesp);
    if($kt_namesp->num_rows > 0){
        echo"trùng tên sản phẩm";
    }else{



        $sql = "INSERT INTO tbsanpham (TenSP, MaHang, MoTa, TrongLuong, DonGia, HinhAnh, SLHienCo, TinhTrang, MaLoai) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $tensp, $mahang, $mota, $trongluong, $dongia, $hinhanh, $slhienco, $tinhtrang, $maloai);

        if ($stmt->execute()) {
            header("location: sanpham.php");
            exit();
        } else {
            echo "Thêm mới không thành công";
        }
    }

    // $stmt->close();
}
?>
