<?php
$title = 'Quên mật khẩu - Tech Orange';
require_once './models/loai_hang.php';
require_once './models/user.php';
if (isset($_POST['btn_forgot_pass'])) {
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $email = $_POST['email'];
    $user = user_select_by_phone($so_dien_thoai);
    if ($user == null) {
        $MESSAGE_ERROR = 'Số điện thoại không đúng!';
    } else {
        if ($email != $user['email']) {
            $MESSAGE_ERROR = 'Email không đúng!';
        } else {
            $flag = false;
            $ma_nguoi_dung = $user['ma_nguoi_dung'];
            $ho_ten = $user['ho_ten'];
            $mat_khau_moi = rand(100000, 999999);
            $subject = 'Cấp lại mật khẩu tài khoản Website Tech Orange';
            $noidungthu = "Mật khẩu mới của bạn là: $mat_khau_moi";
            require_once './assets/plugin/mailer.php';
            if ($flag == true) {
                user_change_password($ma_nguoi_dung, md5($mat_khau_moi));
                unset($_POST,$user,$flag,$ma_nguoi_dung,$ho_ten,$mat_khau_moi,$subject,$noidungthu);
                $MESSAGE_SUCCESS = 'Mật khẩu mới đã được gửi về email của bạn.<br>Vui lòng kiểm tra email, đăng nhập và đổi mật khẩu mới.';
                header("refresh:2;url=$URL/?mod=user&act=login&so_dien_thoai=$so_dien_thoai");
            } else {
                $MESSAGE_ERROR = 'Có lỗi xảy ra!';
            }
        }
    }
}
require_once './site/views/user/forgot-pass.php';
    // $site_view = "./site/views/user/forgot-pass.php";
    // require_once './site/views/layout.php';
