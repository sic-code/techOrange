<main>
    <div class="container-fluid p-3">
        <h3>Danh sách đơn bị hủy</h3>
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <a href="index.php?btn_wait">Chờ xác nhận</a>
                <a href="index.php?btn_trans">Đang vận chuyển</a>
                <a href="index.php?btn_cancel" class="active">Đã hủy</a>
                <a href="index.php?btn_complete">Đã hoàn thành</a>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Đơn bị hủy
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th></th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $item) {
                        extract($item);
                    ?>
                        <tr>
                            <td><input type="checkbox" name="ma_don_hang[]" value="<?= $ma_don_hang ?>"></td>
                            <td><?= $ma_don_hang ?></td>
                            <td><?= $ngay_dat_hang ?></td>
                            <td><?= $so_luong ?></td>
                            <td><?= $tong_tien ?></td>
                            <td>
                                <?php
                                switch ($trang_thai) {
                                    case '0':
                                        echo "Chờ xác nhận";
                                        break;
                                    case '1':
                                        echo "Đang vận chuyển";
                                        break;
                                    case '2':
                                        echo "Đã hủy";
                                        break;
                                    case '3':
                                        echo "Đã hoàn thành";
                                        break;
                                    default:
                                        echo "Chờ xác nhận";
                                        break;
                                }
                                ?>
                            </td>
                            <td><a href="index.php?btn_details&ma_don_hang=<?= $ma_don_hang ?>"><span style="color: #ee5858;">Chi tiết</span></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>