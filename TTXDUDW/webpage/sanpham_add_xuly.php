<?php
if(isset($_POST["ThemMoi"])){
    include_once("connect.php");
    $spid = null;
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
            $hinhanh = "no,";
        }
    $spslhc = $_POST['spslhc'];
    $sptt = $_POST['sptt'];
    $project_id = $_POST['sellsp'];

    $sql = "INSERT INTO tbsanpham";
    $sql .= " VALUES (?,?,?,?,?,?,?,?,?,?)";
    $params = array($spid,$spname,$spmh,$spmt,$sptl,$spdg,$hinhanh,$spslhc,$sptt,$project_id);
    $sta = $conn -> prepare($sql);
    $kp = $sta -> execute($params);
    if ($kp) {
        header("location: sanpham.php");
        exit();
    }else{
        echo("thêm mới không thành công");
    }
    $conn = null;
}
?>