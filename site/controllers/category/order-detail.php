<?php
$title = "Chi tiết đơn hàng";
require_once './models/chi_tiet_don_hang.php';
require_once './models/hang_hoa.php';

$ma_don_hang = $_GET['ma_don_hang'];
$list_item = chi_tiet_hoa_don_select_by_id($ma_don_hang);

$site_view = "./site/views/category/order-detail.php";
require_once './site/views/layout.php'; 

?>