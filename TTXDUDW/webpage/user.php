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

    $sql = "Select * from tbuser";
    $sql .= " order by HoTen ASC";

    $sta = $conn -> prepare($sql);
    $sta -> execute();

    if($sta -> rowCount() > 0){
        $user = $sta -> fetchAll(PDO::FETCH_OBJ);
    }

?>
<body>
    <div class="big">
        <h2>Danh Sách người dùng</h2>
        <button class="btnthem" onclick="window.open('user-add.php','_self')">Thêm mới</button>
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
            $i = 1;
            foreach($user as $us){
        ?>
            <tr>
                <td><?=$i?></td>
                <td><?= $us -> HoTen?></td>
                <td><?= $us -> DienThoai?></td>
                <td><?= $us -> DiaChi?></td>
                <td><button class="btnthem " onclick="window.open('user-update.php?id=<?=$us->user_id?>','_self')">Cập nhật</button></td>
                <td><button class="btnthem do">Xóa</button></td>
            </tr>
           <?php
           $i++;
           }
           ?> 
               
        </table>
        </div>
    </div>
</body>
<?php
    $conn = null;
?>
</html>