<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="../css/dinhdang.css">
    <title>Document</title>
   
</head>
<body>
   <div class="yeucau">
  
    <div class="them">
        <form action="loaisanpham-add-xl.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend> <h3>THÊM LOẠI SẢN PHẨM</h3></legend>
                <label for="maloai">MÃ LOẠI:</label>
                <input type="text" name="maloai" size="20" placeholder="Mã Loại.."> 
                <label for="tenloai">TÊN LOẠI:</label>
                <input type="text" name="tenloai" size="20" placeholder="Tên Loại..">                
                    <br>
                    <button type="submit" name="ThemMoi" class="add">Thêm mới</button>
            </fieldset>          
                
        </form>
    </div>
   </div>
</body>
</html>