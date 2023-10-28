<?php

extract($_REQUEST);
session_start();
ob_start();

if (isset($_SESSION['cart'])) {
    // Kiểm tra xem có tham số 'ma_san_pham' từ URL hay không
    if (isset($ma_san_pham)) {
        
        // Tìm vị trí của sản phẩm trong giỏ hàng dựa trên giá trị 'ma_san_pham'
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item[0] == $ma_san_pham) {
                // Xóa sản phẩm khỏi giỏ hàng bằng hàm unset và break để thoát vòng lặp
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
        
        // Chỉnh lại các chỉ số trong mảng sau khi xóa phần tử
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    } else {
        // Nếu không có tham số 'ma_san_pham', xóa toàn bộ giỏ hàng
        unset($_SESSION['cart']);
    }

    // Sau khi xóa sản phẩm, chuyển hướng người dùng trở lại trang giỏ hàng
    header("Location: $URL?mod=category&act=cart");
    exit();
}
?>


