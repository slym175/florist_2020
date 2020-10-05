<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/3/2020
 * Time: 10:34 AM
 */
if (wp_is_mobile()) : get_template_part('mobile/template_parts/contents/tag');
else :
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
    <section class="mt-md-4 mt-2 keywords">
        <div class="container">
            <div class="row">
                <h6>Từ khóa tìm kiếm nhiều nhất</h6>
            </div>
            <div class="row">
                <?php foreach ($tags as $tag) : ?>
                    <a href="<?= get_term_link($tag->term_id, $tag->taxonomy) ?>" class="keyword">
                        <p><?= $tag->name ?></p>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php endif; ?>