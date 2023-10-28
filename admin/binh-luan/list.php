<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Danh sách bình luận</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tất cả bình luận
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Số bình luận</th>
                                            <th>Mới nhất</th>
                                            <th>Cũ nhất</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                    foreach ($items as $item){
                                                        extract($item); 
                                                ?>
                                            <tr>
                                                <td><?=$ten_san_pham?></td>
                                                <td><?=$so_luong?></td>
                                                <td><?=$moi_nhat?></td>
                                                <td><?=$cu_nhat?></td>
                                                <td><a href="../binh-luan/index.php?ma_san_pham=<?=$ma_san_pham?>">Chi tiết</a></td>
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