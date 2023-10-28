<main>
    <div class="container-fluid p-3">
        <h3>Danh sách sản phẩm</h3>
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <form class="search" action="index.php" method="post">
                    <input type="text" name="keywords" placeholder="Tên sản phẩm...">
                    <input type="submit" name="btn_search" value="Tìm kiếm">
                </form>
                <a href="index.php?btn_list" class="active">Danh sách</a>
                <a href="index.php?btn_new">Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tất cả sản phẩm
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Giảm giá</th>
                        <th>Loại hàng</th>
                        <th>Trạng thái</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $item) :
                        extract($item);
                        $loai = loai_select_by_id($ma_loai);
                    ?>
                        <tr>
                            <td class="col"><?= $ma_san_pham ?></td>
                            <td class="col-3"><?= $ten_san_pham ?></td>
                            <td class="col"><?= $so_luong ?></td>
                            <td class="col"><?= number_format($don_gia) ?></td>
                            <td class="col"><?= number_format($giam_gia) ?></td>
                            <td class="col"><?= $loai['ten_loai'] ?></td>
                            <td class="col">
                                <?php
                                if ($kich_hoat) {
                                    echo ("Hiện");
                                } else {
                                    echo ("Ẩn");
                                }
                                ?>
                            </td>
                            <td class="tac_vu">
                                <a href="index.php?btn_edit&ma_san_pham=<?= $ma_san_pham ?>"><i class="fa-regular fa-pen-to-square" style="color: #ee5858;"></i></a>
                                <a href="index.php?btn_delete&ma_san_pham=<?= $ma_san_pham ?>"><i class="fa-regular fa-trash-can" style="color: #ee5858;"></i></a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>