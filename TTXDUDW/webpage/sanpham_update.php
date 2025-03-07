<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>Document</title>
   <link rel="stylesheet" href="../css/dinhdang.css">
</head>
<?php

if(isset($_GET['id'])){
    $SanPham_id = $_GET['id'];
    include("connect.php");
    $sql = "SELECT * FROM tbsanpham WHERE SanPham_id = :SanPham_id";
    $sta = $conn->prepare($sql);
    $sta->bindParam(':SanPham_id', $SanPham_id, PDO::PARAM_INT);
    $sta->execute();
    if($sta->rowCount()){
        $sanpham = $sta->fetch(PDO::FETCH_OBJ);
    }
    $sql_lsp = "SELECT * from tbloaisanpham";
    $sql_sp = "SELECT * from tbsanpham";
    if (isset($_POST['btntim']) && !empty($_POST['sellsp'])) {
        $maloai = $_POST['sellsp'];
        $sql_sp .= " WHERE MaLoai = '".$maloai."'";
    }
        $sql_sp .= " order by TenSP ASC";

    $lsp = $conn -> prepare($sql_lsp);
    $lsp -> execute();
    
    if($lsp -> rowCount() > 0){
        $loaisp = $lsp -> fetchAll(PDO::FETCH_OBJ);
    }
?>
<body>
   <div class="yeucau">
    
    <div class="them">
        <form action="sanpham_update_xuly.php"  method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>
                        <h3>THÊM MỚI SẢN PHẨM</h3>
                    </legend>
                    <label for="spid">Mã Sản Phẩm:</label>
          <input type="text" name="spid" size="20" value="<?=$sanpham -> SanPham_id ?>" placeholder="Mã loại..">
          <label for="spname">Tên Sản Phẩm:</label>
          <input type="text" name="spname" size="20" value="<?=$sanpham -> TenSP ?>" placeholder="Tên Loại..">
          <label for="spmh">Mã Hàng:</label>
          <input type="text" name="spmh" size="20" value="<?=$sanpham -> MaHang ?>" placeholder="Mã Hàng..">
          <label for="spmt">Mô Tả:</label>
          <input type="text" name="spmt" size="20" value="<?=$sanpham -> MoTa ?>" placeholder="Mô Tả..">
          <label for="sptl">Trọng Lượng (g):</label>
          <input type="text" name="sptl" size="20" value="<?=$sanpham -> TrongLuong ?>" placeholder="Tên Loại..">
          <label for="spdg">Don Gia:</label>
          <input type="text" name="spdg" size="20" value="<?=$sanpham -> DonGia ?>" placeholder="Don Gia..">
          <label for="img">Hình Ảnh:</label>
          <input type="file" name="hinhanh" size="20" placeholder="Hình Ảnh..">
          <input type="hidden" name="hinh" value="<?=$sanpham -> HinhAnh?>">
          <label for="spslhc">So Luong Hien Co:</label>
          <input type="text" name="spslhc" size="20" value="<?=$sanpham -> SLHienCo ?>" placeholder="So Luong Hien Co..">
          <label for="sptt">Tinh Trang:</label>
          <input type="text" name="sptt" size="20" value="<?=$sanpham -> TinhTrang ?>" placeholder="Tinh Trang..">
          <form action="sanpham_loc.php" method="post">
            <select name="sellsp" id="" class="boloc">
              <?php
              foreach ($loaisp as $lspham) {
                $selected = (isset($_POST['sellsp']) && $_POST['sellsp'] == $lspham->MaLoai) ? "selected" : "";
              ?>
                <option value="<?= $lspham->MaLoai ?>" <?= $selected ?>><?= $lspham->TenLoai ?></option>
              <?php
              }
              ?>
            </select>
          </form>
          <br>
            <input type="hidden" name="sanpham_id" value="<?= $sanpham -> SanPham_id?>">
            <button type="submit" name="ThemMoi" class="add">Thêm mới</button>           
        </form>
    </div>
   </div>
</body>
<?php
}

?>
</html>