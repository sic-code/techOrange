<?php
require_once 'pdo.php';

// lấy toàn bộ đơn vị vận chuyển
function van_chuyen_select_all() {
    $sql = "SELECT * FROM don_vi_van_chuyen";
    return pdo_query($sql);
}

?>