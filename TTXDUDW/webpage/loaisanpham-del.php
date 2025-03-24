<?php if (isset($_GET['id'])) {
  $product = $_GET['id'];
  include_once('connect.php');
  $query1 = 'SELECT * FROM tbsanpham WHERE MaLoai = :MaLoai';
  $stmt1 = $conn->prepare($query1);
  $stmt1->bindParam(':MaLoai', $product, PDO::PARAM_INT);
  $stmt1->execute();
  if($stmt1 -> rowCount() > 0){
    echo "Khong Duoc Phep Xoa";
  }else{
    $query = 'DELETE FROM tbloaisanpham WHERE MaLoai = :MaLoai';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':MaLoai', $product, PDO::PARAM_INT);
    $stmt->execute();
    header('Location: loaisanpham.php');
  }
 
} else {
  echo "xoa that bai";
}
?>