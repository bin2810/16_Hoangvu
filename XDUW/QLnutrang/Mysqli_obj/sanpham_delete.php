<?php
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    include_once('connect_obj.php');

    $query = "DELETE FROM tbsanpham WHERE SanPham_id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            header('Location: sanpham.php');
            exit();
        } else {
            echo "KHÔNG Xoá Được .";
        }
        $stmt->close(); 
    } else {
        echo "Lỗi chuẩn bị truy vấn!";
    }
    $conn->close(); 
} 
?>
