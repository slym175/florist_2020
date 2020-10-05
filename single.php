<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/17/2020
 * Time: 9:56 AM
 */
get_header();
echo "SDsd"; die();
?>
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <?php pp_setPostViews(get_the_ID()); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
<?php
get_footer();
