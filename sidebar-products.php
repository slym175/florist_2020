<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/3/2020
 * Time: 11:35 AM
 */


?>
<div class="col-lg-3 col-12 order-card">
    <div class="row px-2 py-3 mb-3 order-options">
        <?php
        if (is_active_sidebar('list-product-sidebar')) {
            dynamic_sidebar('list-product-sidebar');
        } else {
            _e('Sidebar not found', TEXTDOMAIN);
        }
        ?>
    </div>
</div>
