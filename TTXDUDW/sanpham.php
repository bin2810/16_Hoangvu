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

    $sql = "Select * from tbsanpham";
    $sql .= " order by TenSP ASC";

    $sta = $conn -> prepare($sql);
    $sta -> execute();

    if($sta -> rowCount() > 0){
        $product = $sta -> fetchAll(PDO::FETCH_OBJ);
    }
    
?>
<body>
    <div class="big">
        <h2>Danh sách sản phẩm</h2>
        <button class="btnthem">Thêm mới</button>
        <div class="bang">
        <table border="1">
            <tr>
                <th>TT</th>
                <th>Tên Loại</th>
                <th>Hình ảnh</th>
                <th colspan="2">Chi tiết</th>
            </tr>
            <?php
                $i=1;
                foreach($product as $sp){
            ?>
            <tr>
                <td><?=$i?> </td>
                <td><?=$sp -> TenSP?> </td>
                <!-- <td><?=$sp -> MoTa?></td>
                <td><?=$sp -> DonGia?></td> -->
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