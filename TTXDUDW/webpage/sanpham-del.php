<?php
  if(isset($_GET['id'])){
    $userId = $_GET['id'];
    include_once('connect.php');
        $query = 'DELETE FROM tbsanpham WHERE SanPham_id = :id';
        $delete_user = $conn->prepare($query);
        $delete_user->bindParam(':id', $userId, PDO::PARAM_INT);
        $delete_user->execute();
        if($delete_user){
          header('Location: sanpham.php');
        }else{
          echo 'XOÁ KHÔNG THÀNH CÔNG';
        }
  }    
?>
