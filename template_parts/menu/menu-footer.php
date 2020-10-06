<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/23/2020
 * Time: 9:15 AM
 */
$class = $args['class'];
$n = $args['menu_name'];

$menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
$primaryMenuId = $menuLocations[$n];
$primaryMenu = wp_get_nav_menu_items($primaryMenuId);

$menu_object = (isset($primaryMenuId) ? wp_get_nav_menu_object($primaryMenuId) : null);
$menu_name = (isset($menu_object->name) ? $menu_object->name : '');

?>

<?php if ($primaryMenu): ?>
	<div class="<?= $class ?>">
		<h5><?= __($menu_name , TEXTDOMAIN) ?></h5>
		<ul class="list-cate">
			<?php foreach($primaryMenu as $tp) : ?>
                <li><a href="<?= $tp->url ?>"><?= __($tp->title, TEXTDOMAIN) ?></a></li>
            <?php endforeach ?>
		</ul>
	</div>
<?php endif ?>