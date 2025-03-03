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
    include("connect.php");

    $sql = "Select * from tbloaisanpham";
    $sql .= " order by TenLoai ASC";

    $sta = $conn -> prepare($sql);
    $sta -> execute();

    if($sta -> rowCount() > 0){
        $product = $sta -> fetchAll(PDO::FETCH_OBJ);
    }
    
?>
<body>
    <div class="big">
        <h2>Danh Sách loại sản phẩm</h2>
        <button class="btnthem" onclick="window.open('loaisanpham-add.php','_self')">Thêm mới</button>
        <div class="bang">
        <table border="1">
            <tr>
                <th>TT</th>
                <th>Tên loại</th>
                <th>Hình ảnh</th>
                <th colspan="2">Chi tiết</th>
            </tr>
            <?php
                $i=1;
                foreach($product as $sp){
            ?>
            <tr>
                <td><?=$i?> </td>
                <td><?=$sp -> TenLoai?></td>
                
                <td><img src="../images/<?=$sp -> HinhAnh?>" alt=""></td>

                <td><button class="btnthem ">Cập nhật </button></td>
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