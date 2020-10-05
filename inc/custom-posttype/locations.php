<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/25/2020
 * Time: 9:23 AM
 */
class Locations{
    function __construct()
    {
        add_action( 'init', array(__CLASS__,'nt_location_init') );
    }

    public static function nt_location_init(){
        $labels = array(
            'name'               => __( 'Cửa hàng', TEXTDOMAIN ),
            'singular_name'      => __( 'Cửa hàng', TEXTDOMAIN ),
            'menu_name'          => __( 'Cửa hàng', TEXTDOMAIN ),
            'name_admin_bar'     => __( 'Cửa hàng', TEXTDOMAIN ),
            'add_new'            => __( 'Thêm cửa hàng', TEXTDOMAIN ),
            'add_new_item'       => __( 'Thêm cửa hàng', TEXTDOMAIN ),
            'new_item'           => __( 'New Location', TEXTDOMAIN ),
            'edit_item'          => __( 'Chỉnh sửa', TEXTDOMAIN ),
            'view_item'          => __( 'Xem cửa hàng', TEXTDOMAIN ),
            'all_items'          => __( 'Toàn bộ cửa hàng', TEXTDOMAIN ),
            'search_items'       => __( 'Tìm kiếm cửa hàng', TEXTDOMAIN ),
            'parent_item_colon'  => __( 'Parent Location:', TEXTDOMAIN ),
            'not_found'          => __( 'No Locations found.', TEXTDOMAIN ),
            'not_found_in_trash' => __( 'No Locations found in Trash.', TEXTDOMAIN ),
            'insert_into_item'   => __( 'Insert into Location', TEXTDOMAIN),
            'uploaded_to_this_item'=> __( "Uploaded to this Location", TEXTDOMAIN),
            'featured_image'=> __( "Feature Image", TEXTDOMAIN),
            'set_featured_image'=> __( "Set featured image", TEXTDOMAIN),
            'menu_icon'          => 'dashicons-store'
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => get_option( 'location_permalink' ,'nt_Location' ) ),
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_position'      => 30,
            'supports'           => array( 'title', 'thumbnail','editor', 'excerpt','links','page-attributes','comments'),
            'menu_icon'          => 'dashicons-store',
            'exclude_from_search'=>true,

        );

        nt_reg_post_type( 'location', $args );

        $labels = array(
            'name'                       => __( 'Tỉnh/thành phố', TEXTDOMAIN ),
            'singular_name'              => __( 'Tỉnh/thành phố',  TEXTDOMAIN ),
            'search_items'               => __( 'Tìm kiếm Tỉnh/thành phố' , TEXTDOMAIN),
            'popular_items'              => __( 'Lĩnh vực phổ biến' , TEXTDOMAIN),
            'all_items'                  => __( 'Tất cả Tỉnh/thành phố', TEXTDOMAIN ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Chỉnh sửa' , TEXTDOMAIN),
            'update_item'                => __( 'Cập nhật' , TEXTDOMAIN),
            'add_new_item'               => __( 'Thêm mới', TEXTDOMAIN ),
            'new_item_name'              => __( 'Tên Tỉnh/thành phố', TEXTDOMAIN ),
            'separate_items_with_commas' => __( 'Separate Video Group with commas' , TEXTDOMAIN),
            'add_or_remove_items'        => __( 'Add or remove Video Group', TEXTDOMAIN ),
            'choose_from_most_used'      => __( 'Choose from the most used Video Group', TEXTDOMAIN ),
            'not_found'                  => __( 'No Pickup Video Group.', TEXTDOMAIN ),
            'menu_name'                  => __( 'Tỉnh/thành phố', TEXTDOMAIN ),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'query_var'             => true,
        );

        nt_reg_taxonomy( 'local_category', 'location', $args );
    }
}
new Locations();