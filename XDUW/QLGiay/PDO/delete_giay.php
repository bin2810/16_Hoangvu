<?php
  if(isset($_GET['id'])){
    $id_giay = $_GET['id'];
    include_once('connect.php');
    $query1 = 'SELECT * FROM tbloaigiay WHERE MaLoai = :MaLoai';
    $stmt1 = $conn->prepare($query1);
    $stmt1->bindParam(':MaLoai', $id_giay, PDO::PARAM_INT);
    $stmt1->execute();
    if($stmt1 -> rowCount() > 0){
    //   echo "KHông được phép xóa sản phẩm";
      header("location: giay3.php?error=loi");
      exit();

    }else{
      $query = 'DELETE FROM tbgiay WHERE SanPham_id = :id';
      $delete = $conn->prepare($query);
      $delete->bindParam(':id', $id_giay);
      $delete->execute();
      header('Location: giay3.php');
    }
  
    } else {
        echo "xoa that bai";
    }
?>