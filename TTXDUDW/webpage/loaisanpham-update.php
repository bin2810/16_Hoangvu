<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="../css/dinhdang.css">
    <title>Document</title>
   
</head>
<?php
    if(isset($_GET['id'])){
    $maloai = $_GET['id'];

    include("connect.php");

    $sql = "Select * from tbloaisanpham";
    $sql .= " WHERE MaLoai ='".$maloai."'";

    $sta = $conn -> prepare($sql);
    $sta -> execute();

    if($sta -> rowCount() > 0){
        $product = $sta -> fetch(PDO::FETCH_OBJ);
    }
    
?>
<body>
   <div class="yeucau">
  
    <div class="them">
        <form action="loaisanpham-update-xuly.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend> <h3>THÊM LOẠI SẢN PHẨM</h3></legend>
                <label for="tenloai">TÊN LOẠI:</label>
                <input type="text" name="tenloai" value="<?= $product -> TenLoai?>" size="20" placeholder="Tên Loại..">
                <label for="hinhanh">HÌNH ẢNH:</label>
                <input type="file" name="hinhanh" size="20" >
                <input type="hidden" name="maloai1" value="<?= $product -> MaLoai?>">
                    <br>
                    <button type="submit" name="ThemMoi" class="add">Thêm mới</button>
            </fieldset>          
                
        </form>
    </div>
   </div>
</body>
<?php
    }
?>
</html>