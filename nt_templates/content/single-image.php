<?php
/**
 * Created by trungduc.vnu@gmail.com.
 */

$image = wp_get_attachment_image_url($attr['image'],array(1200,140));
$link = vc_build_link($attr['link_to']);
?>

<div id="promote-bannerVSML" class="promote-vsml container" style="padding: 20px 0 0 0 !important;">
    <a href="<?= $link['url'] ?>">
        <img alt="" width="1200"
             src="<?= $image ?>" style="width: 100%">
    </a>
</div>

