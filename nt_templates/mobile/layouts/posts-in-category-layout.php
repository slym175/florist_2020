<?php $limit = (isset($attr['limit']) && $attr['limit']) ? $attr['limit'] : 7; ?>

<?php while($post->have_posts()) : $post->the_post(); ?>
    <div class="row nv-normal">
        <a href="<?= the_permalink() ?>" class="col-5 col-md-4 img-container">
            <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url('',array(653,383)) ?>" style="height: 81px" alt="<?= the_title() ?>" />
        </a>
        <div class="col-7 col-md-8 pl-0">
            <a href="<?= the_permalink() ?>">
                <h4 class="lh-125"><?= the_title() ?></h4>
            </a>
        </div>
    </div>
<?php endwhile ?>
<?php if($post->max_num_pages > $data['page']) :?>
    <div class="col-12 d-flex justify-content-center more-posts">
        <a data-url="<?= admin_url('admin-ajax.php') ?>" data-page="<?= $data['page']+1 ?>" data-limit="<?= $limit ?>" data-slugg="<?= $data['slugg'] ?>" href="javascript:void(0)" onclick="loadPostsInCategory(this, true)" title="Xem thêm" class="btn btn-outline-primary py-1 px-2 mt-3">Xem thêm <i class="fas fa-angle-down ml-2"></i></a>
    </div>
<?php endif;?>