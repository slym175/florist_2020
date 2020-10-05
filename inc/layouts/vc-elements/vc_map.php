<?php
add_action('vc_before_init', 'loadVCMapNewLayout');

function loadVCMapNewLayout(){
    vc_map(array(
        'name' => esc_html__('Content Header',TEXTDOMAIN),
        'base' => 'nt_content_header',
        'icon' => 'icon-st',
        'category' => 'florist',
        'params' => array(
            [
                "type" => "dropdown",
                "heading" => __("Banner Group", TEXTDOMAIN),
                "param_name" => "banner_group",
                "value" => apply_filters('ns_list_banner_group','')
            ],

            [
                "type" => "textfield",
                "heading" => __("Limit", TEXTDOMAIN),
                "param_name" => "limit",
                "description" => __('Limit banner', TEXTDOMAIN)
            ],

            //Tin tức
            [
                'type' => 'textfield',
                'heading' => __('Danh sách tin tức', TEXTDOMAIN),
                'param_name' => 'new_ids',
                "description" => "Danh sách id tin tức lấy ra, Các id cách nhau bởi dấu ','",
            ],

            //banner dưới list tin tức
            [
                'type' => 'param_group',
                'heading' => esc_html__('Add banner', TEXTDOMAIN),
                'param_name' => 'list_banner',
                'value' => '',
                'params' => array(
                    [
                        "type" => "attach_image",
                        "heading" => esc_html__("Image", TEXTDOMAIN),
                        "param_name" => "banner_images",
                        "description" => "",
                    ],
                    [
                        "type" => "textfield",
                        "heading" => esc_html__("Title", TEXTDOMAIN),
                        "param_name" => "banner_title",
                        "description" => "",
                    ],
                    [
                        "type" => "textarea",
                        "heading" => esc_html__("Content slider", TEXTDOMAIN),
                        "param_name" => "banner_content",
                        "description" => "",
                    ],
                    [
                        "type" => "vc_link",
                        "heading" => esc_html__("Link to", TEXTDOMAIN),
                        "param_name" => "banner_link",
                        "description" => "",
                    ],
                ),

            ],
        )
    ));

    vc_map(array(
        'name' => esc_html__('Sale Product Hot',TEXTDOMAIN),
        'base' => 'st_product_sale',
        'icon' => 'icon-st',
        'category' => 'florist',
        'params' => array(
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => 'Giới hạn số lượng sản phẩm lấy ra.'
            ],
            [
                'type' => 'textfield',
                'heading' => __('Banner URL', TEXTDOMAIN),
                'param_name' => 'banner_url',
                'description' => 'Cài đặt đường dẫn banner sản phẩm khuyến mãi/nổi bật'
            ],
        )
    ));

    vc_map(array(
        'name' => esc_html__('Product in category',TEXTDOMAIN),
        'base' => 'st_product_in_category',
        'icon' => 'icon-st',
        'category' => 'florist',
        'params' => array(
            [
                'type' => 'textfield',
                'heading' => __('Category Id', TEXTDOMAIN),
                'param_name' => 'cat_id',
                'description' => "Danh sách id của danh mục sản phẩm (Các Id cách nhau bởi dấu ',' , Để trống nếu lấy tất cả danh mục)"
            ],
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => "Giới hạn số lượng sản phẩm lấy ra."
            ],
            [
                "type" => "dropdown",
                "heading" => __("Banner Group", TEXTDOMAIN),
                "param_name" => "banner_group",
                "value" => apply_filters('ns_list_banner_group','')
            ],
        )
    ));


    vc_map(array(
        'name' => esc_html__('Product viewed',TEXTDOMAIN),
        'base' => 'st_product_viewed',
        'icon' => 'icon-st',
        'category' => 'florist',
        'params' => array(
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => "Giới hạn số lượng sản phẩm lấy ra."
            ],
        )
    ));

    vc_map(array(
        'name' => esc_html__('News and Video',TEXTDOMAIN),
        'base' => 'st_news_and_video',
        'icon' => 'icon-st',
        'category' => __('florist', TEXTDOMAIN),
        'params' => array(
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => __('Limit', TEXTDOMAIN)
            ],
            [
                'type' => 'textfield',
                'heading' => __('Danh sách id bài viết', TEXTDOMAIN),
                'param_name' => 'ids',
                'description' => 'Các id được phân cách bằng dấu ",". Ví dụ: 123,456'
            ],
            [
                'type' => 'textfield',
                'heading' => __('Danh sách id bài viết dạng video', TEXTDOMAIN),
                'param_name' => 'video_ids',
                'description' => 'Các id được phân cách bằng dấu ",". Ví dụ: 123,456'
            ],
        )
    ));

    vc_map(array(
        'name' => esc_html__('abc def',TEXTDOMAIN),
        'base' => 'st_abc',
        'icon' => 'icon-st',
        'category' => __('abc', TEXTDOMAIN),
        'params' => array(
            [
                'type' => 'textfield',
                'heading' => __('Limit', TEXTDOMAIN),
                'param_name' => 'limit',
                'description' => __('Limit', TEXTDOMAIN)
            ],
            [
                'type' => 'textfield',
                'heading' => __('News Id', TEXTDOMAIN),
                'param_name' => 'ids',
                'description' => __('Ids separated by commas. Example: 123,456', TEXTDOMAIN)
            ],
        )
    ));

    vc_map(array(
        'name' => esc_html__('Hình ảnh',TEXTDOMAIN),
        'base' => 'st_single_image',
        'icon' => 'icon-st',
        'category' => __('florist', TEXTDOMAIN),
        'params' => array(
            [
                "type" => "attach_image",
                "heading" => esc_html__("Hình ảnh", TEXTDOMAIN),
                "param_name" => "image",
                "description" => "",
            ],
            [
                "type" => "vc_link",
                "heading" => esc_html__("Link to", TEXTDOMAIN),
                "param_name" => "link_to",
                "description" => "",
            ],
        )
    ));

}