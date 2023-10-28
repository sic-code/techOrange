<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo/fa_icon.webp">
    <link rel="stylesheet" href="./assets/plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/plugin/font-awesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/user.css">
</head>

<body>
    <div class="bg-user vh-100 w-100 position-relative">

        <!-- block decorate -->
        <div class="square position-absolute"></div>
        <div class="circle position-absolute"></div>
        <!-- end -->

        <div class="content-user position-relative d-flex">
            <div class="col-8 form-user d-flex justify-content-center align-items-center">
                <div>
                    <a class="list-group-item btn-back" href="<?= $URL ?>"><i class="fa-regular fa-arrow-left me-2"></i>Trở về trang chủ</a>
                </div>
                <!-- Start form -->
                <div class="col-6 form-user-content">
                    <h1 class="form-content-title text-center">Đăng nhập</h1>

                    <!-- show status -->
                    <?php if (strlen($MESSAGE_SUCCESS)) : ?>
                        <p class="success"><?= $MESSAGE_SUCCESS ?></p>
                    <?php elseif ($MESSAGE_ERROR) : ?>
                        <p class="danger"><?= $MESSAGE_ERROR ?></p>
                    <?php
                    endif;
                    isset($ten_dang_nhap) ? $ten_dang_nhap : $ten_dang_nhap = '';
                    ?>
                    <form class="d-flex flex-column row g-3" action="<?= $URL ?>/?mod=user&act=login" method="post">
                        <div class="form-group ">
                            <label>Tên đăng nhập</label>
                            <input class="field-input w-100" name="ten_dang_nhap" type="text" value="<?= get_cookie("ten_dang_nhap") ?>">
                        </div>
                        <div class="form-group ">
                            <label>Mật khẩu</label>
                            <input class="field-input w-100" name="mat_khau" type="password" value="<?=get_cookie("mat_khau")?>">
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="save-password d-flex align-items-center">
                                <label><input class="form-check-input" type="checkbox" name="remember"> Ghi nhớ thông tin</label>
                            </div>
                            <div>
                                <a class="list-group-item" href="<?= $URL ?>/?mod=user&act=forgot-pass">Quên mật khẩu?</a>
                            </div>
                        </div>
                        <div class="form-group form-g text-center">
                            <button class="btn-form" type="submit" name="btn_login">ĐĂNG NHẬP</button>
                        </div>
                    </form>
                </div>
                <!-- End form -->
            </div>

            <div class="col-4 slide-bar-user d-flex justify-content-center align-items-center">
                <div>
                    <h1 class="title text-center">Xin chào, Bạn</h1>
                    <div class="description text-center">
                        <p>Hãy bắt đầu với chúng tôi. Nếu bạn chưa có tài khoản.</p>
                    </div>
                    <div class="text-center">
                        <a href="<?= $URL ?>/?mod=user&act=signup"><button class="btn-form">ĐĂNG KÝ</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>