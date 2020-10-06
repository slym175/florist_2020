<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/23/2020
 * Time: 9:15 AM
 */

$menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
$primaryMenuId = $menuLocations['primary-menu'];
$primaryMenu = wp_get_nav_menu_items($primaryMenuId);
$menuItems = ClaCategory::nav_menu_object_tree($primaryMenu);
?>

<?php if ($primaryMenu): ?>
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <ul class="menu-pc">
                    <?php foreach ($menuItems as $menu): ?>
                        <?php if($menu->children) : ?>
                            <li class="">
                                <a href="<?= $menu->url ?>" title="<?= $menu->title ?>"> <?= $menu->title ?> </a>
                                <ul class="menu-pc-con">
                                    <?php foreach ($menu->children as $menu_lv2) : ?>
                                        <li> <a href="<?= $menu_lv2->url ?>" title="<?= $menu_lv2->title ?>"> <?= $menu_lv2->title ?> </a> </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else : ?>
                            <li> <a href="<?= $menu->url ?>" title="<?= $menu->title ?>"> <?= $menu->title ?> </a> </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>