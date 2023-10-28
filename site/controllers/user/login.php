<?php
$title = 'Đăng nhập - Tech Orange';
require_once './models/user.php';

extract($_REQUEST);

if (isset($btn_login)) {
    if (empty($ten_dang_nhap) || empty($mat_khau)) {
        $MESSAGE_ERROR = "Tên đăng nhập hoặc mật khẩu không được để trống!";
    } else {
        $user = user_select_by_phone($ten_dang_nhap);
        if ($user) {
            if ($user['mat_khau'] == md5($mat_khau)) {
                if ($user['kich_hoat'] == 1) {
                    $_SESSION['user'] = $user;
                    $MESSAGE_SUCCESS = 'Đăng nhập thành công!';
                    // luu coookie
                    if(isset($remember)){
                        add_cookie("ten_dang_nhap", $ten_dang_nhap, 30);
                        add_cookie("mat_khau", $mat_khau, 30);
                    }
                    else{
                        delete_cookie("ten_dang_nhap");
                        delete_cookie("mat_khau");
                    }

                    if (isset($_SESSION['request_uri'])) {
                        $uri = $_SESSION['request_uri'];
                        header("refresh:1;url=$uri");
                    } else {
                        header("refresh:1;url=index.php");
                    }
                } else {
                    $MESSAGE_ERROR = "Tài khoảng đã bị vô hiệu hóa";
                }
            } else {
                $MESSAGE_ERROR = 'Mật khẩu không đúng!';
            }
        } else {
            $MESSAGE_ERROR = 'Tên đăng nhập không đúng!';
        }
    }
}
require_once './site/views/user/login.php';
    // $site_view = "./site/views/user/login.php";
    // require_once './site/views/layout.php';
