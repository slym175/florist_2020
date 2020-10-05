<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/27/2020
 * Time: 11:35 AM
 */
?>
<form role="search" method="get" action="<?= home_url( '/' ) ?>">
    <input type="hidden" name="post_type" value="post" />
    <div class="box-triangle"></div>
    <input type="" name="s" placeholder="Tìm kiếm" class="w-100" value="<?= get_search_query() ?>">

    <button type="submit"><i class="far fa-search"></i></button>
</form>
