<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/16/2020
 * Time: 4:13 PM
 */

function posts_navigation( $args = array() ) {
    $navigation = '';

    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
        // Make sure the nav element has an aria-label attribute: fallback to the screen reader text.
        if ( ! empty( $args['screen_reader_text'] ) && empty( $args['aria_label'] ) ) {
            $args['aria_label'] = $args['screen_reader_text'];
        }

        $args = wp_parse_args(
            $args,
            array(
                'prev_text'          => __( 'Older posts' ),
                'next_text'          => __( 'Newer posts' ),
                'screen_reader_text' => __( 'Posts navigation' ),
                'aria_label'         => __( 'Posts' ),
            )
        );

        $prev_link = get_previous_posts_link_custom( $args['next_text'] );

        if ( $prev_link ) {
            $navigation .= '<div class="nav-previous">' . $prev_link . '</div>';
        }

        $next_link = get_next_posts_link_custom( $args['prev_text'] );
        if ( $next_link ) {
            $navigation = '<div class="nav-previous">' . $next_link . '</div>';
        }

        $navigation = _navigation_markup( $navigation, 'posts-navigation', $args['screen_reader_text'], $args['aria_label'] );
    }

    return $navigation;
}

function get_next_posts_link_custom( $label = null, $max_page = 0 ) {
    global $paged, $wp_query;

    if ( ! $max_page ) {
        $max_page = $wp_query->max_num_pages;
    }

    if ( ! $paged ) {
        $paged = 1;
    }

    $nextpage = intval( $paged ) + 1;

    if ( null === $label ) {
        $label = __( 'Next Page &raquo;' );
    }

    if ( ! is_single() && ( $nextpage <= $max_page ) ) {
        /**
         * Filters the anchor tag attributes for the next posts page link.
         *
         * @since 2.7.0
         *
         * @param string $attributes Attributes for the anchor tag.
         */
        $attr = apply_filters( 'next_posts_link_attributes', '' );

        return '<a class="btn-more px-3 py-2" href="' . next_posts( $max_page, false ) . "\" $attr>" .'<span class="mr-3">Xem thêm</span>
                                    <i class="fas fa-chevron-right"></i></a>';
    }
}

function get_previous_posts_link_custom( $label = null ) {
    global $paged;

    if ( null === $label ) {
        $label = __( '&laquo; Previous Page' );
    }

    if ( ! is_single() && $paged > 1 ) {
        /**
         * Filters the anchor tag attributes for the previous posts page link.
         *
         * @since 2.7.0
         *
         * @param string $attributes Attributes for the anchor tag.
         */
        $attr = apply_filters( 'previous_posts_link_attributes', '' );
        return '<a class="btn-more px-3 py-2" href="' . previous_posts(  false ) . "\" $attr>" .'<span class="mr-3">Quay lại</span>
                                    <i class="fas fa-chevron-right"></i></a>';
    }
}