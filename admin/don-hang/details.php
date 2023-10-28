<main>
    <div class="container-fluid p-3">
        <h3>Chi tiết đơn hàng</h3>
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <a href="index.php?btn_wait" class="active">Chờ xác nhận</a>
                <a href="index.php?btn_trans">Đang vận chuyển</a>
                <a href="index.php?btn_cancel">Đã hủy</a>
                <a href="index.php?btn_complete">Đã hoàn thành</a>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Chi tiết hóa đơn
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <?php $tong_tien = 0; ?>
                <tbody>
                    <?php
                    foreach ($items as $item) {
                        extract($item);
                        $tong_tien += $thanh_tien;
                    ?>
                        <tr>
                            <td><img src="../../assets/images/product/<?= $hinh_anh ?>" alt=""></td>
                            <td><?= $ten_san_pham ?></td>
                            <td><?= number_format($don_gia) ?></td>
                            <td><?= $so_luong ?></td>
                            <td><?= number_format($thanh_tien) ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">Tổng tiền</td>
                        <td><?= number_format($tong_tien) ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>