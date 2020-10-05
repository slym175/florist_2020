<?php
// Get correct tag used for the comments
if ('div' === $args['style']) {
    $tag       = 'div';
    $add_below = 'comment';
} else {
    $tag       = 'div';
    $add_below = 'div-comment';
}
if ($args['avatar_size'] != 0) {
    $avatar_size = !empty($args['avatar_size']) ? $args['avatar_size'] : 70; // set default avatar size
}
// get_comment_date();
// get_comment_time();
// WP_Comment::
?>
<?= ($comment->comment_parent) ? '' : '</div><div class="box-item">' ?>
<div class="<?= empty($args['has_children']) ? 'media mt-3' : 'media mt-3 parent' ?>">
    <img src="<?= get_avatar_url($comment, $avatar_size); ?>" class="mr-3 rounded-pill img-fluid" alt="Avatar" style="border-radius: 50%;" />
    <div class="media-body font-14">
        <div class="mt-0 d-flex align-items-center">
            <span class="font-weight-bold mr-4"><?= get_comment_author_link() ?></span>
        </div>
        <p class="font-14 my-2"><?= comment_text(); ?></p>
        <div>
            <span class="pr-2">
                <a href="#" class="text-dark">10 <i class="fas fa-thumbs-up ml-2 text-primary"></i></a>
            </span>
            <span class="pl-2">
                <a href="#" class="text-dark">
                    <?= count($comment->get_children()) ?> trả lời <i class="fas fa-comments ml-2 text-primary"></i>
                </a>
            </span>
        </div>
    </div>
</div>