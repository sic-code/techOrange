<div class="show-categoty">
    <?php
    require_once './models/loai_hang.php';
    $items = count_product();
    foreach ($items as $item) :
    ?>
        <div class="item col">
            <a class="d-flex align-items-center justify-content-center" href="<?= $URL ?>/?mod=product&act=product-list&ma_loai=<?= $item['ma_loai'] ?>">
                <div class="image-category">
                    <img src="<?= $imagesURL ?>/category/<?= $item['hinh_anh'] ?>" alt="<?= $item['ten_loai'] ?>">
                </div>
                <div class="info-category">
                    <span><?= $item['ten_loai'] ?>
                        <p class="m-0"><?= $item['so_luong_sp'] ?> sản phẩm</p>
                    </span>
                </div>
            </a>
        </div>
    <?php endforeach ?>
</div>