<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:56 AM
 */

if (wp_is_mobile()) : get_template_part('single-post-mobile');
else :
    get_header('aboutus');
    $categories = get_categories(
        array(
            'orderby' => 'id',
            'order' => 'DESC',
            'hide_empty' => 0,
            'meta_key' => 'menu_order',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                'meta_value_num' => array(
                    'key' => 'status',
                    'type' => 'NUMERIC',
                    'value' => 1,
                ))
        )
    );

    $category = get_the_terms(get_the_ID(), 'category');
    if ($category) {
        $cat_id = $category[0]->term_id;
    }
    if ($cat_id) {
        $cla_cat = new ClaCategory();
        $cats = [];
        foreach ($categories as $val) {
            $cats[$val->term_id] = (array)$val;
        }
        $parents = $cla_cat->get_parents($cats, $cat_id);

        if ($parents == 0) {
            $tree = $cla_cat->data_tree($cats, $cat_id);
            $parent_name = $category[0]->name;
        } else {
            $tree = $cla_cat->data_tree($cats, $parents);
            $parent_name = get_term($parents)->name;
        }
    }
    ?>
    <?php if ($categories): ?>
    <div class="tabs-product pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tab-items text-lg-center d-flex justify-content-between flex-wrap font-12">
                    <?php foreach ($categories as $category): ?>
                        <?php if ($category->parent == 0): ?>
                            <a href="<?= get_term_link($category->term_id) ?>"
                               class="text-dark <?= ($category->term_id == $cat_id || $category->term_id == $parents) ? 'active' : '' ?>">
                                <?= $category->name ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
    <div class="post-tabs">
        <div class="container px-0">
            <div class="row pt-3">
                <?php if ($cat_id) : ?>
                    <div class="col-md-3 menu-tab pr-0">
                        <p><strong><?= $parent_name ?></strong></p>
                        <ul id="menu-content" class="menu-content collapse show">
                            <?php if ($tree) : ?>
                                <?php foreach ($tree as $key => $value) : ?>
                                    <li data-toggle="collapse" data-target="#products<?= $value['term_id'] ?>"
                                        class="collapsed collap <?= ($value['term_id'] == $cat_id) ? 'active' : '' ?>">
                                        <a href="<?= get_category_link($value['term_id']) ?>"><?= $value['name'] ?>
                                        </a>
                                        <?php echo ($value['items']) ? '<i class="fas fa-chevron-down ml-auto"></i>' : '' ?>
                                    </li>
                                    <?php if ($value['items']) : ?>
                                        <ul class="sub-menu collapse <?= ($value['items'][$cat_id]) ? 'show' : '' ?>"
                                            id="products<?= $value['term_id'] ?>">
                                            <?php foreach ($value['items'] as $val) : ?>
                                                <li class="<?= ($val['term_id'] == $cat_id) ? 'active' : '' ?>"><a
                                                            href="<?= get_category_link($val['term_id']) ?>"><?= $val['name'] ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="col-md-9 news">
                    <div class="col-md-12 p-0">
                        <ol class="breadcrumb breadcrumb-left p-0 m-0" style="margin-bottom: 1rem !important;">
                            <?= florist_breadcrumbs(); ?>
                        </ol>
                    </div>
                    <div class="col-12 p-0 pb-2">
                        <h2>
                            <?= the_title() ?>
                        </h2>
                    </div>
                    <div class="card border-0 steps-section muc_luc_header">
                        <h4 class="mb-0 d-flex align-items-center">
                            <button class="btn btn-block text-left text-decoration-none d-flex justify-content-start align-items-center" type="button"
                                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                <i class="fas fa-bars pr-3"></i>
                                <span class="font-14 font-weight-bold">Nội dung</span>
                                <i class="fas fa-chevron-down ml-auto mr-2 font-14 text-decoration-none"></i>
                            </button>
                            
                        </h4>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body pl-5 py-3 pt-0 font-14 muc_luc">

                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <?= the_excerpt() ?>
                    </div>
                    <div class="detail-post-content">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php pp_setPostViews(get_the_ID()); ?>
                            <?php
                            the_content()
                            ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <?php do_shortcode('[ns_list_tags]'); ?>
        <div class="container px-0">
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
            <hr>
        </div>
    </div>
    <?php do_shortcode('[ns_posts_related]'); ?>

    <?php
    get_footer();
endif;
?>
