<main>
    <div class="container-fluid p-3">
        <h3>Thêm mới khách hàng</h3>
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <a href="index.php?btn_list">Danh sách</a>
                <a href="index.php?btn_new" class="active">Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Thêm mới khách hàng
        </div>
        <div class="content_sp">
            <form class="d-flex flex-column gap-3" action="index.php" method="post" enctype="multipart/form-data">
                <?php
                if (!isset($ho_ten)) $ho_ten = "";
                if (!isset($so_dien_thoai)) $so_dien_thoai = "";
                if (!isset($email)) $email = "";
                if (!isset($dia_chi)) $dia_chi = "";
                if (!isset($mat_khau)) $mat_khau = "";
                if (!isset($hinh_anh)) $hinh_anh = "";
                if (!isset($vai_tro)) $vai_tro = "0";
                if (!isset($kich_hoat)) $kich_hoat = "1";
                ?>
                <div class="row">
                    <div class="col">
                        <label>Họ và tên</label>
                        <input type="text" name="insert_ho_ten" class="field-input" placeholder="abc" value="<?= $ho_ten ?>">
                    </div>
                    <div class="col">
                        <label>Số điện thoại</label>
                        <input class="field-input w-100" name="insert_so_dien_thoai" type="number" placeholder="09..." value="<?= $so_dien_thoai ?>">
                    </div>
                    <div class="col">
                        <label>Email</label>
                        <input class="field-input w-100" name="insert_email" type="email" placeholder="abc@gmail.com" value="<?= $email ?>">
                    </div>
                    <div class="col">
                        <label>Địa chỉ</label>
                        <input type="text" name="insert_dia_chi" placeholder="Nhập địa chỉ" value="<?= $dia_chi ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Mật khẩu</label>
                        <input class="field-input w-100" name="insert_mat_khau" type="password" placeholder="******" value="<?= $mat_khau ?>">
                    </div>
                    <div class="col">
                        <div class="row"><span>Hình</span></div>
                        <input name="hinh_anh" type="file">
                    </div>
                    <div class="col">
                        <div class="row"><span>Vai trò</span></div>
                        <select name="insert_vai_tro">
                            <option value="0" <?= $vai_tro == 0 ? "selected" : ""; ?>>Khách hàng</option>
                            <option value="1" <?= $vai_tro == 1 ? "selected" : ""; ?>>Quản trị viên</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="row"><span>Kích hoạt</span></div>
                        <select name="insert_kich_hoat">
                            <option value="0" <?= $kich_hoat == 0 ? "selected" : ""; ?>>Không kích hoạt</option>
                            <option value="1" <?= $kich_hoat == 1 ? "selected" : ""; ?>>Kích hoạt</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button name="btn_insert">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</main>