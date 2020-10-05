<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/4/2020
 * Time: 10:15 AM
 */

$categories = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => 0,
    'meta_key' => 'menu_order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'parent' => 0,
    'meta_query' => array(
        'meta_value_num' => array(
            'key' => 'status',
            'type' => 'NUMERIC',
            'value' => 1,
        ))
]);

?>

<section class="tabs-cat-news pt-2">
    <div class="tabs-cat-items">
        <a href="<?= home_url('tin-tuc') ?>" class="active"><i class="fa fa-home" aria-hidden="true"></i></a>
        <?php if ($categories): ?>
            <?php foreach ($categories as $category): ?>
                <?php if ($category->parent == 0): ?>
                    <a href="<?= get_term_link($category->term_id) ?>" class="">
                        <?php  $avt = get_field('category_avatar', 'category_' . $category->term_id); ?>    
                        <?php if($avt) : ?>
                            <img src="<?= wp_get_attachment_image_url($avt['ID'], array(13, 13)) ?>" alt="Ảnh danh mục">
                        <?php endif; ?>
                        <?= $category->name ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>