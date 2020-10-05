<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/24/2020
 * Time: 5:43 PM
 */
$args = array(
    'taxonomy' => 'product_cat',
    'show_count' => 0,
    'pad_counts' => 0,
    'hierarchical' => 1,
    'title_li' => '',
    'hide_empty' => 0,
);
$all_categories = get_terms($args);
$cats = [];
foreach ($all_categories as $val) {
    $cats[] = (array)$val;
}

$cla = new ClaCategory();
$categories = $cla->data_tree($cats, 0);
?>

<?php if ($categories) : ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mega-menu">
            <li class="nav-item">
                <a class="nav-link text-right btn-c-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">X</a>
            </li>
            
            <?php foreach ($categories as $category) : ?>
                    <?php
                        $image = get_field('thumbnail_id', 'product_cat_' . $category['term_id']);
                    ?>
                    <li class="nav-item">
                        <div class="mega-menu_lv1">
                            <a href="<?= get_category_link($category['term_id']) ?>">
                                <div class="wh-40">
                                    <img src="<?= wp_get_attachment_image_url($image, array(20, 20)) ?>" class="img-fluid">
                                </div>
                                <span><?= $category['name'] ?></span>
                                <?php if($category['items']) :?>
                                    <i class="fas mm-chevron"></i>
                                <?php endif; ?>
                            </a>
                        </div>
                        <?php if ($category['items']) : ?>
                            <ul class="mega-submenu">
                                <?php foreach ($category['items'] as $cat_lv2) : ?>
                                    <li class="mega-submenu-item submenu-closed">
                                        <div class="mega-menu_lv2">
                                            <?php if ($cat_lv2['items']) : ?>
                                                <i class="fas fa-chevron-down"></i>
                                            <?php endif; ?>
                                            <a href="<?= get_category_link($cat_lv2['term_id']) ?>"><?= $cat_lv2['name'] ?></a>
                                        </div>
                                        <?php if ($cat_lv2['items']) : ?>
                                            <ul>
                                                <?php foreach ($cat_lv2['items'] as $cat_lv3) : ?>
                                                    <li class="mega-menu_lv3">
                                                        <a href="<?= get_category_link($cat_lv3['term_id']) ?>"><?= $cat_lv3['name'] ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li> 
                                <?php endforeach; ?>        
                            </ul>
                        <?php endif; ?>
                    </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>