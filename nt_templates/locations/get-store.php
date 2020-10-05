<?php
/**
 * Created by trungduc.vnu@gmail.com.
 */

if($city_id && !$district_id){
    if($city_id == 'all'){
        $args = [
            'post_type' => 'location',
            'post_status' => 'publish',
        ];
    }else{
        $args = [
            'post_type' => 'location',
            'post_status' => 'publish',
            'tax_query' => array(array(
                'taxonomy' => 'local_category',
                'field' => 'term_id',
                'terms' => array($city_id),
            ))

        ];
    }
    $locations = new WP_Query($args);
}elseif ($district_id){
    if($district_id == 'all'){
        $args = [
            'post_type' => 'location',
            'post_status' => 'publish',
            'tax_query' => array(array(
                'taxonomy' => 'local_category',
                'field' => 'term_id',
                'terms' => array($city_id),
            ))

        ];
    }else{
        $args = [
            'post_type' => 'location',
            'post_status' => 'publish',
            'tax_query' => array(array(
                'taxonomy' => 'local_category',
                'field' => 'term_id',
                'terms' => array($district_id),
            ))
        ];
    }
    $locations = new WP_Query($args);
}
?>

<?php if ($locations->have_posts()): ?>
    <div class="col-md-12 hethong-items">
        <h5><i class="fas fa-map-marked-alt mr-3"></i>Có <?= $locations->found_posts ?> Cửa Hàng Phù Hợp.</h5>
    </div>
<?php else: ?>
    <div class="col-md-12 hethong-items">
        <h5><i class="fas fa-map-marked-alt mr-3"></i>Không tìm thấy kết quả phù hợp.</h5>
    </div>
<?php endif; ?>
<div class="col-md-12 info-items w-100">
    <?php if ($locations->have_posts()): ?>
        <?php while ($locations->have_posts()):
            $locations->the_post(); ?>
            <?php if ($locations->current_post == 0): ?>
                <div class="iframe-location-active" data-iframe='<?= get_post_meta(get_the_ID(), 'map', true) ?>'></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 content-box py-3">
                    <a href="<?= the_permalink() ?>" class="location-name" data-name="<?= the_title() ?>"
                        data-iframe='<?= get_post_meta(get_the_ID(), 'map', true) ?>'><strong><?= the_title() ?></strong></a>
                    <p class="mb-1"><strong>Địa chỉ: </strong> <?= get_post_meta(get_the_ID(), 'address', true) ?></p>
                    <p class="mb-1"><strong>SĐT: </strong> <?= get_post_meta(get_the_ID(), 'phone', true) ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>