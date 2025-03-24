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
$sl_page = 5;
$sql = "Select * from tbsanpham";
// $sql .= " order by TenSP ASC";
$sta = $conn -> prepare($sql);
$sta -> execute();
$sanpham = $sta -> fetchAll(PDO::FETCH_OBJ);
$tong_sp = count($sanpham);

$tong_page = ceil($tong_sp/$sl_page);

$page_ht = min($tong_sp, max(1, isset($_GET['page']) ? $_GET['page'] : 1));

$vtbd = ($page_ht - 1) * $sl_page;

$sql .= " limit ".$vtbd.",".$sl_page;
$sta = $conn -> prepare($sql);
$sta -> execute();
$sanpham = $sta -> fetchAll(PDO::FETCH_OBJ);

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
    <td><button class="delete" onclick="window.open('sanpham-del.php?id=<?=$sp-> SanPham_id ?> ','_self')">Xóa</button></td>
  </tr>
  <?php
  $i++;
  }
  
  ?>
</table>

<div class="phantrang">
<?php
  for($so = 1; $so <= $tong_page; $so++){
    if($so != $page_ht){
?>
  <a href="?page=<?=$so?>"><?=$so?></a>
<?php
  }else{
?>
<span><?=$so?></span>
<?php
  }
  }
?>
</div>
</div>

<?php
//B5 Đóng kết nối CSDL  
$conn = null;
?>


</body>
</html>


