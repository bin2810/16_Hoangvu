<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="../css/dinhdang.css">
    <title>Thêm Sản Phẩm</title>
</head>
<body>
<?php
    // B1: Kết nối CSDL
    include("connect.php");

    $sql_lsp = "SELECT * FROM tb_danhmuc_con";
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
                            
                <label for="dongia">ĐƠN GIÁ:</label>
                <input type="text" name="dongia" placeholder="Nhập đơn giá..." required>
                
                <label for="hinhanh">HÌNH ẢNH:</label>
                <input type="file" name="hinhanh">
                
                <label for="sellsp">LOẠI SẢN PHẨM:</label>
                <select name="sellsp" class="boloc">
                    <?php foreach ($loaisp as $lspham): ?>
                        <option value="<?= htmlspecialchars($lspham->MADM_con) ?>" <?= isset($_POST['sellsp']) && $_POST['sellsp'] == $lspham->MaLoai ? 'selected' : '' ?>>
                            <?= htmlspecialchars($lspham->TENDM_con) ?>
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