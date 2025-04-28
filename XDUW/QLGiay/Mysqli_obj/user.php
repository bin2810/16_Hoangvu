<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dinhdang.css">
</head>
<body>
<?php
include("connect.php");

$query  = "SELECT * FROM tbuser";
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
    <button class="nut" onclick="window.open('user-add.php', '_self')">Thêm Mới</button>
    <div class="giay_table">
        <table border="1">
            <tr>
                <th class="canhgiua">STT</th>
                <th class="canhgiua">Username</th>
                <th class="canhgiua">Họ Tên</th>
                <th class="canhgiua">Email</th>
                <th class="canhgiua">Điện Thoại</th>
                <th class="canhgiua" colspan="2">Chi Tiết</th>
            </tr>
            <?php
            $i = 1;
            foreach ($getgiay as $giay) {
            ?>
            <tr>
                <td class="canhgiua"><?= $i++ ?></td>
                <td class="canhgiua"><?= htmlspecialchars($giay['username']) ?></td>
                <td class="canhgiua"><?= htmlspecialchars($giay['HoTen']) ?></td>
                <td class="canhgiua"><?= htmlspecialchars($giay['Email']) ?></td>
                <td class="canhgiua"><?= htmlspecialchars($giay['DienThoai']) ?></td>
                <td class="canhgiua">
                    <button class="Xoa nut"
                        onclick="window.open('delete_giay.php?id=<?= $giay['user_id'] ?>','_self')">
                        Xoá
                    </button>
                </td>
                <td class="canhgiua">
                    <button class="CapNhat nut"
                        onclick="window.open('user-update.php?id=<?= $giay['user_id'] ?>','_self')">
                        Cập nhật
                    </button>
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
