<?php
if(isset($_POST["ThemMoi"])){
    include_once("connect.php");
    $spid = $_POST['sanpham_id'];
    $spname = $_POST['spname'];
    $spmh = $_POST['spmh'];
    $spmt = $_POST['spmt'];
    $mausac = $_POST['mausac'];
    $spdg = $_POST['spdg'];
    $hinhanh = $_FILES['hinhanh']['error'] == 0 ? $_FILES['hinhanh']['name'] : "";
        if($hinhanh != ""){
            move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/$hinhanh");
            $hinhanh = $_FILES['hinhanh']['name'];
        } else {
            $hinhanh = $_POST['hinh'];
        }
    $spslhc = $_POST['spslhc'];
    $project_id = $_POST['sellsp'];



    $query_tensp = "SELECT TenSP FROM tbgiay WHERE TenSP ='" . $spname . "'";
    $check_tensp = $conn ->  query($query_tensp);
    if($check_tensp ->num_rows > 0){
        echo"trùng tên sản phẩm";
    }else{
        $query_mahang = "SELECT TenSP FROM tbgiay WHERE MaHang ='" . $spmh . "'";
        $check_mahang = $conn ->  query($query_mahang);
        if($check_mahang -> num_rows >0){
            echo"trùng mã hàng";
        }else{
            $sql = "UPDATE tbgiay SET TenSP=?, MaHang=?, MoTa=?, MauSac=?, DonGia=?, HinhAnh=?, SLHienCo=?, MaLoai=? WHERE SanPham_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssi", $spname, $spmh, $spmt, $mausac, $spdg, $hinhanh, $spslhc, $project_id, $spid);
            $kp = $stmt->execute();
            
            if ($kp) {
                header("location: sanpham.php");
                exit();
            } else {
                echo "Thêm mới không thành công: " . $stmt->error;
            }
        }
    }
    
    $conn->close();
}
?>
