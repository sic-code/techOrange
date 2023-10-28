<div class="best-seller flex-wrap">
  <div class="bs-list row m-0">
    <?php
    $items = hang_hoa_ban_chay();
    foreach ($items as $item) :
      if ($item['giam_gia'] > 0) {
        $don_gia = $item['giam_gia'];
      } else {
        $don_gia = $item['don_gia'];
      }
    ?>
      <div class="bs-item col position-relative">
        <div class="bs-info">
          <div class="bs-name">
            <a href="<?= $URL ?>/?mod=product&act=product-details&ma_san_pham=<?= $item['ma_san_pham'] ?>"><?= $item['ten_san_pham'] ?></a>
          </div>
          <div class="bs-price">
            <label>Giá chỉ <strong><?= number_format($don_gia) ?>&#8363;</strong></label>
          </div>
        </div>
        <div class="bs-btn">
          <form action="<?= $URL ?>/?mod=category&act=cart" method="post">
            <input type="hidden" name="ma_san_pham" value="<?= $item['ma_san_pham'] ?>">
            <input type="hidden" name="anh_san_pham" value="<?= $item['hinh_anh'] ?>">
            <input type="hidden" name="ten_san_pham" value="<?= $item['ten_san_pham'] ?>">
            <input type="hidden" name="so_luong" value="1">
            <input type="hidden" name="don_gia" value="<?= $don_gia ?>">
            <button name="btn_addCart">Mua Ngay</button>
          </form>
        </div>
        <div class="bs-image position-absolute">
          <img src="<?= $imagesURL ?>/product/<?= $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>">
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>