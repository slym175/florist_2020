<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:56 AM
 */

?>
<form>
    <input class="field" type="text" name="s" id="search_input" placeholder="<?= __('Nhập từ khóa cần tìm kiếm...', TEXTDOMAIN) ?>">
    <button type="submit" class="submit btn btn-search" name="submit" id="searchsubmit">
        <img src="<?= THEME_URL_URI . '/assets/img/search.png' ?>" alt="">
    </button>
</form>