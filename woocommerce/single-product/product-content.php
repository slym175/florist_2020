<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/30/2020
 * Time: 3:50 PM
 */

global $product;
?>

<img src="<?= get_the_post_thumbnail_url() ?>" class="img-fluid border-bottom pb-4"
     alt="<?= the_title() ?>">
<h4 class="py-4 font-18 font-weight-bold mb-0">Chi tiết sản phẩm</h4>
<div class="card border-0 steps-section muc_luc_header">
    <h4 class="mb-0">
        <button class="btn btn-link btn-block text-left text-decoration-none" type="button"
                data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
            <i class="fas fa-bars pr-3"></i><span class="font-14 font-weight-bold">Nội dung</span>
        </button>
    </h4>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
         data-parent="#accordionExample">
        <div class="card-body pl-4 pb-3 pt-1 font-14 muc_luc">

        </div>
    </div>
</div>
<div class="detail-post-content post-content-open">
    <?= the_content() ?>
</div>
<div class="row">
    <div class="col-12 p-md-0 p-2 d-flex justify-content-center">
        <a class="btn-more post-content-opened px-5 py-2 mt-4">Xem thêm <i
                class="fas fa-chevron-down ml-3 font-12"></i></a>
    </div>
</div>
<div class="border-bottom py-4">
    <form action="" method="post">
        <div class="pb-3 d-flex justify-content-center">
            <a href="<?= ($product->is_type('variable')) ? 'javascipr:void(0)' : '?quick_buy=1&add-to-cart=' . $post->ID ?>"
               onclick="check_out(this)" class="btn text-center btn-order w-75">
                <p class="m-0 font-weight-bold text-white font-14">Đặt hàng ngay</p>
                <p class="m-0 text-white font-10">Giao trong 1 giờ hoặc đặt trong siêu thị</p>
            </a>
        </div>
    </form>

    <div>
        <p class="font-weight-bold font-14">Liên Hệ Tư Vấn:</p>
        <div>
            <div class="font-14">Hà Nội: <span class="font-weight-bold">0961
                                        555 155 - 0934
                                        66 88 11</span></div>
            <div class="font-14">Nghệ An: <span
                    class="font-weight-bold">0904 736 111 - 0973
                                        99 5429</span></div>
            <div class="font-14">Đà Nẵng: <span
                    class="font-weight-bold">0965 119 567 - 0934
                                        66 88 11</span></div>
            <div class="font-14">Nha Trang: <span
                    class="font-weight-bold">0961 65 2266 -
                                        0911 70 46 82</span></div>
            <div class="font-14">Hồ Chí Minh: <span
                    class="font-weight-bold">0961 555 255 -
                                        0934 66 88 11</span></div>
        </div>
    </div>
</div>
