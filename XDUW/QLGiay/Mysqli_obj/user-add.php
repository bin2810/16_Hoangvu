<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="../css/dinhdang.css">
    <link rel="stylesheet" href="../css/dinhdang copy.css">
    <link rel="stylesheet" href="../css/main.css">
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
                <label for="NgaySinh">Ngày sinh:</label>
                <input type="date" name="NgaySinh" max="2007-12-31">
                <br>   
                <label for="DiaChi">Địa chỉ:</label>
                <textarea name="DiaChi" cols="30" rows="10" placeholder="địa chỉ.."></textarea>
                <label for="Email">Email:</label>
                <input type="text" name="Email" size="20" placeholder="email..">
                <label for="CCCD">CCCD:</label>
                <input type="number" name="CCCD" size="20" placeholder="CCCD..">
                <label for="DienThoai">Số điện thoại:</label>
                <input type="number" name="DienThoai" size="20" placeholder="điện thoại..">
                <fieldset>
                <legend> Vai trò</legend>
                <input type="radio" name="vaitro" value="0" checked>admin
                <input type="radio" name="vaitro" value="1">user
                </fieldset>
                    <br>
                    <button type="submit" name="ThemMoi" class="add">Thêm mới</button>
            </fieldset>          
                
        </form>
    </div>
   </div>
</body>
</html>