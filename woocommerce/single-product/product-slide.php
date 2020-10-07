<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/9/2020
 * Time: 5:03 PM
 */

global $product;
$gallery = $product->get_gallery_image_ids();
$gallery[] = get_post_thumbnail_id($product->get_id());

?>

<?php if ($gallery): ?>
<div id="product-detail">
    <div class="detail-pro-element">
        <div class="box-preview">
            <?php foreach ($gallery as $image): ?>
                <div class="box-img-preview" data-slide="silde_1">
                    <img src="<?= wp_get_attachment_image_url($image, array(570, 460)) ?>" alt="<?= the_title() ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <div class="box-img-nano">
            <div class="box-flex">
                <?php foreach ($gallery as $key => $image): ?>
                    <div class="box-img <?= $key == 0 ? 'default-view' : '' ?>">
                        <img src="<?= wp_get_attachment_image_url($image, array()) ?>" alt="<?= the_title() ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="box-overlay-element box-overlay hide">
        <div class="box-bg-overload"></div>
        <div class="icon-close-overlay">
            <span>x</span>
        </div>
        <div class="main-overlay-slick" data-name="silde_1">
            <?php foreach ($gallery as $image): ?>
                <div class="box-img-preview">
                    <img src="<?= wp_get_attachment_image_url($image, array()) ?>" alt="<?= the_title() ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>