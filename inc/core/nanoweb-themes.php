<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/22/2020
 * Time: 11:02 AM
 */

if (!class_exists('NTFramework')) {
    /**
     * Class NTFramework
     */
    class NTFramework
    {

        /**
         * @var string
         */
        public $template_dir = "nt_templates";

        public $plugin_name = "";

        protected $_cachedOptions = [];


        /**
         *
         */
        function __construct()
        {
        }


        function load_template($slug, $name = false, $data = array())
        {
            $show_mobile = get_post_meta(get_queried_object_id(), 'view_mobile_rieng', false);
            if (wp_is_mobile() && isset($show_mobile[0]) && $show_mobile[0]) {
                $slug =  'mobile/' . $slug;
                // echo $slug;
                // cong add
            }

            if (is_array($data))
                extract($data);

            if ($name) {
                $slug = $slug . '-' . $name;
            }
            //Find template in folder st_templates/
            $template = locate_template($this->template_dir . '/' . $slug . '.php');

            $_template = locate_template($this->template_dir . '/layouts/modern/' . $slug . '.php');
            if (is_file($_template)) {
                $template = $_template;
            }


            //If file not found
            if (is_file($template)) {
                ob_start();

                include $template;

                $data = @ob_get_clean();

                return $data;
            }
        }

        static function write_log($log)
        {
            if (true === WP_DEBUG) {
                if (is_array($log) || is_object($log)) {
                    error_log(print_r($log, true));
                } else {
                    error_log($log);
                }
            }
        }
    }
}
