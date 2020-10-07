<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/30/2020
 * Time: 3:50 PM
 */

global $product;
?>

<div class="product-element">
    <?php wc_get_template( 'single-product/product-can-favor.php' ); ?>
    <div class="element-list">
        <div class="profile-product">
            <div class="tab-product-detail">
                <div class="tabs-list-detail">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#chitietsanpham"><span> Chi tiết sản phẩm <img src="<?= THEME_URL_URI ?>/assets/img/la.png" alt=""></span></a></li>
                        <li><a data-toggle="tab" href="#danhgiasanpham"><span>Đánh giá sản phẩm <img src="<?= THEME_URL_URI ?>/assets/img/la.png" alt=""></span></a></li>
                    </ul>
                </div>
                <div class="tab-content-list">
                    <div class="tab-content">
                        <div id="chitietsanpham" class="tab-pane fade in active">
                            <div class="post-tabs">
                                <?= $product->get_short_description(); ?>
                                <?= $product->get_description(); ?>
                                <div class="btn-page">
                                    <a href="" title="" class="btn-cc btn-post" tabindex="0">Xem tất cả</a>
                                </div>
                            </div>
                            <div class="comment-detail">
                                <div class="number-cmt">
                                    <p><strong>Bình luận:</strong> 100 bình luận</p>
                                    <div class="select-comt">
                                        <p>Sắp xếp theo:
                                            <span class="icon-select-cmt">
					                                        <select>
					                                            <option>Mới nhất</option>
					                                             <option>Cũ hơn</option>
					                                        </select>
					                                        <img src="<?= THEME_URL_URI ?>/assets/img/select1.png" alt="">
					                                    </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="box-cmt">
                                    <div class="img">
                                        <img src="<?= THEME_URL_URI ?>/assets/img/avatar.png" alt="">
                                    </div>
                                    <div class="comment">
                                        <textarea></textarea>
                                    </div>
                                </div>
                                <p class="link-fb"> <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/facebook.png" alt=""> Plugin bình luận trên Facebook</a> </p>
                            </div>

                        </div>
                        <div id="danhgiasanpham" class="tab-pane fade">
                            <div class="col-lg-4 col-12 review-left">
                                <h2 class="text-center text-warning">4.5/5</h2>
                                <span class="d-flex justify-content-center pb-2">
			                                    <img class="img-fluid px-2 star" src="<?= THEME_URL_URI ?>/assets/img/sao1.png" alt="Star">
			                                    <img class="img-fluid px-2 star" src="<?= THEME_URL_URI ?>/assets/img/sao1.png" alt="Star">
			                                    <img class="img-fluid px-2 star" src="<?= THEME_URL_URI ?>/assets/img/sao1.png" alt="Star">
			                                    <img class="img-fluid px-2 star" src="<?= THEME_URL_URI ?>/assets/img/sao1.png" alt="Star">
			                                    <img class="img-fluid px-2 star" src="<?= THEME_URL_URI ?>/assets/img/sao2.png" alt="Star">
			                                </span>
                                <p class="text-center font-14">(100 đáng giá)</p>
                            </div>
                            <div class="col-lg-8 col-12 review-right">
                                <div class="evaluation">
			                                    <span class="eval-index">5<img class="ml-2 img-fluid" src="<?= THEME_URL_URI ?>/assets/img/sao3.png"
                                                                               alt="Star"></span>
                                    <div class="progress eval-progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                             aria-valuemax="100" style="width: 50%"></div>
                                    </div>
                                    <div class="eval-percent">
                                        <div class="review-num">50<small>%</small></div>
                                        <span class="eval-num">100 đánh giá</span>
                                    </div>
                                </div>
                                <div class="evaluation">
			                                    <span class="eval-index">4<img class="ml-2 img-fluid" src="<?= THEME_URL_URI ?>/assets/img/sao3.png"
                                                                               alt="Star"></span>
                                    <div class="progress eval-progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100" style="width: 25%"></div>
                                    </div>
                                    <div class="eval-percent">
                                        <div class="review-num">50<small>%</small></div>
                                        <span class="eval-num">0 đánh giá</span>
                                    </div>

                                </div>
                                <div class="evaluation">
			                                    <span class="eval-index">3<img class="ml-2 img-fluid" src="<?= THEME_URL_URI ?>/assets/img/sao3.png"
                                                                               alt="Star"></span>
                                    <div class="progress eval-progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="22" aria-valuemin="0"
                                             aria-valuemax="100" style="width: 22%"></div>
                                    </div>
                                    <div class="eval-percent">
                                        <div class="review-num">50<small>%</small></div>
                                        <span class="eval-num">0 đánh giá</span>
                                    </div>

                                </div>
                                <div class="evaluation">
			                                    <span class="eval-index">2<img class="ml-2 img-fluid" src="<?= THEME_URL_URI ?>/assets/img/sao3.png"
                                                                               alt="Star"></span>
                                    <div class="progress eval-progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0"
                                             aria-valuemax="100" style="width: 2%"></div>
                                    </div>
                                    <div class="eval-percent">
                                        <div class="review-num">50<small>%</small></div>
                                        <span class="eval-num">60 đánh giá</span>
                                    </div>

                                </div>
                                <div class="evaluation">
			                                    <span class="eval-index">1<img class="ml-2 img-fluid" src="<?= THEME_URL_URI ?>/assets/img/sao3.png"
                                                                               alt="Star"></span>
                                    <div class="progress eval-progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0"
                                             aria-valuemax="100" style="width: 1%"></div>
                                    </div>
                                    <div class="eval-percent">
                                        <div class="review-num">50<small>%</small></div>
                                        <span class="eval-num">0 đánh giá</span>
                                    </div>

                                </div>
                            </div>
                            <div class="danhgiabox">
                                <p><strong> Để lại đánh giá của bạn: </strong></p>
                                <form>
                                    <textarea placeholder="Nhập bình luận của bạn. Vui lòng nhập tiếng việt có dấu."></textarea>

                                    <p> Xếp hạng:
                                        <span> <img src="<?= THEME_URL_URI ?>/assets/img/sao1.png" alt=""></span>
                                        <span> <img src="<?= THEME_URL_URI ?>/assets/img/sao1.png" alt=""></span>
                                        <span> <img src="<?= THEME_URL_URI ?>/assets/img/sao1.png" alt=""></span>
                                        <span> <img src="<?= THEME_URL_URI ?>/assets/img/sao1.png" alt=""></span>
                                        <span> <img src="<?= THEME_URL_URI ?>/assets/img/sao2.png" alt=""></span>
                                    </p>
                                    <a href="" title="" class="btn-detail" tabindex="0">Gửi đánh giá </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title-left">
                    <h2><span>Sản phẩm cùng loại <img src="<?= THEME_URL_URI ?>/assets/img/la.png" alt=""></span></h2>
                </div>
                <div class="product-grid">
                    <div class="col-md-4 col-sm-4 col-xs-12 item">
                        <div class="product-item">
                            <div class="img">
                                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/14.png" alt=""></a>
                            </div>
                            <div class="content">
                                <div class="star">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                </div>
                                <div class="title-pro">
                                    <a href="" title="">Cây ráng ổ phụng - Đem may mắn đến cho gia chủ.</a>
                                </div>
                                <div class="box">
                                    <p>450.000 ₫ <span>550.000 ₫</span> </p>
                                    <div class="gh">
                                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/ghn.png" alt=""> </a>
                                        <a href="" title="" class="hover"> <img src="<?= THEME_URL_URI ?>/assets/img/ght.png" alt=""> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sale">
                                <img src="<?= THEME_URL_URI ?>/assets/img/gg.png" alt=""> <span> 20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 item">
                        <div class="product-item">
                            <div class="img">
                                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/15.png" alt=""></a>
                            </div>
                            <div class="content">
                                <div class="star">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                </div>
                                <div class="title-pro">
                                    <a href="" title="">Cây ráng ổ phụng - Đem may mắn đến cho gia chủ.</a>
                                </div>
                                <div class="box">
                                    <p>450.000 ₫ <span>550.000 ₫</span> </p>
                                    <div class="gh">
                                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/ghn.png" alt=""> </a>
                                        <a href="" title="" class="hover"> <img src="<?= THEME_URL_URI ?>/assets/img/ght.png" alt=""> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sale">
                                <img src="<?= THEME_URL_URI ?>/assets/img/gg.png" alt=""> <span> 20%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 item">
                        <div class="product-item">
                            <div class="img">
                                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/16.png" alt=""></a>
                            </div>
                            <div class="content">
                                <div class="star">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                    <img src="<?= THEME_URL_URI ?>/assets/img/star.png" alt="">
                                </div>
                                <div class="title-pro">
                                    <a href="" title="">Cây ráng ổ phụng - Đem may mắn đến cho gia chủ.</a>
                                </div>
                                <div class="box">
                                    <p>450.000 ₫ <span>550.000 ₫</span> </p>
                                    <div class="gh">
                                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/ghn.png" alt=""> </a>
                                        <a href="" title="" class="hover"> <img src="<?= THEME_URL_URI ?>/assets/img/ght.png" alt=""> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sale">
                                <img src="<?= THEME_URL_URI ?>/assets/img/gg.png" alt=""> <span> 20%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="siderbar-list">
            <div class="news-sidebar">
                <div class="title-news-sb">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
                <div class="post-sb">
                    <div class="img">
                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/14.png" alt=""> </a>
                    </div>
                    <div class="content">
                        <h4> <a href="" title="">Hoa cúc đại đóa hồng lai, size trung </a> </h4>
                        <p> 450.000 ₫</p>
                    </div>
                </div>
                <div class="post-sb">
                    <div class="img">
                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/15.png" alt=""> </a>
                    </div>
                    <div class="content">
                        <h4> <a href="" title="">Hoa cúc đại đóa hồng lai, size trung </a> </h4>
                        <p> 450.000 ₫</p>
                    </div>
                </div>
                <div class="post-sb">
                    <div class="img">
                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/16.png" alt=""> </a>
                    </div>
                    <div class="content">
                        <h4> <a href="" title="">Hoa cúc đại đóa hồng lai, size trung </a> </h4>
                        <p> 450.000 ₫</p>
                    </div>
                </div>
                <div class="post-sb">
                    <div class="img">
                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/17.png" alt=""> </a>
                    </div>
                    <div class="content">
                        <h4> <a href="" title="">Hoa cúc đại đóa hồng lai, size trung </a> </h4>
                        <p> 450.000 ₫</p>
                    </div>
                </div>
                <div class="post-sb">
                    <div class="img">
                        <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/18.png" alt=""> </a>
                    </div>
                    <div class="content">
                        <h4> <a href="" title="">Hoa cúc đại đóa hồng lai, size trung </a> </h4>
                        <p> 450.000 ₫</p>
                    </div>
                </div>
            </div>
            <div class="img-service">
                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/b1.png" alt=""> </a>
            </div>
            <div class="img-service">
                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/b2.png" alt=""> </a>
            </div>
            <div class="img-service">
                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/b3.png" alt=""> </a>
            </div>
            <div class="img-service">
                <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/b4.png" alt=""> </a>
            </div>
        </div>
    </div>
</div>