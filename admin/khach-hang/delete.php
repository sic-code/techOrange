<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Danh sách khách hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ol>
                        <div class="col-12" style="text-align:right;">
                            <div class="title-loai-hang col-10 m-2">
                                <button><a href="index.php?btn_list">Danh sách khách hàng</a></button>
                                <button><a href="index.php?btn_new">Thêm mới khách hàng</a></button>
                                <button><a href="index.php?btn_delete">Xóa khách hàng</a></button>
                            </div>
                            <form action="index.php">
                                <input type="text" placeholder="Search...">
                            </form>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tất cả khách hàng
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Mật khẩu</th>
                                            <th>Số điện thoại</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($items as $item) {
                                            extract($item);
                                        ?>
                                            <tr>
                                                <td><?= $ho_ten ?></td>
                                                <td><?= $email ?></td>
                                                <td><?= $mat_khau ?></td>
                                                <td><?= $so_dien_thoai ?></td>
                                                <td><a href="index.php?btn_delete">Xóa</a></td>
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