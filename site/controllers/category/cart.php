<?php
$title = 'Giỏ hàng - Tech Orange';
require_once './models/van_chuyen.php';
require_once './models/don_hang.php';
require_once './models/loai_hang.php';
require_once './models/hang_hoa.php';


// lấy ra tất cả đơn vị vận chuyển
$van_chuyen = van_chuyen_select_all();

// add cart
extract($_REQUEST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($btn_addCart)) {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        $i = 0;
        $flag = 0;
        // $so_luong = 1;
        if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
            foreach ($_SESSION['cart'] as $item) {
                if ($item[0] == $ma_san_pham) {
                    //cập nhập mới số lượng
                    $so_luong += $item[3];
                    $flag = 1;
                    //cập nhập số lượng mới dô giỏ hàng
                    $_SESSION['cart'][$i][3] = $so_luong;
                    break;
                }
                $i++;
            }
        }

        //khi số lượng ban đầu không thay đổi thì thêm mới sản phẩm vào giỏng hàng
        if ($flag == 0) {
            $item_cart = [$ma_san_pham, $anh_san_pham, $ten_san_pham, $so_luong, $don_gia];
            array_push($_SESSION['cart'], $item_cart);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']); // trả về URL cũ trước đó.
    }


    // Đơn đặt hàng
    if (isset($btn_buy)) {
        if (isset($_SESSION['user'])) {
            // Ngày đặt hàng.
            $ngay_dat_hang = date_format(date_create(), 'Y-m-d');
            while (true) {
                $ma_don_hang = "DH" . rand(10000, 99999);
                if (!don_hang_exit($ma_don_hang)) {
                    break;
                }
            }

            if (empty($dvvc)) {
                $MESSAGE_ERROR = "Vui lòng chọn đơn vị vận chuyển";
            } elseif (empty($_SESSION['cart'])) {
                $MESSAGE_ERROR = "Giỏ hàng không có sản phẩm";
            } else {
                if (isset($_SESSION['cart'])) {
                    $order_info = $_SESSION['cart'];
                    // thêm đơn hàng 
                    don_hang_insert($ma_don_hang, $ngay_dat_hang, $tong_sl, $tong_tien, $trang_thai_cart, $ma_nguoi_dung, $dvvc);


                    //thêm chi tiết đơn hàng
                    // lấy data từ cart
                    foreach ($order_info as $order) {
                        $don_gia = $order[4];
                        $ma_san_pham_cart = $order[0];
                        $so_luong_cart = $order[3];
                        $don_gia_cart = filter_var($don_gia, FILTER_VALIDATE_INT);
                        $thanh_tien_cart = $don_gia_cart * $so_luong_cart;
                        hoa_don_insert($don_gia_cart, $so_luong_cart, $thanh_tien_cart, $ma_don_hang, $ma_san_pham_cart);

                        // xóa số lượng còn lại trong giỏ hàng
                        san_pham_remove_quantity($so_luong_cart, $ma_san_pham_cart);
                    }
                }
                unset($ngay_dat_hang_cart, $so_luong, $thanh_tien_cart, $trang_thai_cart, $ma_nguoi_dung, $dvvc);
                unset($don_gia_cart, $so_luong_cart, $tong_tien, $ma_don_hang, $ma_san_pham_cart);
                // $MESSAGE_ERROR = "Thành công";
                // sau khi thêm thành công thì xóa cart
                unset($_SESSION['cart'], $_SESSION['total2']);
                header("Location: $URL?mod=category&act=success-cart");
            }
        } else {
            $MESSAGE_ERROR = "Bạn chưa đăng nhập. Vui lòng đăng nhập 
            <a href='$URL?mod=user&act=login' style='color:blue;'>tại đây</a>";
        }
    }

}else{
    $site_view = "./site/views/category/cart.php";

}




// huy don_hang
if(isset($btn_huy)) {
    $cancel = huy_don_hang($ma_don_hang);
    header('Location: ' . $_SERVER['HTTP_REFERER']); // trả về URL cũ trước đó.
}

// show đơn hàng
// $list_don_hang = don_hang_select_all();
if (isset($_SESSION['user'])) {
    $list_don_hang = don_hang_select_by_id_user($_SESSION['user']['ma_nguoi_dung']);
}


$site_view = "./site/views/category/cart.php";
require_once './site/views/layout.php';
