<div class="product">
  <div class="tieu_de">
    <span>Sản phẩm mới</span><a href="<?= $URL ?>/?mod=product&act=product-list&order=new">Xem thêm</a>
  </div>

  <div class="product-list d-flex flex-wrap">
    <?php
    $items = san_pham_select_new();
    for ($i = 0; $i < 8; $i++) :
      $item = $items[$i];
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
    <?php endfor; ?>
  </div>
</div>