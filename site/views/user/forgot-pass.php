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
                    <h1 class="form-content-title text-center">Quên mật khẩu</h1>

                    <!-- show status -->
                    <?php
                    isset($so_dien_thoai) ? $so_dien_thoai : $so_dien_thoai = '';
                    isset($email) ? $email : $email = '';
                    if (strlen($MESSAGE_SUCCESS)) {
                        echo "<p style='color:#25d366' class='alert alert-error'>$MESSAGE_SUCCESS</p>";
                    } else if ($MESSAGE_ERROR) {
                        echo "<p class='alert alert-error'>$MESSAGE_ERROR</p>";
                    }
                    ?>
                    <form class="row g-3" action="<?= $URL ?>/?mod=user&act=forgot-pass" method="post">
                        <div class="col-12">
                            <label>Số điện thoại</label>
                            <input type="number" class="field-input w-100" placeholder="09..." name="so_dien_thoai" value="<?= $so_dien_thoai ?>">
                        </div>
                        <div class="col-12">
                            <label>Email</label>
                            <input class="field-input w-100" type="email" placeholder="abc@gmail.com" name="email" value="<?= $email ?>">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn-form" name="btn_forgot_pass">Gửi</button>
                        </div>
                    </form>
                </div>
                <!-- End form -->
            </div>




            <div class="col-4 slide-bar-user d-flex justify-content-center align-items-center">
                <div>
                    <h1 class="title text-center">Tech Orange</h1>
                    <div class="description text-center">
                        <p>Hãy quay trở lại nơi đăng nhập để tận hưởng mua săm.</p>
                    </div>
                    <div class="text-center">
                        <a href="<?= $URL ?>/?mod=user&act=login"><button class="btn-form">ĐĂNG NHẬP</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>