<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/2/2020
 * Time: 9:42 AM
 */

class CustomPostType{
    public  function __construct()
    {

    }

    public static function _class_init()
    {
        require_once THEME_URL.'/inc/custom-posttype/banners.php';
        require_once THEME_URL.'/inc/custom-posttype/locations.php';
    }
}
CustomPostType::_class_init();

if(!function_exists('nt_reg_post_type'))
{
    function nt_reg_post_type($name,$args=array())
    {
        register_post_type($name,$args);
    }
}
if(!function_exists('nt_reg_taxonomy'))
{
    function nt_reg_taxonomy($name,$objects='',$args=array())
    {
        register_taxonomy($name,$objects,$args);
    }
}