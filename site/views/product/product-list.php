    <div class="banner-p">
        <img src="assets/images/slide-header/banner_1.webp" class="img-fluid w-100 list-product-banner">
    </div>

    <div class="product">
        <div class="tieu_de d-flex justify-content-between align-items-center">
            <span>Sản phẩm dành cho bạn</span>
            <div class="list-filter d-flex justify-content-between align-items-center">
                <select class="form-select">
                    <option selected>Mặc định</option>
                    <option value="1">Theo tên</option>
                    <option value="2">Giá cao đến thấp</option>
                    <option value="3">Giá thấp đến cao</option>
                </select>
            </div>
        </div>
        <!-- body list -->
        <div class="product-list d-flex flex-wrap">
            <?php
            foreach ($items as $item) :
                $loai_sp  = loai_select_by_id($item['ma_loai']);
                if ($item['giam_gia'] > 0) {
                    $sale = 100 - ($item['giam_gia'] / $item['don_gia']) * 100;
                } else {
                    
                    $sale = 0;
                }
            ?>
                <div class="item col-3">
                    <?php if ($sale > 0) : ?>
                        <span class="sale"><?= round($sale) ?>%</span>
                    <?php endif ?>
                    <a class="item-image" href="<?= $URL ?>/?mod=product&act=product-details&ma_san_pham=<?= $item['ma_san_pham'] ?>"><img src="<?= $imagesURL ?>/product/<?= $item['hinh_anh'] ?>"></a>
                    <div class="item-info">
                        <a class="item-name loai" href="<?= $URL ?>/?mod=product&act=product-list&ma_loai=<?= $item['ma_loai'] ?>"><?= $loai_sp['ten_loai'] ?></a>
                        <a class="item-name" href="<?= $URL ?>/?mod=product&act=product-details&ma_san_pham=<?= $item['ma_san_pham'] ?>"><?= $item['ten_san_pham'] ?></a>
                        <div class="price d-flex justify-content-between align-items-center">
                            <div>
                                <?php if ($sale > 0) :
                                    $don_gia = $item['giam_gia'];
                                ?>
                                    <span class="item-price"><?= number_format($item['giam_gia']) ?>&#8363;</span>
                                    <span class="old-price"><?= number_format($item['don_gia']) ?>&#8363;</span>
                                <?php else :
                                    $don_gia = $item['don_gia'];
                                ?>
                                    <span class="item-price"><?= number_format($item['don_gia']) ?>&#8363;</span>
                                <?php endif ?>
                            </div>
                            <form action="<?= $URL ?>/?mod=category&act=cart" method="post">
                                <input type="hidden" name="ma_san_pham" value="<?= $item['ma_san_pham'] ?>">
                                <input type="hidden" name="anh_san_pham" value="<?= $item['hinh_anh'] ?>">
                                <input type="hidden" name="ten_san_pham" value="<?= $item['ten_san_pham'] ?>">
                                <input type="hidden" name="so_luong" value="1">
                                <input type="hidden" name="don_gia" value="<?= $don_gia ?>">
                                <button name="btn_addCart" class="btn-right">Mua Ngay</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- body list -->

    <!-- pagination -->
    <div class="pagination list-group-item text-center">
        <a href="#"><i class="fa-regular fa-chevron-left"></i></a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#"><i class="fa-regular fa-chevron-right"></i></a>
    </div>
    <!-- End show list product -->