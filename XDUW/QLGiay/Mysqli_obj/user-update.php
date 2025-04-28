<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="../css/dinhdang.css">
    <link rel="stylesheet" href="../css/dinhdang copy.css">
    <title>Document</title>
</head>
<?php
if(isset($_GET['id'])){
    $userid = $_GET['id'];
    include("connect.php");

    $sql = "SELECT * FROM tbuser WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

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
                
                <br>   
                <label for="DiaChi">Địa chỉ:</label>
                <textarea name="DiaChi" cols="30" rows="10" placeholder="địa chỉ.."><?= $user->DiaChi ?></textarea>
                <label for="Email">Email:</label>
                <input type="text" name="Email" size="20" value="<?= $user->Email ?>" placeholder="email..">
                <label for="CCCD">CCCD:</label>
                <input type="number" name="CCCD" size="20" value="<?= $user->CMND ?>" placeholder="CCCD..">
                <label for="DienThoai">Số điện thoại:</label>
                <input type="number" name="DienThoai" size="20" value="<?= $user->DienThoai ?>" placeholder="điện thoại..">
                <legend> Vai trò</legend>
                <input type="radio" name="vaitro" value="0" <?= $user->role== '0' ? 'checked' : '' ?>>admin
                <input type="radio" name="vaitro" value="1" <?= $user->role== '1' ? 'checked' : '' ?>>user
                <br>
                <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                <button type="submit" name="ThemMoi" class="add">Cập Nhật</button>
            </fieldset>          
        </form>
    </div>
   </div>
</body>
<?php
    $stmt->close();
}
$conn->close();
?>
</html>
