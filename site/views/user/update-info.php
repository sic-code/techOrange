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
                    <h1 class="form-content-title text-center">Cập nhập thông tin</h1>

                    <!-- show status -->
                    <?php
                    if (strlen($MESSAGE_SUCCESS)) {
                        echo "<p style='color:#25d366' class='alert alert-error''>$MESSAGE_SUCCESS</p>";
                    } else if (strlen($MESSAGE_ERROR)) {
                        echo "<p class='alert alert-error'>$MESSAGE_ERROR</p>";
                    }
                    ?>



                    <form class="row g-3" action="<?= $URL ?>/?mod=user&act=update-info" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label>Họ và tên</label>
                            <input type="text" name="ud_ho_ten" class="field-input w-100" value="<?= $ho_ten ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input class="field-input w-100" name="ud_email" type="email" value="<?= $email ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Số điện thoại</label>
                            <input class="field-input w-100" name="ud_so_dien_thoai" type="number" value="<?= $so_dien_thoai ?>">
                        </div>
                        <div class="col-12">
                            <label>Địa chỉ</label>
                            <input type="text" class="field-input w-100" name="ud_dia_chi" value="<?= $dia_chi ?>">
                        </div>
                        <div class="col-12">
                            <label>Hình ảnh</label>
                            <input class="w-100" name="ud_hinh_anh" type="file">
                        </div>
                        <div class="form-group text-center">
                            <button name="btn_ud" class="btn-form">Cập nhập</button>
                        </div>
                        <input type="hidden" name="ud_mat_khau" value="<?= $mat_khau ?>">
                        <input type="hidden" name="hinh_anh" value="<?= $hinh_anh ?>">
                        <input type="hidden" name="vai_tro" value="<?= $vai_tro ?>">
                        <input type="hidden" name="kich_hoat" value="<?= $kich_hoat ?>">
                        <input type="hidden" name="ma_nguoi_dung" value="<?= $ma_nguoi_dung ?>">
                    </form>
                </div>
                <!-- End form -->
            </div>

            <div class="col-4 slide-bar-user d-flex flex-column justify-content-center gap-3">
                <div class="avt-user text-center">
                    <?php if ($_SESSION['user']['hinh_anh'] == '') : ?>
                        <img src="<?= $imagesURL ?>/User/admin.png" alt="">
                    <?php else : ?>
                        <img src="<?= $imagesURL ?>/User/<?= $_SESSION['user']['hinh_anh'] ?>" alt="<?= $_SESSION['user']['ho_ten'] ?>">
                    <?php endif; ?>
                </div>
                <div class="avt-name text-center">
                    <span><?= $_SESSION['user']['ho_ten'] ?></span>
                </div>
            </div>

        </div>
    </div>
</body>

</html>