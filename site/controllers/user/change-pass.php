<?php
    $title = 'Đổi mật khẩu - Tech Orange';
    require_once './models/loai_hang.php';
    require_once './models/user.php';
    if(isset($_SESSION['user'])) {
        $so_dien_thoai = $_SESSION['user']['so_dien_thoai'];
        $email = $_SESSION['user']['email'];
    }
    if (isset($_POST['btn_change_pass'])) {
        $mat_khau_cu = $_POST['mat_khau_cu'];
        $mat_khau_moi = $_POST['mat_khau_moi'];
        $mat_khau_moi_2 = $_POST['mat_khau_moi_2'];
        if ($mat_khau_moi != $mat_khau_moi_2) {
            $MESSAGE_ERROR = 'Mật khẩu mới không khớp!';
        } else {
            $user = user_select_by_phone($so_dien_thoai);
            if ($user['mat_khau'] != md5($mat_khau_cu)) {
                $MESSAGE_ERROR = 'Mật khẩu hiện tại không đúng!';
            } else {
                user_change_password($user['ma_nguoi_dung'], md5($mat_khau_moi));
                unset($_POST,$user,$mat_khau_cu,$mat_khau_moi,$mat_khau_moi_2);
                $MESSAGE_SUCCESS = 'Đổi mật khẩu thành công! Vui lòng đăng nhập lại.';
                header("refresh:2;url=$URL/?mod=user&act=logout");
            }
        }
    }
    require_once './site/views/user/change-pass.php';
    // $site_view = "./site/views/user/change-pass.php";
    // require_once './site/views/layout.php';
?>