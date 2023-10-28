<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Xóa loại hàng</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <div class="col-12" style="text-align:right;">
                            <div class="title-loai-hang col-10 m-2">
                                <button><a href="index.php?btn_list">Danh sách loại hàng</a></button>
                                <button><a href="index.php?btn_insert">Thêm mới loại hàng</a></button>
                                <button><a href="index.php?btn_delete">Xóa loại hàng</a></button>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Xóa loại hàng
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Mã loại</th>
                                            <th>Tên loại</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($items as $item) {
                                            extract($item);
                                        ?>
                                            <tr>
                                                <td><?= $ma_loai ?></td>
                                                <td><?= $ten_loai ?></td>
                                                <td><a href="index.php?btn_delete&ma_loai=<?=$ma_loai?>">Xóa</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>