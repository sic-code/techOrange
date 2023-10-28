<?php
require_once '../../global.php';
require_once '../../models/user.php';

// Phân giải các field name từ form thành các biến
extract($_REQUEST);
// Thêm mới khách hàng
if (exist_param("btn_insert")) {
    // check lỗi
    $phone_check = '/^[0-9]{10}+$/';
    $email_check = '/^[a-zA-Z0-9._%+-]+@*\.*$/';
    $insert_so_dien_thoai = ucfirst(trim(preg_replace('/\s+/', ' ', $insert_so_dien_thoai)));
    $save_image = save_file("hinh_anh", "$IMAGE_DIR/user/");
    $insert_hinh_anh = $save_image ? $save_image : "user.png";
    $insert_mat_khau1 = md5($insert_mat_khau);

    if (empty($insert_ho_ten) || empty($insert_email) || empty($insert_so_dien_thoai) || empty($insert_mat_khau)) {
        $MESSAGE = "Không được để trống các field";
    } elseif (!preg_match($phone_check, $insert_so_dien_thoai)) {
        $MESSAGE = "Số điện thoại không hợp lệ";
    } elseif (!filter_var($insert_email, FILTER_VALIDATE_EMAIL)) {
        $MESSAGE = "Email không không hợp lệ";
    } elseif (strlen($insert_mat_khau) < 6) {
        $MESSAGE = "Mật khẩu phải nhiều hơn 6 kí tự";
    } elseif (user_exist_phone($insert_so_dien_thoai)) {
        $MESSAGE = "Số điện thoại đã tồn tại";
    } elseif (user_exist_email($insert_email)) {
        $MESSAGE = "Email đã tồn tại đã tồn tại";
    } else {
        try {
            user_insert($insert_so_dien_thoai, $insert_mat_khau1, $insert_ho_ten, $insert_email, $insert_hinh_anh, $insert_dia_chi, $insert_vai_tro, $insert_kich_hoat);
            unset($insert_so_dien_thoai, $insert_mat_khau1, $insert_ho_ten, $insert_email, $insert_hinh_anh, $insert_dia_chi, $insert_vai_tro, $insert_kich_hoat);
            $MESSAGE_SUCCESS = "Thêm mới thành công!";
        } catch (Exception $exc) {
            $MESSAGE = "Thêm mới thất bại!";
        }
    }
    $VIEW_NAME = "khach-hang/new.php";
} elseif (exist_param('btn_update')) {
    $phone_check = '/^[0-9]{10}+$/';
    $edit_so_dien_thoai = ucfirst(trim(preg_replace('/\s+/', ' ', $edit_so_dien_thoai)));
    $save_image = save_file("up_anh", "$IMAGE_DIR/user/");
    $edit_hinh_anh = $save_image ? $save_image : $hinh_anh_old;
    if (empty($edit_ho_ten) || empty($edit_email) || empty($edit_so_dien_thoai) || empty($edit_mat_khau)) {
        $MESSAGE = "Không được để trống các field";
    } elseif (!preg_match($phone_check, $edit_so_dien_thoai)) {
        $MESSAGE = "Số điện thoại không hợp lệ";
    } elseif (!filter_var($edit_email, FILTER_VALIDATE_EMAIL)) {
        $MESSAGE = "Email không không hợp lệ";
    } elseif (strlen($edit_mat_khau) < 6) {
        $MESSAGE = "Mật khẩu phải nhiều hơn 6 kí tự";
    } else {
        try {
            user_update($ma_nguoi_dung, $edit_so_dien_thoai, $edit_mat_khau, $edit_ho_ten, $edit_email, $edit_hinh_anh, $edit_dia_chi, $edit_vai_tro, $edit_kich_hoat);
        } catch (Exception $exc) {
            $MESSAGE = "Cập nhập thất bại!";
        }
    }
    $items = user_select_by_id($ma_nguoi_dung);
    extract($items);
    $VIEW_NAME = "khach-hang/edit.php";
} elseif (exist_param("btn_delete")) {
    try {
        user_delete($ma_nguoi_dung);
        $items = user_select_all();
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW_NAME = "khach-hang/list.php";
} elseif (exist_param("btn_edit")) {
    $items = user_select_by_id($ma_nguoi_dung);
    extract($items);
    $VIEW_NAME = "khach-hang/edit.php";
} elseif (exist_param("btn_list")) {
    $items = user_select_all();
    $VIEW_NAME = "khach-hang/list.php";
} else {
    $VIEW_NAME = "khach-hang/new.php";
}

require "../layout.php";
