<?php
require "../../global.php";
require "../../models/binh_luan.php";
require "../../models/thong_ke.php";
//--------------------------------//

//phân giải các field name từ form trong form thành cách biến
extract($_REQUEST); 

if (exist_param ("ma_san_pham",$_REQUEST)) {
    $items = binh_luan_select_by_ma_sp($ma_san_pham);
    $VIEW_NAME = "details.php";
}elseif (exist_param("btn_delete")) {
    $items = thong_ke_binh_luan();
    try {
        $items = binh_luan_delete($ma_binh_luan);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW_NAME = "Success.php";
}else {
    $items = thong_ke_binh_luan();
    $VIEW_NAME = "list.php";
}
    
require "../layout.php";

?>