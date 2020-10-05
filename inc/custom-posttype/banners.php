<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/25/2020
 * Time: 9:23 AM
 */
class Banner{
    function __construct()
    {
        add_action( 'init', array(__CLASS__,'nt_banner_init') );
    }

    public static function nt_banner_init(){
        $labels = array(
            'name'               => __( 'Banners', TEXTDOMAIN ),
            'singular_name'      => __( 'Banner', TEXTDOMAIN ),
            'menu_name'          => __( 'Banners', TEXTDOMAIN ),
            'name_admin_bar'     => __( 'Banner', TEXTDOMAIN ),
            'add_new'            => __( 'Add New', TEXTDOMAIN ),
            'add_new_item'       => __( 'Add New Banner', TEXTDOMAIN ),
            'new_item'           => __( 'New Banner', TEXTDOMAIN ),
            'edit_item'          => __( 'Edit Banner', TEXTDOMAIN ),
            'view_item'          => __( 'View Banner', TEXTDOMAIN ),
            'all_items'          => __( 'All Banner', TEXTDOMAIN ),
            'search_items'       => __( 'Search Banner', TEXTDOMAIN ),
            'parent_item_colon'  => __( 'Parent Banner:', TEXTDOMAIN ),
            'not_found'          => __( 'No banners found.', TEXTDOMAIN ),
            'not_found_in_trash' => __( 'No banners found in Trash.', TEXTDOMAIN ),
            'insert_into_item'   => __( 'Insert into Banner', TEXTDOMAIN),
            'uploaded_to_this_item'=> __( "Uploaded to this Banner", TEXTDOMAIN),
            'featured_image'=> __( "Feature Image", TEXTDOMAIN),
            'set_featured_image'=> __( "Set featured image", TEXTDOMAIN),
            'menu_icon'          => 'dashicons-editor-kitchensink'
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => get_option( 'location_permalink' ,'nt_banner' ) ),
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_position'      => 30,
            'supports'           => array( 'title', 'thumbnail', 'excerpt','links','page-attributes'),
            'menu_icon'          => 'dashicons-camera',
            'exclude_from_search'=>true,

        );

        nt_reg_post_type( 'banner', $args );
        // Location ==============================================================

        $labels = array(
            'name'                       => __( 'Banner Group', TEXTDOMAIN ),
            'singular_name'              => __( 'Banner Group',  TEXTDOMAIN ),
            'search_items'               => __( 'Search Banner Group' , TEXTDOMAIN),
            'popular_items'              => __( 'Popular Banner Group' , TEXTDOMAIN),
            'all_items'                  => __( 'All Banner Group', TEXTDOMAIN ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit Banner Group' , TEXTDOMAIN),
            'update_item'                => __( 'Update Banner Group' , TEXTDOMAIN),
            'add_new_item'               => __( 'Add New Banner Group', TEXTDOMAIN ),
            'new_item_name'              => __( 'New Banner Group Name', TEXTDOMAIN ),
            'separate_items_with_commas' => __( 'Separate Banner Group with commas' , TEXTDOMAIN),
            'add_or_remove_items'        => __( 'Add or remove Banner Group', TEXTDOMAIN ),
            'choose_from_most_used'      => __( 'Choose from the most used Banner Group', TEXTDOMAIN ),
            'not_found'                  => __( 'No Pickup Banner Group.', TEXTDOMAIN ),
            'menu_name'                  => __( 'Banner Group', TEXTDOMAIN ),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'query_var'             => true,
        );

        nt_reg_taxonomy( 'banner_group', 'banner', $args );
    }
}
new Banner();