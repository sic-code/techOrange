<?php 
    $title = "Chi tết sản phẩm";
    require_once './models/loai_hang.php';
    require_once './models/hang_hoa.php';
    require_once './models/binh_luan.php';

    extract($_REQUEST);
    if(isset($_POST['text_comment']) && $_POST['text_comment'] != '') {
        $ngay_binh_luan = date('Y-m-d H:i:s');
        $noi_dung = $_POST['text_comment'];
        $ma_nguoi_dung = $_SESSION['user']['ma_nguoi_dung'];
        $ma_san_pham = $_GET['ma_san_pham'];
        try {
            binh_luan_insert($ngay_binh_luan, $noi_dung, $ma_nguoi_dung, $ma_san_pham);
            unset($_POST['text_comment']);
        } catch (PDOException $e) {
            echo "Không thể thêm bình luận này vì: " . $e->getMessage();
        }
    }

    if(san_pham_exist($ma_san_pham)) {
        $items = san_pham_select_by_id($ma_san_pham);
        extract($items);
        $_SESSION['image_product'] = array($hinh_anh);
        hang_hoa_tang_so_luot_xem($ma_san_pham);
        $pictures = san_pham_anh_chi_tiet($ma_san_pham);
        foreach ($pictures as $picture) {
            array_push($_SESSION['image_product'],$picture['hinh_anh']);
        }
        $binh_luan_list = binh_luan_select_by_ma_sp($ma_san_pham);
    } else {
        header('location: ./404.php');
    }
    $site_view = "./site/views/product/product-details.php";
    require_once './site/views/layout.php';
?>