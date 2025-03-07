<?php
if(isset($_POST["ThemMoi"])){
    include_once("connect.php");
    $spid = $_POST['sanpham_id'];
    $spname = $_POST['spname'];
    $spmh = $_POST['spmh'];
    $spmt = $_POST['spmt'];
    $sptl = $_POST['sptl'];
    $spdg = $_POST['spdg'];
    $hinhanh = $_FILES['hinhanh']['error']==0? $_FILES['hinhanh']['name']:"";
        if($hinhanh != ""){
            move_uploaded_file($_FILES['hinhanh']['tmp_name'],"../images/$hinhanh");
            $hinhanh = $_FILES['hinhanh']['name'].'';
        }else{
            $hinhanh = $_POST['hinh'];
        }
    $spslhc = $_POST['spslhc'];
    $sptt = $_POST['sptt'];
    $project_id = $_POST['sellsp'];

    $sql = "UPDATE tbsanpham SET TenSP=?,MaHang=?,MoTa=?,TrongLuong=?,DonGia=?,HinhAnh=?, SLHienCo=?,TinhTrang=?,MaLoai=?WHERE SanPham_id=?  ";
    $params = array($spname,$spmh,$spmt,$sptl,$spdg,$hinhanh,$spslhc,$sptt,$project_id,$spid);
    $sta = $conn->prepare($sql);
    $kp = $sta->execute($params);
    if ($kp) {
        header("location: sanpham.php");
        exit();
    } else {
        echo "Thêm mới không thành công";
    }
    $conn = null;
}
?>