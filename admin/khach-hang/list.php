<main>
    <div class="container-fluid p-3">
        <h3>Danh sách khách hàng</h3>
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <form class="search" action="index.php" method="post">
                    <input type="text" name="keywords" placeholder="Tên người dùng...">
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
            Tất cả khách hàng
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Mã người dùng</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Vai trò</th>
                        <th>Kích hoạt</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $item) {
                        extract($item);
                    ?>
                        <tr>
                            <td><?= $ma_nguoi_dung ?></td>
                            <td><?= $ho_ten ?></td>
                            <td><?= $so_dien_thoai ?></td>
                            <td><?= $email ?></td>
                            <td><?= $dia_chi ?></td>
                            <td>
                                <?php
                                if ($vai_tro == 1) {
                                    echo "Quản trị viên";
                                } else {
                                    echo "Khách hàng";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($kich_hoat == 1) {
                                    echo "Đã kích hoạt";
                                } else {
                                    echo "Không kích hoạt";
                                }
                                ?>
                            </td>
                            <td class="tac_vu">
                                <a href="index.php?btn_edit&ma_nguoi_dung=<?= $ma_nguoi_dung ?>"><i class="fa-solid fa-pen-to-square" style="color: #ee5858;"></i></a>
                                <a href="index.php?btn_delete&ma_nguoi_dung=<?= $ma_nguoi_dung ?>"><i class="fa-regular fa-trash-can" style="color: #ee5858;"></i></a>
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