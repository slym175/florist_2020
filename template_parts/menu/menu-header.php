<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/2/2020
 * Time: 2:43 PM
 */
$menuLocations = get_nav_menu_locations();
$headerMenuId = $menuLocations['header-menu'];
$headerMenu = wp_get_nav_menu_items($headerMenuId);
?>
<?php if ($headerMenu): ?>
    <div class="text-center border-right px-3">
        <a href="<?= $headerMenu[0]->url ?>" class="header-bar-item d-flex align-items-center">
                        <span class="mr-md-3 mr-1 text-center" id="dot">
                            <span class="ping"></span>
                        </span>
            <span class="text-dark"><?= $headerMenu[0]->title ?></span>
        </a>
    </div>
    <div class="ml-3">
        <div class="row">
            <?php foreach ($headerMenu as $key => $menu): ?>
                <?php if ($key != 0): ?>
                    <div class="col border-right text-center header-s-menu">
                        <a href="<?= $menu->url ?>" class="header-bar-item"><span class="text-dark"><?= $menu->title ?></span></a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>