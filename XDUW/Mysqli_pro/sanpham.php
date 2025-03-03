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
    

    $sql = "SELECT * from tbsanpham";

    $sql .= " order by TenSP ASC";
    $user = mysqli_query($conn,$sql);

?>
<body>
    <div class="big">
        <h2>Danh Sách loại sản phẩm</h2>
        <button class="add" onclick="window.open('sanpham-add.php ','_self')">Thêm Mới</button>
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
                if(mysqli_num_rows($user) > 0){
                    $i = 0;
                    while($us = mysqli_fetch_assoc($user)){
            ?>
            <tr>
                <td><?= $i?></td>
                <td><img src="../images/<?= $us["HinhAnh"]?>" alt=""></td>
                <td><?= $us["TenSP"]?></td>
                <td><?= $us["DonGia"]?></td>

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