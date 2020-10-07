<?php if($products->have_posts()) : ?>               
    <div class="title-left">
        <h2><span><?= __('Sản phẩm cùng loại', TEXTDOMAIN) ?><img src="<?= THEME_URL_URI ?>/assets/img/la.png" alt=""></span></h2>
    </div>
    <div class="product-grid product-grid-list">
        <?php while ($products->have_posts()) : $products->the_post(); global $product; ?>
            <div class="col-md-4 col-sm-4 col-xs-12 item">
                <?= nt()->load_template('layouts/product-item', '', ['product' => $product]) ?>
            </div>
        <?php endwhile; ?>
    </div>
    <?php if($products->max_num_page > 1) : ?>
        <div class="pagination-clean">
            <ul>
                <li class="active-pagination"> <a href="" title=""> 1 </a> </li>
                <li class=""> <a href="" title=""> 2 </a> </li>
                <li class=""> <a href="" title=""> 3 </a> </li>
                <li class=""> <a href="" title=""> 4 </a> </li>
                <li class="active-next"> <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/pagination-icon.png" alt=""> </a> </li>
            </ul>
        </div>
    <?php endif ?>
<?php endif ?>