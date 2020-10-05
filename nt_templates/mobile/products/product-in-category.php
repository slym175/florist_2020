<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/23/2020
 * Time: 11:14 AM
 */
$limit = (isset($attr['limit']) && $attr['limit']) ? $attr['limit'] : 12;

$args = array(
    'taxonomy' => 'product_cat',
    'post_status' => 'publish',
    'show_count' => 0,
    'pad_counts' => 0,
    'hierarchical' => 1,
    'title_li' => '',
    'hide_empty' => 0,
    //    'parent' => 0
);
$all_categories = get_categories($args);
$cats = [];
foreach ($all_categories as $val) {
    $cats[] = (array)$val;
}
$cla_category = new ClaCategory();
$categories = $cla_category->data_tree($cats, 0);

$banner_group = $attr['banner_group'];
$arg = [
    'post_type' => 'banner',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'banner_group',
            'field' => 'term_id',
            'terms' => $banner_group,
            'include_children' => false
        ),
    )
];
$banners = get_posts($arg);
$count = 0;
$banner_sale = get_option('banner_sale');
ob_start();

?>

<?php if ($categories) : ?>
    <?php foreach ($categories as $key => $category) : ?>
        <?php
        $query = new WP_Query(array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $limit,
            'tax_query' => array(array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => array($category['term_id']),
            ))
        ));
        ?>
        <?php if($query->have_posts()): ?>

            <?php if (isset($banners[$count]) && $banners[$count]): ?>
                <div id="promote-bannerVSML" class="promote-vsml container" style="margin-top: -5px;padding: 0 0 10px 0 !important;">
                    <?php $link_to = get_post_meta($banners[$count]->ID, 'link_to', true); ?>
                    <a href="<?= $link_to['url'] ?>">
                        <img alt=""
                             src="<?= get_the_post_thumbnail_url($banners[$count]->ID,array(640,140)) ?>" style="width: 100%">
                    </a>
                </div>
            <?php endif; ?>

            <section class="container catalog-section">
                <ul class="nav nav-pills catalog-nav">
                    <li class="nav-item">
                        <a class="nav-link active" data-url="<?= admin_url('admin-ajax.php') ?>" data-page="1" data-limit="<?= $limit ?>" data-slugg="<?= $category['slug'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, true);">
                            <p class="m-0"><?= $category['name'] ?></p>
                        </a>
                    </li>
                    <?php if ($category['items']) : ?>
                        <?php foreach ($category['items'] as $categories_child) : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-url="<?= admin_url('admin-ajax.php') ?>" data-page="1" data-limit="<?= $limit ?>" data-slugg="<?= $categories_child['slug'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, true);">
                                    <p class="m-0"><?= $categories_child['name'] ?></p>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= get_term_link($category['term_id'], $category['taxonomy']) ?>">
                            <p class="m-0">Xem tất cả >></p>
                        </a>
                    </li>
                </ul>

                <div class="row border-top cat-product-container">
                    <div class="cat-loading d-none" >
                        <img src="<?= home_url() ?>/wp-content/uploads/2020/08/loading.gif" alt="Loading">
                    </div>
                    <?php while ($query->have_posts()) :
                        $query->the_post();
                        global $product;
                        $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                        <div class="card p-2 col-md-3 col-lg-2 col-4 product">
                            <a href="<?= the_permalink() ?>">
                                <img class="amp-img" src="<?= get_the_post_thumbnail_url(get_the_ID(), array(196, 196)) ?>" alt="<?= the_title() ?>" />
                            </a>
                            <div class="discount-status">
                                <?php if ($sale) : ?>
                                    <img data-amp-auto-lightbox-disable class="img-fluid amp-img" src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>" alt="Red Status" />
                                <?php endif; ?>
                            </div>
                            <a href="<?= the_permalink() ?>" class="product-name"><span><?= the_title() ?></span></a>
                            <div class="card-body p-0 mt-lg-2 mt-1">
                                <span class="product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                <div class="d-flex align-items-center">
                                    <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                    <?php if ($sale) : ?>
                                        <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex">
                                    <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img class="amp-img" src="<?= THEME_URL_URI ?>/assets/assets/star.svg" alt="star" /></span>
                                    <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php if($query->max_num_pages > 1) :?>
                        <div class="col-12 d-flex justify-content-center more-product">
                            <a data-url="<?= admin_url('admin-ajax.php') ?>" data-page="2" data-limit="<?= $limit ?>" data-slugg="<?= $category['slug'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, false);" title="Xem thêm" class="btn btn-outline-primary py-1 px-2 mt-3">Xem thêm <i class="fas fa-angle-down ml-2"></i></a>
                        </div>
                    <?php endif;?>
                </div>
            </section>
        <?php endif; ?>
    <?php $count++; endforeach; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>