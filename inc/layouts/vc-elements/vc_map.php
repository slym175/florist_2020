<?php
add_action('vc_before_init', 'loadVCMapNewLayout');

    

function loadVCMapNewLayout() {

    vc_map(array(
        'name' => esc_html__('Home Head Slider',TEXTDOMAIN),
        'base' => 'st_home_header_slider',
        'icon' => 'icon-st',
        'category' => 'Florist',
        'params' => array(
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => 'Giới hạn số lượng banner lấy ra.'
            ],
            [
                'type' => 'textfield',
                'heading' => __('Banner Group Id', TEXTDOMAIN),
                'param_name' => 'banner_group_id',
                'description' => 'Nhóm banner muốn hiện thị ngoài trang chủ.'
            ],
        )
    ));

    vc_map(array(
        'name' => esc_html__('Home Most Chosen Gift',TEXTDOMAIN),
        'base' => 'st_home_most_chosen_gift',
        'icon' => 'icon-st',
        'category' => 'Florist',
        'params' => array(
            [
                'type' => 'textfield',
                'heading' => __('Title', TEXTDOMAIN),
                'param_name' => 'title',
                'description' => 'Tiêu đề section'
            ],
            [
                'type' => 'textfield',
                'heading' => __('Excerpt', TEXTDOMAIN),
                'param_name' => 'excerpt',
                'description' => 'Mô tả ngắn section'
            ],
            [
                'type' => 'attach_image',
                'heading' => __('Image', TEXTDOMAIN),
                'param_name' => 'image',
                'description' => 'Ảnh đại diện section'
            ],
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => 'Giới hạn số lượng sản phẩm làm quà tặng được lấy ra.'
            ],
        )
    ));

    vc_map(array(
        'name' => esc_html__('Home Newest Product',TEXTDOMAIN),
        'base' => 'st_home_newest_products',
        'icon' => 'icon-st',
        'category' => 'Florist',
        'params' => array(
            [
                'type' => 'textfield',
                'heading' => __('Banner Group Id', TEXTDOMAIN),
                'param_name' => 'banner_group_id',
                'description' => 'Nhóm banner muốn hiện thị ngoài trang chủ.'
            ],
            [
                'type' => 'textfield',
                'heading' => __('Title', TEXTDOMAIN),
                'param_name' => 'title',
                'description' => 'Tiêu đề section'
            ],
            [
                'type' => 'textfield',
                'heading' => __('Excerpt', TEXTDOMAIN),
                'param_name' => 'excerpt',
                'description' => 'Mô tả ngắn section'
            ],
            [
                'type' => 'attach_image',
                'heading' => __('Image', TEXTDOMAIN),
                'param_name' => 'image',
                'description' => 'Ảnh đại diện section'
            ],
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => 'Giới hạn số lượng sản phẩm làm quà tặng được lấy ra.'
            ],
        )
    ));

    $product_cat_array = array();
    $product_cats = get_categories(array('taxonomy' => 'product_cat',));
    foreach( $product_cats as $pc ) {
        $product_cat_array[$pc->name] = $pc->term_id;
    }

    vc_map(array(
        'name' => esc_html__('Home Product Category',TEXTDOMAIN),
        'base' => 'st_home_product_category',
        'icon' => 'icon-st',
        'category' => 'Florist',
        'params' => array(
            [
                // 'type' => 'textfield',
                // 'heading' => __('Category Id', TEXTDOMAIN),
                // 'param_name' => 'banner_group_id',
                // 'description' => 'Nhóm sản phẩm muốn hiển thị'
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                'heading' => __('Product Category', TEXTDOMAIN),
                "param_name" => 'category',
                "value" => $product_cat_array,
                'description' => __('Nhóm sản phẩm muốn hiển thị', TEXTDOMAIN),
            ],
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => 'Giới hạn số lượng sản phẩm làm quà tặng được lấy ra.'
            ],
            [
                'type' => 'textfield',
                'heading' => __('Banner Position', TEXTDOMAIN),
                'param_name' => 'banner_position',
                'description' => 'Vị trí của banner danh mục ("left" or "right")'
            ],
        )
    ));

    vc_map(array(
        'name' => esc_html__('Home Hot Deal Product',TEXTDOMAIN),
        'base' => 'st_home_hot_deal',
        'icon' => 'icon-st',
        'category' => 'Florist',
        'params' => array(
            [
                // 'type' => 'textfield',
                // 'heading' => __('Category Id', TEXTDOMAIN),
                // 'param_name' => 'banner_group_id',
                // 'description' => 'Nhóm sản phẩm muốn hiển thị'
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                'heading' => __('Product Category', TEXTDOMAIN),
                "param_name" => 'category',
                "value" => $product_cat_array,
                'description' => __('Nhóm sản phẩm muốn hiển thị', TEXTDOMAIN),
            ],
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => 'Giới hạn số lượng sản phẩm hot deal được lấy ra.'
            ],
            [
                'type' => 'wpc_date',
                'heading' => __('End Date', TEXTDOMAIN),
                'param_name' => 'end_date',
                'admin_label' => true,
                'value'       => '',
                'description' => 'Ngày kết thúc deal'
            ],
        ),
        'admin_enqueue_js' => array(
			esc_url( 'cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.js' ),
		),
		'admin_enqueue_css' => array(
			esc_url( 'ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' ),
		)
    ));

    $cat_array = array();
    $cats = get_categories(array('taxonomy' => 'category',));
    foreach( $cats as $pc ) {
        $cat_array[$pc->name] = $pc->term_id;
    }

    vc_map(array(
        'name' => esc_html__('Home Florist Youtube',TEXTDOMAIN),
        'base' => 'st_home_florist_youtube',
        'icon' => 'icon-st',
        'category' => 'Florist',
        'params' => array(
            [
                // 'type' => 'textfield',
                // 'heading' => __('Category Id', TEXTDOMAIN),
                // 'param_name' => 'banner_group_id',
                // 'description' => 'Nhóm sản phẩm muốn hiển thị'
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                'heading' => __('Category', TEXTDOMAIN),
                "param_name" => 'category',
                "value" => $cat_array,
                'description' => __('Nhóm tin tức muốn hiển thị', TEXTDOMAIN),
            ],
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => 'Giới hạn số lượng sản phẩm làm quà tặng được lấy ra.'
            ],
        )
    ));

    vc_map(array(
        'name' => esc_html__('Home Florist News',TEXTDOMAIN),
        'base' => 'st_home_florist_news',
        'icon' => 'icon-st',
        'category' => 'Florist',
        'params' => array(
            [
                // 'type' => 'textfield',
                // 'heading' => __('Category Id', TEXTDOMAIN),
                // 'param_name' => 'banner_group_id',
                // 'description' => 'Nhóm sản phẩm muốn hiển thị'
                "type" => "dropdown_multi",
                "holder" => "div",
                "class" => "",
                'heading' => __('Category', TEXTDOMAIN),
                "param_name" => 'category',
                "value" => $cat_array,
                'description' => __('Nhóm tin tức muốn hiển thị (Có thể chọn nhiều)', TEXTDOMAIN),
            ],
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => 'Giới hạn số lượng sản phẩm làm quà tặng được lấy ra.'
            ],
        )
    ));
}