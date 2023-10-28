<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thống kê tồn kho</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <div class="col-12" style="text-align:right;">
                            <div class="title-loai-hang col-10 m-2">
                                <button><a href="index.php?btn_list">Doanh thu</a></button>
                                <button><a href="index.php?btn_save">Hàng tồn kho</a></button>
                                <button><a href="index.php?btn_over">Sản phẩm sắp hết</a></button>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Tồn kho
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tồn kho</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($items as $item) {
                                            extract($item);
                                        ?>
                                            <tr>
                                                <td><?= $ten_san_pham ?></td>
                                                <td><?= $so_luong ?></td>
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