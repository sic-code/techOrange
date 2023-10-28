<?php
require "../../global.php";
require "../../models/thong_ke.php";
require("../../models/user.php");
require("../../models/hang_hoa.php");
require("../../models/don_hang.php");
require("../../models/loai_hang.php");

extract($_REQUEST); 

if (exist_param("btn_list")) {
    $items = tong_tien_don_hang();
    $VIEW_NAME = "thong-ke/doanh-thu.php";
}elseif(exist_param("btn_save")){
    $items = thong_ke_hang_ton_kho();
    $VIEW_NAME = "thong-ke/ton-kho.php";
}elseif(exist_param("btn_over")){
    $items = san_pham_sap_het();
    $VIEW_NAME = "thong-ke/sap-het.php";
}
require "../layout.php";

?>