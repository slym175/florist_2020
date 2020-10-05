<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/4/2020
 * Time: 10:15 AM
 */
$categories = get_terms(
    array(
        'taxonomy' => 'category',
        'post_status' => 'publish',
        'orderby' => 'id',
        'order' => 'DESC',
        'hide_empty' => 0,
        'parent' => 0
    )
);
?>
<?php if ($categories) : ?>
    <div class="collapse" id="collapseOverview">
        <?php foreach ($categories as $category) : ?>
            <a href="<?= get_term_link($category->term_id) ?>" class="btn overview">
                <?= $category->name ?> <i class="fas font-16 fa-angle-right"></i>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>