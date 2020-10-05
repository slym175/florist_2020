<?php while ($news->have_posts()) :
    $news->the_post();
    global $post;  ?>
    <div class="col-12 col-md-3">
        <div class="row mb-md-3 mb-2">
            <div class="col-5 col-md-12">
                <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url() ?>" style="height: 81px;" alt="<?= the_title() ?>" />
            </div>
            <div class="col-7 col-md-12 flex flex-column justify-content-between pl-0 pl-md-3 mt-md-2">
                <a href="<?= the_permalink() ?>">
                    <h6 class="font-14 text-dark mb-1 line-2"><?= the_title() ?></h6>
                </a>
                <div>
                    <?php $tags = wp_get_post_terms($post->ID, 'post_tag', array("fields" => "all")); ?>
                    <?php if ($tags) : ?>
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?= get_term_link($tag->term_id) ?>" title="Tags"><span class="m-0 bg-2 font-10 p-1 text-dark"><?= $tag->name ?></span></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>