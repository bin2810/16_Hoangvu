<?php
    if (isset($_POST['ThemMoi'])) {
        include_once("connect.php");
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
        $trongluong,
        $mahang,
        $dongia,
        $hinhanh,
        $slhienco,
        $tinhtrang,
        $maloai);*/
  

        $sql = "INSERT INTO tbsanpham ";
        $sql .= " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($sp_id,$tensp,$mahang,$mota,$trongluong,$dongia,$hinhanh,$slhienco,$tinhtrang,$maloai);
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