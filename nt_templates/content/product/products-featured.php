<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/10/2020
 * Time: 2:55 CH
 */

$args = [
    'post_type'         => 'product',
    'posts_per_page'    => 5,
    'meta_key'          => 'total_sales',
    'orderby'           => 'meta_value_num',
];

$products = new WP_Query($args);
?>
    
    <div class="news-sidebar">
        <div class="title-news-sb">
            <h2><?= __('Sản phẩm nổi bật', TEXTDOMAIN) ?></h2>
        </div>
        <?php while($products->have_posts()) : $products->the_post(); global $product ?>
            <div class="post-sb">
                <div class="img">
                    <a href="<?= get_permalink( $product->get_id() ) ?>" title="<?= $product->get_name() ?>"> 
                        <img src="<?= wp_get_attachment_image_url( $product->get_image_id() , array(100, 100) ) ?>" alt="<?= $product->get_name() ?>"> 
                    </a>
                </div>
                <div class="content">
                    <h4> <a href="<?= get_permalink( $product->get_id() ) ?>" title=""><?= $product->get_name() ?></a> </h4>
                    <?php if($product->is_on_sale()) : ?>
                        <p>
                            <?= $product->get_price_html() ?>
                        </p>
                    <?php else : ?>
                        <p>
                            <?= ClaWoocommerce::price_formater($product->get_regular_price()) ?>
                        </p>
                    <?php endif ?>
                </div>
            </div>
        <?php endwhile ?>
    </div>