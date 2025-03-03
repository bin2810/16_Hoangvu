<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="../css/dinhdang.css">
    <title>Document</title>
   
</head>
<body>
<?php
    // B1: Kết nối CSDL
    include("connect.php");

    $sql_lsp = "SELECT * from tbloaisanpham";
    $sql_sp = "SELECT * from tbsanpham";
    if(isset($_POST['btntim'])){
        $maloai = $_POST['sellsp'];
        $sql_sp .= " where MaLoai ='".$maloai."'";
    }
        $sql_sp .= " order by TenSP ASC";

    $lsp = $conn -> prepare($sql_lsp);
    $lsp -> execute();
    
    if($lsp -> rowCount() > 0){
        $loaisp = $lsp -> fetchAll(PDO::FETCH_OBJ);
    }
    
?>
   <div class="yeucau">
  
    <div class="them">
        <form action="sanpham-add-xuly.php" method="post" enctype="multipart/form-data">
            <fieldset>
            <legend> <h3>THÊM LOẠI SẢN PHẨM</h3></legend>
                <label for="tensp">TÊN SẢN PHẨM:</label>
                <input type="text" name="tensp" size="20" placeholder="Mã Loại.."> 
                <label for="mahang">MÃ HÀNG:</label>
                <input type="text" name="mahang" size="20" placeholder="Tên Loại..">
                <label for="mota">MÔ TẢ:</label>
                <input type="text" name="mota" size="20" placeholder="Tên Loại..">
                <label for="trongluong">TRỌNG LƯƠNG:</label>
                <input type="text" name="trongluong" size="20" placeholder="Tên Loại..">
                <label for="mahang">MÃ HẢNG:</label>
                <input type="text" name="mahang" size="20" placeholder="Tên Loại..">
                <label for="dongia">ĐƠN GIÁ:</label>
                <input type="text" name="dongia" size="20" placeholder="Tên Loại..">
                <label for="hinhanh">HÌNH ẢNH:</label>
                <input type="file" name="hinhanh" size="20" >
                <label for="slhienco">SL HIỆN CÓ:</label>
                <input type="text" name="slhienco" size="20" placeholder="Tên Loại..">
                <label for="tinhtrang">TÌNH TRẠNG:</label>
                <input type="text" name="tinhtrang" size="20" placeholder="Tên Loại..">
                <!-- <form action="sanpham_loc.php" method="post"> -->
            <select name="sellsp" id="" class="boloc">
                <?php
                   foreach ($loaisp as $lspham ) {
                    $selected = (isset($_POST['sellsp']) && $_POST['sellsp'] == $lspham->MaLoai) ? "selected" : "";
                ?>
                <option value="<?= $lspham->MaLoai ?>" <?= $selected ?>><?= $lspham->TenLoai ?></option>
                <?php
                    }
                ?>
            </select>
           
        <!-- </form> -->
                    <br>
                    <button type="submit" name="ThemMoi" class="add">Thêm mới</button>
            </fieldset>          
                
        </form>
    </div>
   </div>
</body>
</html>