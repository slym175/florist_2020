<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/14/2020
 * Time: 4:05 PM
 */
function devvn_comment($comment, $args, $depth)    {
    $GLOBALS['comment'] = $comment; ?>
    <div class="media mt-3">
        <img src="<?= get_avatar_url($comment, $size='50', ''); ?>" style="border-radius: 100%;width: 50px" class="mr-3 rounded-pill img-fluid"
                 alt="Avatar" />
        <div class="media-body font-14">
            <div class="mt-0 d-flex align-items-center">
                <span class="font-weight-bold"><?= get_comment_author() ?></span>
                <div class="wpd-comment-date" style="color: #9c9696;font-size: 12px;margin-left: 0.8rem;">
                    <i class="far fa-clock" aria-hidden="true"></i>
                    <?= get_comment_date('d/m/Y') ?>
                </div>
            </div>
            <div class="font-14 my-2"><?php comment_text(); ?></div>
            <div>
                <span class="pl-2" style="padding-left: 0px !important;">
                    <a href="#" class="text-dark">
                        <?php comment_reply_link(array_merge($args,array('respond_id' => 'respond','depth' => $depth, 'max_depth'=> $args['max_depth'])));?>
                        <i class="fas fa-comments text-primary"></i>
                    </a>
                </span>
            </div>
        </div>
    </div>
<?php }
//validate comments
function comment_validation_init() {
    if(is_singular() && comments_open() ) { ?>
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#commentform').validate({
                    onfocusout: function(element) {
                        this.element(element);
                    },
                    rules: {
                        author: {
                            required: true,
                            minlength: 2
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        comment: {
                            required: true,
                        }
                    },
                    messages: {
                        author: "Ô họ và tên là bắt buộc.",
                        email: "Ô Email là bắt buộc.",
                        comment: "Ô bình luận là bắt buộc."
                    },
                    errorElement: "div",
                    errorPlacement: function(error, element) {
                        element.after(error);
                    }
                });
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'comment_validation_init');