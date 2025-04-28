<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="../css/dinhdang.css">
    <title>Document</title>
</head>
<?php
if(isset($_GET['id'])){
    $maloai = $_GET['id'];

    include("connect_obj.php");

    $sql = "SELECT * FROM tbloaisanpham WHERE MaLoai = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $maloai);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $product = $result->fetch_object();
    }
?>
<body>
   <div class="yeucau">
    <div class="them">
        <form action="loaisanpham-update-xuly.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend> <h3>THÊM LOẠI SẢN PHẨM</h3></legend>
                <label for="tenloai">TÊN LOẠI:</label>
                <input type="text" name="tenloai" value="<?= $product->TenLoai ?>" size="20" placeholder="Tên Loại..">
                <label for="hinhanh">HÌNH ẢNH:</label>
                <input type="file" name="hinhanh" size="20">
                <input type="hidden" name="maloai1" value="<?= $product->MaLoai ?>">
                <br>
                <button type="submit" name="ThemMoi" class="add">Thêm mới</button>
            </fieldset>          
        </form>
    </div>
   </div>
</body>
<?php
    $stmt->close();
}
$conn->close();
?>
</html>
