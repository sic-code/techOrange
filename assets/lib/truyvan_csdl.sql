-- -----------------------------------------------------
-- Table nguoi_dung
-- -----------------------------------------------------
-- Thêm khách hàng
insert into nguoi_dung (so_dien_thoai,mat_khau,ho_ten,email,hinh_anh,dia_chi,vai_tro,kich_hoat) values (?,?,?,?,?,?,?,?);

-- Cập nhật thông tin của một khách hàng
update nguoi_dung set so_dien_thoai = ?, mat_khau = ?, ho_ten = ?, email = ?, hinh_anh = ?, dia_chi = ?, vai_tro = ?, kich_hoat = ? where ma_nguoi_dung = ?;

-- Thay đổi mật khẩu
update nguoi_dung set mat_khau = ? where ma_nguoi_dung = ?;

-- Xóa khách hàng
delete from nguoi_dung where ma_nguoi_dung = ?;

-- Truy vấn ds tất cả người dùng
select * from nguoi_dung;

-- Truy vấn ds tất cả người dùng là khách hàng
select * from nguoi_dung where vai_tro = 0;

-- Truy vấn ds tất cả người dùng là quản trị viên
select * from nguoi_dung where vai_tro = 1;

-- Truy vấn thông tin người dùng bằng số điện thoại
select * from nguoi_dung where so_dien_thoai = ?;

-- kiểm tra số điện thoại đã được đăng ký hay chưa
select count(*) from nguoi_dung where so_dien_thoai = ?;

-- kiểm tra email đã được đăng ký hay chưa
select count(*) from nguoi_dung where email = ?;


-- -----------------------------------------------------
-- Table loai_hang
-- -----------------------------------------------------
-- Thêm loại hàng
insert into loai_hang (ten_loai) values (?);

-- Cập nhật tên loại
update loai_hang set ten_loai = ? where ma_loai = ?;

-- Xóa loại
delete from loai_hang where ma_loai = ?;

-- Truy vấn thông tin tất cả loại hàng
select * from loai_hang;

-- Kiểm tra tồn tại của một loại hàng
select count(*) from loai_hang where ten_loai_hang = ?;

-- -----------------------------------------------------
-- Table thuong_hieu
-- -----------------------------------------------------
-- Thêm thương hiệu
insert into thuong_hieu (ten_thuong_hieu) values (?);

-- Cập nhật tên thương hiệu
update thuong_hieu set ten_thuong_hieu = ? where ma_thuong_hieu = ?;

-- Xóa thương hiệu
delete from thuong_hieu where ma_thuong_hieu = ?;

-- Truy vấn thông tin tất cả thương hiệu
select * from thuong_hieu;

-- Kiểm tra tồn tại của một thương hiệu
select count(*) from thuong_hieu where ten_thuong_hieu = ?;

-- -----------------------------------------------------
-- Table thuong_hieu_loai_hang
-- -----------------------------------------------------
-- Thêm
insert into thuong_hieu_loai_hang (ma_loai, ma_thuong_hieu) values (?,?);

-- Sửa
update thuong_hieu_loai_hang set ma_loai = ?, ma_thuong_hieu = ? where ma_loai = ? and ma_thuong_hieu = ?;

-- Xóa
delete from thuong_hieu_loai_hang where ma_loai = ? and ma_thuong_hieu = ?;

-- Truy vấn
select ten_loai, ten_thuong_hieu from thuong_hieu_loai_hang as lth , loai_hang as lh, thuong_hieu as th where lth.ma_loai = lh.ma_loai and lth.ma_thuong_hieu = th.ma_thuong_hieu;

-- Truy vấn các thương hiệu thuộc mỗi loại hàng
select th.ma_thuong_hieu, ten_thuong_hieu from thuong_hieu_loai_hang as lth , loai_hang as lh, thuong_hieu as th where lth.ma_loai = lh.ma_loai and lth.ma_thuong_hieu = th.ma_thuong_hieu and lh.ma_loai = ?;

-- -----------------------------------------------------
-- Table catalog
-- -----------------------------------------------------
-- Thêm catalog
insert into catalog (ten_catalog, thu_tu) values (?,?);

-- Cập nhật thông tin catalog
update catalog set ten_catalog = ?, thu_tu = ? where ma_catalog = ?;

-- Xóa catalog
delete from catalog where ma_catalog = ?;

-- Truy vấn danh sách catalog
select * from catalog;

-- kiểm tra catalog có tồn tại
select count(*) from catalog where ma_catalog = ?;

-- -----------------------------------------------------
-- Table san_pham
-- -----------------------------------------------------
-- Thêm sản phẩm
insert into san_pham (ten_san_pham, don_gia, giam_gia, so_luong, ngay_nhap, hinh_anh, mo_ta_ngan, noi_dung, dac_biet, kich_hoat, anh_slide, ma_loai, ma_thuong_hieu, ma_catalog) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?);

-- sửa sản phẩm
update sanpham set ten_san_pham =?, don_gia =?, giam_gia =?, so_luong =?, ngay_nhap =?, hinh_anh =?, mo_ta_ngan =?, noi_dung =?, dac_biet =?, kich_hoat =?, anh_slide =?, ma_loai =?, ma_thuong_hieu =?, ma_catalog =? where ma_san_pham = ?;

-- -----------------------------------------------------
-- Table anh_chi_tiet
-- -----------------------------------------------------
-- Thêm
insert into anh_chi_tiet (hinh_anh, ma_san_pham) values (?,?);

select *
from chi_tiet_hoa_don
group by ma_san_pham;

select *
from san_pham
where ma_san_pham in (
select ma_san_pham
from chi_tiet_hoa_don
group by ma_san_pham
order by sum(so_luong) desc);

select sp.* from chi_tiet_hoa_don ct, san_pham sp where ct.ma_san_pham = sp.ma_san_pham group by ma_san_pham order by sum(ct.so_luong) desc limit 3;

select lh.*, count(ma_san_pham) as so_luong_sp from loai_hang lh, san_pham sp where lh.ma_loai = sp.ma_loai group by lh.ma_loai order by count(ma_san_pham) desc limit 4;