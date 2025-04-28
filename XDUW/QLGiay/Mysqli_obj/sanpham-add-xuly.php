<?php
if (isset($_POST['ThemMoi'])) {
    include("connect.php");

    $tensp = $_POST['tensp'];
    $mahang = $_POST['mahang'];
    $mota = $_POST['mota'];
    $mausac = $_POST['mausac'];
    // $trongluong = $_POST['trongluong'];
    $slhienco = $_POST['slhienco'];
    $dongia = $_POST['dongia'];
    $maloai = $_POST['sellsp'];
    // var_dump($tensp);
    $hinhanh = "no";
    if ($_FILES['hinhanh']['error'] == 0) {
        $hinhanh = basename($_FILES['hinhanh']['name']);
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/$hinhanh");
    }



    $query_namesp = "SELECT * FROM tbgiay WHERE TenSP = '" . $tensp . "'";
    $kt_namesp = $conn->query($query_namesp);
    if($kt_namesp->num_rows > 0){
        echo"trùng tên sản phẩm";
    }else{



        $sql = "INSERT INTO tbgiay (TenSP,MaHang,MoTa,MauSac,DonGia,HinhAnh,SLHienCo,MaLoai) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssisis", $tensp,$mahang,$mota,$mausac,$dongia, $hinhanh,$slhienco,$maloai);

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
