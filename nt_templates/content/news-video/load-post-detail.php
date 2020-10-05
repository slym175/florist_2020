<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/22/2020
 * Time: 8:40 AM
 */

?>
<a href="javascript:void(0)" class="close" onclick="PopDown()">&times;</a>
<div class="overlay-content">
    <div class="o-video">
        <div class="embed-responsive embed-responsive-16by9">
            <?= get_post_meta($post_detail->ID, 'iframe', true) ?>
        </div>
    </div>
    <div class="o-content">
        <h5 class="v-id"></h5>
        <h5><?= $post_detail->post_title ?></h5>
        <?= do_shortcode($post_detail->post_content) ?>
    </div>
</div>
<style>
    .o-content img{
        width: 100%;
        height: auto;
    }
</style>