<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/23/2020
 * Time: 10:10 AM
 */
require_once THEME_URL . '/inc/helper/cla_category.php';


$banner_group = $attr['banner_group'];
$limit = ($attr['limit']) ? $attr['limit'] : 5;

$list_banner = vc_param_group_parse_atts($attr['list_banner']);
$news_ids = explode(',',$attr['new_ids']);



?>

<section class="container mt-2 px-0">
    <div class="h-100 position-relative d-flex" style="width: calc(100% - 228px); float: right;">
        <!-- Slider -->
        <?php echo nt()->load_template('content/home/slider', '', array('banner_group' => $banner_group,'limit' => $limit)); ?>

        <!-- Tin tức và banner -->
        <?php echo nt()->load_template('content/home/news', '', array('news_ids' => $news_ids,'list_banner' => $list_banner)); ?>

    </div>
</section>


