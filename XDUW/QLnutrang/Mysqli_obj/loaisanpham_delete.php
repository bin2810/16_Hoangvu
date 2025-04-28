<?php
if (isset($_GET['id'])) {
    $productlist = $_GET['id'];
    include_once('connect_obj.php');
    $query1 = 'SELECT * FROM tbsanpham WHERE MaLoai = ?';
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param('s', $productlist);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
        echo "Khong Duoc Xoa";
    } else {
        $query = 'DELETE FROM tbloaisanpham WHERE MaLoai = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $productlist);
        $stmt->execute();
        
        header('Location: loaisanpham.php');
    }
    $stmt1->close();
    $conn->close();
}
?>
