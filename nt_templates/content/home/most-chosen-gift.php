<?php 
$title = $attr['title'] ? $attr['title'] : 'Quà được lựa chọn nhiều nhất!';
$excerpt = $attr['excerpt'] ? $attr['excerpt'] : 'Những món quà mang ý nghĩa phong thủy tốt đẹp dành cho các bạn yêu hoa và cây cảnh khắp mọi miền. Florist Việt Nam cam kết đảm bảo tiêu chuẩn chất lượng và sự hài lòng của quý khách hàng';
$image = $attr['image'] ? wp_get_attachment_url( $attr['image'] ) : THEME_URL_URI.'assets/img/qua.png';
$limit = $attr['limit'] ? $attr['limit'] : 12;

$params = array(
    'post_type' => 'product',
    'posts_per_page' => $limit,
    'meta_key' => 'p_is_gift',
    'meta_value' => true,
);

$gift_product = new WP_Query($params);

?>

<?php if( $gift_product->have_posts() ) : ?>
    <div class="section-products">
		<div class="container container-fluid">
			<div class="row">
				<div class="title-default title-dai">
					<h2>
                        <span>
                            <img src="<?= $image ?>" alt="<?= __($title, TEXTDOMAIN) ?>">
                            <?= __($title, TEXTDOMAIN) ?>
                            <img src="<?= THEME_URL_URI ?>/assets/img/la.png" alt="<?= __($title, TEXTDOMAIN) ?>">
                        </span>
                    </h2>
					<p class="description"><?= __($excerpt, TEXTDOMAIN) ?></p>
				</div>
				<div class="slider-product">
                    <?php while( $gift_product->have_posts() ) : 
                        $gift_product->the_post(); 
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
<?php endif ?>