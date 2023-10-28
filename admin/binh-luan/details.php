<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Chi tiết bình luận</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Chi tiết bình luận
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nội dung</th>
                                            <th>Ngày bình luận</th>
                                            <th>Người bình luận</th>
                                            <th>Xóa bình luận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($items as $item){
                                                extract($item); 
                                        ?>
                                        <tr>
                                            <td><?=$noi_dung?></td>
                                            <td><?=$ngay_binh_luan?></td>
                                            <td><?=$ho_ten?></td>

                                            <td>
                                                <a href="index.php?btn_delete&ma_binh_luan=<?=$ma_binh_luan?>"><i class="fa-regular fa-trash-can" style="color: #ee5858;"></i></a>
                                            </td>
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