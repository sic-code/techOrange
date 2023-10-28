<main>
    <div class="container-fluid p-3">
        <h3>Cập nhật đơn hàng</h3>
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <a href="index.php?btn_wait">Chờ xác nhận</a>
                <a href="index.php?btn_trans">Đang vận chuyển</a>
                <a href="index.php?btn_cancel">Đã hủy</a>
                <a href="index.php?btn_complete">Đã hoàn thành</a>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="content_sp">
            <form class="d-flex flex-column gap-3" action="index.php" method="POST">
                <div class="row">
                    <div class="col">
                        <div class="row"><span>Mã đơn hàng</span></div>
                        <input name="ma_don_hang" readonly placeholder="Auto number" value="<?= $ma_don_hang ?>">
                    </div>
                    <div class="col">
                        <div class="row"><span>Trạng thái</span></div>
                        <?php
                        if ($trang_thai == 0) :
                        ?>
                            <select name="trang_thai">
                                <option value="0" <?= $trang_thai == 0 ? "selected" : ""; ?>>Chờ xác nhận</option>
                                <option value="1" <?= $trang_thai == 1 ? "selected" : ""; ?>>Đang vận chuyển</option>
                                <option value="2" <?= $trang_thai == 2 ? "selected" : ""; ?>>Đã hủy</option>
                                <option value="3" <?= $trang_thai == 3 ? "selected" : ""; ?>>Đã hoàn thành</option>
                            </select>
                        <?php else : ?>
                            <select name="trang_thai">
                                <option value="1" <?= $trang_thai == 1 ? "selected" : ""; ?>>Đang vận chuyển</option>
                                <option value="2" <?= $trang_thai == 2 ? "selected" : ""; ?>>Đã hủy</option>
                                <option value="3" <?= $trang_thai == 3 ? "selected" : ""; ?>>Đã hoàn thành</option>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <button name="btn_update">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</main>