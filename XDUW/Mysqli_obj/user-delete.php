<?php
if (isset($_GET['id'])) {
    $productlist = intval($_GET['id']);
    include_once('connect_obj.php');

    $query = "DELETE FROM tbuser WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productlist);
    $execute = $stmt->execute();

    if ($execute) {
        header('Location: user.php');
        exit();
    } else {
        echo "Xóa thất bại: " . $stmt->error;
    }
    $stmt->close();
    $conn->close(); 
} else {
    echo "Xóa thất bại: Không có ID.";
}
?>
