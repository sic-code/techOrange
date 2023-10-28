<main>
    <div class="container-fluid p-3">
        <h3>Sản phẩm sắp hết</h3>
    
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <a href="index.php?btn_list">Doanh thu</a>
                <a href="index.php?btn_over" class="active">Sản phẩm sắp hết</a>
            </div>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Sản phẩm sắp hết
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Mã sản phẩm</th>
                        <th>Sản phẩm</th>
                        <th>Tồn kho</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $item) {
                        extract($item);
                    ?>
                        <tr>
                            <td><img style="width:100px;height:80%" src="../../assets/images/product/<?= $hinh_anh ?>" alt=""></td>
                            <td><?= $ma_san_pham ?></td>
                            <td><?= $ten_san_pham ?></td>
                            <td><?= $so_luong ?></td>
                            <td><a href="../san-pham/index.php?btn_edit&ma_san_pham=<?= $ma_san_pham ?>"><span style="color: #ee5858;">Thêm</span></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>