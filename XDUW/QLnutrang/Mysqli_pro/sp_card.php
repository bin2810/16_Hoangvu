
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/card.css">
    <style>
        .sp, .phantrang{
            display: flex;
            justify-content: center;
        }
        .phantrang a{
            padding:5px;
           
            text-decoration:none;
           
        }
        .card{
            margin:5px;
            
        }
        .card img{
            height:100px;
            width: 80px;
        }
        .card button{
            margin:5px;
        }
        .sphinh{
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<?php
include_once('connect_pro.php');

$sp_trang = 5;

// Lấy tổng số sản phẩm
$sql = "SELECT * FROM tbsanpham";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result);
$tong_sp = count($row);

$tong_trang = ceil($tong_sp / $sp_trang);
$trang_ht = min($tong_trang, max(1, isset($_GET['page']) ? $_GET['page'] : 1));
$vtbd = ($trang_ht - 1) * $sp_trang;

// Truy vấn sản phẩm có phân trang
$sql = "SELECT * FROM tbsanpham ORDER BY TenSP ASC LIMIT $vtbd, $sp_trang";
$result = mysqli_query($conn, $sql);
$sanpham = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<body>
    <div class="sp">
  
     <div class="card-group">
    <?php
        if (!empty($sanpham)) {
                $i = $vtbd + 1; 
                foreach ($sanpham as $sp) {
    ?>
       <form action="giohang.php?action=add" method="post">
    <div class="card">
        <div class="sphinh">
            <img src="../images/<?=$sp['HinhAnh']?>" class="card-img-top">
        </div>
        
        <div class="card-body">
            <h5 class="card-title"><?=$sp['TenSP']?></h5>
            <div class="card-text"><?=number_format($sp['DonGia'] , 0 ,"." , ",")?></div>
            <div class="pad"><input type="text" name="th_SoLuong[<?=$sp['SanPham_id']?>]" id="th_soluong" value="1" size="2"></div>
            <div class="card-text">
            <button type="submit" name="th_Mua" class="btn btn-primary">Mua ngay</button>
            </div>
        </div>
    </div>
        </form>
    <?php
                }
            }
    ?>
        </div>
        </div>


        <div class="phantrang">
            <?php
            for($so = 1; $so <= $tong_trang; $so++){
                if($so != $trang_ht){
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
        
  
</body>

</html>
