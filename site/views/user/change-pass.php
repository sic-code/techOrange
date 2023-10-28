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
                    <h1 class="form-content-title text-center">Đổi mật khẩu</h1>
                    <!-- show status -->
                    <?php
                    isset($so_dien_thoai) ? $so_dien_thoai : $so_dien_thoai = '';
                    isset($email) ? $email : $email = '';
                    if (strlen($MESSAGE_SUCCESS)) {
                        echo "<p style='color:#25d366' class='alert alert-error'>$MESSAGE_SUCCESS</p>";
                    } else if($MESSAGE_ERROR){
                        echo "<p class='alert alert-error'>$MESSAGE_ERROR</p>";
                    }
                    isset($so_dien_thoai) ? $so_dien_thoai : $so_dien_thoai = '';
                    ?>
                    <form class="row g-3" action="<?= $URL ?>/?mod=user&act=change-pass" method="post">
                        <div class="col-12">
                            <label>Số điện thoại</label>
                            <input type="number" class="field-input w-100" placeholder="09..." value="<?= $so_dien_thoai ?>" readonly>
                        </div>
                        <div class="col-12">
                            <label>Email</label>
                            <input class="field-input w-100" type="email" placeholder="abc@gmail.com" value="<?= $email ?>" readonly>
                        </div>
                        <div class="col-12">
                            <label>Mật khẩu hiện tại</label>
                            <input class="field-input w-100" type="password" placeholder="******" name="mat_khau_cu">
                        </div>
                        <div class="col-md-6">
                            <label>Mật khẩu mới</label>
                            <input class="field-input w-100" type="password" placeholder="******" name="mat_khau_moi">
                        </div>
                        <div class="col-md-6">
                            <label>Xác nhận mật khẩu</label>
                            <input class="field-input w-100" type="password" placeholder="******" name="mat_khau_moi_2">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn-form" name="btn_change_pass">Thay đổi</button>
                        </div>
                    </form>
                </div>
                <!-- End form -->
            </div>


            <div class="col-4 slide-bar-user d-flex justify-content-center align-items-center">
                <div>
                    <div class="avt-user text-center mb-3">
                        <img src="assets/images/user/admin.png">
                    </div>
                    <div class="avt-name text-center">
                        <span>Admin</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>