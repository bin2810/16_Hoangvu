<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<?php
include("connect.php");
   

    $sql = "SELECT * from tb_danhmuc_con";

    // $sql .= " order by HoTen ASC";
    $user = $conn -> query($sql);
?>
<body>
    <div class="big">
        <h2>Danh Sách loại sản phẩm cha Plantiquee</h2>
        <button class="btnthem" onclick="window.open('loaisanpham-add.php ','_self')">Thêm Mới</button>
        <div class="bang">
        <table border="1">
            <tr>
                <th>TT</th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th colspan="2">Chi tiết</th>
            </tr>
            <?php
                if($user -> num_rows > 0){
                    $i = 0;
                    while($us = $user -> fetch_assoc()){
            ?>
            <tr>
                <td><?= $i?></td>
                <td><?= $us["MADM_con"]?></td>
                <td><?= $us["TENDM_con"]?></td>

                <td><button class="btnthem " >Cập nhật </button></td>
                <td><button class="btnthem do" >Xóa</button></td>
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