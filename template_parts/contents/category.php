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
    'meta_query' => array(
        'meta_value_num' => array(
            'key' => 'status',
            'type' => 'NUMERIC',
            'value' => 1,
        ))
]);


?>
<section class="container px-0 py-4 border-bottom">
    <div class="d-flex justify-content-between flex-wrap font-12">
        <?php if ($categories): ?>
            <?php foreach ($categories as $category): ?>
                <?php if ($category->parent == 0): ?>
                    <a href="<?= get_term_link($category->term_id) ?>" class="text-dark">
                        <?= $category->name ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
