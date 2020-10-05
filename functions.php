<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:55 AM
 */


define('PAGE_SHOPPINGCART_ID', 13);
define('PAGE_SHOPADDRESS_ID', 198);

define('THEME_URL', get_template_directory());
define('THEME_URL_URI', get_template_directory_uri());
define('TEXTDOMAIN', 'newsun');
define('PATH_URL_WIDGET', THEME_URL . '/widget/');

require_once THEME_URL . '/inc/cla_nanoweb.php';
require_once THEME_URL . '/inc/helper/cla_helper.php';
require_once THEME_URL . '/inc/helper/cla_category.php';
require_once THEME_URL . '/inc/helper/woocommerce.php';
require_once THEME_URL . '/inc/helper/cla_woocommerce.php';
require_once THEME_URL . '/inc/helper/ajax.php';
require_once THEME_URL . '/inc/layouts/comments.php';
require_once THEME_URL . '/inc/woocommerce.php';
require_once THEME_URL . '/inc/newsun.php';
if (!function_exists('newsun_setup')) {
    function newsun_setup()
    {
        /* Thiết lập textdomain */
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain('newsun', $language_folder);

        /* Tạo menu */
        register_nav_menus(
            array(
                'primary-menu' => __('Primary menu', TEXTDOMAIN),
                'header-menu' => __('Header menu', TEXTDOMAIN),
                'footer-menu-left' => __('Footer menu left', TEXTDOMAIN),
                'footer-menu-right' => __('Footer menu right', TEXTDOMAIN),
                'home-mobile-menu' => __('Home mobile menu', TEXTDOMAIN),
                'suport_information' => __('Menu suport information', TEXTDOMAIN),
            )
        );

        /* Thêm custom background */
        $default_background = array(
            'default-color' => '#fff'
        );
        add_theme_support('custom-background', $default_background);

        /* Thêm title tag */
        add_theme_support('title-tag');

        /* Thêm post thumbnail */
        add_theme_support('post-thumbnails');
        add_image_size('thumbnails_image_medium', 653, 383, true);
        set_post_thumbnail_size(196, 196, true);


        /* Thêm automatic feed link */
        add_theme_support('automatic-feed-links');

        /* Thêm post format */
        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'quote',
            'link'
        ));

        add_theme_support('woocommerce');
        // Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
        // zoom.
        add_theme_support('wc-product-gallery-zoom');
        // lightbox.
        add_theme_support('wc-product-gallery-lightbox');
        // swipe.
        add_theme_support('wc-product-gallery-slider');

        /* Tạo sidebar */
        $side_bar = array(
            'name' => __('Main Sidebar', 'newsun'),
            'id' => 'main-sidebar',
            'description' => __('Description Sidebar', TEXTDOMAIN),
            'class' => 'main-sidebar',
        );
        register_sidebar($side_bar);

        /* Tạo sidebar */
        $side_bar_page = array(
            'name' => __('Page Sidebar', TEXTDOMAIN),
            'id' => 'page-sidebar',
            'description' => __('Description Sidebar', TEXTDOMAIN),
            'class' => 'page-sidebar',
        );
        register_sidebar($side_bar_page);

        /* Tạo sidebar */
        $side_filter_product = array(
            'name' => __('List Product Sidebar', TEXTDOMAIN),
            'id' => 'list-product-sidebar',
            'description' => __('Description Sidebar', TEXTDOMAIN),
            'class' => 'page-sidebar',
        );
        register_sidebar($side_filter_product);

        /* Tạo sidebar */
        $side_filter_product_cat = array(
            'name' => __('List Product Category Sidebar', TEXTDOMAIN),
            'id' => 'list-product-cat-sidebar',
            'description' => __('Description Sidebar', TEXTDOMAIN),
            'class' => 'product-category-sidebar',
        );
        register_sidebar($side_filter_product_cat);

        /* Tạo sidebar */
        $side_filter_product = array(
            'name' => __('List News Sidebar', TEXTDOMAIN),
            'id' => 'list-news-sidebar',
            'description' => __('Description Sidebar', TEXTDOMAIN),
            'class' => 'news-sidebar',
        );
        register_sidebar($side_filter_product);
    }

    add_action('after_setup_theme', 'newsun_setup');

    function carrental_customize_register($wp_customize)
    {
        $wp_customize->add_setting('logo'); // Thêm cài đặt cho trình tải lên logo

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
            'label' => __('Upload Logo (replaces text)', TEXTDOMAIN),
            'section' => 'title_tagline',
            'settings' => 'logo',
        )));
    }

    add_action('customize_register', 'carrental_customize_register');

    function carrental_customize_register_mobile($wp_customize_mobile)
    {
        $wp_customize_mobile->add_setting('logo_mobile'); // Thêm cài đặt cho trình tải lên logo

        $wp_customize_mobile->add_control(new WP_Customize_Image_Control($wp_customize_mobile, 'logo_mobile', array(
            'label' => __('Upload Logo Mobile(replaces text)', TEXTDOMAIN),
            'section' => 'title_tagline',
            'settings' => 'logo_mobile',
        )));
    }

    add_action('customize_register', 'carrental_customize_register_mobile');
}

add_action('use_block_editor_for_post', '__return_false');
//code phân trang cho woocommerce
add_action('woocommerce_after_shop_loop', 'newsun_woocommerce_pagination', 10);
function newsun_woocommerce_pagination()
{
    woocommerce_pagination();
}

//Thêm file js,css
function loadstyle()
{
    wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_style('comments', get_template_directory_uri() . '/assets/css/comments.css');
    wp_enqueue_style('carousel', get_template_directory_uri() . '/assets/OwlCarousel/dist/assets/owl.carousel.min.css');
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/OwlCarousel/dist/assets/owl.theme.default.min.css');

//    if (wp_is_mobile()) {
//        wp_register_script('jQuery', get_template_directory_uri() . '/assets/js/jquery-3.5.1.js');
//        wp_enqueue_script('jQuery');
//    }


    wp_register_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js');
    wp_enqueue_script('popper');

    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap');

    wp_register_script('trangchu', get_template_directory_uri() . '/assets/js/trangchu.js');
    wp_enqueue_script('trangchu');

    wp_register_script('carousel', get_template_directory_uri() . '/assets/OwlCarousel/dist/owl.carousel.min.js');
    wp_enqueue_script('carousel');

    wp_register_script('customjs', get_template_directory_uri() . '/assets/js/js.js');
    wp_enqueue_script('customjs');
}

add_action('wp_enqueue_scripts', 'loadstyle');

function searchForm($form)
{
    return get_template_part('template_parts/search/form', '');
}

add_shortcode('wpbsearch', 'searchForm');

$labels_cat = array(
    'name' => __('Branch', TEXTDOMAIN),
    'singular_name' => __('Branch', TEXTDOMAIN),
    'search_items' => __('Search Branch', TEXTDOMAIN),
    'popular_items' => __('Popular Branch', TEXTDOMAIN),
    'all_items' => __('All Branch', TEXTDOMAIN),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __('Edit Branch', TEXTDOMAIN),
    'update_item' => __('Update Branch', TEXTDOMAIN),
    'add_new_item' => __('Add New Branch', TEXTDOMAIN),
    'new_item_name' => __('New Branch Name', TEXTDOMAIN),
    'separate_items_with_commas' => __('Separate Branch with commas', TEXTDOMAIN),
    'add_or_remove_items' => __('Add or remove Branch', TEXTDOMAIN),
    'choose_from_most_used' => __('Choose from the most used Branch', TEXTDOMAIN),
    'not_found' => __('No Pickup Branch.', TEXTDOMAIN),
    'menu_name' => __('Branch', TEXTDOMAIN),
);

$args_cat = array(
    'hierarchical' => true,
    'labels' => $labels_cat,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
);
register_taxonomy('product_branch', 'product', $args_cat);

if (!function_exists('st_breadcrumbs_new')) {
    function st_breadcrumbs_new()
    {
        get_view_widget('breadcrumbs/news.php');
    }
}

add_action('admin_init', function () {
    add_post_type_support('post', 'page-attributes');
});

function pp_getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

function pp_setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
//    echo "<pre>";
//    print_r($count);
//    echo "</pre>";
//    die;


    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


add_action('wp_ajax_load_news', 'load_news');
add_action('wp_ajax_nopriv_load_news', 'load_news');
function load_news()
{
    echo get_template_part('/template_parts/contents/view-more', '');
    die;
}


add_action('wp_ajax_load_products', 'load_products');
add_action('wp_ajax_nopriv_load_products', 'load_products');
function load_products()
{
    echo get_template_part('/template_parts/contents/view-more', 'product');
    die;
}

add_action('wp_ajax_load_mobile_news', 'load_mobile_news');
add_action('wp_ajax_nopriv_load_mobile_news', 'load_mobile_news');
function load_mobile_news()
{
    echo get_template_part('/template_parts/contents/mobile/view-more', '');
    die;
}

add_action('wp_ajax_load_mobile_products', 'load_mobile_products');
add_action('wp_ajax_nopriv_load_products', 'load_mobile_products');
function load_mobile_products()
{
    echo get_template_part('/template_parts/contents/mobile/view-more', 'product');
    die;
}

add_filter('loop_shop_per_page', 'so_27395967_products_per_page');
function so_27395967_products_per_page()
{
    return 12;
}


function lb_editor_remove_meta_box()
{
    global $post_type;

    // Check to see if the global $post_type variable exists
    // and then check to see if the current post_type supports
    // excerpts. If so, remove the default excerpt meta box
    // provided by the WordPress core. If you would like to only
    // change the excerpt meta box for certain post types replace
    // $post_type with the post_type identifier.
    if (isset($post_type) && post_type_supports($post_type, 'excerpt')) remove_meta_box('postexcerpt', $post_type, 'normal');
}

add_action('admin_menu', 'lb_editor_remove_meta_box');

function lb_editor_add_custom_meta_box()
{
    global $post_type;

    // Again, check to see if the global $post_type variable
    // exists and then if the current post_type supports excerpts.
    // If so, add the new custom excerpt mwoocommerce_add_to_cart_redirecteta box. If you would
    // like to only change the excerpt meta box for certain post
    // types replace $post_type with the post_type identifier.
    if (isset($post_type) && post_type_supports($post_type, 'excerpt')) add_meta_box('postexcerpt', __('Excerpt'), 'lb_editor_custom_post_excerpt_meta_box', $post_type, 'normal', 'high');
}

add_action('add_meta_boxes', 'lb_editor_add_custom_meta_box');

function lb_editor_custom_post_excerpt_meta_box($post)
{
    // Adjust the settings for the new wp_editor. For all
    // available settings view the wp_editor reference
    // http://codex.wordpress.org/Function_Reference/wp_editor
    $settings = array('textarea_rows' => '12', 'quicktags' => false, 'tinymce' => true);

    // Create the new meta box editor and decode the current
    // post_excerpt value so the TinyMCE editor can display
    // the content as it is styled.
    wp_editor(html_entity_decode(stripcslashes($post->post_excerpt)), 'excerpt', $settings);
}

function redirect_direct_access( ) {
    if(wp_is_mobile()){
        if (isset($_GET['remove_coupon']) && $_GET['remove_coupon']) {
            $checkout_url = wc_get_checkout_url();
            wp_redirect($checkout_url);
        }
    }
}

add_action( 'template_redirect', 'redirect_direct_access' );

function redirect_to_checkout($checkout_url)
{
    global $woocommerce;
    if (isset($_GET['quick_buy']) && $_GET['quick_buy']) {
        $checkout_url = wc_get_checkout_url();
        return $checkout_url;
    }
}

add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');

add_filter( 'woocommerce_return_to_shop_redirect', 'change_return_shop_url' );
 
function change_return_shop_url()
{
    return home_url();
}

add_filter('get_product_search_form', 'woo_custom_product_searchform');
function woo_custom_product_searchform($form)
{
    return get_template_part('template_parts/search/form', '');
}

if (!function_exists('get_view_widget')) {
    function get_view_widget($path, $var = [])
    {
        if ($var) {
            foreach ($var as $key => $value) {
                $$key = $value;
            }
        }
        include(PATH_URL_WIDGET . $path);
    }
}

if (!function_exists('get_view')) {
    function get_view($path, $var = [])
    {
        if ($var) {
            foreach ($var as $key => $value) {
                $$key = $value;
            }
        }
        include(THEME_URL . '/' . $path);
    }
}

function twentytwelve_scripts_styles()
{
    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'twentytwelve_scripts_styles');

/**
 * Funtion to get post count from given term or terms and its/their children
 *
 * @param (string) $taxonomy
 * @param (int|array|string) $term Single integer value, or array of integers or "all"
 * @param (array) $args Array of arguments to pass to WP_Query
 * @return $q->found_posts
 *
 */
function get_term_post_count( $taxonomy = 'category', $term = '', $args = [] )
{
    // Lets first validate and sanitize our parameters, on failure, just return false
    if ( !$term )
        return false;

    if ( $term !== 'all' ) {
        if ( !is_array( $term ) ) {
            $term = filter_var(       $term, FILTER_VALIDATE_INT );
        } else {
            $term = filter_var_array( $term, FILTER_VALIDATE_INT );
        }
    }

    if ( $taxonomy !== 'category' ) {
        $taxonomy = filter_var( $taxonomy, FILTER_SANITIZE_STRING );
        if ( !taxonomy_exists( $taxonomy ) )
            return false;
    }

    if ( $args ) {
        if ( !is_array ) 
            return false;
    }

    // Now that we have come this far, lets continue and wrap it up
    // Set our default args
    $defaults = [
        'posts_per_page' => 1,
        'fields'         => 'ids'
    ];

    if ( $term !== 'all' ) {
        $defaults['tax_query'] = [
            [
                'taxonomy' => $taxonomy,
                'terms'    => $term
            ]
        ];
    }
    $combined_args = wp_parse_args( $args, $defaults );
    $q = new WP_Query( $combined_args );

    // Return the post count
    return $q->found_posts;
}