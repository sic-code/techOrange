<?php
require_once "../../global.php";
require_once "../../models/loai_hang.php";
//--------------------------------//
// check_login();
//phân giải các field name từ form trong form thành cách biến
extract($_REQUEST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btn_insert'])) {
        $file_size = $_FILES['hinh_anh']['size'];
        if (empty($ten_loai) || $file_size == NULL) {
            $MESSAGE = "Chưa điền tên loại hàng hoặc chưa chọn hình ảnh";
        } else {
            isset($kich_hoat) ? $kich_hoat : $kich_hoat = 0;
            $file_size = $_FILES['hinh_anh']['size'];
            if ($file_size != NULL) {
                $hinh_anh = save_file("hinh_anh", "$IMAGE_DIR/category/");
            }
            try {
                loai_hang_insert($ten_loai, $hinh_anh, $kich_hoat);
                unset($ten_loai, $file_size, $hinh_anh, $kich_hoat);
                $MESSAGE = "Thêm mới loại hàng thành công!";
            } catch (Exception $exc) {
                if (is_file($IMAGE_DIR . '/category/' . $hinh_anh)) {
                    unlink($IMAGE_DIR . '/category/' . $hinh_anh);
                }
                $MESSAGE = "Thêm mới loại hàng thất bại";
            }
        }
        $VIEW_NAME = "loai-hang/new.php";
    } elseif (exist_param("btn_update")) {
        if (empty($ten_loai)) {
            $MESSAGE = "Chưa điền tên loại hàng";
        } else {
            isset($kich_hoat) ? $kich_hoat : $kich_hoat = 0;
            $file_size = $_FILES['up_anh']['size'];
            if ($file_size != NULL) {
                $hinh_anh = save_file("up_anh", "$IMAGE_DIR/category/");
            }
            try {
                loai_hang_update($ma_loai, $ten_loai, $hinh_anh, $kich_hoat);
                $MESSAGE = "Cập nhật thành công";
            } catch (Exception $exc) {
                $MESSAGE = "Cập nhật thất bại!";
            }
        }
        $items = loai_select_by_id($ma_loai);
        extract($items);
        $VIEW_NAME = "loai-hang/edit.php";
    }
} elseif (exist_param("btn_delete")) {
    if (loai_exist($ma_loai)) {
        try {
            $items = loai_select_by_id($ma_loai);
            extract($items);
            if (is_file($IMAGE_DIR . '/category/' . $hinh_anh)) {
                unlink($IMAGE_DIR . '/category/' . $hinh_anh);
            }
            loai_hang_delete($ma_loai);
            $MESSAGE = "Xóa thành công!";
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
    }
    $items = loai_hang_select_all();
    $VIEW_NAME = "loai-hang/list.php";
} elseif (exist_param("btn_new")) {
    $VIEW_NAME = "loai-hang/new.php";
} elseif (exist_param("btn_edit")) {
    $items = loai_select_by_id($ma_loai);
    extract($items);
    $VIEW_NAME = "loai-hang/edit.php";
} else {
    $items = loai_hang_select_all();
    $VIEW_NAME = "loai-hang/list.php";
}
require "../layout.php";
