<?php
$title = 'Sản phẩm - Tech Orange';
require_once './models/loai_hang.php';
require_once './models/hang_hoa.php';
require_once './models/pdo.php';
extract($_REQUEST);
if (isset($_GET['ma_loai'])) {
    $ma_loai = $_GET['ma_loai'];
    $items = san_pham_select_by_ml($ma_loai);
}

if (isset($_GET['order']) && ($_GET['order'] == 'new')) {
    $items = san_pham_select_new();
}

if (isset($_POST['keywords'])) {
    $items = hang_hoa_select_keyword($_POST['keywords']);
}
$site_view = "./site/views/product/product-list.php";
require_once './site/views/layout.php';
