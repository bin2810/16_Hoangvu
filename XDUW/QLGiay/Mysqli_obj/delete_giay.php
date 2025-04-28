<?php
if (isset($_GET['id'])) {
    $id_giay = $_GET['id'];
    include_once('connect.php');

    // Kiểm tra xem loại giày có tồn tại không (dựa vào MaLoai trùng với id sản phẩm)
    $query1 = "SELECT * FROM tbloaigiay WHERE MaLoai = ?";
    $stmt1 = $conn->prepare($query1);
    if ($stmt1) {
        $stmt1->bind_param("i", $id_giay);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        if ($result1->num_rows > 0) {
            // Nếu có loại giày liên quan, không cho phép xóa
            header("location: sanpham.php?error=loi");
            exit();
        } else {
            // Tiến hành xóa sản phẩm
            $query = "DELETE FROM tbgiay WHERE SanPham_id = ?";
            $delete = $conn->prepare($query);
            if ($delete) {
                $delete->bind_param("i", $id_giay);
                $delete->execute();

                if ($delete->affected_rows > 0) {
                    // Xóa thành công
                    header('Location: sanpham.php');
                    exit();
                } else {
                    echo "Không tìm thấy sản phẩm để xóa.";
                }
            } else {
                echo "lỗi";
            }
        }
    } else {
        echo "Lỗi ";
    }
} else {
    echo "Xóa thất bại: không có ID.";
}
?>
