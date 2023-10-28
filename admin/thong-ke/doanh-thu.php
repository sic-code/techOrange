<?php
$current_month = $_GET['month'] ?? intval(date('m'));
$current_year = $_GET['year'] ?? intval(date('Y'));
?>
<main>

    <div class="container-fluid p-3">
        <h3>Thống kê doanh thu</h3>
        <div class="tools">
            <?php isset($MESSAGE) ? $MESSAGE : $MESSAGE = ""; ?>
            <span class="text-danger"><?= $MESSAGE ?></span>
            <div class="d-flex ms-auto gap-3">
                <a href="index.php?btn_list" class="active">Doanh thu</a>
                <a href="index.php?btn_over">Sản phẩm sắp hết</a>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-xl-3 col-md-6">
                <div class="card cart_dashboard dashboard-one ">
                    <div class="card-body cart_dashboard pb-0 cart_dashboard_title">Tổng số khách hàng:</div>
                    <span class="m-auto cart_dashboard_quantity p-4"><?=count(user_select_all())?></span>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card cart_dashboard dashboard-two">
                    <div class="card-body cart_dashboard pb-0 cart_dashboard_title">Tổng số sản phẩm:</div>
                    <span class="m-auto cart_dashboard_quantity p-4"><?=count(san_pham_select_all())?></span>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card cart_dashboard dashboard-three">
                    <div class="card-body cart_dashboard pb-0 cart_dashboard_title" >Tổng số đơn hàng:</div>
                    <span class="m-auto cart_dashboard_quantity p-4"><?=count(don_hang_select_all())?></span>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card cart_dashboard dashboard-four">
                    <div class="card-body cart_dashboard pb-0 cart_dashboard_title">Tổng số loại hàng:</div>
                    <span class="m-auto cart_dashboard_quantity p-4"><?=count(loai_hang_select_all())?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="display:flex;">
        <div class="card mx-2 w-75 m-auto">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Doanh thu
            </div>
            <div class="card-body">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
                <script>
                    const ctx = document.getElementById('myChart');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],

                            datasets: [{
                                label: 'Doanh thu tháng',
                                data: [
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        echo bill_select_sum_by_month($i, $current_year) . ",";
                                    }
                                    ?>
                                ],
                                borderWidth: 1,
                                backgroundColor: '#2A6BBF',
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <div class="card mx-2 w-75 m-auto">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Đơn hàng theo tháng
            </div>
            <div class="card-body">
                <div>
                    <canvas id="myChartMonth"></canvas>
                </div>
                <script>
                    const ctxMonth = document.getElementById('myChartMonth');

                    new Chart(ctxMonth, {
                        type: 'bar',
                        data: {
                            labels: ['T1', 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],

                            datasets: [{
                                label: 'Đơn hàng thành công',
                                data: [
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        echo don_hang_thanh_cong($i, $current_year) . ",";
                                    }
                                    ?>
                                ],
                                borderWidth: 1,
                                backgroundColor: '#2A6BBF',
                            },
                            {
                                label: 'Đơn hàng bị hủy',
                                data: [
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        echo don_hang_bi_huy($i, $current_year) . ",";
                                    }
                                    ?>
                                ],
                                borderWidth: 1,
                                backgroundColor: '#D95436',
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>

    </div>


</main>