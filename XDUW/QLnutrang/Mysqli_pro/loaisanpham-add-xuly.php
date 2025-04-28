<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect_pro.php");
        $maloai = $_POST['maloai'];
        $tenloai = $_POST['tenloai'];
        $hinhanh = $_FILES['hinhanh']['error']==0? $_FILES['hinhanh']['name']:"";
        if($hinhanh != ""){
            move_uploaded_file($_FILES['hinhanh']['tmp_name'],"../images/$hinhanh");
            $hinhanh = $_FILES['hinhanh']['name'];
        }else{
            $hinhanh = "no";
        }
        // var_dump($maloai,$tenloai,$hinhanh);
  

        $sql = "INSERT INTO `tbloaisanpham`(`MaLoai`, `TenLoai`, `HinhAnh`)";
        $sql .= "VALUES ('$maloai','$tenloai','$hinhanh')";
        $user = mysqli_query($conn,$sql);
    if ($user) {
        header("location: loaisanpham.php");
        exit();
    }else{
        echo("thêm mới không thành công");
    }
    }
?>