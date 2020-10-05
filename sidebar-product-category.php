<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/3/2020
 * Time: 11:35 AM
 */


?>
<div class="col-lg-3 col-12 order-card">
    <div class="row p-3 mb-3 order-options">
        <?php
        if (is_active_sidebar('list-product-cat-sidebar')) {
            dynamic_sidebar('list-product-cat-sidebar');
        } else {
            _e('Sidebar not found', TEXTDOMAIN);
        }
        ?>
    </div>
</div>
