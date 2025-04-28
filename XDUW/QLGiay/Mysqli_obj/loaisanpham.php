<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dinhdang.css">
    <!-- <link rel="stylesheet" href="../css/dinhdang copy.css"> -->
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php
include("connect.php");

$query  = "SELECT * FROM tbloaigiay";
$result = $conn->query($query);

$getgiay = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $getgiay[] = $row;
    }
}
?>
<div class="big">
    <?php
    if (isset($_GET['error'])) {
        $error = 'ko được xóa sản phẩm =)))';
    }
    ?>
    <div class="loi">
        <p class="error" id="error"><?= $error ?? "" ?></p>
    </div>
    <script>
        const error = document.getElementById('error');
        if (error && error.textContent.trim() !== "") {
            setTimeout(() => {
                error.style.display = "none";
            }, 3000);
        }
    </script>

    <h1 class="canhgiua">DANH SÁCH SẢN PHẨM</h1>
    <button class="nut" onclick="window.open('loaisanpham-add.php', '_self')">Thêm Mới</button>
    <div class="giay_table">
        <table border="1">
            <tr>
                <th class="canhgiua">STT</th>
                <th class="canhgiua">Mã loại</th>
                <th class="canhgiua">Tên Loại</th>
                <th class="canhgiua">Hình ảnh</th>
                <th class="canhgiua" colspan="2">Chi Tiết</th>
            </tr>
            <?php
            $i = 1;
            foreach ($getgiay as $giay) {
            ?>
            <tr>
                <td class="canhgiua"><?= $i++ ?></td>
                <td class="canhgiua"><?= $giay['MaLoai'] ?></td>
                <td class="canhgiua"><?= $giay['TenLoai'] ?></td>
                <td class="canhgiua"><img class="hinhsp" src="../images/<?= $giay['HinhAnh'] ?>" alt=""></td>
                <td class="canhgiua">
                    <button class="Xoa nut">Xoá</button>
                </td>
                <td class="canhgiua">
                    <button class="CapNhat nut" onclick="window.open('loaisanpham-update.php?id=<?=$giay['MaLoai']?> ','_self')">Cập nhật</button>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php
$conn->close();
?>
</body>
</html>
