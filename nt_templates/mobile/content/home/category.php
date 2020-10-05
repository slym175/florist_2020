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
        <ul class="navbar-nav mr-auto pb-3">
            <li class="nav-item my-2">
                <a class="nav-link text-right btn-c-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span>X đóng</span></a>
            </li>
            <li class="nav-item app-menu">
                <?php foreach ($categories as $category) : ?>
                    <button class="nav-link">
                        <span><?= $category['name'] ?></span>
                        <div class="submenu p-3">
                            <h6 class="font-14 mb-3"><a href="<?= get_category_link($category['term_id']) ?>"><?= $category['name'] ?></a></h6>
                            <?php if ($category['items']) : ?>
                                <?php
                                $i = 0;
                                foreach ($category['items'] as $category_item_lv2) :
                                    $id = 'tger_' . $category['term_id'] . '_' . ($i++); ?>
                                    <p class="b-menu pb-1 mb-1" type="button" data-toggle="collapse" data-target="#<?= $id ?>" aria-expanded="false" aria-controls="#<?= $id ?>">
                                        <span class="text-2 font-weight-bold"><a href="<?= get_category_link($category_item_lv2['term_id']) ?>"><?= $category_item_lv2['name'] ?></a></span>
                                        <span class="mol-button font-10"> Xem tất cả<i class="fas fa-angle-right ml-2"></i></span>
                                    </p>
                                    <div class="collapse mb-2" id="<?= $id ?>">
                                        <?php foreach ($category_item_lv2['items'] as $category_item_lv3) : ?>
                                            <a href="<?= get_category_link($category_item_lv3['term_id']) ?>" class="text-2 d-block text-left"><?= $category_item_lv3['name'] ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </button>
                <?php endforeach; ?>
            </li>
        </ul>
    </div>
<?php endif; ?>