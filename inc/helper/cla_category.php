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
}