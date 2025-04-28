<?php
if (isset($_GET['id'])) {
    $productlist = intval($_GET['id']);
    include_once('connect_pro.php');
    $query = "DELETE FROM tbuser WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $productlist);
    $execute = mysqli_stmt_execute($stmt);

    if ($execute) {
        header('Location: user.php');
        exit();
    } else {
        echo "Xóa thất bại: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Xóa thất bại: Không có ID.";
}
?>
