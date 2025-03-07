<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/dinhdang.css">
    <title>Document</title>
</head>

<?php
//B1 Kết nối CSDL
include("connect.php");

$sql = "Select * from tbsanpham";
$sql .= " order by TenSP ASC";


$sta = $conn -> prepare($sql);
$sta -> execute();

if($sta -> rowCount()){
    $sanpham = $sta -> fetchAll(PDO::FETCH_OBJ);
}

?>

<body>

<div class="big">
    <h2> Danh Sách Sản Phẩm</h2>
        <button class="add" onclick="window.open('sanpham_add.php ','_self')">Thêm Mới</button>
<table>
  <tr>
    <th>TT</th>
    <th>Tên Loại</th>
    <th>Hình Ảnh</th>
    <th colspan ="2" >Chi Tiết</th>
  </tr>
  <?php
  $i = 1;
  foreach($sanpham as $sp){
  ?>
  <tr>
    <td><?= $i ?></td>
    <td><?=$sp -> TenSP ?></td>
    <td><img src="../images/<?=$sp->HinhAnh ?>"alt=""></td>
    <td><button class="update" onclick="window.open('sanpham_update.php?id=<?=$sp-> SanPham_id ?> ','_self')">Cập Nhật</button></td>
    <td><button class="delete">Xóa</button></td>
  </tr>
  <?php
  $i++;
  }
  
  ?>
</table>
</div>

<?php
//B5 Đóng kết nối CSDL  
$conn = null;
?>


</body>
</html>


