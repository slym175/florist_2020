<?php
$category = get_queried_object();
$cat_name = $category->name;
$t_id = $category->term_id;

$limit = 8;
$product_cats = get_terms([
    'taxonomy' => 'product_cat',
    'post_status' => 'publish',
    'show_count' => 0,
    'pad_counts' => 0,
    'hierarchical' => 1,
    'title_li' => '',
    'hide_empty' => 0,
]);
$prd_cats = [];

foreach ($product_cats as $key => $product_cat) {
    $prd_cats[] = (array)$product_cat;
}
$cla_cat = new ClaCategory();
$categories = $cla_cat->data_tree($prd_cats, $t_id);


$new_ids = get_field('new_ids', 'product_cat_' . $t_id);

//Sản phẩm mua kèm
$product_purchased_together = get_field('product_ids', 'product_cat_' . $t_id);
$page_post_link = get_field('page_post_link', 'product_cat_' . $t_id);
$descriptions = get_field('descriptions', 'product_cat_' . $t_id);
$banner_sale = get_option('banner_sale');
?>
<section class="container border-bottom mb-3">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb" class="m-breadcrumb">
                <?php
                $args = array(
                    'delimiter' => '',
                    'home' => 'Trang chủ',
                    'wrap_before' => '<ol class="breadcrumb breadcrumb-left p-0 m-0">',
                    'wrap_after' => '</ol>',
                    'before' => '<li class="breadcrumb-item">',
                    'after' => '</li>',
                );
                ?>
                <?php woocommerce_breadcrumb($args); ?>
            </nav>
        </div>
    </div>
</section>
<?php if ($category->description) : ?>
    <section class="container py-3 mb-3 border-bottom">
        <div class="row">
            <div class="col-12 font-14 show-hide-text">
                <p class="text-justify text-2"><?= $category->description ?></p>
                <?php if($descriptions): ?>
                <div class="d-flex justify-content-center">
                    <a class="font-12 show-desc" href="#descriptions">Xem thêm<i class="fas fa-chevron-down font-12 ml-2"></i></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($categories) : ?>
    <?php foreach ($categories as $key => $category) : ?>
        <?php
            $query = new WP_Query(array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => 12,
                'tax_query' => array(array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => array($category['term_id']),
                ))
            ));
        ?>
        <?php if(isset($category['items']) && $query->have_posts()) : ?>
            <section class="container catalog-section">
                <?php if ($query->have_posts()): ?>
                    <div class="row mb-3">
                        <div class="col-12">
                            <a <?= ($category['items']) ? 'href="#collapseCatalog' . $category['term_id'] . '"' : 'href="' . get_term_link($category['term_id'], $category['taxonomy']) . '"' ?>
                                    class="btn btn-catalog" data-toggle="<?= ($category['items']) ? 'collapse' : '' ?>"
                                    role="button" aria-expanded="false"
                                    aria-controls="collapseContent">
                                <span><?= $category['name'] ?></span>
                                <span>Xem tất cả >></span>
                            </a>
                            <?php if ($category['items']) : ?>
                                <div class="collapse f-catalog" id="collapseCatalog<?= $category['term_id'] ?>">
                                    <?php foreach ($category['items'] as $categories_child) : ?>
                                        <a href="<?= get_term_link($categories_child['term_id'], $categories_child['taxonomy']) ?>"
                                           class="btn c-catalog">
                                            <?= $categories_child['name'] ?>
                                        </a>
                                    <?php endforeach; ?>
                                    <a href="<?= get_term_link($category['term_id'], $category['taxonomy']) ?>" class="btn c-catalog">
                                        Xem toàn bộ <i class="fa fa-arrow-circle-o-right"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
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
                                            <span class="product-d-discount ml-lg-3 ml-1">(-<?= $sale ?>%)</span>
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
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
<?php if(isset($descriptions) && $descriptions) : ?>
    <section class="container py-3 border-top" id="descriptions">
        <div class="row">
            <div class="col-12 font-14">
                <div class="text-justify text-2 hide-desc"><?= $descriptions ?></div>
                <div class="d-flex justify-content-center">
                    <a class="font-12 show-desc" data-toggle="modal" data-target="#desc-modal">Xem thêm<i class="fas fa-chevron-down font-12 ml-2"></i></a>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="desc-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Mô tả</h5>
                    <a class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; Đóng</span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="text-justify text-2"><?= $descriptions ?></div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (isset($product_purchased_together) && $product_purchased_together) : ?>
    <section class="container pt-3 border-bottom">
        <div class="row">
            <div class="col-12 mb-2">
                <h6 class="font-weight-bold font-14">Sản phẩm mua kèm:</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-12 owl-carousel owl-theme dp-owl-carousel-2 border-left border-top">
                <?php get_view_widget('mobile/product/product-view-amp-2.php', ['products' => $product_purchased_together, 'class' => 'card p-2 product item']); ?>
            </div>
            <div class="col-12 dot-container" id="carousel-dots-2"></div>
        </div>
    </section>
<?php endif; ?>

<?php get_template_part('mobile/template_parts/contents/product-viewed') ?>

<style>
    .hashtags.border-top h4 {
        font-size: var(--f-14);
        font-weight: 500;
    }
</style>
<?php do_shortcode('[ns_list_tags]'); ?>

<section class="container pt-3 app-news">
    <div class="row">
        <div class="col-12 mb-2">
            <h6 class="section-title-14">Tin tức:</h6>
        </div>
    </div>
    <div class="row">
        <?php if ($new_ids) : ?>
            <?php foreach ($new_ids as $new_id) : ?>
                <div class="col-12 col-md-3">
                    <div class="row mb-md-3 mb-2">
                        <div class="col-5 col-md-12">
                            <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url($new_id->ID) ?>"
                                 style="height: 70px;" alt="<?= $new_id->post_title ?>">
                        </div>
                        <div class="col-7 col-md-12 flex flex-column justify-content-between pl-0 pl-md-3 mt-md-2">
                            <a href="<?= the_permalink($new_id->ID) ?>" title="">
                                <h6 class="font-14 text-dark mb-1"><?= $new_id->post_title ?></h6>
                            </a>
                            <div>
                                <?php $tags = wp_get_post_terms($new_id->ID, 'post_tag', array("fields" => "all")); ?>
                                <?php if ($tags) : ?>
                                    <?php foreach ($tags as $tag) : ?>
                                        <a href="<?= get_term_link($tag->term_id) ?>" title="Tags">
                                            <span class="m-0 bg-2 font-10 p-1 text-dark">#<?= $tag->name ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex btn btn-outline-primary justify-content-center align-items-center">
                <a href="<?= get_page_link(get_page_by_path('tin-tuc')) ?>" class="font-14 w-100 align-items-center">
                    Xem tất cả bài viết liên quan
                </a>
                <i class="font-12 ml-3 fas fa-chevron-right float-right"></i>
            </div>
        </div>
    </div>
</section>