<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect.php");
        $maloai = $_POST['maloai'];
        $tenloai = $_POST['tenloai'];
       
  
        $query_nameloai = "SELECT * FROM tb_danhmuc_chinh WHERE TENDM_cha = '" . $tenloai . "'";
        $kt_nameloai = $conn->query($query_nameloai);
        if($kt_nameloai->num_rows > 0){
            echo"trùng tên loại sản phẩm";
        }else{
            $query_maloai = "SELECT * FROM tb_danhmuc_chinh WHERE MADM_cha = '" . $maloai . "'";
            $kt_maloai = $conn->query($query_maloai);
            if($kt_maloai->num_rows > 0){
                echo"trùng mã loại";
            }else{
                $sql = "INSERT INTO tb_danhmuc_chinh (`MADM_cha`, `TENDM_cha`) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $maloai, $tenloai);
                
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