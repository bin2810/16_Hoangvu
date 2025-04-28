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
    $hostname = "localhost";
    $database = "db_trangsuc";
    $user = "root";
    $pass = "";

    $conn = new mysqli($hostname,$user,$pass,$database);

    $sql = "SELECT * from tbKhachhang";

    // $sql .= " order by HoTen ASC";
    $user = $conn -> query($sql);
?>
<body>
    <div class="big">
        <h2>Danh Sách khách hàng</h2>
        <button class="btnthem">Thêm mới</button>
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
                if($user -> num_rows > 0){
                    $i = 0;
                    while($us = $user -> fetch_assoc()){
            ?>
            <tr>
                <td><?= $i?></td>
                <td><?= $us["TenKH"]?></td>
                <td><?= $us["DiaChi"]?></td>
                <td><?= $us["SoDT"]?></td>

                <td><button class="btnthem " onclick="window.open('Khachhang-update.php?id=<?=$us['KhachHang_id']?> ','_self')">Cập nhật </button></td>
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
    $conn -> close();
?>
</html>