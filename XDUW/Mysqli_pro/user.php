<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<?php
    // B1: Kết nối CSDL
    include('connect_pro.php');

    $sql = "SELECT * from tbuser";

    $sql .= " order by HoTen ASC";
    $user = mysqli_query($conn,$sql);

?>
<body>
    <div class="big">
        <h2>Danh Sách người dùng</h2>
        <button class="add" onclick="window.open('user-add.php ','_self')">Thêm Mới</button>
        <div class="bang">
        <table border="1">
            <tr>
                <th>TT</th>
                <th>Họ tên</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th colspan="2">Chi tiết</th>
            </tr>
            <?php
                if(mysqli_num_rows($user) > 0){
                    $i = 0;
                    while($us = mysqli_fetch_assoc($user)){
            ?>
            <tr>
                <td><?= $i?></td>
                <td><?= $us["HoTen"]?></td>
                <td><?= $us["DienThoai"]?></td>
                <td><?= $us["DiaChi"]?></td>
                <td><button class="btnthem ">Cập nhật </button></td>
                <td><button class="btnthem do">Xóa</button></td>
            </tr>
            
                <?php
                $i++;
            }
                }
                ?>
        </table>
        </div>
    </div>
</body>
<?php
    mysqli_close($conn);
?>
</html>