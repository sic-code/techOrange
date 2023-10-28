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
                    <h1 class="form-content-title text-center">Đăng Ký</h1>

                    <!-- show status -->
                    <?php
                    if (strlen($MESSAGE_SUCCESS)) {
                        echo "<p style='color:#25d366' class='alert alert-error'>$MESSAGE_SUCCESS</p>";
                    } else if (strlen($MESSAGE_ERROR)) {
                        echo "<p class='alert alert-error'>$MESSAGE_ERROR</p>";
                    }
                    ?>

                    <form class="row g-3" action="<?= $URL ?>/?mod=user&act=signup" method="post">
                        <div class="col-12">
                            <label>Họ và tên</label>
                            <input type="text" name="ho_ten" class="field-input w-100" placeholder="abc">
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input class="field-input w-100" name="email" type="email" placeholder="abc@gmail.com">
                        </div>
                        <div class="col-md-6">
                            <label>Số điện thoại</label>
                            <input class="field-input w-100" name="so_dien_thoai" type="number" placeholder="09...">
                        </div>
                        <div class="col-md-6">
                            <label>Mật khẩu</label>
                            <input class="field-input w-100" name="mat_khau" type="password" placeholder="******">
                        </div>
                        <div class="col-md-6">
                            <label>Nhập lại mật khẩu</label>
                            <input class="field-input w-100" name="mat_khau2" type="password" placeholder="******">
                        </div>
                        <div class="form-group form-g text-center">
                            <button name="btn" class="btn-form">ĐĂNG KÝ</button>
                        </div>

                        <input type="hidden" name="hinh_anh" value="user.png">
                        <input type="hidden" name="dia_chi" value="">
                        <input type="hidden" name="vai_tro" value="0">
                        <input type="hidden" name="kich_hoat" value="1">
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