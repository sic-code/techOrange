<main>
    <div class="container-fluid p-3">
        <h3>Cập nhật loại hàng</h3>
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <a href="index.php?btn_list">Danh sách</a>
                <a href="index.php?btn_new">Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Cập nhật loại hàng
        </div>
        <div class="content_sp">
            <form class="d-flex" action="index.php" method="POST" enctype="multipart/form-data">
                <div class="col-1">
                    <div class="row img-thumbnail">
                        <img src="../../assets/images/category/<?= $hinh_anh ?>" alt="">
                    </div>
                </div>
                <div class="col-11 d-flex flex-column gap-3">
                    <div class="row">
                        <div class="col">
                            <div class="row"><span>Mã loại</span></div>
                            <input name="ma_loai" placeholder="Auto number" value="<?= $ma_loai ?>" readonly>
                        </div>
                        <div class="col">
                            <div class="row"><span>Tên loại</span></div>
                            <input name="ten_loai" type="text" value="<?= $ten_loai ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row"><span>Hình ảnh</span></div>
                            <input name="up_anh" type="file">
                            <input name="hinh_anh" value="<?= $hinh_anh ?>" hidden>
                        </div>
                        <div class="col">
                            <div class="row"><span>Trạng thái</span></div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="kich_hoat" id="kich_hoat" value="1" <?= $kich_hoat ? "checked" : ""; ?>><label class="col" for="kich_hoat">Hiển thị</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button name="btn_update">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>