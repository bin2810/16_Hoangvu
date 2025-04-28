<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect_pro.php");
        $maloai = $_POST['maloai1'];
        $tenloai = $_POST['tenloai'];
        $hinhanh = $_FILES['hinhanh']['error'] == 0 ? $_FILES['hinhanh']['name'] : "";
        if ($hinhanh != "") {
            move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/$hinhanh");
        } else {
            $hinhanh = "no";
        }

    
        $sql = "UPDATE tbloaisanpham SET TenLoai='$tenloai', Hinhanh='$hinhanh' WHERE MaLoai='$maloai'";

   
        if (mysqli_query($conn, $sql)) {
            header("location: loaisanpham.php");
            exit();
        } else {
            echo "Cập nhật không thành công: " . mysqli_error($conn);
        }

      
        mysqli_close($conn);
    }
?>
