<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dinhdang.css">
    <title>Document</title>
</head>
<?php
if (isset($_GET['id'])) {
    $userid = $_GET['id'];
    include("connect_obj.php");

    $sql = "SELECT * FROM tbkhachhang WHERE KhachHang_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_object();
        } else {
            echo "Không tìm thấy bản ghi nào.";
        }
    } else {
        echo "Lỗi: " . $stmt->error;
    }
?>
<body>
   <div class="yeucau">
    <div class="them">
        <form action="khachhang-update-xuly.php" method="post">
            <fieldset>
                <legend> <h3>CẬP NHẬT KHÁCH HÀNG</h3></legend>
                <label for="HoTen">Tên KH:</label>
                <input type="text" name="HoTen" value="<?= $user->TenKH ?>" size="20" placeholder="họ tên..">
                <label for="DiaChi">Địa chỉ:</label>
                <textarea name="DiaChi" cols="30" rows="10" placeholder="địa chỉ.."><?= $user->DiaChi ?></textarea>
                <label for="DienThoai">Số điện thoại:</label>
                <input type="number" name="DienThoai" size="20" value="<?= $user->SoDT ?>" placeholder="điện thoại..">
                <br>
                <input type="hidden" name="kh_id" value="<?= $user->KhachHang_id ?>">
                <button type="submit" name="ThemMoi" class="add">Cập Nhật</button>
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
