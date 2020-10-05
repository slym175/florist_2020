<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/27/2020
 * Time: 11:35 AM
 */
?>
<form role="search" method="get" action="<?= home_url( '/' ) ?>">
    <input type="hidden" name="post_type" value="project" />
    <i class="fa fa-times close" aria-hidden="true"></i>
    <input type="" name="s" placeholder="Nhập từ khóa..." value="<?= get_search_query() ?>">
    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>

