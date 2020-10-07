<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:56 AM
 */
    get_header();
    $category = get_category(get_query_var('cat'));

    $cat_id = $category->cat_ID;
    $cat_name = $category->name;

    $params = array(
        'post_type'         => 'post',
        'posts_per_page'    => 5,
        'tax_query'         => array(
            'taxonomy'      => 'category',
            'field'         => 'term_id',
            'terms'         => $cat_id
        )
    );

    $posts = new WP_Query($params);
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
?>

    <main>
        <div class="banner-page">
            <img src="<?= THEME_URL_URI ?>/assets/img/banner5.png" alt="">
            <h2><?= __($cat_name, TEXTDOMAIN) ?></h2>
        </div>
        <?= nt()->load_template('layouts/main-breadcrumb', '', []) ?>
        <div class="post-share">
            <div class="container">
                <div class="row">
                    <div class="element-list element-post-share">
                        <div class="list-products-item list-post-item">
                            <?php while($posts->have_posts()) : $posts->the_post(); ?>
                                <div class="post-box-share">
                                    <div class="img">
                                        <a href="<?= permalink_link() ?>" title="<?= the_title() ?>"><img src="<?= get_the_post_thumbnail_url(get_the_ID(), array(870,435)) ?>" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h5> <a href="<?= permalink_link() ?>" title="<?= the_title() ?>"><?= __(the_title(), TEXTDOMAIN) ?></a> </h5>
                                        <div class="description">
                                            <?= the_excerpt() ?>
                                        </div>
                                        <div class="detail">
                                            <a href="<?= permalink_link() ?>" title=""> <?= __('Xem chi tiết', TEXTDOMAIN) ?> <span> <img src="<?= THEME_URL_URI ?>/assets/img/xct.png" alt=""> </span> </a>
                                        </div>
                                        <div class="cate">
                                            <p><?= __('Posted in', TEXTDOMAIN) ?> <a href="<?= permalink_link($category->term_id) ?>" title=""> <?= $cat_name ?> </a></p>
                                        </div>
                                    </div>
                                    <div class="date">
                                        <p><?= the_date('d') ?></p>
                                        <p> <span><?= the_date('m') ?></span><span><?= the_date('Y') ?></span> </p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php if($posts->max_num_pages > 1) : ?>
                                <?php
                                    paginate_links(array(
                                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                        'format'       => '?paged=%#%',
                                        'current'      => max( 1, get_query_var( 'paged' ) ),
                                        'total'        => $wp_query->max_num_pages,
                                        'type'         => 'array',
                                        'show_all'     => false,
                                        'end_size'     => 2,
                                        'mid_size'     => 1,
                                        'prev_next'    => true,
                                        'prev_text'    => '<i class="zmdi zmdi-chevron-left"></i>',
                                        'next_text'    => '<i class="zmdi zmdi-chevron-right"></i>',
                                        'add_args'     => false,
                                        'add_fragment' => ''
                                        )
                                    ); 
                                ?>
                                <!-- <div class="pagination-clean">
                                    <ul>
                                        <li class="active-pagination"> <a href="" title=""> 1 </a> </li>
                                        <li class=""> <a href="" title=""> 2 </a> </li>
                                        <li class=""> <a href="" title=""> 3 </a> </li>
                                        <li class=""> <a href="" title=""> 4 </a> </li>
                                        <li class=""> <a href="" title=""> 4 </a> </li>
                                        <li class="active-next"> <a href="" title=""> <img src="<?php //THEME_URL_URI ?>/assets/img/pagination-icon.png" alt=""> </a> </li>
                                    </ul>
                                </div> -->
                            <?php endif; ?>
                        </div>
                        <?= nt()->load_template('layouts/news-sidebar', '', []) ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();
