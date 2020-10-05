<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/29/2020
 * Time: 3:19 PM
 */

?>
<div class="m-menu">
    <a href="<?= get_page_link(get_page_by_path('san-pham-da-xem')) ?>" title="Sản phẩm đã xem" class="p-seen">
        <span>Sản phẩm <br> đã xem</span>
        <img class="arrow-down" src="<?= THEME_URL_URI ?>/assets/assets/mobile/3006/Polygon12.png" alt="Cart Icon" />
    </a>
    <a href="<?= wc_get_checkout_url() ?>" title="Giỏ hàng" class="shopping-cart">
        <!-- <span>1</span> -->
        <img src="<?= THEME_URL_URI ?>/assets/assets/mobile/shopping-cart (1).svg" alt="Cart Icon" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="icon-menu"></i>
    </button>
</div>