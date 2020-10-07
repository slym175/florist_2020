<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/25/2020
 * Time: 9:23 AM
 */
class Recruitments{
    function __construct()
    {
        add_action( 'init', array(__CLASS__,'nt_recruitment_init') );
    }

    public static function nt_recruitment_init(){
        $labels = array(
            'name'               => __( 'Tuyển dụng', TEXTDOMAIN ),
            'singular_name'      => __( 'Tuyển dụng', TEXTDOMAIN ),
            'menu_name'          => __( 'Tuyển dụng', TEXTDOMAIN ),
            'name_admin_bar'     => __( 'Tuyển dụng', TEXTDOMAIN ),
            'add_new'            => __( 'Thêm thông tin tuyển dụng', TEXTDOMAIN ),
            'add_new_item'       => __( 'Thêm thông tin tuyển dụng', TEXTDOMAIN ),
            'new_item'           => __( 'Thêm thông tin tuyển dụng', TEXTDOMAIN ),
            'edit_item'          => __( 'Chỉnh sửa', TEXTDOMAIN ),
            'view_item'          => __( 'Xem tin tuyển dụng', TEXTDOMAIN ),
            'all_items'          => __( 'Toàn bộ tin tuyển dụng', TEXTDOMAIN ),
            'search_items'       => __( 'Tìm kiếm tin tuyển dụng', TEXTDOMAIN ),
            'parent_item_colon'  => __( 'Parent Recruitment:', TEXTDOMAIN ),
            'not_found'          => __( 'No Recruitments found.', TEXTDOMAIN ),
            'not_found_in_trash' => __( 'No Recruitments found in Trash.', TEXTDOMAIN ),
            'insert_into_item'   => __( 'Insert into Recruitment', TEXTDOMAIN),
            'uploaded_to_this_item'=> __( "Uploaded to this Recruitment", TEXTDOMAIN),
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
            'rewrite'            => array( 'slug' => get_option( 'recruitment_permalink' ,'nt_Recruitment' ) ),
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_position'      => 30,
            'supports'           => array( 'title', 'thumbnail','editor', 'excerpt','links','page-attributes','comments'),
            'menu_icon'          => 'dashicons-store',
            'exclude_from_search'=>true,

        );

        nt_reg_post_type( 'recruitment', $args );
    }
}
new Recruitments();