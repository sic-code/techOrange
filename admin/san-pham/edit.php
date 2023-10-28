<main>
    <div class="container-fluid p-3">
        <h3>Cập nhật sản phẩm</h3>
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
            Cập nhật sản phẩm
        </div>
        <div class="content_sp">
            <form class="d-flex flex-column gap-3" action="index.php" method="POST" enctype="multipart/form-data">
                <?php
                if (!isset($ma_san_pham)) $ma_san_pham = "";
                if (!isset($ten_san_pham)) $ten_san_pham = "";
                if (!isset($don_gia)) $don_gia = "";
                if (!isset($giam_gia)) $giam_gia = "";
                if (!isset($so_luong)) $so_luong = "";
                if (!isset($ma_loai)) $ma_loai = "";
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                if (!isset($ngay_nhap)) $ngay_nhap = date_format(date_create(), 'Y-m-d');
                if (!isset($dac_biet)) $dac_biet = 0;
                if (!isset($kich_hoat)) $kich_hoat = 1;
                if (!isset($mo_ta_ngan)) $mo_ta_ngan = "";
                if (!isset($noi_dung)) $noi_dung = "";
                ?>
                <div class="row">
                    <div class="col-3">
                        <div class="row"><span>Mã sản phẩm</span></div>
                        <input name="ma_san_pham" type="text" value="<?= $ma_san_pham ?>" placeholder="Auto number" readonly>
                    </div>
                    <div class="col-3">
                        <div class="row"><span>Tên sản phẩm</span></div>
                        <input name="ten_san_pham" type="text" value="<?= $ten_san_pham ?>">
                    </div>
                    <div class="col-3">
                        <div class="row"><span>Đơn giá</span></div>
                        <input name="don_gia" type="number" value="<?= $don_gia ?>">
                    </div>
                    <div class="col-3">
                        <div class="row"><span>Giảm giá</span></div>
                        <input name="giam_gia" type="number" value="<?= $giam_gia ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="row"><span>Số lượng</span></div>
                        <input name="so_luong" type="number" value="<?= $so_luong ?>">
                    </div>
                    <div class="col-3">
                        <div class="row"><span>Loại hàng</span></div>
                        <select name="ma_loai">
                            <?php
                            foreach ($loai_hang as $loai_hang) :
                            ?>
                                <option value="<?= $loai_hang['ma_loai'] ?>" <?= $loai_hang['ma_loai'] == $ma_loai ? "selected" : ""; ?>><?= $loai_hang['ten_loai'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <div class="row"><span>Ngày nhập</span></div>
                        <input name="ngay_nhap" type="date" value="<?= $ngay_nhap ?>">
                    </div>
                    <div class="col-3">
                        <div class="row"><span>Tùy chọn</span></div>
                        <div class="checkbox-group">
                            <input type="checkbox" name="kich_hoat" id="kich_hoat" value="1" <?= $kich_hoat ? "checked" : ""; ?>><label class="col" for="kich_hoat">Hiển thị sản phẩm</label>
                            <input type="checkbox" name="dac_biet" id="dac_biet" value="1" <?= $dac_biet ? "checked" : ""; ?>><label class="col" for="dac_biet">Sản phẩm đặc biệt</label>
                        </div>
                    </div>
                    <!-- <div class="col-3 d-inline-flex">
                        <div class="col">
                            <div class="row"><span>Trạng thái</span></div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="kich_hoat" id="kich_hoat" value="1" <?= $kich_hoat ? "checked" : ""; ?>><label class="col" for="kich_hoat">Hiển thị</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row"><span>Kiểu sản phẩm</span></div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="dac_biet" id="dac_biet" value="1" <?= $dac_biet ? "checked" : ""; ?>><label class="col" for="dac_biet">Đặc biệt</label>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="row"><span>Hình ảnh</span></div>
                        <input name="up_anh" type="file">
                        <input name="hinh_anh" value="<?= $hinh_anh ?>" hidden>
                    </div>
                    <div class="col-3">
                        <div class="row"><span>Ảnh chi tiết (3 ảnh)</span></div>
                        <input name="anh_slide" type="file" multiple>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row"><span>Mô tả ngắn</span></div>
                        <textarea name="mo_ta_ngan" id="" rows="3" placeholder="Nhập mô tả sản phẩm"><?= $mo_ta_ngan ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row"><span>Nội dung</span></div>
                        <textarea name="noi_dung" id="" rows="10" placeholder="Nhập nội dung sản phẩm"><?= $noi_dung ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button name="btn_update">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</main>