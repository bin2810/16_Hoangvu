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
    include("connect.php");

    $sql_lsp = "SELECT * from tbloaisanpham";
    $sql_sp = "SELECT * from tbsanpham";
    if(isset($_POST['btntim'])){
        $maloai = $_POST['sellsp'];
        $sql_sp .= " where MaLoai ='".$maloai."'";
    }
        $sql_sp .= " order by TenSP ASC";

    $lsp = $conn -> prepare($sql_lsp);
    $lsp -> execute();
    
    if($lsp -> rowCount() > 0){
        $loaisp = $lsp -> fetchAll(PDO::FETCH_OBJ);
    }
    $sp = $conn -> prepare($sql_sp);
    $sp -> execute();
    
    if($sp -> rowCount() > 0){
        $sanpham = $sp -> fetchAll(PDO::FETCH_OBJ);
    }
?>
<body>
    <div class="big">
        <h2>Danh Sách lọc sản phẩm</h2>
        
        <form action="locsanpham.php" method="post">
            <select name="sellsp" id="" class="boloc">
                <option value="">Chọn một danh mục</option>
                <?php
                   foreach ($loaisp as $lspham ) {
                    $selected = (isset($_POST['sellsp']) && $_POST['sellsp'] == $lspham->MaLoai) ? "selected" : "";
                ?>
                <option value="<?= $lspham->MaLoai ?>" <?= $selected ?>><?= $lspham->TenLoai ?></option>
                <?php
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
                $i =1;
                if(isset($sanpham)){
                foreach ($sanpham as $sanp) {
            ?>
            <tr>
                <td><?= $i?></td>
                <td><img src="../images/<?= $sanp ->HinhAnh?>" alt=""></td>
                <td><?= $sanp ->TenSP?></td>
                <td><?= $sanp ->DonGia?></td>

                <td><button class="btnthem">Cập nhật </button></td>
                <td><button class="btnthem do">Xóa</button></td>
            </tr>
            
                <?php
                $i++;
            }}
                
                ?>
        </table>
        </div>
    </div>
</body>
<?php
    $conn = null;
?>
</html>