<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/3/2020
 * Time: 11:35 AM
 */
if(is_active_sidebar('list-news-sidebar')){
    dynamic_sidebar('list-news-sidebar');
}else{
    _e('Sidebar not found',TEXTDOMAIN);
}