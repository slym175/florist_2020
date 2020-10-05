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

<?php if ($categories): ?>
    <div class="tabs-product pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tab-items text-lg-center d-flex justify-content-between flex-wrap font-12">
                    <?php foreach ($categories as $category): ?>
                        <a href="<?= get_term_link($category->term_id) ?>" class="text-dark">
                            <?= $category->name ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>