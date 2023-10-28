<?php
require "../../global.php";
require "../../models/don_hang.php";
require "../../models/hang_hoa.php";
//--------------------------------//

//phân giải các field name từ form trong form thành cách biến
extract($_REQUEST); 

if (exist_param("btn_wait")) {
    $items = don_hang_cho();
    $VIEW_NAME = "don-hang/wait.php";
}elseif(exist_param("btn_trans")){
    $items = don_hang_van_chuyen();
    $VIEW_NAME = "don-hang/trans.php";
}elseif(exist_param("btn_cancel")){
    $items = don_hang_huy();
    $VIEW_NAME = "don-hang/cancel.php";
}elseif(exist_param("btn_delete")){
    $items = don_hang_delete($ma_don_hang);
    $VIEW_NAME = "don-hang/Success.php";
}elseif(exist_param("btn_complete")){
    $items = don_hoan_thanh();
    $VIEW_NAME = "don-hang/complete.php";
}elseif(exist_param("btn_edit")){
    $items= don_hang_select_by_id($ma_don_hang);
    extract($items);
    $VIEW_NAME= "don-hang/edit.php";
}elseif(exist_param("btn_details")){
    $items = hoa_don_select_by_id($ma_don_hang);
    $VIEW_NAME= "don-hang/details.php";
}elseif (exist_param("btn_update")) {
    if (empty($trang_thai)) {
        $MESSAGE_ERROR = "Điền đầy đủ thông tin";
    } else {
        try {
            $items = update_trang_thai($ma_don_hang, $trang_thai);
            $MESSAGE_ERROR = "Cập nhật thành công";
        } catch (Exception $exc) {
            $MESSAGE = "Cập nhật thất bại!";
        }
    }
    $VIEW_NAME = "don-hang/edit.php";
}
    
require "../layout.php";
