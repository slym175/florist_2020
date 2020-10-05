<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/27/2020
 * Time: 11:35 AM
 */

$branch_value = (get_query_var('product_branch')) ? get_query_var('product_branch') : '';
$branchs = get_terms(
    array(
        'taxonomy' => 'product_branch',
        'hide_empty' => false,
    )
);

?>
<?php if (wp_is_mobile()) : ?>
    <form role="search" method="get" action="<?= home_url('/') ?>" id="ftf">
        <input type="hidden" name="post_type" value="product" />
        <input type="text" name="s" value="<?= get_search_query() ?>" placeholder="Tìm kiếm tại điện máy">
        <a id="subft" type="submit"><i class="fas fa-search"></i></i></a>
    </form>
<?php else : ?>
    <form role="search" method="get" action="<?= home_url('/') ?>" class="form-inline" id="ftf">
        <input type="hidden" name="post_type" value="product" />
        <select class="form-control branch-input text-center" name="product_branch">
            <option value="" selected>Chi nhánh</option>
            <?php if ($branchs) : ?>
                <?php foreach ($branchs as $branch) : ?>
                    <option value="<?= $branch->slug ?>" <?= ($branch->slug == $branch_value) ? 'selected' : '' ?>><?= $branch->name ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <div class="search-input ml-lg-2 mt-1 mt-lg-0">
            <input type="text" name="s" value="<?= get_search_query() ?>" placeholder="Nhập sản phẩm cần tìm kiếm">
            <a id="subft" href="#" type="button"><i class="fas fa-search"></i></i></a>
        </div>
    </form>
<?php endif; ?>
<script>
    jQuery(document).ready(function() {
        jQuery('#subft').click(function() {
            jQuery('#ftf').submit();
        });
    })
</script>