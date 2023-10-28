<?php
$title = 'Cập nhập thông tin - Tech Orange';
require_once './models/user.php';

extract($_REQUEST);
// phân tách các biến trong user
if (isset($_SESSION['user'])) extract($_SESSION['user']);


// sử lý dữ liệu
if (isset($btn_ud)) {
    $phone_check = '/^[0-9]{10}+$/';
    $email_check = '/^[a-zA-Z0-9._%+-]+@gmail\.com$/';
    if (empty($ud_ho_ten) || empty($ud_email) || empty($ud_so_dien_thoai) || empty($ud_dia_chi)) {
        $MESSAGE_ERROR = "Không được để trống thông tin";
    } elseif (!preg_match($email_check, $ud_email)) {
        $MESSAGE_ERROR = "Email không hợp lệ";
    } elseif (!preg_match($phone_check, $ud_so_dien_thoai)) {
        $MESSAGE_ERROR = "Số điện thoại không hợp lệ";
    } else {
        $save_image = save_file("ud_hinh_anh", "$IMAGE_DIR/user/");
        $hinh_anh = $save_image ? $save_image : $hinh_anh;
        try {
            user_update($ma_nguoi_dung, $ud_so_dien_thoai, $ud_mat_khau, $ud_ho_ten, $ud_email, $hinh_anh, $ud_dia_chi, $vai_tro, $kich_hoat);
            $MESSAGE_SUCCESS = "Update thành công";
            $_SESSION['user'] = user_select_by_id($ma_nguoi_dung);
        } catch (Exception $e) {
            $MESSAGE_ERROR = "Update thất bại";
        }
        // header("Location: $URL?mod=user&act=update-info");
    }
}
require_once './site/views/user/update-info.php';
