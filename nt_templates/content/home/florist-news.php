<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/10/2020
 * Time: 8:48 SA
 */
$category_ids = explode(',', $attr['category']);
$categories = array();
foreach ($category_ids as $id) {
    $cat = get_term( $id, 'category' );
    array_push($categories, $cat);
}



?>

<div class="section-post">
    <div class="container container-fluid">
        <div class="row">
            <div class="tabs-list">
                <ul class="nav nav-tabs">
                    <?php foreach ($categories as $key => $category) : ?>
                        <li class="<?= $key == 0 ? 'active' : '' ?>">
                            <a data-toggle="tab" href="#category-<?=$category->slug?>">
                                <?php if($key == 0) :?>
                                    <img src="<?= THEME_URL_URI ?>/assets/img/tab.png" alt="">
                                <?php endif; ?>
                                <?=$category->name?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="tab-content-list">
                <div class="tab-content">
                    <?php foreach ($categories as $key => $category) : if($key == 0) :?>
                        <?= nt()->load_template('content/home/news/news-tab', '', array('category' => $category, 'class' => 'tab-pane fade in active', 'limit' => $attr['limit'])); ?>
                        <?php else : ?>
                        <?= nt()->load_template('content/home/news/news-tab', '', array('category' => $category, 'class' => 'tab-pane fade', 'limit' => $attr['limit'])); ?>
                    <?php endif; endforeach; ?>
                </div>
            </div>
            <div class="btn-page">
                <a href="" title="" class="btn-cc btn-post" tabindex="0">Xem tất cả</a>
            </div>
        </div>
    </div>
</div>
