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
  

        $sql = "INSERT INTO tbloaisanpham ";
        $sql .= " VALUES (?, ?, ? )";
        $params = array($maloai,$tenloai,$hinhanh);
        $sta = $conn->prepare($sql);
        $kp = $sta->execute($params);
        if ($kp) {
            header("location: loaisanpham.php");
            exit();
        } else {
            echo "Thêm mới không thành công";
        }
        
        $conn = null;
    }
?>