<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/10/2020
 * Time: 10:46 SA
 */
    if (is_active_sidebar('info-footer-sidebar')) {
        dynamic_sidebar('info-footer-sidebar');
    }else{
        _e('Sidebar not found',TEXTDOMAIN);
    }
