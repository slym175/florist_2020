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

?>
<?php if ($primaryMenu): ?>
    <ul class="nav header-menu">
        <?php foreach ($primaryMenu as $menu_prd): ?>
            <li class="nav-item">
                <a class="nav-link header-menu-item" href="<?= $menu_prd->url ?>">
                    <img class="img-fluid" src="<?= wp_get_attachment_image_url(get_post_meta($menu_prd->ID,'attchment_image',true)) ?>" alt="">
                    <br>
                    <p class="font-14"><?= $menu_prd->title ?></p>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>