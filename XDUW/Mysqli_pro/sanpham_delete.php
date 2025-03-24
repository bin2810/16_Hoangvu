<?php
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    include_once('connect_pro.php');
    $query = "DELETE FROM tbsanpham WHERE SanPham_id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $userId);
        
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: sanpham.php');
            exit();
        } else {
            echo "XOÁ KHÔNG THÀNH CÔNG! Sản phẩm có thể không tồn tại.";
        }
    }
    $conn->close();
}
?>