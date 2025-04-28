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
        <form action="user-add-xuly.php" method="post">
            <fieldset>
                <legend> <h3>THÊM MỚI NGƯỜI DÙNG</h3></legend>
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" size="20" placeholder="tên đăng nhập.."> 
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" size="20" placeholder="mật khẩu..">
                <label for="HoTen">Họ tên:</label>
                <input type="text" name="HoTen" size="20" placeholder="họ tên..">
                <label for="Email">Email:</label>
                <input type="text" name="Email" size="20" placeholder="email..">
                    <br>
                    <button type="submit" name="ThemMoi" class="add">Thêm mới</button>
            </fieldset>          
                
        </form>
    </div>
   </div>
</body>
</html>