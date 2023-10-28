<?php
require_once 'pdo.php';

// INSERT hàng hóa mới
function san_pham_add($ma_san_pham, $ten_san_pham, $don_gia, $giam_gia, $so_luong, $ngay_nhap, $hinh_anh, $mo_ta_ngan, $noi_dung, $dac_biet, $kich_hoat, $ma_loai)
{
    $sql = "INSERT INTO san_pham (ma_san_pham, ten_san_pham, don_gia, giam_gia, so_luong, ngay_nhap, hinh_anh, mo_ta_ngan, noi_dung, dac_biet, kich_hoat, ma_loai) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ma_san_pham, $ten_san_pham, $don_gia, $giam_gia, $so_luong, $ngay_nhap, $hinh_anh, $mo_ta_ngan, $noi_dung, $dac_biet == 1, $kich_hoat == 1, $ma_loai);
}

// INSERT anh_chi_tiet
function anh_chi_tiet_add($hinh_anh, $ma_san_pham)
{
    $sql = "INSERT INTO anh_chi_tiet (hinh_anh, ma_san_pham) VALUES (?,?)";
    pdo_execute($sql, $hinh_anh, $ma_san_pham);
}

// UPDATE hàng hóa
function san_pham_update($ten_san_pham, $don_gia, $giam_gia, $so_luong, $ngay_nhap, $hinh_anh, $mo_ta_ngan, $noi_dung, $dac_biet, $kich_hoat, $ma_loai, $ma_san_pham)
{
    $sql = "UPDATE san_pham SET ten_san_pham =?, don_gia =?, giam_gia =?, so_luong =?, ngay_nhap =?, hinh_anh =?, mo_ta_ngan =?, noi_dung =?, dac_biet =?, kich_hoat =?, ma_loai =? where ma_san_pham = ?";
    pdo_execute($sql, $ten_san_pham, $don_gia, $giam_gia, $so_luong, $ngay_nhap, $hinh_anh, $mo_ta_ngan, $noi_dung, $dac_biet == 1, $kich_hoat == 1, $ma_loai, $ma_san_pham);
}

// DELETE một hoặc nhiều hàng hóa
function san_pham_delete($ma_san_pham)
{
    $sql = "DELETE FROM san_pham WHERE ma_san_pham =?";
    if (is_array($ma_san_pham)) {
        foreach ($ma_san_pham as $ma) pdo_execute($sql, $ma);
    } else pdo_execute($sql, $ma_san_pham);
}

// Truy vấn tất cả các hàng hóa
function san_pham_select_all()
{
    $sql = "SELECT * FROM san_pham";
    return pdo_query($sql);
}

// Truy vấn 4 hàng hóa được yêu thích nhất
function san_pham_top_4()
{
    $sql = "SELECT * FROM san_pham ORDER BY luot_xem DESC LIMIT 4";
    return pdo_query($sql);
}

// Truy vấn hàng hóa mới nhất
function san_pham_select_new()
{
    $sql = "SELECT * FROM san_pham ORDER BY ngay_nhap DESC";
    return pdo_query($sql);
}

// Truy vấn một sản phẩm theo mã sản phẩm
function san_pham_select_by_id($ma_san_pham)
{
    $sql = "SELECT * FROM san_pham WHERE ma_san_pham=?";
    return pdo_query_one($sql, $ma_san_pham);
}

// Truy vấn danh sách hàng hóa theo mã loại
function san_pham_select_by_ma_loai($ma_loai)
{
    $sql = "SELECT * FROM san_pham WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}

// Kiểm tra sự tồn tại của một hàng hóa
function san_pham_exist($ma_san_pham)
{
    $sql = "SELECT count(*) FROM san_pham WHERE ma_san_pham=?";
    return pdo_query_value($sql, $ma_san_pham) > 0;
}


// Show hàng hóa theo mã loại
function san_pham_select_by_ml($ma_loai)
{
    $sql = "SELECT * FROM loai_hang lh JOIN san_pham sp ON lh.ma_loai = sp.ma_loai WHERE sp.ma_loai = ?";
    return pdo_query($sql, $ma_loai);
}

// Truy vấn hàng hóa theo từ khóa
function hang_hoa_select_keyword($keywords)
{
    $sql = "SELECT * FROM san_pham WHERE ten_san_pham like ?";
    return pdo_query($sql, '%' . $keywords . '%');
}

function hang_hoa_tang_so_luot_xem($ma_san_pham)
{
    $sql = "UPDATE san_pham SET luot_xem = luot_xem + 1 WHERE ma_san_pham = ?";
    return pdo_execute($sql, $ma_san_pham);
}


// Show ảnh chi tiết (Gallery)
function san_pham_anh_chi_tiet($ma_san_pham)
{
    $sql = "SELECT hinh_anh FROM anh_chi_tiet WHERE ma_san_pham=?";
    return pdo_query($sql, $ma_san_pham);
}

// Truy vấn hàng hóa bán chạy
function hang_hoa_ban_chay()
{
    $sql = "SELECT sp.* FROM chi_tiet_hoa_don ct, san_pham sp WHERE ct.ma_san_pham = sp.ma_san_pham GROUP BY ma_san_pham ORDER BY sum(ct.so_luong) DESC LIMIT 3";
    return pdo_query($sql);
}

// Truy vấn hàng hóa sắp hết
function san_pham_sap_het_hang()
{
    $sql = "SELECT * FROM san_pham WHERE so_luong < 10 ORDER BY so_luong ASC";
    return pdo_query($sql);
}

// trừ 1 sản phẩm khi mua hàng thành công
function san_pham_remove_quantity($so_luong, $ma_san_pham)
{
    $sql = "UPDATE san_pham SET so_luong = so_luong - ? WHERE ma_san_pham =?";
    pdo_execute($sql, $so_luong, $ma_san_pham);
}

function san_pham_select_images_by_id($ma_san_pham)
{
    $sql = "SELECT hinh_anh, ten_san_pham FROM san_pham WHERE ma_san_pham = ?";
    return pdo_query_one($sql, $ma_san_pham);
}
