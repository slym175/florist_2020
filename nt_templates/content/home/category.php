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
<?php if ($categories): ?>
    <section class="container cate-field <?= (is_front_page ()) ? 'd-block' : '' ?> pt-3">
        <div class="row h-100 position-relative">
            <div class="col-12 p-md-0 catalog">
                <ul class="list-group">
                    <?php foreach ($categories as $category): ?>
                        <li class="list-group-item">
                            <a href="<?= get_category_link($category['term_id']) ?>" class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center justify-content-start">
                                    <?php
                                    $image = get_field('thumbnail_id', 'product_cat_' . $category['term_id']);
                                    ?>
                                    <img src="<?= wp_get_attachment_image_url($image, array(15, 15)) ?>"
                                         class="mr-2 img-fluid">
                                    <span><?= $category['name'] ?></span>
                                </div>
                                <?php if ($category['items']): ?>
                                    <i class="fas fa-chevron-right right-arrow"></i>
                                <?php endif; ?>
                            </a>
                            <?php if ($category['items']): ?>
                                <div class="submenu">
                                    <?php foreach ($category['items'] as $category_item_lv2): ?>
                                        <aside>
                                            <div class="border-bottom">
                                                <strong class="d-flex justify-content-start align-items-center">
                                                    <?= $category_item_lv2['name'] ?>
                                                    <a href="<?= get_category_link($category_item_lv2['term_id']) ?>" class="cat-chevron">Xem tất cả<i class="fas fa-chevron-right text-primary"></i></a>
                                                </strong>
                                            </div>
                                            <?php if ($category_item_lv2['items']): ?>
                                                <?php foreach ($category_item_lv2['items'] as $category_item_lv3): ?>
                                                    <a href="<?= get_category_link($category_item_lv3['term_id']) ?>" class="text-dark"><?= $category_item_lv3['name'] ?></a>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </aside>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>