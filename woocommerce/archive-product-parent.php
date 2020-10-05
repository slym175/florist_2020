<?php
if (wp_is_mobile()) : get_template_part('mobile/woocommerce/archive-product-parent');
else :
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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <section class="container-fluid">
                        <div class="row">
                            <div class="col-12 p-0 my-4">
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
                            </div>
                        </div>
                    </section>
                    <section class="container-fluid">
                        <div class="row">
                            <div class="col-12 p-0">
                                <p class="font-14 mb-2 text-justify"><?= $category->description ?></p>
                                <div class="font-12 d-flex justify-content-center">
                                    <a href="#catalog-des-field">Xem thêm <i class="fas fa-chevron-down ml-2 font-12"></i></a>
                                </div>
                            </div>
                        </div>
                    </section>
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
                            <?php if ($query->have_posts()): ?>
                                <section class="mt-md-4 mt-2 devices">
                                    <div class="container">
                                        <div class="row devices-nav">
                                            <ul class="nav w-100 justify-content-start bg-nav">
                                                <li class="nav-item">
                                                    <a class="nav-link active h-100" href="javascript:void(0)" data-url="<?= admin_url('admin-ajax.php') ?>" data-page="1" data-limit="<?= $limit ?>" data-slugg="<?= $category['slug'] ?>" onclick="loadProductsInCategory(this, true, 'layouts/archive-product-parent-layout');"><?= $category['name'] ?></a>
                                                </li>
                                                <?php if ($category['items']) : ?>
                                                    <?php $cat_chunk = array_chunk($category['items'], 3, true)[0] ?>
                                                    <?php foreach ($cat_chunk as $categories_child) : ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-url="<?= admin_url('admin-ajax.php') ?>" data-page="1" data-limit="<?= $limit ?>" data-slugg="<?= $categories_child['slug'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, true, 'layouts/archive-product-parent-layout');"><?= $categories_child['name'] ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                <li class="nav-item ml-auto">
                                                    <a class="nav-link"
                                                       href="<?= get_term_link($category['term_id'], $category['taxonomy']) ?>">Xem
                                                        tất cả >></a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="row d-flex devices-container">
                                            <div class="cat-loading d-none" >
                                                <img src="<?= home_url() ?>/wp-content/uploads/2020/08/loading.gif" alt="Loading">
                                            </div>
                                            <?php while ($query->have_posts()) :
                                                $query->the_post();
                                                global $product; ?>
                                                <div class="col-lg-3 col-md-3 col-6 card p-0 product">
                                                    <a href="<?= the_permalink() ?>">
                                                        <img class="card-img-top"
                                                             src="<?= get_the_post_thumbnail_url(get_the_ID(), array(300, 300)) ?>"
                                                             alt="Card image cap">
                                                    </a>
                                                    <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
                                                    <img class="img-fluid"
                                                         src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>"
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
                                                        <span class="product-star"><?= (float)$product->get_average_rating() ?>
                                                            /5 <img src="<?= THEME_URL_URI . '/assets/images/star.svg' ?>"
                                                                    alt="star"></span>
                                                            <span class="product-cmt"><?= $product->get_rating_count() ?>
                                                                đánh giá</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                            <?php if($query->max_num_pages > 1) : ?>
                                                <div class="col-12 text-center">
                                                    <a data-url="<?= admin_url('admin-ajax.php') ?>" data-page="1" data-limit="<?= $limit ?>" data-slugg="<?= $category['slug'] ?>" href="javascript:void(0)" onclick="loadProductsInCategory(this, false, 'layouts/archive-product-parent-layout');"
                                                           class="btn-more px-4 py-2 mt-md-4 mt-2">
                                                        <span class="mr-3">Xem thêm</span>
                                                        <i class="fas fa-chevron-down"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </section>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if ($descriptions): ?>
                        <section class="mt-md-4 pt-4 catalog-des" id="catalog-des-field">
                            <div class="container-fluid h-100">
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <h4 class="font-weight-bold"><?= $cat_name ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 p-0 mb-3">
                                        <div class="catalog-des-content">
                                            <?= $descriptions ?>
                                        </div>
                                        <div class="font-12 d-flex justify-content-center">
                                            <a href="#" class="catalog-des-btn">Xem thêm <i class="fas fa-chevron-down ml-2 font-12"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>


                <script>
                    jQuery(document).ready(function () {
                        if(jQuery('.catalog-des-content').height() < 250) {
                            console.log('dd')
                            jQuery('.catalog-des-btn').css('display', 'none');
                        }

                        jQuery('.catalog-des-btn').click(function (e) {
                            e.preventDefault();
                            jQuery('.catalog-des-content').css('max-height', '19988');
                            jQuery(this).css('display', 'none');
                        })
                    });
                </script>

                    <!-- Sản phẩm mua kèm -->
                    <?php if (isset($product_purchased_together) && $product_purchased_together) : ?>
                        <h5 class="py-4 font-18">Sản phẩm mua kèm:</h5>
                        <div class="container border-bottom pb-4">
                            <div class="row p-0 border-left">
                                <?php foreach ($product_purchased_together as $value) : ?>
                                    <?php $product = wc_get_product($value->ID); ?>
                                    <div class="col-lg-3 col-md-3 col-6 card p-0 product">
                                        <a href="<?= the_permalink($value->ID) ?>">
                                            <img class="card-img-top"
                                                 src="<?= get_the_post_thumbnail_url($value->ID, array(300, 300)) ?>"
                                                 alt="Card image cap">
                                        </a>
                                        <span class="discount-status <?= ($product->get_sale_price()) ? '' : 'discount-status-none' ?>">
                                            <img class="img-fluid"
                                                 src="<?= (isset($banner_sale) && $banner_sale) ? $banner_sale : THEME_URL_URI . '/assets/images/2606/Group 2106.png' ?>"
                                                 alt="Red Status">
                                        </span>

                                        <a href="<?= the_permalink($value->ID) ?>"
                                           class="product-name"><span><?= $value->post_title ?></span></a>

                                        <div class="card-body p-2">
                                            <span class="text-danger product-price"><?= ($product->get_regular_price()) ? number_format(($product->get_sale_price()) ? $product->get_sale_price() : $product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                            <div class="d-flex <?= ($product->get_sale_price()) ? '' : 'product-d-none' ?>">
                                                <span class="product-d-price"><?= ($product->get_regular_price()) ? number_format($product->get_regular_price()) . get_woocommerce_currency_symbol() : 'Liên hệ' ?></span>
                                                <?php $sale = ($product->get_sale_price()) ? floor((1 - ($product->get_sale_price() / $product->get_regular_price())) * 100) : ''; ?>
                                                <span class="product-d-discount ml-lg-3 ml-1">-<?= $sale ?>%</span>
                                            </div>
                                            <div class="d-flex">
                                                <span class="product-star"><?= (float)$product->get_average_rating() ?>
                                                    /5 <img src="<?= THEME_URL_URI . '/assets/images/star.svg' ?>"
                                                            alt="star"></span>
                                                <span class="product-cmt"><?= $product->get_rating_count() ?>
                                                    đánh giá</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php get_template_part('template_parts/contents/product-viewed') ?>

                    <?php do_shortcode('[ns_list_tags]'); ?>

                    <div class="container">
                        <?php
                        //                        if (comments_open() || get_comments_number()) :
                        //                            comments_template();
                        //                        endif;
                        ?>
                    </div>
                </div>

                <div class="col-lg-4 pr-0">
                    <section class="container-fluid">
                        <div class="row">
                            <div class="col-12 p-0">
                                <h6 class="font-18 font-weight-bold my-4">Tin tức</h6>
                                <div class="d-flex flex-column">
                                    <?php if ($new_ids) : ?>
                                        <?php foreach ($new_ids as $new_id) : ?>
                                            <a href="<?= the_permalink($new_id->ID) ?>" class="d-flex justify-content-start align-items-center mb-3">
                                                <div class="col-4 p-0">
                                                    <img src="<?= get_the_post_thumbnail_url($new_id->ID) ?>"
                                                        class="img-fluid" alt="<?= $new_id->post_title ?>"
                                                        style="width: 100%; height: auto; object-fit: cover; object-position: 50% 50%">
                                                </div>
                                                <p class="col-8 mt-2 text-dark font-14 font-weight-bold"><?= $new_id->post_title ?></p>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if ($page_post_link) : ?>
                                        <div class="d-flex justify-content-center">
                                            <a href="<?= $page_post_link['url'] ?>"
                                               class="btn-more text-center py-1 w-100">Xem tất cả bài viết liên
                                                quan <i class="fas fa-chevron-right ml-3"></i></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
<?php endif;
