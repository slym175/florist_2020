<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/3/2020
 * Time: 10:34 AM
 */
$args = array(
    'taxonomy' => 'product_tag',
    'hide_empty' => 0,
    'meta_key' => 'menu_order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
        'meta_value_num' => array(
            'key' => 'key_search',
            'type' => 'NUMERIC',
            'value' => 1,
        )),
    'number' => 8,
);
$tags = get_terms($args);
?>
<?php if ($tags) : ?>
    <section class="container hashtags border-top">
        <h4 class="section-title-14">Từ khóa tìm kiếm nhiều:</h4>
        <div>
            <?php foreach ($tags as $tag) : ?>
                <a href="<?= get_term_link($tag->term_id, $tag->taxonomy) ?>" class="hashtag">
                    <p><?= $tag->name ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>