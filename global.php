<?php
$URL = "/TechOrange";
$ADMIN_URL = "$URL/admin";
$imagesURL = "$URL/assets/images";
$site_view = "$URL/site/views/home/home.php";
$VIEW_CART = "site/views/category/cart_list.php";
$title = "Tech Orange";
$MESSAGE = "";
$MESSAGE_ERROR = "";
$MESSAGE_SUCCESS = "";

// Đường dẫn chứa hình khi upload
$IMAGE_DIR = $_SERVER["DOCUMENT_ROOT"] . "$imagesURL";

/* Lưu file upload vào folder
 * $fieldname là tên field trong form, $target_dir là folder lưu file
 * trả về tên file đã upload
 */
function save_file($fieldname, $target_dir){
    $file_uploaded = $_FILES[$fieldname]; //uploahinhanh
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}

/* Tạo cookie
 * $name là tên cookie, $value là giá trị cookie
 * $day là số ngày tồn tại cookie
 */
function add_cookie($name, $value, $day){
    setcookie($name, $value, time() + (86400 * $day), "/");
}
/* Xóa cookie, $name là tên cookie muốn xóa
 */
function delete_cookie($name){
    add_cookie($name, "", -1);
}
/* Đọc giá trị cookie
 * $name là tên cookie, trả vể giá trị của cookie
 */
function get_cookie($name){
    return $_COOKIE[$name]??'';
}

function exist_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}

function check_login()
{
    global $URL;
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['vai_tro'] == 0) {
            return;
        }
        if (strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE) {
            return;
        }
    }
}
?>