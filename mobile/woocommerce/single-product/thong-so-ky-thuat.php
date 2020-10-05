<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/30/2020
 * Time: 5:04 PM
 */
?>
<section class="container pt-3 border-bottom">
    <div class="row">
        <div class="col-12">
            <p class="font-weight-bold font-14 section-title-14">Thông số kỹ thuật:</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <img class="img-fluid amp-img" src="<?= get_the_post_thumbnail_url('',array(300,300)) ?>" height="244" width="337" alt="Logo" />
            <div class="tech-section my-3 box-cap-show-detail">
                <div class="font-14 w-100 d-flex flex-column ts-table">
                    <?= wpautop(get_post_meta(get_the_ID(), 'technical_data', true)) ?>
                </div>
                <?php if (get_post_meta(get_the_ID(), 'technical_data', true)) : ?>
                    <div class="d-flex justify-content-center my-3">
                        <a class="btn btn-outline-primary step-show-detail" data-toggle="modal" data-target="#dataModal">
                            Xem thêm <i class="fas fa-chevron-down font-12 ml-3"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>