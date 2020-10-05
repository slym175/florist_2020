<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/30/2020
 * Time: 5:15 PM
 */
global $product;
?>

<section class="container py-3 border-bottom">
    <div class="row">
        <div class="col-12">
            <h6 class="font-weight-bold font-16 section-title-16">Chi tiết sản phẩm</h6>
            
            <div class="box-cap-show-detail">
                <div id="product-description" class="product-description-out">
                    <style>
                        #product-description img{
                            max-width: 100%;
                            height: auto;
                        }
                    </style>
                    <?= the_content() ?>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <a class="btn btn-outline-primary" data-toggle="modal" data-target="#descModal">
                        Xem thêm <i class="fas fa-chevron-down font-12 ml-3"></i>
                    </a>
                </div>         
            </div>
            <div class="modal fade tech-modal" id="descModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Chi tiết sản phẩm</h5>
                                <a class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times; Đóng</span>
                                </a>
                            </div>
                            <div class="modal-body ts-modal-table">
                                <div class="card card-body border-0 px-3 py-2 bg-1 muc_luc_header">
                                    <button class="btn btn-link btn-block text-left text-decoration-none p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fas fa-bars pr-3"></i>
                                        <span class="font-14 font-weight-bold">Nội dung</span>
                                        <i class="fas fa-chevron-down float-right mt-2 font-10"></i>
                                    </button>
                                    <div id="collapseOne" class="collapse show ml-1 mt-1" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body pl-4 pb-3 pt-0 pr-0 font-14 muc_luc">
                                        </div>
                                    </div>
                                </div>
                                <div  class="product-description">
                                    <?= the_content() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div>
                <a href="<?= ($product->is_type('variable')) ? 'javascipr:void(0)' : '?quick_buy=1&add-to-cart=' . $post->ID ?>" onclick="check_out(this)" class="btn text-center btn-order">
                    <p class="mb-1 font-weight-bold text-white font-14">Mua ngay</p>
                    <p class="m-0 text-white font-10 o-8">Giao hàng tận nơi</p>
                </a>
            </div>
            <div class="mt-2 font-14 phone-list">
                <p class="font-weight-bold mb-1">Liên Hệ Tư Vấn:</p>
                <p class="mb-1">Hà Nội:
                    <strong class="text-6">
                        <a class="text-6" href="tel:0961555155">0961 555 155</a> -
                        <a class="text-6" href="tel:0934668811">0934 66 88 11</a>
                    </strong>
                </p>
                <p class="mb-1">Nghệ An: <strong class="text-6"><a href="tel:0904736111" class="text-6">0904 736 111</a> - <a href="tel:0973995429" class="text-6">0973 99 5429</a></strong></p>
                <p class="mb-1">Đà Nẵng: <strong class="text-6"><a href="tel:0965119567" class="text-6">0965 119 567</a> - <a href="tel:0934668811" class="text-6">0934 66 88 11</a></strong></p>
                <p class="mb-1">Nha Trang: <strong class="text-6"><a href="tel:0961652266" class="text-6">0961 65 2266</a> - <a href="tel:0911704682" class="text-6">0911 70 46 82</a></strong></p>
                <p class="mb-1">Hồ Chí Minh: <strong class="text-6"><a href="tel:0961555255" class="text-6">0961 555 255</a> - <a href="tel:0934668811" class="text-6">0934 66 88 11</a></strong></p>
            </div>
        </div>
    </div>
</section>
