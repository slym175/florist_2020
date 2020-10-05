<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/16/2020
 * Time: 10:27 AM
 */


/**
 * Custom lại html hiển thị giá cho sản phẩm
 * Cách gọi ở nơi muốn hiển thị: $product->get_price_html()
 */
add_filter( 'woocommerce_get_price_html', 'custom_html_price', 100, 2 );
function custom_html_price( $price, $product ){
    $return = '';
    if ($product->is_type('variable')){
        $min_variation_price = $product->get_variation_price('min');
        $max_variation_price = $product->get_variation_price('max');
        if($min_variation_price && $max_variation_price){
            $price_variable = number_format(floor($min_variation_price)) . ' - ' . number_format(floor($max_variation_price)) . ' ' . get_woocommerce_currency_symbol();
        }else{
            $price_variable = 'Liên hệ';
        }
        $return = '<span class="text-danger font-weight-bold mr-2 font-20">'.$price_variable.'</span>';
    }else{
        $regilar_price = $product->get_regular_price();
        if($product->is_on_sale()){
            $sale_price = $product->get_sale_price();
            $sale = ($sale_price) ? floor((1 - ($sale_price / $regilar_price)) * 100) : '';
            $return = '<span class="text-danger font-weight-bold mr-2 font-20">'.number_format($sale_price).get_woocommerce_currency_symbol().'</span>
                        <span><del class=" mr-2">'.number_format($regilar_price).get_woocommerce_currency_symbol().'</del></span>
                        <span class="text-danger">-'.$sale.'%</span>';
        }else{
            if($product->get_regular_price()){
                $return = '<span class="text-danger font-weight-bold mr-2 font-20">'.number_format($regilar_price).get_woocommerce_currency_symbol().'</span>';
            }else{
                $return = '<span class="text-danger font-weight-bold mr-2 font-20">Liên hệ</span>';
            }
        }
    }

    return $return;
}

function get_product_active($product_variations, $default_attributes,$attributes){
    $product_active = [];
    $default_attributes = (isset($default_attributes) && $default_attributes) ? $default_attributes : [];

    foreach ($attributes as $attribute){
        foreach ($attribute as $value){
            $selected_key = 'attribute_' . $value->taxonomy;
            if ((isset($_REQUEST[$selected_key]))) {
                if ($_REQUEST[$selected_key] == $value->slug) {
                    $default_attributes[$value->taxonomy] = $value->slug;
                }
            }
        }
    }

    if($default_attributes){
        foreach ($product_variations as $variation_values){
            foreach($variation_values['attributes'] as $key => $attribute_value ){
                $attribute_name = str_replace( 'attribute_', '', $key );
                $default_value = (isset($default_attributes[$attribute_name]) && $default_attributes[$attribute_name]) ? $default_attributes[$attribute_name] : '';
                if( $default_value == $attribute_value ){
                    $is_default_variation = true;
                } else {
                    $is_default_variation = false;
                    break; // Stop this loop to start next main lopp
                }
            }
            if( $is_default_variation ){
                $product_active = $variation_values;
                break; // Stop the main loop
            }
        }
    }

    if($product_active){
        $return = [
            'success' => true,
            'data' => $product_active
        ];
    }else if (count($attributes) > count($default_attributes)){
        $return = [
            'success' => false,
            'message' => 'Bạn vui lòng chọn đầy đủ thuộc tính sản phẩm',
        ];
    }else{
        $return = [
            'success' => false,
            'message' => 'Sản phẩm bạn chọn hiện không thể mua. Vui lòng liên hệ để biết thêm chi tiết.',
        ];
    }

    return $return;
}

class WoocommerceNewsun{
    /**
     * Hàm check giá mặc định của sản phẩm có nhiều biến thể
     */
    function get_html_price_default_product_variable($default = [], $variable = []){
        if($default){
            if($variable){
                foreach ($variable as $value){
                    if(!array_diff($value['attributes'], $default) && !array_diff($default,$value['attributes'])){
                        return $value;
                    }
                }
            }
        }
        return [];
    }

    function display_price_default_product_variable($display_price = 0, $display_regular_price = 0){
        if($display_regular_price == $display_price){
            $return = '<span class="text-danger font-weight-bold mr-3 font-20">'.number_format($display_regular_price).get_woocommerce_currency_symbol().'</span>';
        }else{
            $sale = ($display_price) ? floor((1 - ($display_price / $display_regular_price)) * 100) : '';
            $return = '<span class="text-danger font-weight-bold mr-3 font-20">'.number_format($display_price).get_woocommerce_currency_symbol().'</span>
                        <span><del class=" mr-3">'.number_format($display_regular_price).get_woocommerce_currency_symbol().'</del></span>
                        <span class="text-danger">-'.$sale.'%</span>';
        }
        return $return;
    }
}
