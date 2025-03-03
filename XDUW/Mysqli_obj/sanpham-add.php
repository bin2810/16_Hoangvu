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
    include("connect_obj.php");

    $sql_lsp = "SELECT * FROM tbloaisanpham";
    $sql_sp = "SELECT * FROM tbsanpham";
    
    if (isset($_POST['btntim'])) {
        $maloai = $conn->real_escape_string($_POST['sellsp']);
        $sql_sp .= " WHERE MaLoai = '$maloai'";
    }
    $sql_sp .= " ORDER BY TenSP ASC";

    $lsp = $conn->query($sql_lsp);
    $loaisp = [];
    if ($lsp && $lsp->num_rows > 0) {
        while ($row = $lsp->fetch_object()) {
            $loaisp[] = $row;
        }
    }

    if (isset($_POST['ThemMoi'])) {
        $tensp = $conn->real_escape_string($_POST['tensp']);
        $mahang = $conn->real_escape_string($_POST['mahang']);
        $mota = $conn->real_escape_string($_POST['mota']);
        $trongluong = $conn->real_escape_string($_POST['trongluong']);
        $dongia = $conn->real_escape_string($_POST['dongia']);
        $slhienco = $conn->real_escape_string($_POST['slhienco']);
        $tinhtrang = $conn->real_escape_string($_POST['tinhtrang']);
        $maloai = $conn->real_escape_string($_POST['sellsp']);
        
        $hinhanh = "no";
        if ($_FILES['hinhanh']['error'] == 0) {
            $hinhanh = basename($_FILES['hinhanh']['name']);
            move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/$hinhanh");
        }

        $sql = "INSERT INTO tbsanpham (TenSP, MaHang, MoTa, TrongLuong, DonGia, HinhAnh, SLHienCo, TinhTrang, MaLoai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssdsdss", $tensp, $mahang, $mota, $trongluong, $dongia, $hinhanh, $slhienco, $tinhtrang, $maloai);
        
        if ($stmt->execute()) {
            header("location: sanpham.php");
            exit();
        } else {
            echo "Thêm mới không thành công";
        }
        $stmt->close();
    }
?>

<div class="yeucau">
    <div class="them">
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend><h3>THÊM SẢN PHẨM</h3></legend>
                <label for="tensp">TÊN SẢN PHẨM:</label>
                <input type="text" name="tensp" placeholder="Nhập tên sản phẩm..." required>
                
                <label for="mahang">MÃ HÀNG:</label>
                <input type="text" name="mahang" placeholder="Nhập mã hàng..." required>
                
                <label for="mota">MÔ TẢ:</label>
                <input type="text" name="mota" placeholder="Nhập mô tả...">
                
                <label for="trongluong">TRỌNG LƯỢNG:</label>
                <input type="text" name="trongluong" placeholder="Nhập trọng lượng...">
                
                <label for="dongia">ĐƠN GIÁ:</label>
                <input type="text" name="dongia" placeholder="Nhập đơn giá..." required>
                
                <label for="hinhanh">HÌNH ẢNH:</label>
                <input type="file" name="hinhanh">
                
                <label for="slhienco">SL HIỆN CÓ:</label>
                <input type="text" name="slhienco" placeholder="Nhập số lượng hiện có...">
                
                <label for="tinhtrang">TÌNH TRẠNG:</label>
                <input type="text" name="tinhtrang" placeholder="Nhập tình trạng...">
                
                <label for="sellsp">LOẠI SẢN PHẨM:</label>
                <select name="sellsp" class="boloc">
                    <?php foreach ($loaisp as $lspham): ?>
                        <option value="<?= htmlspecialchars($lspham->MaLoai) ?>" <?= isset($_POST['sellsp']) && $_POST['sellsp'] == $lspham->MaLoai ? 'selected' : '' ?>>
                            <?= htmlspecialchars($lspham->TenLoai) ?>
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