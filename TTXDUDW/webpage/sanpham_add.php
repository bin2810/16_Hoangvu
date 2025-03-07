<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="../css/dinhdang.css">
</head>

<body>
  <?php
// B1: Kết nối CSDL
    include("connect.php");

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
  <div class="yeucau">

    <div class="them">
      <form action="sanpham_add_xuly.php" method="post" enctype="multipart/form-data">
        <fieldset>
          <legend>
            <h3>THÊM MỚI SẢN PHẨM</h3>
          </legend>
          <label for="spid">Mã Sản Phẩm:</label>
          <input type="text" name="spid" size="20" placeholder="Mã loại..">
          <label for="spname">Tên Sản Phẩm:</label>
          <input type="text" name="spname" size="20" placeholder="Tên Loại..">
          <label for="spmh">Mã Hàng:</label>
          <input type="text" name="spmh" size="20" placeholder="Mã Hàng..">
          <label for="spmt">Mô Tả:</label>
          <input type="text" name="spmt" size="20" placeholder="Mô Tả..">
          <label for="sptl">Trọng Lượng (g):</label>
          <input type="text" name="sptl" size="20" placeholder="Tên Loại..">
          <label for="spdg">Don Gia:</label>
          <input type="text" name="spdg" size="20" placeholder="Don Gia..">
          <label for="img">Hình Ảnh:</label>
          <input type="file" name="hinhanh" size="20" placeholder="Hình Ảnh..">
          <label for="spslhc">So Luong Hien Co:</label>
          <input type="text" name="spslhc" size="20" placeholder="So Luong Hien Co..">
          <label for="sptt">Tinh Trang:</label>
          <input type="text" name="sptt" size="20" placeholder="Tinh Trang..">
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
          <button type="submit" name="ThemMoi" class="add">Thêm mới</button>
      </form>
    </div>
  </div>
</body>

</html>