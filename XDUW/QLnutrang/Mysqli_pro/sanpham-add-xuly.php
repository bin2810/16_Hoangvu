<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect_pro.php");
        $sp_id = null;
        $tensp = $_POST['tensp'];
        $mahang = $_POST['mahang'];
        $mota = $_POST['mota'];
        $trongluong = $_POST['trongluong'];
        $dongia = $_POST['dongia'];
        $hinhanh = $_FILES['hinhanh']['error']==0? $_FILES['hinhanh']['name']:"";
        if($hinhanh != ""){
            move_uploaded_file($_FILES['hinhanh']['tmp_name'],"../images/$hinhanh");
            $hinhanh = $_FILES['hinhanh']['name'];
        }else{
            $hinhanh = "no";
        }
        $slhienco = $_POST['slhienco'];
        $tinhtrang = $_POST['tinhtrang'];
        $maloai = $_POST['sellsp'];
        
        /*
        var_dump($tensp,
        $mahang,
        $mota,
        
        $mahang,
        $dongia,
        $hinhanh,
        $slhienco,
        $tinhtrang,
        $maloai);*/
  

    $sql = "INSERT INTO `tbsanpham`(`SanPham_id`, `TenSP`, `MaHang`, `MoTa`, `TrongLuong`, `DonGia`, `HinhAnh`, `SLHienCo`, `TinhTrang`, `MaLoai`) ";
    $sql .= " VALUES ('$sp_id','$tensp','$mahang','$mota','$trongluong','$dongia','$hinhanh','$slhienco','$tinhtrang','$maloai')";
    $kp = mysqli_query($conn,$sql);
    if ($kp) {
        header("location: sanpham.php");
        exit();
    }else{
        echo("thêm mới không thành công");
    }
        if ($kp) {
            header("location: sanpham.php");
            exit();
        } else {
            echo "Thêm mới không thành công";
        }
        
        $conn = null;
    }
?>