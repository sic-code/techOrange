<?php
require_once 'pdo.php';

//Thêm loại mới
function loai_hang_insert($ten_loai, $hinh_anh, $kich_hoat)
{
    $sql = "INSERT INTO loai_hang(ten_loai,hinh_anh,kich_hoat) VALUES(?,?,?)";
    pdo_execute($sql, $ten_loai, $hinh_anh, $kich_hoat==1);
}

//Cập nhật tên loại
function loai_hang_update($ma_loai, $ten_loai, $hinh_anh, $kich_hoat)
{
    $sql = "UPDATE loai_hang SET ten_loai = ?, hinh_anh = ?, kich_hoat = ? WHERE ma_loai = ?";
    pdo_execute($sql, $ten_loai, $hinh_anh, $kich_hoat==1, $ma_loai);
}

// Xóa một hoặc nhiều loại
function loai_hang_delete($ma_loai)
{
    $sql = "DELETE FROM loai_hang WHERE ma_loai = ?";
    if (is_array($ma_loai)) {
        foreach ($ma_loai as $ma) pdo_execute($sql, $ma);
    } else pdo_execute($sql, $ma_loai);
}

// Truy vấn tất cả các loại
function loai_hang_select_all()
{
    $sql = "SELECT * FROM loai_hang";
    return pdo_query($sql);
}

//Truy vấn một loại theo mã
function loai_select_by_id($ma_loai)
{
    $sql = "SELECT * FROM loai_hang WHERE ma_loai = ?";
    return pdo_query_one($sql, $ma_loai);
}

//Kiểm tra sự tồn tại của một loại
function loai_exist($ma_loai)
{
    $sql = "SELECT count(*) FROM loai_hang WHERE ma_loai = ?";
    return pdo_query_value($sql, $ma_loai) > 0;
}

// Đếm số lượng sp thuộc mỗi loại
function count_product()
{
    $sql = "SELECT lh.*,count(ma_san_pham) AS so_luong_sp FROM loai_hang lh, san_pham sp WHERE lh.ma_loai = sp.ma_loai GROUP BY lh.ma_loai ORDER BY count(ma_san_pham) DESC LIMIT 4";
    return pdo_query($sql);
}
