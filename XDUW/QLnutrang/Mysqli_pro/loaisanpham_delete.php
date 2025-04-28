<?php
if (isset($_GET['id'])) {
    $productlist = $_GET['id'];
    include_once('connect_pro.php');
    $query1 = "SELECT 1 FROM tbsanpham WHERE MaLoai = ? LIMIT 1";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param('s', $productlist);
    $stmt1->execute();
    $stmt1->store_result();
    if ($stmt1->num_rows > 0) {
        echo "Khong Duoc Xoa";
    } else {
        $query = "DELETE FROM tbloaisanpham WHERE MaLoai = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $productlist);
        
        if ($stmt->execute()) {
            header('Location: loaisanpham.php');
            exit();
        } else {
            echo "Xóa thất bại: " . $stmt->error;
        }
    }
    // $stmt1->close();
    $conn->close();
}
?>
