<?php
global $post;
$sep = ' > ';
?>
<section class="container border-bottom">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb" class="m-breadcrumb">
                <ol class="breadcrumb m-0">
                    <?php
                    if (!is_home()) {
                        echo '<li  class="breadcrumb-item">';
                        echo '<a href="' . home_url() . '">' . 'Trang chủ' . '</a></li>';
                        if (is_category() || is_single() || is_tag()) {
                            if (is_category() or is_tag()) {
                                the_archive_title('<li class="breadcrumb-item active">', '</li');
                            }
                            do_action('st_single_breadcrumb', $sep);
//                            if (get_post_type($post->ID) == 'hotel_room') {
//                                $hotel_parent = get_post_meta($post->ID, 'room_parent', true);
//                                if (!empty($hotel_parent)) {
//                                    echo '<li class="breadcrumb-item"><a href="' . get_permalink($hotel_parent) . '" title="' . get_the_title($hotel_parent) . '">' . get_the_title($hotel_parent) . '</a></li>';
//                                }
//                            }
                            if (is_single()) {
                                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
                            }
                        } elseif (is_page()) {
                            if ($post->post_parent) {
                                $anc = get_post_ancestors($post->ID);
                                $anc_link = get_page_link($post->post_parent);

                                foreach ($anc as $ancestor) {
                                    $output = '<li class="breadcrumb-item"><a href="' . $anc_link . '">' . get_the_title($ancestor) . '</a></li>';
                                }
                                echo balanceTags($output);
                                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
                            } else {
                                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
                            }
                        } elseif (is_search()) {

                            //if( !empty($_REQUEST['location_id']) || !empty($_REQUEST['location_id_pick_up']) ){
                            if (!empty($_REQUEST['location_id'])) {
                                if (!empty($_REQUEST['location_id'])) {
                                    $location_id = $_REQUEST['location_id'];
                                }
                                if (!empty($_REQUEST['location_id_pick_up'])) {
                                    $location_id = $_REQUEST['location_id_pick_up'];
                                }
                                $parent = array_reverse(get_post_ancestors($location_id));

                                foreach ($parent as $k => $v) {
                                    // $url = TravelHelper::bui
                                    $post_type = STInput::request('post_type');
                                    if (!empty($post_type)) {
                                        echo '<li class="breadcrumb-item"><a href="' . home_url('?s=' . STInput::request('s') . '&post_type=' . $post_type . '&location_id=' . $v) . '">' . get_the_title($v) . '</a></li>';
                                    } else {

                                        echo '<li class="breadcrumb-item"><a href="' . add_query_arg(['location_id' => $v], get_the_permalink()) . '">' . get_the_title($v) . '</a></li>';
                                    }
                                }
                                echo '<li class="breadcrumb-item active">' . get_the_title($location_id) . '</li>';
                            } else if (STInput::request('s')) {
                                echo '<li class="breadcrumb-item active">' . 'search_results' . esc_html('"' . STInput::request('s') . '"') . '</li>';
                            } else if (STInput::request('location_name')) {
                                echo '<li class="breadcrumb-item active">' . esc_html(STInput::request('location_name')) . '</li>';
                            } else if (STInput::request('address')) {
                                echo '<li class="breadcrumb-item active">' . esc_html(STInput::request('address')) . '</li>';
                            } else if (!empty($_REQUEST['pick-up'])) {
                                echo '<li class="breadcrumb-item active">' . 'search_results' . '</li>';
                                echo esc_html('"' . $_REQUEST['pick-up'] . '"');
                                if (!empty($_REQUEST['drop-off'])) {
                                    echo esc_html(' to "' . $_REQUEST['drop-off'] . '"');
                                }
                            } elseif (!empty($_REQUEST['st_google_location'])) {
                                echo (!empty($_REQUEST['st_country'])) ? '<li class="breadcrumb-item active">' . esc_html(STInput::request('st_country', '')) . '</li>' : '';
                                echo (!empty($_REQUEST['st_admin_area'])) ? '<li class="breadcrumb-item active">' . esc_html(STInput::request('st_admin_area', '')) . '</li>' : '';
                                echo (!empty($_REQUEST['st_sub'])) ? '<li class="breadcrumb-item active">' . esc_html(STInput::request('st_sub', '')) . '</li>' : '';
                                echo (!empty($_REQUEST['st_locality'])) ? '<li class="breadcrumb-item active">' . esc_html(STInput::request('st_locality', '')) . '</li>' : '';
                            } elseif (!empty($_REQUEST['st_google_location_pickup'])) {
                                echo (!empty($_REQUEST['st_country_up'])) ? '<li class="breadcrumb-item active">' . esc_html(STInput::request('st_country_up', '')) . '</li>' : '';
                                echo (!empty($_REQUEST['st_admin_area_up'])) ? '<li class="breadcrumb-item active">' . esc_html(STInput::request('st_admin_area_up', '')) . '</li>' : '';
                                echo (!empty($_REQUEST['st_sub_up'])) ? '<li class="breadcrumb-item active">' . esc_html(STInput::request('st_sub_up', '')) . '</li>' : '';
                                echo (!empty($_REQUEST['st_locality_up'])) ? '<li class="breadcrumb-item active">' . esc_html(STInput::request('st_locality_up', '')) . '</li>' : '';
                            }
                        }
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif (is_day()) {
                        echo __("Archive: ", TEXTDOMAIN);
                        the_time('F jS, Y');
                        echo '</li>';
                    } elseif (is_month()) {
                        echo __("Archive: ", TEXTDOMAIN);
                        the_time('F, Y');
                        echo '</li>';
                    } elseif (is_year()) {
                        echo __("Archive: ", TEXTDOMAIN);
                        the_time('Y');
                        echo '</li>';
                    } elseif (is_author()) {
                        echo __("Author's archive: ", TEXTDOMAIN);
                        echo '</li>';
                    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
                        echo __("Blog Archive: ", TEXTDOMAIN);
                        echo '';
                    } elseif (is_search()) {
                        echo '<li class="breadcrumb-item"><span>' . 'search_results' . '</span></li>';
                    }
                    ?>
                </ol>
            </nav>
        </div>
    </div>
</section>