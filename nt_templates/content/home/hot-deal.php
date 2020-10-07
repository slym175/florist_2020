<?php
    $cat_id = $attr['category'];
    $limit = $attr['limit'] ? $attr['limit'] : 6;
    $cat = get_term( $cat_id, 'product_cat' );
    $end = $attr['end_date'];
    $thumb = wp_get_attachment_url( get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true ) );

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
    <!-- <?= strtotime($end) ?> -->
    <div class="section-countdown">
		<div class="container">
			<div class="row">
				<div class="title-default">
					<h2><span><img src="<?= $thumb ?>" alt="$cat->name"><?= $cat->name ?><img src="<?= THEME_URL_URI ?>/assets/img/la.png"
								alt=""></span></h2>
					<p class="description"><?= $cat->description ?></p>
				</div>
				<div class="countdown-timer" id="timer" data-end="<?= $end ?>">
					<ul>
						<li>
							<p id="days"> </p><span>Ngày</span>
						</li>
						<li>
							<p id="hours"> </p><span>Giờ</span>
						</li>
						<li>
							<p id="minutes"> </p><span>Phút</span>
						</li>
						<li>
							<p id="seconds"></p><span>Giây</span>
						</li>
					</ul>
				</div>
				<div class="slider-product">
                    <?php while( $products->have_posts() ) : 
                        $products->the_post(); 
                        global $product;
                    ?>
                        <div class="item">
                            <?= nt()->load_template('layouts/product-item', '', ['product' => $product]) ?>
                        </div>
                    <?php endwhile ?>
				</div>
			</div>
		</div>
	</div>