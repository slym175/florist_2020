<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/24/2020
 * Time: 11:43 AM
 */
class ClaHelper{
    function _substr($str, $length, $minword = 3)
    {
        $sub = '';
        $len = 0;
        foreach (explode(' ', $str) as $word)
        {
            $part = (($sub != '') ? ' ' : '') . $word;
            $sub .= $part;
            $len += strlen($part);
            if (strlen($word) > $minword && strlen($sub) >= $length)
            {
                break;
            }
        }
        return $sub . (($len < strlen($str)) ? '...' : '');
    }
}

function newsun_breadcrumbs() {

    $delimiter = "";

    $home = (is_singular('post')) ? 'Tin tức' : 'Trang chủ'; // Thay cho 'Home' link

    $before = '<span>'; // trước mỗi link và $after = '</span>'; // sau mỗi link
    $after = '</span>';
    if ( !is_home() && !is_front_page() || is_paged() ) {


        global $post;

        $homeLink = (is_singular('post')) ?  get_page_link(get_page_by_path('tin-tuc')) : home_url();

        echo '<li class="breadcrumb-item"><a href="' . $homeLink . '">' . $home . '</a></li>';

        if ( is_single() && !is_attachment() ) {

            if ( get_post_type() != 'post' ) {

                $post_type = get_post_type_object(get_post_type());

                $slug = $post_type->rewrite;

                echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';

                echo $before . get_the_title() . $after;

            } else {

                $cat = get_the_category(); $cat = $cat[0];

                echo get_category_parents_custom($cat, TRUE, ' ' . $delimiter . ' ');
//                echo '<li><a href="' . esc_url( get_term_link( $cat->term_id, 'category' ) ) . '">'.$cat->name.'</a></li>';


//                echo '<li class="active">' . get_the_title() .'</li>';

            }

        }

    }

}

function get_category_parents_custom( $id, $link = false, $separator = '/', $nicename = false, $deprecated = array() ) {

    if ( ! empty( $deprecated ) ) {
        _deprecated_argument( __FUNCTION__, '4.8.0' );
    }

    $format = $nicename ? 'slug' : 'name';

    $args = array(
        'separator' => $separator,
        'link'      => $link,
        'format'    => $format,
    );

    return get_term_parents_list_custom( $id, 'category', $args );
}
function get_term_parents_list_custom( $term_id, $taxonomy, $args = array() ) {
    $list = '';
    $term = get_term( $term_id, $taxonomy );

    if ( is_wp_error( $term ) ) {
        return $term;
    }

    if ( ! $term ) {
        return $list;
    }

    $term_id = $term->term_id;

    $defaults = array(
        'format'    => 'name',
        'separator' => '/',
        'link'      => true,
        'inclusive' => true,
    );

    $args = wp_parse_args( $args, $defaults );

    foreach ( array( 'link', 'inclusive' ) as $bool ) {
        $args[ $bool ] = wp_validate_boolean( $args[ $bool ] );
    }

    $parents = get_ancestors( $term_id, $taxonomy, 'taxonomy' );

    if ( $args['inclusive'] ) {
        array_unshift( $parents, $term_id );
    }

    foreach ( array_reverse( $parents ) as $term_id ) {
        $parent = get_term( $term_id, $taxonomy );
        $name   = ( 'slug' === $args['format'] ) ? $parent->slug : $parent->name;

        if ( $args['link'] ) {
            $list .= '<li class="breadcrumb-item"><a href="' . esc_url( get_term_link( $parent->term_id, $taxonomy ) ) . '">' . $name . '</a></li>' . $args['separator'];
        } else {
            $list .= $name . $args['separator'];
        }
    }

    return $list;
}
