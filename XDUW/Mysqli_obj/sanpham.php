<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/dinhdang.css">

    <title>Danh Sách Sản Phẩm</title>
</head>

<?php
// B1: Kết nối CSDL
include("connect_obj.php");

$sp_trang = 5;

// Lấy tổng số sản phẩm
$sql_count = "SELECT COUNT(*) AS total FROM tbsanpham";
$result_count = $conn->query($sql_count);
$row = $result_count->fetch_assoc();
$tong_sp = $row['total'];

$tong_trang = ceil($tong_sp / $sp_trang);
$trang_ht = min($tong_trang, max(1, isset($_GET['page']) ? intval($_GET['page']) : 1));
$vtbd = ($trang_ht - 1) * $sp_trang;

// Truy vấn sản phẩm có phân trang
$sql = "SELECT * FROM tbsanpham ORDER BY TenSP ASC LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $vtbd, $sp_trang);
$stmt->execute();
$user = $stmt->get_result();
?>

<body>
    <div class="big">
        <h2>Danh Sách Sản Phẩm</h2>
        <button class="btnthem" onclick="window.open('sanpham-add.php ','_self')">Thêm Mới</button>
        <div class="bang">
        <table border="1">
            <tr>
                <th>TT</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th colspan="2">Chi tiết</th>
            </tr>
            <?php
                if ($user->num_rows > 0) {
                    $i = $vtbd + 1; // Đánh số thứ tự đúng vị trí trang
                    while ($us = $user->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $i ?></td>
                <td><img src="../images/<?= htmlspecialchars($us["HinhAnh"]) ?>" alt=""></td>
                <td><?= htmlspecialchars($us["TenSP"]) ?></td>
                <td><?= number_format($us["DonGia"]) ?> VND</td>

                <td><button class="btnthem" onclick="window.open('sanpham_update.php?id=<?= $us['SanPham_id'] ?>','_self')">Cập nhật</button></td>
                <td><button class="btnthem do" onclick="window.location.href='sanpham_delete.php?id=<?=$us['SanPham_id']?>'">Xóa</button></td>
            </tr>
            <?php
                        $i++;
                    }
                }
            ?>
        </table>

        <!-- Phân trang -->
        <div class="phantrang">
            <?php
            for ($so = 1; $so <= $tong_trang; $so++) {
                if ($so != $trang_ht) {
            ?>
                    <a href="?page=<?= $so ?>"><?= $so ?></a>
            <?php
                } else {
            ?>
                    <span class="current-page"><?= $so ?></span>
            <?php
                }
            }
            ?>
        </div>
        </div>
    </div>
</body>

<?php
$conn->close();
?>

</html>
