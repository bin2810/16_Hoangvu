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


    $sql = "SELECT * from tb_user";

    $sql .= " order by Fullname ASC";
    $user = $conn -> query($sql);
?>
<body>
    <div class="big">
        <h2>Danh Sách người dùng Plantiquee</h2>
        <button class="btnthem" onclick="window.open('user-add.php ','_self')">Thêm Mới</button>
        <div class="bang">
        <table border="1">
            <tr>
                <th>TT</th>
                <th>Hình ảnh</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Giới tính</th>
                <th>Vai trò</th>
                <th colspan="2">Chi tiết</th>
            </tr>
            <?php
                if($user -> num_rows > 0){
                    $i = 1;
                    while($us = $user -> fetch_assoc()){
            ?>
            <tr>
                <td><?= $i?></td>
                <td><img src="../images/<?=$us['Hinhanh']?>" alt=""></td>
                <td><?= $us["Username"]?></td>
                <td><?= $us["Fullname"]?></td>
                <td><?= $us["GioiTinh"]?></td>
                <td><?= $us["VaiTro"]?></td>
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