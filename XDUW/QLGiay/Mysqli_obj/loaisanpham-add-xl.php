<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect.php");
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
  
        $query_nameloai = "SELECT * FROM tbloaigiay WHERE TenLoai = '" . $tenloai . "'";
        $kt_nameloai = $conn->query($query_nameloai);
        if($kt_nameloai->num_rows > 0){
            echo"trùng tên loại sản phẩm";
        }else{
            $query_maloai = "SELECT * FROM tbloaigiay WHERE MaLoai = '" . $maloai . "'";
            $kt_maloai = $conn->query($query_maloai);
            if($kt_maloai->num_rows > 0){
                echo"trùng mã loại";
            }else{
                $sql = "INSERT INTO tbloaigiay (`MaLoai`, `TenLoai`, `HinhAnh`) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $maloai, $tenloai, $hinhanh);
                
                if ($stmt->execute()) {
                    header("location: loaisanpham.php");
                    exit();
                } else {
                    echo "Thêm mới không thành công";
                }
            }
        }
        
        // $stmt->close();

    }
?>