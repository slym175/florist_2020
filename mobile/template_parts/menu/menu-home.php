<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/2/2020
 * Time: 2:43 PM
 */
$menuLocations = get_nav_menu_locations();
$headerMenuId = $menuLocations['home-mobile-menu'];
$headerMenu = wp_get_nav_menu_items($headerMenuId);
?>
<?php if ($headerMenu): ?>
    <section class="container secondary-menu">
        <ul class="nav nav-pills sm-nav">
            <?php foreach ($headerMenu as $key => $menu): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $menu->url ?>">
                        <p class="m-0"><?= $menu->title ?></p>
                    </a>
                </li> 
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>