<?php
require ("pdo.php");


function chi_tiet_hoa_don_select_by_id($ma_don_hang){
    $sql = "SELECT * FROM chi_tiet_hoa_don WHERE ma_don_hang=?";
    return pdo_query($sql,$ma_don_hang);
}

?>