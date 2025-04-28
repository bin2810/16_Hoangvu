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

    // Truy vấn lấy thông tin sản phẩm từ database
    $query = "SELECT TenSP, DonGia, TenLoai, g.HinhAnh FROM tbgiay g, tbloaigiay lg WHERE g.MaLoai = lg.MaLoai ORDER BY TenSP ASC";
    
    // Thực thi truy vấn
    $result = $conn->query($query);

    if($result->num_rows > 0){
        // Lấy tất cả dữ liệu vào mảng
        $getgiay = $result->fetch_all(MYSQLI_ASSOC);
    }
    ?>
    
    <div class="big">
        <h1 class="canhgiua">DANH SÁCH SẢN PHẨM</h1>
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
                $i = 1;
                // Duyệt qua từng sản phẩm
                foreach ($getgiay as $giay) {
                ?>
                <tr>
                    <td class="canhgiua"><?=$i++?></td>
                    <td class="canhgiua"><img class="hinhsp" src="../images/<?=$giay['HinhAnh']?>" alt=""></td>
                    <td class="canhgiua"><?=$giay['TenSP']?></td>
                    <td class="canhgiua"><?=$giay['TenLoai']?></td>
                    <td class="canhgiua"><?=number_format($giay['DonGia'], 0, ",", ".")?></td>
                    <td class="canhgiua"><button class="Xoa nut">xoá</button></td>
                    <td class="canhgiua"><button class="CapNhat nut">Cập nhật</button></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>

    </div>
</body>
</html>
