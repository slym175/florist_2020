<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/10/2020
 * Time: 8:55 SA
 */

vc_add_shortcode_param( 'dropdown_multi', 'dropdown_multi_settings_field' );
function dropdown_multi_settings_field( $param, $value ) {
    $param_line = '';
    $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
    foreach ( $param['value'] as $text_val => $val ) {
        if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
            $text_val = $val;
        }
        $text_val = __($text_val, "js_composer");
        $selected = '';

        if(!is_array($value)) {
            $param_value_arr = explode(',',$value);
        } else {
            $param_value_arr = $value;
        }

        if ($value!=='' && in_array($val, $param_value_arr)) {
            $selected = ' selected="selected"';
        }
        $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
    }
    $param_line .= '</select>';

    return  $param_line;
}