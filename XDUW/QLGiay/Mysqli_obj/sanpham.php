<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dinhdang.css">
</head>
<body>
    <?php
    include("connect.php");

    $sl_product_page = 5;
    $query = "SELECT SanPham_id, TenSP, DonGia, TenLoai, g.HinhAnh FROM tbgiay g, tbloaigiay lg WHERE g.MaLoai = lg.MaLoai";

    $result = $conn->query($query);

    if($result->num_rows > 0){
        $getgiay = $result->fetch_all(MYSQLI_ASSOC);
    }

    $sum_product = count($getgiay);
    $sum_page = ceil($sum_product / $sl_product_page);
    
    $page_show = min($sum_product, max(1 , isset($_GET['page']) ? $_GET['page'] : 1));
    
    $vtbd = ($page_show - 1) * $sl_product_page;
    
    $query .= " LIMIT ".$vtbd.",".$sl_product_page;
    $result = $conn->query($query);
    $getgiay = $result->fetch_all(MYSQLI_ASSOC);
    ?>

    <div class="big">
    <?php
    // Xử lý lỗi nếu có
    if(isset($_GET['error'])){
        $error = 'Không thể xóa sản phẩm =)))';
    }
    ?>
    <div class="loi">
        <p class="error" id="error"><?=$error ?? ""?></p>
    </div>
    <script>
        const error = document.getElementById('error');
        if (error && error.textContent.trim() !== "") {
            setTimeout(() => {
                error.style.display = "none";
            }, 3000); // 3 giây sau ẩn
        }
    </script>

    <h1 class="canhgiua">DANH SÁCH SẢN PHẨM</h1>
    <button class="nut" onclick="window.open('sanpham-add.php', '_self')">Thêm Mới</button>
    <div class="giay_table">
        <table border="1">
            <tr>
                <th class="canhgiua">STT</th>
                <th class="canhgiua">Hình Ảnh</th>
                <th class="canhgiua">Tên Sản Phẩm</th>
                <th class="canhgiua">Loại Sản Phẩm</th>
                <th class="canhgiua">Đơn Giá</th>
                <th class="canhgiua" colspan="2">Chi Tiết</th>
            </tr>
            <?php
            $i = $vtbd + 1;
            foreach ($getgiay as $giay) {
            ?>
            <tr>
                <td class="canhgiua"><?=$i++?></td>
                <td class="canhgiua"><img class="hinhsp" src="../images/<?=$giay['HinhAnh']?>" alt=""></td>
                <td class="canhgiua"><?=$giay['TenSP']?></td>
                <td class="canhgiua"><?=$giay['TenLoai']?></td>
                <td class="canhgiua"><?=number_format($giay['DonGia'],0,",",".")?></td>
                <td class="canhgiua"><button class="Xoa nut" onclick="window.open('delete_giay.php?id=<?=$giay['SanPham_id']?> ','_self')">xoá</button></td>
                <td class="canhgiua"><button class="CapNhat nut" onclick="window.open('sanpham_update.php?id=<?=$giay['SanPham_id']?> ','_self')">Cập nhật</button></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div class="phantrang">
        <?php
        for ($i = 1; $i <= $sum_page; $i++) { 
            if($i != $page_show){
        ?>
        <span><a href="?page=<?=$i?>"><?=$i?></a></span>
        <?php
            } else {
        ?>
        <span><?=$i?></span>
        <?php
            }
        }
        ?>
    </div>
    </div>
