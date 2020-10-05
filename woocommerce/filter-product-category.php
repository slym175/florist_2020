<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/21/2020
 * Time: 10:47 AM
 */
$attribute_taxonomies = wc_get_attribute_taxonomies();
$attributes = [];
$cla_woocommerce = new ClaWoocommerce();
foreach ($attribute_taxonomies as $attribute_taxonomy) {
    if (in_array($attribute_taxonomy->attribute_id, $product_cat_attributes)) {
        $attributes[$attribute_taxonomy->attribute_name] = $attribute_taxonomy;
    }
}

?>
<div class="col-lg-3 col-12 order-card">
    <div class="row px-3 py-2 order-options">
        <?php foreach ($attributes as $key => $attribute): ?>
            <?php
            if($attribute->attribute_name == 'gia-ban'){
                $arr = [
                    'title' => $attribute->attribute_label,
                ];
                $cla_woocommerce->build_filter_price([], $arr);
            }else{
                $arr = [
                    'title' => $attribute->attribute_label,
                    'attribute_id' => $attribute->attribute_name
                ];
                $cla_woocommerce->build_filter([], $arr);
            }
            ?>
        <?php endforeach; ?>
    </div>
</div>
