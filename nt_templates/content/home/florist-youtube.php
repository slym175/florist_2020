
<?php
    $cat_id = $attr['category'];
    $limit = $attr['limit'] ? $attr['limit'] : 6;
    $cat = get_term( $cat_id, 'category' );

    $params = array(
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'posts_per_page'    => $limit,
        'tax_query'         => array(
            'relation'      => 'AND',
            array(
                'taxonomy'  => 'category',
                'field'     => 'term_id',
                'terms'     => $cat->term_id,
            ),
            array(
                'taxonomy'  => 'post_format',
                'field'     => 'slug',
                'terms'     => array( 'post-format-video' ),
                'operator'  => 'IN'
            )
        )
    );

    $videos = new WP_Query($params);
?>

<!--<pre>--><?php //print_r($cat) ?><!--</pre>-->

<?php if($videos->have_posts()) : ?>
    <div class="section-video">
		<div class="container">
			<div class="row">
				<div class="title-default title-dai">
					<h2><span><img src="<?= THEME_URL_URI ?>/assets/img/youtube.png" alt="<?= $cat->name ?>"><?= $cat->name ?><img
								src="<?= THEME_URL_URI ?>/assets/img/la.png" alt="<?= $cat->name ?>"></span></h2>
					<p class="description"><?= $cat->description ?></p>
				</div>
				<div class="slider-video">
					<div class="video-for">
                        <?php while ($videos->have_posts()) : $videos->the_post(); ?>
                            <div class="video-item">
                                <div class="video">
                                    <iframe width="560" height="315" src="<?= get_post_meta(get_the_ID(), 'post_video_link')[0] ?>"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                <div class="title">
                                    <div class="img-thumnail">
                                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(), array(1170, 575)) ?>" alt="<?= the_title() ?>">
                                    </div>
                                    <div class="circle">
                                        <img src="<?= THEME_URL_URI ?>/assets/img/playto.png" alt="">
                                    </div>
                                    <p><?= the_title() ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
					</div>
					<div class="video-nav">
						<div class="video-item-nav">
                            <?php while ($videos->have_posts()) : $videos->the_post(); ?>
                                <div class="video-item-static">
                                    <div class="img-thumnail">
                                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(), array(1170, 575)) ?>" alt="<?= the_title() ?>">
                                        <div class="title">
                                            <span class="circle">
                                                <img src="<?= THEME_URL_URI ?>/assets/img/playnho.png" alt="">
                                                <img class="hover" src="<?= THEME_URL_URI ?>/assets/img/playx.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <p><a href="" title=""><?= the_title() ?></a></p>
                                </div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>