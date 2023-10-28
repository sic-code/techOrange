<?php
require_once 'pdo.php';

// Thêm người dùng mới
function user_insert($so_dien_thoai, $mat_khau, $ho_ten, $email, $hinh_anh, $dia_chi, $vai_tro, $kich_hoat)
{
  $sql = "INSERT INTO nguoi_dung (so_dien_thoai,mat_khau,ho_ten,email,hinh_anh,dia_chi,vai_tro,kich_hoat) VALUES (?,?,?,?,?,?,?,?)";
  pdo_execute($sql, $so_dien_thoai, $mat_khau, $ho_ten, $email, $hinh_anh, $dia_chi, $vai_tro == 1, $kich_hoat == 1);
}

//Cập nhật thông tin 1 người dùng
function user_update($ma_nguoi_dung, $so_dien_thoai, $mat_khau, $ho_ten, $email, $hinh_anh, $dia_chi, $vai_tro, $kich_hoat)
{
  $sql = "UPDATE nguoi_dung SET so_dien_thoai = ?, mat_khau = ?, ho_ten = ?, email = ?, hinh_anh = ?, dia_chi = ?, vai_tro = ?, kich_hoat = ? WHERE ma_nguoi_dung = ?";
  pdo_execute($sql, $so_dien_thoai, $mat_khau, $ho_ten, $email, $hinh_anh, $dia_chi, $vai_tro == 1, $kich_hoat == 1, $ma_nguoi_dung);
}

// Xóa một hoặc nhiều NGƯỜI DÙNG
function user_delete($ma_nguoi_dung)
{
  $sql = "DELETE FROM nguoi_dung  WHERE ma_nguoi_dung=?";
  if (is_array($ma_nguoi_dung)) {
    foreach ($ma_nguoi_dung as $ma) {
      pdo_execute($sql, $ma);
    }
  } else {
    pdo_execute($sql, $ma_nguoi_dung);
  }
}

// Truy vấn tất cả các người dùng
function user_select_all()
{
  $sql = "SELECT * FROM nguoi_dung";
  return pdo_query($sql);
}

//Truy vấn một nguòi dùng theo ma_nguoi_dung
function user_select_by_id($ma_nguoi_dung)
{
  $sql = "SELECT * FROM nguoi_dung WHERE ma_nguoi_dung=?";
  return pdo_query_one($sql, $ma_nguoi_dung);
}

//Truy vấn một nguòi dùng theo so_dien_thoai
function user_select_by_phone($so_dien_thoai)
{
  $sql = "SELECT * FROM nguoi_dung WHERE so_dien_thoai=?";
  return pdo_query_one($sql, $so_dien_thoai);
}

//Kiểm tra sự tồn tại của một nguoi dung
function user_exist_phone($so_dien_thoai) {
  $sql = "SELECT count(*) FROM nguoi_dung WHERE so_dien_thoai=?";
  return pdo_query_value($sql, $so_dien_thoai) > 0;
}
//Kiểm tra sự tồn tại của một nguoi dung by email
function user_exist_email($email) {
  $sql = "SELECT count(*) FROM nguoi_dung WHERE email=?";
  return pdo_query_value($sql, $email) > 0;
}

//Lấy danh sách ngươi dùng theo vai trò
function user_select_by_role($vai_tro)
{
  $sql = "SELECT * FROM nguoi_dung WHERE vai_tro=?";
  return pdo_query($sql, $vai_tro);
}

//Cập nhật mật khẩu của 1 nguoi dùng
function user_change_password($ma_nguoi_dung, $mat_khau_moi)
{
  $sql = "UPDATE nguoi_dung SET mat_khau=? WHERE ma_nguoi_dung=?";
  pdo_execute($sql, $mat_khau_moi, $ma_nguoi_dung);
}

