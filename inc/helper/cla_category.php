<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/24/2020
 * Time: 11:43 AM
 */
class ClaCategory{
    public $return = 0;

    function data_tree($data, $parent_id = 0){
        $return = [];
        foreach ($data as $key => $option){
            if($option['parent'] == $parent_id){
                $return[$option['term_id']] = $option;
                unset($data[$key]);
                $return[$option['term_id']]['items'] = self::data_tree($data,$option['term_id']);
            }
        }
        return $return;
    }

    function data_tree_1($data, $show)
    {
        $return = [];
        foreach ($show as $k => $val){
            foreach ($data as $key => $option) {
                if ($option['parent'] == $val['term_id']) {
                    $return[$val['term_id']] = $val;
                    unset($show[$k]);
                    $return[$val['term_id']]['items'] = self::data_tree($data, $val['term_id']);
                }
            }
        }
        return $return;
    }

    function get_parents($data, $term_id = 0){
        foreach ($data as $option){
            if($data[$term_id]['parent'] == $option['term_id']){
                $this->return = $option['term_id'];
                self::get_parents($data,$option['term_id']);
            }
        }
        return $this->return;
    }

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

    function nav_menu_object_tree( $nav_menu_items_array ) {
        foreach ( $nav_menu_items_array as $key => $value ) {
            $value->children = array();
            $nav_menu_items_array[ $key ] = $value;
        }
    
        $nav_menu_levels = array();
        $index = 0;
        if ( ! empty( $nav_menu_items_array ) ) do {
            if ( $index == 0 ) {
                foreach ( $nav_menu_items_array as $key => $obj ) {
                    if ( $obj->menu_item_parent == 0 ) {
                        $nav_menu_levels[ $index ][] = $obj;
                        unset( $nav_menu_items_array[ $key ] );
                    }
                }
            } else {
                foreach ( $nav_menu_items_array as $key => $obj ) {
                    if ( in_array( $obj->menu_item_parent, $last_level_ids ) ) {
                        $nav_menu_levels[ $index ][] = $obj;
                        unset( $nav_menu_items_array[ $key ] );
                    }
                }
            }
            $last_level_ids = wp_list_pluck( $nav_menu_levels[ $index ], 'db_id' );
            $index++;
        } while ( ! empty( $nav_menu_items_array ) );
    
        $nav_menu_levels_reverse = array_reverse( $nav_menu_levels );
    
        $nav_menu_tree_build = array();
        $index = 0;
        if ( ! empty( $nav_menu_levels_reverse ) ) do {
            if ( count( $nav_menu_levels_reverse ) == 1 ) {
                $nav_menu_tree_build = $nav_menu_levels_reverse;
            }
            $current_level = array_shift( $nav_menu_levels_reverse );
            if ( isset( $nav_menu_levels_reverse[ $index ] ) ) {
                $next_level = $nav_menu_levels_reverse[ $index ];
                foreach ( $next_level as $nkey => $nval ) {
                    foreach ( $current_level as $ckey => $cval ) {
                        if ( $nval->db_id == $cval->menu_item_parent ) {
                            $nval->children[] = $cval;
                        }
                    }
                }
            }
        } while ( ! empty( $nav_menu_levels_reverse ) );
    
        $nav_menu_object_tree = $nav_menu_tree_build[ 0 ];
        return $nav_menu_object_tree;
    }
}