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
    <li>
        <a href="<?= $headerMenu[0]->url ?>" title="<?= $headerMenu[0]->title ?>">
            <span>
                <img src="<?= THEME_URL_URI . '/assets/img/dn.png' ?>" alt="<?= $headerMenu[1]->title ?>">
            </span>
            <?= $headerMenu[0]->title ?>
        </a>
    </li>
    <li>
        <a href="<?= $headerMenu[1]->url ?>" title="<?= $headerMenu[1]->title ?>" class="gh">
            <img src="<?= THEME_URL_URI . '/assets/img/gh.png' ?>" alt="<?= $headerMenu[1]->title ?>">
            <span>0</span>
        </a>
    </li>
<?php endif; ?>