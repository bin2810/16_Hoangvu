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
    include ("connect_pro.php");
    

    $sql = "SELECT * from tbloaisanpham";

    // $sql .= " order by HoTen ASC";
    $user = mysqli_query($conn , $sql);

?>
<body>
    <div class="big">
        <h2>Danh Sách loại sản phẩm bằng pro</h2>
        <a href="loaisanpham-add.php"> <button class="add">Thêm Mới</button></a>
        <div class="bang">
        <table border="1">
            <tr>
                <th>TT</th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Hình ảnh</th>
                <th colspan="2">Chi tiết</th>
            </tr>
            <?php
                if(mysqli_num_rows($user) > 0){
                    $i = 0;
                    while($us = mysqli_fetch_assoc($user)){
            ?>
            <tr>
                <td><?= $i?></td>
                <td><?= $us["MaLoai"]?></td>
                <td><?= $us["TenLoai"]?></td>
                <td><img src="../images/<?= $us["HinhAnh"]?>" alt=""></td>

                <td><button class="btnthem " onclick="window.open('loaisanpham-update.php?id=<?=$us['MaLoai']?>','_self')">Cập nhật </button></td>
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