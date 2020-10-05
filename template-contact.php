<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/4/2020
 * Time: 8:52 AM
 * Template Name: Liên hệ
 */

get_header('aboutus');

?>
    <section id="section-banner">

        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-lg-left">
                    <h1>LIÊN HỆ</h1>
                    <img src="<?= THEME_URL_URI . '/assets/images/line.svg' ?>" class="text-center text-lg-left">
                </div>
            </div>
        </div>
    </section>

    <div class="section-form">
        <div class="container">
            <div class="row pt-5 pb-2">
                <div class="col-md-6 col-12 d-flex flex-wrap pb-0 pl-0 pr-0">
                    <?= do_shortcode('[contact-form-7 id="162" title="Contact form 1"]') ?>
                </div>
                <div class="col-md-6 col-12 pb-0">
                    <h2>
                        CÔNG TY CỔ PHẦN XUẤT NHẬP KHẨU TÂN THÁI SƠN
                    </h2>
                    <p>Mã số doanh nghiệp: 0107742332<br>Cơ quan cấp: Sở kế hoạch và đầu tư Tp.Hà Nội</p>
                    <p><strong>Địa chỉ:</strong>Số 2B ngõ 16B Nguyễn Xiển - Thanh Xuân - Hà Nội( Cách ngã tư Khuất Duy
                        Tiến 200m</p>
                    <p><strong>Tổng đài hỗ trợ:</strong>0961 555 155 / 0934 66 88 11</p>
                    <p><strong>Email:</strong>kinhdoanh@dienmaynewsun.com</p>
                    <p><strong>Thời gian làm việc:</strong>Từ 8:00 đến 18:00 tất cả các ngày trong tuần ( trừ CN)</p>
                    <i>Xin chân thành quý khách hàng đã tin tưởng và sử dụng các sản phẩm của NEWSUN trong những năm
                        qua! Hi vọng sẽ luôn nhận được sự ủng hộ hơn nữa trong tương lai! Kính chúc quý khách sức khỏe
                        và an khang! </i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pt-5 pb-2">
            <?php
            if(wp_is_mobile()){
                if (comments_open() || get_comments_number()) :
                    comments_template('/mobile-comments.php');

                endif;
            }else{
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            }

            ?>
        </div>
    </div>

<?php
do_shortcode('[ns_list_tags]');
get_footer();