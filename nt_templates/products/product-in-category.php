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

$arr = [
    'taxonomy' => 'product_cat',
    'hide_empty' => 0,
    'meta_query' => array(
        'show_home' => array(
            'key' => 'show_home',
            'type' => 'NUMERIC',
            'value' => 1,
        ))
];
$show = get_categories($arr);
$cats_show = [];
foreach ($show as $val) {
    $cats_show[] = (array)$val;
}
$categories = $cla_category->data_tree_1($cats, $cats_show);

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
ob_start();

?>
<?php if ($categories): ?>
    <?php foreach ($categories as $key => $category): ?>
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
        <?php if ($query->have_posts()): ?>
            <?php if (isset($banners[$count]) && $banners[$count]): ?>
                <div id="promote-bannerVSML" class="promote-vsml container" style="padding: 20px 0 0 0 !important;">
                    <?php $link_to = get_post_meta($banners[$count]->ID, 'link_to', true); ?>
                    <a href="<?= $link_to['url'] ?>">
                        <img alt="" style="width:100%"
                             src="<?= get_the_post_thumbnail_url($banners[$count]->ID,array(1200,140)) ?>" style="width: 100%">
                    </a>
                </div>
            <?php endif; ?>
            <section class="mt-md-4 mt-2 devices">
                <div class="container">
                    <div class="row devices-nav">
                        <ul class="nav w-100 justify-content-start bg-nav">
                            <li class="nav-item">
                                <a class="nav-link active h-100" data-url="<?= admin_url('admin-ajax.php') ?>" data-page="1" data-limit="<?= $limit ?>" data-slugg="<?= $category['slug'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, true);"><?= $category['name'] ?></a>
                            </li>
                            <?php if ($category['items']): ?>
                                <?php $cat_chunk = array_chunk($category['items'], 5, true)[0] ?>
                                <?php foreach ($cat_chunk as $item => $categories_child): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" data-url="<?= admin_url('admin-ajax.php') ?>" data-page="1" data-limit="<?= $limit ?>" data-slugg="<?= $categories_child['slug'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, true);"><?= $categories_child['name'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <li class="nav-item ml-auto">
                                <a class="nav-link"
                                   href="<?= get_term_link($category['term_id'], $category['taxonomy']) ?>">Xem tất cả
                                    >></a>
                            </li>
                        </ul>
                    </div>

                    <div class="row d-flex devices-container">
                        <div class="cat-loading d-none" >
                            <img src="<?= home_url() ?>/wp-content/uploads/2020/08/loading.gif" alt="Loading">
                        </div>
                        <?php while ($query->have_posts()) : $query->the_post();
                            global $product ?>
                            <div class="col-lg-2 col-md-3 col-6 card p-0 product">
                                <a href="<?= the_permalink() ?>">
                                    <img class="card-img-top"
                                         src="<?= get_the_post_thumbnail_url(get_the_ID(), array(196, 196)) ?>"
                                         alt="Card image cap">
                                </a>
                                <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
                                    <img class="img-fluid" src="<?= THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>"
                                         alt="Red Status">
                                </span>

                                <a href="<?= the_permalink() ?>"
                                   class="product-name"><span><?= the_title() ?></span></a>

                                <div class="card-body p-2">
                                    <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                    <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                                        <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                        <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                                        <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                                    </div>
                                    <div class="d-flex">
                                        <span class="product-star"><?= (float)$product->get_average_rating() ?>/5 <img
                                                    src="<?= THEME_URL_URI . '/assets/images/star.svg' ?>"
                                                    alt="star"></span>
                                        <span class="product-cmt"><?= $product->get_rating_count() ?> đánh giá</span>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php if($query->max_num_pages > 1) : ?>
                            <div class="col-12">
                                <div class="col-12 text-center">
                                    <a data-url="<?= admin_url('admin-ajax.php') ?>" data-page="1" data-limit="<?= $limit ?>" data-slugg="<?= $category['slug'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, false);"
                                       class="btn-more px-4 py-2 mt-md-4 mt-2">
                                        <span class="mr-3">Xem thêm</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </section>
        <?php endif; ?>
        <?php $count++; endforeach; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>
