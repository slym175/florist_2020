<?php
/*
* Author http://levantoan.com
*/
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');

if (post_password_required()) { ?>
    <p class="nocomments">Vui lòng đăng nhập để có có thể bình luận.</p>
<?php
    return;
}

$args = array(
    // 'walker'            => null,
    // 'max_depth'         => '',
    // 'style'             => 'ul',
    'callback'          => 'better_comments',
    // 'end-callback'      => null,
    // 'type'              => 'all',
    // 'page'              => '1',
    // 'per_page'          => '4',
    // 'reverse_top_level' => true,
    // 'reverse_children'  => '',
    // 'format'            => 'html5', 
    // 'short_ping'        => false,  
    // 'echo'              => true  
);
?>
<section id="comments" class="container py-3 border-bottom comments-area">
    <div class="row">
        <div class="col-12 mb-2">
            <h6 class="font-weight-bold font-14">Bình luận:</h6>
        </div>
    </div>
    <?php if (comments_open()) : ?>
        <div class="row">
            <div class="col-12">
                <?php if (is_user_logged_in()) : ?>
                    <p class="nameuser"><?php _e('Bình luận với tên:', 'devvn') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a></p>
                <?php endif; ?>
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                    <div class="ip-discuss">
                        <?php if (!is_user_logged_in()) : ?>
                            <div class="name-email">
                                <p>
                                    <input placeholder="<?php _e('Họ và tên', 'devvn') ?>" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                                </p>
                                <p>
                                    <input placeholder="<?php _e('Email', 'devvn') ?>" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                                </p>
                            </div>
                        <?php endif; ?>
                        <textarea class="form-control" name="comment" id="comment" cols="30" rows="5" placeholder="Mời bạn thảo luận. Vui lòng nhập tiếng việt có dấu..."></textarea>
                        <button class="btn btn-send font-14">Gửi</button>
                    </div>
                    <?php comment_id_fields(); ?>
                    <?php do_action('comment_form', $post->ID); ?>
                </form>
            </div>
        </div>
    <?php endif;  ?>
    <div class="list-comment">
        <?php if (have_comments()) : ?>
            <div class="box-item">
                <?php echo wp_list_comments($args); ?>
            </div>
            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <nav id="comment-nav-below" class="navigation" role="navigation">
                    <div class="nav-previous"><?php previous_comments_link(__('&larr; trước', '')); ?></div>
                    <div class="nav-next"><?php next_comments_link(__('Tiếp &rarr;', '')); ?></div>
                </nav>
            <?php endif; ?>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center">
                    <a href="#" class="btn btn-outline-primary font-14 px-5 py-1 w-100">Xem thêm bình luận <i class="font-12 ml-3 fas fa-chevron-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>