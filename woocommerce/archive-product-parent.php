<?php
    $category = get_queried_object();
    $cat_name = $category->name;
    $t_id = $category->term_id;
    $limit = 12;
    $thumb = wp_get_attachment_url( get_woocommerce_term_meta( $t_id, 'thumbnail_id', true ) );
    $banner = get_the_post_thumbnail_url(238, array(1900, 350));
    
    //Sản phẩm mua kèm
    // $product_purchased_together = get_field('product_ids', 'product_cat_' . $t_id);
    // $page_post_link = get_field('page_post_link', 'product_cat_' . $t_id);
    // $descriptions = get_field('descriptions', 'product_cat_' . $t_id);
    // $banner_sale = get_option('banner_sale');
    $params = array(
        'post_type'     => 'product',
        'post_per_page' => $limit,
        'order_by'      => array('date'),
        'order'         => 'DESC',
        'tax_query'             => array(
            array(
                'taxonomy'      => 'product_cat',
                'field'         => 'term_id', //This is optional, as it defaults to 'term_id'
                'terms'         => $t_id,
                'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
            )
        )
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
                                <div class="title-default">
                                    <h2><span> <img src="<?= $thumb ?>" alt=""> <?= __($cat_name, TEXTDOMAIN) ?><img src="<?= THEME_URL_URI ?>/assets/img/la.png" alt=""></span></h2>
                                    <p class="description"><?= __($category->description, TEXTDOMAIN) ?></p>
                                </div>
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
                        <?= nt()->load_template('layouts/product-sidebar', '', ['cate' => $t_id]) ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
