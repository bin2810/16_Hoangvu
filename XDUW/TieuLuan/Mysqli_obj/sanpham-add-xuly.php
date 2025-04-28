<?php
if (isset($_POST['ThemMoi'])) {
    include("connect.php");

    $tensp = $_POST['tensp'];
    $dongia = $_POST['dongia'];
    $maloai = $_POST['sellsp'];
    // var_dump($tensp);
    $hinhanh = "no";
    if ($_FILES['hinhanh']['error'] == 0) {
        $hinhanh = basename($_FILES['hinhanh']['name']);
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/sanpham/$hinhanh");
    }



    $query_namesp = "SELECT * FROM tb_sanpham WHERE TenSP = '" . $tensp . "'";
    $kt_namesp = $conn->query($query_namesp);
    if($kt_namesp->num_rows > 0){
        echo"trùng tên sản phẩm";
    }else{



        $sql = "INSERT INTO tb_sanpham (TenSP,DonGia,HinhAnh,MA_DM_con) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $tensp,$dongia, $hinhanh, $maloai);

        if ($stmt->execute()) {
            header("location: sanpham.php");
            exit();
        } else {
            echo "Thêm mới không thành công";
        }
    }

    // $stmt->close();
}
?>
