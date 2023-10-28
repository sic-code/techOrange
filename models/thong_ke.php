<?php
require_once 'pdo.php';

function thong_ke_hang_hoa(){
    $sql = "SELECT lo.ma_loai, lo.ten_loai,"
            . " COUNT(*) so_luong,"
            . " MIN(hh.don_gia) gia_min,"
            . " MAX(hh.don_gia) gia_max,"
            . " AVG(hh.don_gia) gia_avg"
            . " FROM hang_hoa hh "
            . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
            . " GROUP BY lo.ma_loai, lo.ten_loai";
    return pdo_query($sql);
}

function thong_ke_binh_luan(){
    $sql = "SELECT hh.ma_san_pham, hh.ten_san_pham,"
            . " COUNT(*) so_luong,"
            . " MIN(bl.ngay_binh_luan) cu_nhat,"
            . " MAX(bl.ngay_binh_luan) moi_nhat"
            . " FROM binh_luan bl "
            . " JOIN san_pham hh ON hh.ma_san_pham=bl.ma_san_pham "
            . " GROUP BY hh.ma_san_pham, hh.ten_san_pham"
            . " HAVING so_luong > 0";
    return pdo_query($sql);
}

function thong_ke_hang_ton_kho(){
    $sql = "SELECT * FROM san_pham";
    return pdo_query($sql);
}

function tong_tien_don_hang(){
    $sql = "SELECT SUM(tong_tien) as doanh_thu from don_hang where trang_thai = '3'";
    return pdo_query_one($sql);
}

function bill_select_sum_by_month($month){
    $sql = "SELECT SUM(tong_tien) 
    AS doanh_thu_thang
    FROM don_hang 
    WHERE MONTH(ngay_dat_hang) = ? and trang_thai=3";

    return pdo_query_one($sql, $month)['doanh_thu_thang'];
}

function san_pham_sap_het(){
    $sql = "SELECT * FROM san_pham where so_luong < 10 ORDER BY so_luong ASC"; 
    return pdo_query($sql);
}

function don_hang_thanh_cong($month){
    $sql = "SELECT COUNT(ma_don_hang) 
    AS don_hang_thanh_cong
    FROM don_hang 
    WHERE MONTH(ngay_dat_hang) = ? and trang_thai = 3";

    return pdo_query_one($sql, $month)['don_hang_thanh_cong'];
}

function don_hang_bi_huy($month){
    $sql = "SELECT COUNT(ma_don_hang) 
    AS don_hang_bi_huy
    FROM don_hang 
    WHERE MONTH(ngay_dat_hang) = ? and trang_thai = 2";

    return pdo_query_one($sql, $month)['don_hang_bi_huy'];
}