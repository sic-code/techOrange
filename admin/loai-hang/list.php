<main>
    <div class="container-fluid p-3">
        <h3>Danh sách loại hàng</h3>
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <a href="index.php?btn_list" class="active">Danh sách</a>
                <a href="index.php?btn_new">Thêm mới</a>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tất cả loại hàng
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th class="col-1">Mã loại</th>
                        <th class="col-1">Hình ảnh</th>
                        <th class="col-8">Tên loại</th>
                        <th class="col-1">Trạng thái</th>
                        <th class="col-1">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $item) {
                        extract($item);
                    ?>
                        <tr>
                            <td><?= $ma_loai ?></td>
                            <td><img src="../../assets/images/category/<?= $hinh_anh ?>" alt=""></td>
                            <td><?= $ten_loai ?></td>
                            <td><?= $kich_hoat ? "Hiện" : "Ẩn"; ?></td>
                            <td class="tac_vu">
                                <a href="index.php?btn_edit&ma_loai=<?= $ma_loai ?>"><i class="fa-regular fa-pen-to-square" style="color: #ee5858;"></i></a>
                                <a href="index.php?btn_delete&ma_loai=<?= $ma_loai ?>"><i class="fa-regular fa-trash-can" style="color: #ee5858;"></i></a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>