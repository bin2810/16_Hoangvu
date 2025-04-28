<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="../css/dinhdang.css">
    <link rel="stylesheet" href="../css/dinhdang copy.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Thêm Sản Phẩm</title>
</head>
<body>
<?php
    // B1: Kết nối CSDL
    include("connect.php");

    $sql_lsp = "SELECT * FROM tbloaigiay";
    $lsp = $conn->query($sql_lsp);
    $loaisp = [];
    if ($lsp && $lsp->num_rows > 0) {
        while ($row = $lsp->fetch_object()) {
            $loaisp[] = $row;
        }
    }

?>

<div class="yeucau">
    <div class="them">
        <form action="sanpham-add-xuly.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend><h3>THÊM SẢN PHẨM</h3></legend>

                <label for="tensp">TÊN SẢN PHẨM:</label>
                <input type="text" name="tensp" placeholder="Nhập tên sản phẩm..." required>

                <label for="mahang">MÃ HÀNG:</label>
                <input type="text" name="mahang" placeholder="Nhập mã hàng..." required>
                
                <label for="mota">MÔ TẢ:</label>
                <input type="text" name="mota" placeholder="Nhập mô tả...">
                
                <label for="trongluong">Màu Sắc:</label>
                <input type="text" name="mausac" placeholder="Nhập trọng lượng...">
                
                            
                <label for="dongia">ĐƠN GIÁ:</label>
                <input type="text" name="dongia" placeholder="Nhập đơn giá..." required>
                
                <label for="hinhanh">HÌNH ẢNH:</label>
                <input type="file" name="hinhanh">
                
                <label for="slhienco">SL HIỆN CÓ:</label>
                <input type="text" name="slhienco" placeholder="Nhập số lượng hiện có...">
                
                <label for="sellsp">LOẠI SẢN PHẨM:</label>
                <select name="sellsp" class="boloc">
                    <?php foreach ($loaisp as $lspham): ?>
                        <option value="<?= $lspham ->MaLoai?>" <?= isset($_POST['sellsp']) && $_POST['sellsp'] == $lspham->MaLoai ? 'selected' : '' ?>>
                            <?= $lspham->TenLoai ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <br>
                <button type="submit" name="ThemMoi" class="add">Thêm mới</button>
            </fieldset>          
        </form>
    </div>
</div>
</body>
</html>