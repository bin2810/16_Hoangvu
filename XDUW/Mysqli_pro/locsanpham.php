<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<?php
    // B1: Kết nối CSDL
    $hostname = "localhost";
    $database = "db_trangsuc";
    $user = "root";
    $pass = "";

    $conn = new mysqli($hostname,$user,$pass,$database);

    $sql_lsp = "SELECT * from tbloaisanpham";
    $sql_sp = "SELECT * from tbsanpham";
    
    if(isset($_POST['btntim'])){
        $maloai = $_POST['sellsp'];
        $sql_sp .= " where MaLoai ='".$maloai."'";
    }
        $sql_sp .= " order by TenSP ASC";

    $loaisp = $conn -> query($sql_lsp);
    $sanpham = $conn -> query($sql_sp);
?>
<body>
    <div class="big">
        <h2>Danh Sách lọc sản phẩm</h2>
        
        <form action="locsanpham.php" method="post">
            <select name="sellsp" id="" class="boloc">
                <option value="">Chọn một danh mục</option>
                <?php
                    if($loaisp -> num_rows > 0){
                        while($lsp = $loaisp->fetch_assoc()) {
                ?>
            
                <option value="<?= $lsp["MaLoai"]?>"><?= $lsp["TenLoai"]?></option>
                <?php
                    }
                }
                ?>
            </select>
           
            <button class="btnthem" name="btntim">Tìm sản phẩm</button>
        </form>
        
        <div class="bang">
        <table border="1">
            <tr>
                <th>TT</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th colspan="2">Chi tiết</th>
            </tr>
            <?php
                if($sanpham -> num_rows > 0){
                    $i = 0;
                    while($sp = $sanpham -> fetch_assoc()){
            ?>
            <tr>
                <td><?= $i?></td>
                <td><img src="../images/<?= $sp["HinhAnh"]?>" alt=""></td>
                <td><?= $sp["TenSP"]?></td>
                <td><?= $sp["DonGia"]?></td>

                <td><button class="btnthem">Cập nhật </button></td>
                <td><button class="btnthem do">Xóa</button></td>
            </tr>
            
                <?php
                $i++;
            }
                }
                ?>
        </table>
        </div>
    </div>
</body>
<?php
    $conn -> close();
?>
</html>