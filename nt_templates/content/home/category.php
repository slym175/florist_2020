<?php
    $cat_id = $attr['category'];
    $banner_position = $attr['banner_position'] ? $attr['banner_position'] : 'left';
    $limit = $attr['limit'] ? $attr['limit'] : 6;
    $cat = get_term( $cat_id, 'product_cat' );
    $thumb = wp_get_attachment_url( get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true ) );
    $b = get_field('p_banner_category', 'product_cat_'.$cat_id);

    $args = array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'ignore_sticky_posts'   => 1,
        'posts_per_page'        => $limit,
        'tax_query'             => array(
            array(
                'taxonomy'      => 'product_cat',
                'field'         => 'term_id', //This is optional, as it defaults to 'term_id'
                'terms'         => $cat_id,
                'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
            )
        )
    );
    $products = new WP_Query($args);
?>

    <div class="section-product-grid">
		<div class="container container-fluid">
			<div class="row">
				<div class="title-default">
					<h2><span><img src="<?= $thumb ?>" alt=""><?= $cat->name ?><img src="<?= THEME_URL_URI ?>/assets/img/la.png"
								alt=""></span></h2>
					<p class="description"><?= $cat->description ?></p>
                </div>
                <?php if($banner_position == 'left') : ?>
                    <div class="col-md-3 poster-hp">
                        <div class="img">
                            <img src="<?= $b['url'] ?>" alt="">
                        </div>
                    </div>
                <?php endif ?>
				<div class="col-md-9 product-grid">
                    <?php while( $products->have_posts() ) : 
                        $products->the_post(); 
                        global $product;
                    ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 item">
                            <?= nt()->load_template('layouts/product-item', '', ['product' => $product]) ?>
                        </div>
                    <?php endwhile ?>
                </div>
                <?php if($banner_position == 'right') : ?>
                    <div class="col-md-3 poster-hp">
                        <div class="img">
                            <img src="<?= $b['url'] ?>" alt="">
                        </div>
                    </div>
                <?php endif ?>
			</div>
		</div>
	</div>