<div class="product_details container">
    <div class="box_main">
        <div class="box_left">
            <div id="main-image" class="box_show">
                <img id="main-img" src="<?= $imagesURL ?>/product/<?= $hinh_anh ?>" alt="">
            </div>
            <div class="box_scroll">
                <?php
                if (count($_SESSION['image_product']) > 1) :
                    foreach ($_SESSION['image_product'] as $picture) :
                ?>
                        <div class="img_item" onclick="changeImage('<?= $picture ?>')"><img src="<?= $imagesURL ?>/product/<?= $picture ?>"></div>
                <?php
                    endforeach;
                endif;
                ?>
                <script>
                    function changeImage(img) {
                        document.getElementById('main-img').src = "<?= $imagesURL ?>/product/" + img;
                    }
                </script>
            </div>
        </div>



        <div class="box_right">
            <span class="product_id">Mã: <?= $ma_san_pham ?></span>
            <span class="product_name"><?= $ten_san_pham ?></span>
            <span class="product_content"><?= $mo_ta_ngan ?></span>
            <span class="price">Giá: <span class="number"><?= number_format($don_gia) ?>&#8363;</span></span>
            <div class="product_quality">
                <form action="<?= $URL ?>/?mod=category&act=cart" method="post">
                    <div>
                        <input type="button" value="&minus;" onclick="minus()">
                        <input type="number" id="cs_input_cart" class="cs_input_cart" min="1" max="<?= $so_luong ?>" value="1" name="so_luong">
                        <input type="button" value="&plus;" onclick="plus()">
                    </div>
                    <script>
                        if (true) {
                            document.getElementById('btn_addCart').disabled = true;
                        } else {
                            document.getElementById('btn_addCart').disabled = false;
                        }

                        function minus() {
                            var value = document.getElementById('cs_input_cart').value;
                            if (value > 1) {
                                value--;
                            }
                            document.getElementById('cs_input_cart').value = value;
                        }

                        function plus() {
                            var value = document.getElementById('cs_input_cart').value;
                            if (value < <?= $so_luong ?>) {
                                value++;
                            }
                            document.getElementById('cs_input_cart').value = value;
                        }
                    </script>
                    <p>Còn <strong style="color:#025959"><?= $so_luong ?></strong> sản phẩm có sẵn</p>
                    <input type="hidden" name="ma_san_pham" value="<?= $ma_san_pham ?>">
                    <input type="hidden" name="anh_san_pham" value="<?= $hinh_anh ?>">
                    <input type="hidden" name="ten_san_pham" value="<?= $ten_san_pham ?>">
                    <input type="hidden" name="don_gia" value="<?= $don_gia ?>">
                    <button type="submit" name="btn_addCart" id="btn_addCart" class="btn_cart">Thêm vào giỏ hàng</button>
                </form>
            </div>


        </div>

    </div>
    <!-- End Box-main -->
    <div class="box_content">
        <div class="tab">
            <div class="tab_item">
                Thông tin sản phẩm
            </div>
            <div class="tab_item">
                Chính sách bảo hành
            </div>
        </div>
        <div class="content_info">
            <div class="info_title">
                <h4>Tính năng:</h4>
            </div>
            <div class="info_content">
                <?= $noi_dung ?>
            </div>
        </div>
    </div>

    <!-- End box_content -->
    <div class="box_comment">
        <div class="title">ĐÁNH GIÁ SẢN PHẨM</div>
        <?php
        if (isset($_SESSION['user'])) :
        ?>
            <div class="comment_add">
                <div class="info">
                    <?php if ($_SESSION['user']['hinh_anh'] == '') : ?>
                        <img src="<?= $imagesURL ?>/User/admin.png" alt="">
                    <?php else : ?>
                        <img src="<?= $imagesURL ?>/User/<?= $_SESSION['user']['hinh_anh'] ?>" alt="<?= $_SESSION['user']['ho_ten'] ?>">
                    <?php endif; ?>
                    <span><?= $_SESSION['user']['ho_ten'] ?></span>
                </div>
                <form action="<?= $URL ?>/?mod=product&act=product-details&ma_san_pham=<?= $ma_san_pham ?>" method="post">
                    <textarea name="text_comment" id="" cols="100" rows="1" placeholder="Hãy chia sẻ ngay những trải nghiệm của bạn về sản phẩm hoặc đặt câu hỏi tại đây..."></textarea>
                    <input type="submit" value="Gửi" name="btn_comment">
                </form>
            </div>
        <?php else : ?>
            <div class="comment_add">
                <a href="<?= $URL ?>/?mod=user&act=login">Đăng nhập</a><span> để bình luận</span>
            </div>
        <?php endif ?>

        <?php
        if (count($binh_luan_list) > 0) :
            foreach ($binh_luan_list as $binh_luan) :
        ?>
                <div class="comment_list">
                    <div class="info">
                        <?php if ($binh_luan['hinh_anh'] == '') : ?>
                            <img src="<?= $imagesURL ?>/User/admin.png" alt="">
                        <?php else : ?>
                            <img src="<?= $imagesURL ?>/User/<?= $binh_luan['hinh_anh'] ?>" alt="<?= $binh_luan['ho_ten'] ?>">
                        <?php endif; ?>
                        <span><?= $binh_luan['ho_ten'] ?></span>
                        <span class="date"><?= $binh_luan['ngay_binh_luan'] ?></span>
                    </div>
                    <div class="content">
                        <?= $binh_luan['noi_dung'] ?>
                    </div>
                </div>
        <?php
            endforeach;
        endif;
        ?>
    </div>
    <!-- End Box Comment -->
</div>