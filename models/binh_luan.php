<?php
require_once 'pdo.php';

function binh_luan_insert($ngay_binh_luan, $noi_dung, $ma_nguoi_dung, $ma_san_pham)
{
    $sql = "INSERT INTO binh_luan (ngay_binh_luan, noi_dung, ma_nguoi_dung, ma_san_pham ) VALUES (?,?,?,?)";
    pdo_execute($sql, $ngay_binh_luan, $noi_dung, $ma_nguoi_dung, $ma_san_pham);
}

function binh_luan_select_all()
{
    $sql = "SELECT * FROM binh_luan ORDER BY ngay_binh_luan DESC";
    return pdo_query($sql);
}

function binh_luan_select_by_ma_sp($ma_san_pham)
{
    $sql = "SELECT bl.*, ho_ten, hinh_anh FROM binh_luan bl, nguoi_dung kh WHERE bl.ma_nguoi_dung = kh.ma_nguoi_dung AND ma_san_pham = ? ORDER BY ngay_binh_luan DESC";
    return pdo_query($sql, $ma_san_pham);
}

function binh_luan_delete($ma_binh_luan){
    $sql = "DELETE FROM binh_luan WHERE ma_binh_luan=?";
    if(is_array($ma_binh_luan)){
        foreach ($ma_binh_luan as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_binh_luan);
    }
}

?>