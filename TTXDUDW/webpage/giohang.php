<?php
session_start();
?>
<html>
<head>    
    <title>Gio hang</title>
    <link href="../css/giohang.css" rel="stylesheet" type="text/css">
   
    <style>
        #tb_spham img{
            height:100px;
            width: 80px;
        }
    </style>
</head>
<?php
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']= [];        
    }
    if (isset($_GET['action'])){
        function update_cart($add = false){
            foreach($_POST['th_SoLuong'] as $id => $SoLuong){
                if($SoLuong == 0){
                    unset($_SESSION['cart'][$id]);
                }else{
                    if($add == true){
                        $_SESSION['cart'][$id] += $SoLuong;
                    }else{
                        $_SESSION['cart'][$id] = $SoLuong;
                    }
                }
            }
        }
            switch ($_GET['action']) {
                case 'add':
                    update_cart(true);
                    header("Location: giohang.php");
                    exit();                
                    break;
                case 'del':
                    $id = $_GET['id'];
                    if (isset($_SESSION['cart'][$id])) {
                        unset($_SESSION['cart'][$id]);
                    }
                    header("Location: giohang.php");
                    exit();
                    break;
                case 'submit':
                    if (isset($_POST['th_CapNhat'])) {
                        update_cart();
                        header("Location: giohang.php");
                    }
                    exit();
                    break;
            
            }
        }
        if(!empty($_SESSION['cart'])){
            include ('connect.php');
            $sphs = implode("," , array_keys($_SESSION['cart']));
            $sql = 'SELECT * from tbsanpham WHERE SanPham_id IN ('.$sphs.')';
            $sta = $conn -> prepare($sql);
            $sta -> execute();
        }

?>
<body>
    <div id="main_giohang">
        
        <div class="trangchu"><a href="sp_card.php">Sản phẩm</a></div>
        <h2>Giỏ hàng</h2>
        <div id="giohang">
            <form action="giohang.php?action=submit" method="post">
                <div id="spham">
                <table id="tb_spham" border="1">
                    <tr id="hg_tieude">
                        <th>TT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phảm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá<br> <span class="vnd"> (vnđ)</span></th>
                        <th>Thành tiền<br> <span class="vnd">(vnđ)</span></th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                    if($sta -> rowCount()>0){
                        $spham = $sta -> fetchALL(PDO::FETCH_OBJ);
                        $i = 1;
                        $tongtien = 0;
                        foreach ($spham as $sp){
                            $soluong = $_SESSION['cart'][$sp->SanPham_id];
                            $thanhtien = $soluong * $sp->DonGia;
                            $tongtien += $thanhtien
                    ?>
                    <tr>
                        <td class="canhgiua"><?=$i?></td>
                        <td class="TenSP"><?= $sp -> TenSP?></td>
                        <td class="canhgiua"><img src="../images/<?=$sp -> HinhAnh?>" class="hinhsp"></td>
                        <td class="canhgiua">
                            <div class="giua_o">
                                <input type="number" min="0"  name="th_SoLuong[<?=$sp -> SanPham_id?>]" value="<?=$soluong?>" size="10" class="soluong">
                            </div>
                        </td>
                        <td class="canhphai chudo"><?= number_format($sp->DonGia, 0, ".", ",") ?></td>
                        <td class="canhphai"><?= number_format($thanhtien, 0, ".", ",") ?></td>
                        <td class="canhgiua"><a href="giohang.php?action=del&id=<?=$sp -> SanPham_id?>" class="btn btn-danger">Xóa</a></td>
                    </tr>  
                            <?php
                            $i++;
                                }
                            }
                            ?>
                    <tr id="tongtien">
                    <td colspan="5" class="canhgiua">Tổng tiền</td>
                        <td class="canhphai"><?= number_format($tongtien, 0, ".", ",") ?></td>
                        <td>&nbsp;</td>
                       
                    </tr>
                  
                </table>
                </div>
                <div id="capnhat">
                    <button type="submit"  name="th_CapNhat" class="btn btn-primary">Cập nhật</button>
                </div>
                <div id="khachhang">
                    <table id="tt_KH">
                        <tr>
                            <td class="canhphai">Khách hàng:</td>
                            <td><input type="text" name="th_TenKH" id="th_TenKH" size="30"></td>
                        </tr>                        
                        <tr>
                            <td class="canhphai">Số điện thoại:</td>
                            <td><input type="text" name="th_SoDT" id="th_SoDT" size="30"></td>
                        </tr>
                        <tr>
                            <td class="canhphai">Địa chỉ:</td>
                            <td><input type="text" name="th_DiaChi" id="th_DiaChi" size="70"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" name="th_DatHang" onclick="" class="btn btn-warning" style="margin-top:20px;">Đặt hàng</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
       
    </div>
</body>

</html>