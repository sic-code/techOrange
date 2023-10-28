<?php
$title = 'Đăng ký - Tech Orange';
require_once './models/user.php';

extract($_REQUEST);
// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($btn)) {
        // check error
        $phone_check = '/^[0-9]{10}+$/';
        $email_check = '/^[a-zA-Z0-9._%+-]+@gmail\.com$/';


        if (empty($ho_ten) || empty($email) || empty($so_dien_thoai) || empty($mat_khau) || empty($mat_khau2)) {  // check rỗng
            $MESSAGE_ERROR = "Các fied không được để trống";
        } elseif (!preg_match($phone_check, $so_dien_thoai)) { //check định dang số điện thoại
            $MESSAGE_ERROR = "Số điện thoại không đúng định dạng";
        } elseif (!preg_match($email_check, $email)) {   //check định dang email
            $MESSAGE_ERROR = "Email không đúng định dạng";
        } elseif (user_exist_phone($so_dien_thoai)) {  //check số điện thoại đã tồn tại
            $MESSAGE_ERROR = "Số điện thoại đã tồn tại";
        } elseif (strlen($mat_khau) < 6) {
            $MESSAGE_ERROR = "Mật khẩu phải > 6 Ký tự";
        } elseif (!user_exist_email($email) == 0) {
            $MESSAGE_ERROR = "Email đã tồn tại";
        } else {
            try {
                if ($mat_khau == $mat_khau2) { //check mật khẩu nhập lại
                    user_insert($so_dien_thoai, md5($mat_khau), $ho_ten, $email, $hinh_anh, $dia_chi, $vai_tro, $kich_hoat);
                    unset($so_dien_thoai, $mat_khau, $ho_ten, $email, $hinh_anh, $dia_chi, $vai_tro, $kich_hoat);
                    $MESSAGE_SUCCESS = "Tạo tài khoảng thành công";
                } else {
                    $MESSAGE_ERROR = "Nhập lại mật khẩu không đúng";
                }
            } catch (Exception $exc) {
                $MESSAGE_ERROR = "Tạo tài khoản thất bại" . $exc;
            }
        }
    }
}
require_once './site/views/user/signup.php';
