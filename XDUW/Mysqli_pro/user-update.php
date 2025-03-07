<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="../css/dinhdang.css">
    <title>Document</title>
</head>
<?php
if(isset($_GET['id'])){
    $userid = $_GET['id'];
    include("connect_pro.php");

    $sql = "SELECT * FROM tbuser WHERE user_id = ".$userid;
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $user = $result->fetch_object();
    }
?>
<body>
   <div class="yeucau">
    <div class="them">
        <form action="user-update-xuly.php" method="post">
            <fieldset>
                <legend> <h3>THÊM MỚI NGƯỜI DÙNG</h3></legend>
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" value="<?= $user->username ?>" size="20" placeholder="tên đăng nhập.."> 
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" value="<?= $user->password ?>" size="20" placeholder="mật khẩu..">
                <label for="HoTen">Họ tên:</label>
                <input type="text" name="HoTen" value="<?= $user->HoTen ?>" size="20" placeholder="họ tên..">
                <label for="NgaySinh">Ngày sinh:</label>
                <input type="date" name="NgaySinh" value="<?= $user->NgaySinh ?>" max="2007-12-31">
                
                <fieldset>
                <legend> Giới tính</legend>
                <input type="radio" name="GioiTinh" value="0" <?= $user->GioiTinh == '0' ? 'checked' : '' ?>>Nam 
                <input type="radio" name="GioiTinh" value="1" <?= $user->GioiTinh == '1' ? 'checked' : '' ?>>Nữ
                </fieldset>
                <br>   
                <label for="DiaChi">Địa chỉ:</label>
                <textarea name="DiaChi" cols="30" rows="10" placeholder="địa chỉ.."><?= $user->DiaChi ?></textarea>
                <label for="Email">Email:</label>
                <input type="text" name="Email" size="20" value="<?= $user->Email ?>" placeholder="email..">
                <label for="CCCD">CCCD:</label>
                <input type="number" name="CCCD" size="20" value="<?= $user->CMND ?>" placeholder="CCCD..">
                <label for="DienThoai">Số điện thoại:</label>
                <input type="number" name="DienThoai" size="20" value="<?= $user->DienThoai ?>" placeholder="điện thoại..">
                <br>
                <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                <button type="submit" name="ThemMoi" class="add">Cập Nhật</button>
            </fieldset>          
        </form>
    </div>
   </div>
</body>
<?php
}
$conn->close();
?>
</html>
