<main>
    <div class="container-fluid p-3">
        <h3>Thêm mới loại hàng</h3>
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
            Thêm mới loại hàng
        </div>
        <div class="content_sp">
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <?php
                if (!isset($ten_loai)) $ten_loai = "";
                if (!isset($hinh_anh)) $hinh_anh = "";
                if (!isset($kich_hoat)) $kich_hoat = "1";
                ?>
                <div class="row">
                    <div class="col">
                        <div class="row"><span>Mã loại</span></div>
                        <input name="ma_loai" placeholder="Auto number" readonly>
                    </div>
                    <div class="col">
                        <div class="row"><span>Tên loại</span></div>
                        <input name="ten_loai" type="text" value="<?= $ten_loai ?>">
                    </div>
                    <div class="col">
                        <div class="row"><span>Hình ảnh</span></div>
                        <input name="hinh_anh" type="file" value="<?= $hinh_anh ?>">
                    </div>
                    <div class="col">
                        <div class="row"><span>Trạng thái</span></div>
                        <div class="checkbox-group">
                            <input type="checkbox" name="kich_hoat" id="kich_hoat" value="1" <?= $kich_hoat ? "checked" : ""; ?>><label class="col" for="kich_hoat">Hiển thị</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button name="btn_insert">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</main>