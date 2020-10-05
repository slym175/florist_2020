<?php

require_once THEME_URL.'/inc/core/nanoweb-themes.php';

if (!class_exists('Cla_Nanoweb')) {
    class Cla_Nanoweb extends NTFramework
    {

        static $_inst;

        protected $dir;

        function __construct()
        {
            //Your code
        }

        public static function _class_init()
        {
            require_once THEME_URL.'/inc/layouts/index.php';
            require_once THEME_URL.'/inc/custom-posttype.php';
            require_once THEME_URL.'/inc/layouts/cla_filter.php';
            require_once THEME_URL.'/inc/layouts/cla_shortcodes.php';
        }

        static function _get_instance()
        {
            if (!self::$_inst)
                self::$_inst = new self();

            return self::$_inst;
        }

    }

    if(!function_exists('nt'))
    {
        function nt()
        {
            return Cla_Nanoweb::_get_instance();
        }
    }

    Cla_Nanoweb::_class_init();
}