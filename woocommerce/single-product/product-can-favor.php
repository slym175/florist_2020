<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/10/2020
 * Time: 2:08 PM
 */

$can_favor = get_post_meta(get_the_ID(), 'can_favor', true);
if ($can_favor) {
    $args_can_favor = [
        'post_type'     => 'product',
        'post_status'   => 'publish',
        'post__in'      => $can_favor,
        'post_per_page' => '3'
    ];
    $product_can_favor = new WP_Query($args_can_favor);

}
$banner_sale = get_option('banner_sale');
?>
<?php if (isset($product_can_favor) && $product_can_favor): ?>
    <div class="title-left">
        <h2><span><?= __('Sản phẩm có thể bạn thích', TEXTDOMAIN) ?> <img src="<?= THEME_URL_URI ?>/assets/img/la.png" alt=""> </span></h2>
    </div>
    <div class="container border-bottom pb-4">
        <div class="row p-0 border-top border-left">
            <?php while ($product_can_favor->have_posts()): $product_can_favor->the_post(); global $product?>
                <div class="col-lg-3 col-md-3 col-6 card p-0 product">
                    <a href="<?= the_permalink() ?>">
                        <img class="card-img-top"
                             src="<?= get_the_post_thumbnail_url(get_the_ID(), array(300, 300)) ?>"
                             alt="Card image cap">
                    </a>
                    <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
                                <img class="img-fluid" src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>"
                                     alt="Red Status">
                            </span>

                    <a href="<?= the_permalink() ?>"
                       class="product-name"><span><?= the_title() ?></span></a>

                    <div class="card-body p-2">
                        <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                        <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                            <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên h' ?></span>
                            <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                            <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                        </div>
                        <div class="d-flex">
                            <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img src="<?= THEME_URL_URI.'/assets/images/star.svg' ?>" alt="star"></span>
                            <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_query() ?>


<div class="product-grid">
    <div class="col-md-3 col-sm-3 col-xs-12 item">
        <div class="product-item">
            <div class="img">
                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/14.png" alt=""></a>
            </div>
            <div class="content">
                <div class="star">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                </div>
                <div class="title-pro">
                    <a href="" title="">Cây ráng ổ phụng - Đem may mắn đến cho gia chủ.</a>
                </div>
                <div class="box">
                    <p>450.000 ₫ <span>550.000 ₫</span> </p>
                    <div class="gh">
                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/ghn.png" alt=""> </a>
                        <a href="" title="" class="hover"> <img src="<?= THEME_URL_URI ?>/assets/img/ght.png" alt=""> </a>
                    </div>
                </div>
            </div>
            <div class="sale">
                <img src="<?= THEME_URL_URI ?>/assets/img/gg.png" alt=""> <span> 20%</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 item">
        <div class="product-item">
            <div class="img">
                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/15.png" alt=""></a>
            </div>
            <div class="content">
                <div class="star">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                </div>
                <div class="title-pro">
                    <a href="" title="">Cây ráng ổ phụng - Đem may mắn đến cho gia chủ.</a>
                </div>
                <div class="box">
                    <p>450.000 ₫ <span>550.000 ₫</span> </p>
                    <div class="gh">
                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/ghn.png" alt=""> </a>
                        <a href="" title="" class="hover"> <img src="<?= THEME_URL_URI ?>/assets/img/ght.png" alt=""> </a>
                    </div>
                </div>
            </div>
            <div class="sale">
                <img src="<?= THEME_URL_URI ?>/assets/img/gg.png" alt=""> <span> 20%</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 item">
        <div class="product-item">
            <div class="img">
                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/16.png" alt=""></a>
            </div>
            <div class="content">
                <div class="star">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                </div>
                <div class="title-pro">
                    <a href="" title="">Cây ráng ổ phụng - Đem may mắn đến cho gia chủ.</a>
                </div>
                <div class="box">
                    <p>450.000 ₫ <span>550.000 ₫</span> </p>
                    <div class="gh">
                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/ghn.png" alt=""> </a>
                        <a href="" title="" class="hover"> <img src="<?= THEME_URL_URI ?>/assets/img/ght.png" alt=""> </a>
                    </div>
                </div>
            </div>
            <div class="sale">
                <img src="<?= THEME_URL_URI ?>/assets/img/gg.png" alt=""> <span> 20%</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 item">
        <div class="product-item">
            <div class="img">
                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/17.png" alt=""></a>
            </div>
            <div class="content">
                <div class="star">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                </div>
                <div class="title-pro">
                    <a href="" title="">Cây ráng ổ phụng - Đem may mắn đến cho gia chủ.</a>
                </div>
                <div class="box">
                    <p>450.000 ₫ <span>550.000 ₫</span> </p>
                    <div class="gh">
                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/ghn.png" alt=""> </a>
                        <a href="" title="" class="hover"> <img src="<?= THEME_URL_URI ?>/assets/img/ght.png" alt=""> </a>
                    </div>
                </div>
            </div>
            <div class="sale">
                <img src="<?= THEME_URL_URI ?>/assets/img/gg.png" alt=""> <span> 20%</span>
            </div>
        </div>
    </div>
</div>
