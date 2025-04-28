
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

<body>
    <div class="sp">
  
     <div class="card-group">
  
     <?php

        include("connect.php");
        $sl_page = 5;
        $sql = "Select * from tbsanpham";
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
<?php
            foreach ($sanpham as $sp) {
        ?>
       <form action="giohang.php?action=add" method="post">
    <div class="card">
        
        <div class="sphinh">
            <img src="../images/<?=$sp -> HinhAnh?>" class="card-img-top">
        </div>
        
        <div class="card-body">
            <h5 class="card-title"><?=$sp -> TenSP?></h5>
            <div class="card-text">
            <?=number_format($sp -> DonGia , 0 ,"." , ",")?>
            </div>
            <div class="pad"><input type="text" name="th_SoLuong[<?=$sp -> SanPham_id?>]" id="th_soluong" value="1" size="2"></div>
            <div class="card-text">
            <button type="submit" name="th_Mua" class="btn btn-primary">Mua ngay</button>
            </div>
        </div>
    </div>
        </form>
      <?php
            }
        ?>
        </div>
        </div>
        

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
  
</body>

</html>
