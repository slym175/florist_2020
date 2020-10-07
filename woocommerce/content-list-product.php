<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;
get_header();
//global $wp_query;
//
//$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$orderby = (isset($_GET['orderby']) && $_GET['orderby']) ? $_GET['orderby'] : '';
$banner = get_the_post_thumbnail_url(238, array(1900, 350));

$params = array(
    'post_type'     => 'product',
    'post_per_page' => 12,
    'order_by'      => array('date'),
    'order'         => 'DESC'
);

$products = new WP_Query($params);

?>

<main>
    <div class="banner-page">
        <img src="<?= $banner ?>" alt="">
        <h2><?= __('Sản phẩm', TEXTDOMAIN) ?></h2>
    </div>

    <?= nt()->load_template('layouts/main-breadcrumb', '', []) ?>

    <div class="list-products">
        <div class="container">
            <div class="row">
                <div class="element-list">
                    <?php if($products->have_posts()) : ?>
                        <div class="list-products-item">
                            <div class="product-grid product-grid-list">
                                <?php while ($products->have_posts()) : $products->the_post(); global $product; ?>
                                    <div class="col-md-4 col-sm-4 col-xs-12 item">
                                        <?= nt()->load_template('layouts/product-item', '', ['product' => $product]) ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <?php if($products->max_num_pages > 1) : ?>
                                <div class="pagination-clean">
                                    <ul>
                                        <li class="active-pagination"> <a href="" title=""> 1 </a> </li>
                                        <li class=""> <a href="" title=""> 2 </a> </li>
                                        <li class=""> <a href="" title=""> 3 </a> </li>
                                        <li class=""> <a href="" title=""> 4 </a> </li>
                                        <li class="active-next"> <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/pagination-icon.png" alt=""> </a> </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?= nt()->load_template('layouts/product-sidebar', '', ['cate' => '']) ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
