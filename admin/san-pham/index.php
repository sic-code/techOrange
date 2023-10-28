<?php
require "../../global.php";
require_once "../../models/hang_hoa.php";
require_once "../../models/loai_hang.php";

// Phân giải các field name từ form thành các biến
extract($_REQUEST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btn_insert'])) {
        isset($kich_hoat) ? $kich_hoat : $kich_hoat = 0;
        isset($dac_biet) ? $dac_biet : $dac_biet = 0;
        $file_size = $_FILES['hinh_anh']['size'];
        if ($file_size != NULL) {
            $hinh_anh = save_file("hinh_anh", "$IMAGE_DIR/product/");
        } else {
            $hinh_anh = "";
        }
        try {
            san_pham_add($ma_san_pham, $ten_san_pham, $don_gia, $giam_gia, $so_luong, $ngay_nhap, $hinh_anh, $mo_ta_ngan, $noi_dung, $dac_biet, $kich_hoat, $ma_loai);
            unset($ma_san_pham, $ten_san_pham, $don_gia, $giam_gia, $so_luong, $ngay_nhap, $hinh_anh, $mo_ta_ngan, $noi_dung, $dac_biet, $kich_hoat, $ma_loai);
            $MESSAGE = "Thêm mới thành công!";
        } catch (Exception $exc) {
            $MESSAGE = "Thêm mới thất bại!";
        }
        $loai_hang = loai_hang_select_all();
        $VIEW_NAME = "../san-pham/new.php";
    } elseif (isset($_POST['btn_update'])) {
        isset($kich_hoat) ? $kich_hoat : $kich_hoat = 0;
        isset($dac_biet) ? $dac_biet : $dac_biet = 0;
        $file_size = $_FILES['up_anh']['size'];
        if ($file_size != NULL) {
            $hinh_anh = save_file("up_anh", "$IMAGE_DIR/product/");
        }
        try {
            san_pham_update($ten_san_pham, $don_gia, $giam_gia, $so_luong, $ngay_nhap, $hinh_anh, $mo_ta_ngan, $noi_dung, $dac_biet, $kich_hoat, $ma_loai, $ma_san_pham);
            $MESSAGE = "Cập nhật thành công!";
        } catch (Exception $exc) {
            $MESSAGE = "Cập nhật thất bại!";
        }
        $items = san_pham_select_by_id($ma_san_pham);
        extract($items);
        $loai_hang = loai_hang_select_all();
        $VIEW_NAME = "../san-pham/edit.php";
    } elseif (isset($_POST['btn_search'])) {
        $items = hang_hoa_select_keyword($keywords);
        $VIEW_NAME = "../san-pham/list.php";
    }
} elseif (isset($_GET['btn_delete'])) {
    if (isset($_GET['ma_san_pham'])) {
        try {
            san_pham_delete($ma_san_pham);
            $MESSAGE = "Xóa thành công!";
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
    }
    $items = san_pham_select_all();
    $VIEW_NAME = "../san-pham/list.php";
} elseif (isset($_GET['btn_new'])) {
    $loai_hang = loai_hang_select_all();
    $VIEW_NAME = "../san-pham/new.php";
} elseif (isset($_GET['btn_edit'])) {
    $items = san_pham_select_by_id($ma_san_pham);
    extract($items);
    $loai_hang = loai_hang_select_all();
    $VIEW_NAME = "../san-pham/edit.php";
} elseif (isset($_GET['btn_sort'])) {
    $items = san_pham_sap_het_hang();
    $VIEW_NAME = "../san-pham/list.php";
} else {
    $items = san_pham_select_all();
    $VIEW_NAME = "../san-pham/list.php";
}

require "../layout.php";
