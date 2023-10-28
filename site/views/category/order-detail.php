<div class="container text-center" style="margin-top:30px;">
    <div class="title-cart col">
        <a href="#"><button class="click active" onclick="changecart('cart',this)">Giỏ hàng</button></a>
        <a href="#"><button class="click" onclick="changecart('order-list',this)">Quản lý đơn hàng</button></a>
    </div>


    <!-- Đơn hàng -->
    <div id="cart" class="row">
        <div class="col-9" style="text-align:left; margin-top:20px;">
            <span class="text-title-cart">Giỏ hàng của bạn</span>
            <hr style="width:90%">
            <table>
                <tr style="text-align: center; font-size:24px;">
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng </th>
                    <th>Thành tiền</th>
                </tr>
                <?php foreach ($list_item as $item) : extract($item);
                    $image = san_pham_select_images_by_id($ma_san_pham);
                    extract($image);
                ?>
                <tr>
                    <td><img style="width:100px; padding:15px;" src="assets/images/product/<?= $hinh_anh ?>" alt="<?= $hinh_anh ?>"></td>
                    <td class="text-start"><?= $ten_san_pham ?>đ</td>
                    <td><?= number_format($don_gia) ?></td>
                    <td><?= $so_luong ?></td>
                    <td><?= number_format($thanh_tien) ?>đ</td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


<!-- Có thể bạn sẽ thích -->
<div class="product">
  <div class="tieu_de d-flex align-items-center">
    <span>Có thể bạn sẽ thích</span>
  </div>

  <div class="product-list d-flex flex-wrap">
    <?php
    $items = san_pham_top_4();
    foreach ($items as $item) :
      $loai_sp  = loai_select_by_id($item['ma_loai']);
      if ($item['giam_gia'] > 0) {
        $sale = 100 - ($item['giam_gia'] / $item['don_gia']) * 100;
      } else {
        $sale = 0;
      }
    ?>
      <div class="item">
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