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
echo nt()->load_template('content/home/slider', '', array('banner_group' => $banner_group, 'limit' => $limit));
    get_template_part('mobile/template_parts/menu/menu', 'home');
?>