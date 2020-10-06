<?php 
$title = $attr['title'] ? $attr['title'] : 'Sản phẩm mới';
$excerpt = $attr['excerpt'] ? $attr['excerpt'] : 'Hàng chục giống hoa cùng nhiều chủng loại khác nhau đã được nghiên cứu, lai tạo và sản xuất thành công tại FLv, nhằm đáp ứng ngày càng cao nhu cầu sản xuất hoa của Bà con hiện nay.';
$image = $attr['image'] ? wp_get_attachment_url( $attr['image'] ) : THEME_URL_URI.'assets/img/qua.png';
$limit = $attr['limit'] ? $attr['limit'] : 12;

$args = [
    'post_type' => 'banner',
    'posts_per_page' => $attr['limit'],
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'banner_group',
            'field' => 'term_id',
            'terms' => $attr['banner_group_id'], /// Where term_id of Term 1 is "1".
            'include_children' => false
        ),
    )
];
$banners = new WP_Query($args);

$params = array(
    'post_type'         => 'product',
    'posts_per_page'    => $limit,
    'orderby'           => 'date'
);

$newest_product = new WP_Query($params);

?>
    <div class="section-new-product">
		<div class="container">
			<div class="row">
				<div class="new-product">
                    <div class="title-default">
                        <h2>
                            <span>
                                <img src="<?= $image ?>" alt="<?= __($title, TEXTDOMAIN) ?>">
                                <?= __($title, TEXTDOMAIN) ?>
                                <img src="<?= THEME_URL_URI ?>/assets/img/la.png" alt="<?= __($title, TEXTDOMAIN) ?>">
                            </span>
                        </h2>
                        <p class="description"><?= __($excerpt, TEXTDOMAIN) ?></p>
                    </div>
					<div class="slider-cate">
                        <?php if($banners->have_posts()) : ?>
                            <div class="cate-for">
                                <?php while($banners->have_posts()) : $banners->the_post(); ?>
                                    <div class="item">
                                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(), array()) ?>" title="<?= the_title() ?>">
                                    </div>
                                <?php endwhile ?>
                            </div>
                        <?php endif ?>
						<div class="cate-nav">

							<?php while( $newest_product->have_posts() ) : 
                                $newest_product->the_post(); 
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
		</div>
	</div>