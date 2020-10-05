<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/2/2020
 * Time: 3:16 PM
 */

class ClaFilter {
    function __construct()
    {
        add_filter('ns_list_banner_group',array($this,'ns_list_banner_group'));
    }

    function ns_list_banner_group(){
        $banners = [];
        $banner_groups = get_terms(
            [
                'taxonomy' => 'banner_group',
                'hide_empty' => false,
            ]
        );

        if($banner_groups){
            foreach ($banner_groups as $banner_group){
                $banners[$banner_group->name] = $banner_group->term_id;
            }
        }
        return $banners;
    }
}
if(is_admin()){
    new ClaFilter();
}