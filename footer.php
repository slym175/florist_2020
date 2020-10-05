<?php
if (wp_is_mobile()) :
    get_footer('mobile');
else :

    $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
    // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);

    $menu_left_id = $menuLocations['footer-menu-left']; // Get the *primary* menu ID
    $menu_right_id = $menuLocations['footer-menu-right']; // Get the *primary* menu ID

    $footerLeft = wp_get_nav_menu_items($menu_left_id);
    $footerRight = wp_get_nav_menu_items($menu_right_id);

?>
    <footer class="container-fluid mt-md-3 mt-2">
        <div class="row p-md-4 p-2 footer-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 pl-lg-0 pt-2">
                        <h6 class="font-weight-bold">THÔNG TIN NEWSUN</h6>
                        <div>
                            <?php if ($footerLeft) : ?>
                                <?php foreach ($footerLeft as $key => $ftl) : ?>
                                    <?php if ($key <= 3) : ?>
                                        <div class="py-1">
                                            <a href="<?= $ftl->url ?>"><?= $ftl->title ?></a>
                                        </div>
                                        <?php unset($footerLeft[$key]) ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="collapse" id="ns-info">
                            <?php if ($footerLeft) : ?>
                                <?php foreach ($footerLeft as $key => $ftl) : ?>
                                    <div class="py-1">
                                        <a href="<?= $ftl->url ?>"><?= $ftl->title ?></a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <a class="font-weight-bold" data-toggle="collapse" href="#ns-info" role="button" aria-expanded="false" aria-controls="ns-info">Xem thêm <i class="fas fa-chevron-down"></i></a>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 d-flex flex-column pt-2">
                        <h6 class="font-weight-bold">HỖ TRỢ KHÁCH HÀNG</h6>
                        <div>
                            <?php if ($footerRight) : ?>
                                <?php foreach ($footerRight as $k => $ftr) : ?>
                                    <?php if ($k <= 3) : ?>
                                        <div class="py-1">
                                            <a href="<?= $ftr->url ?>"><?= $ftr->title ?></a>
                                        </div>
                                        <?php unset($footerRight[$k]) ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="collapse" id="ns-support">
                            <?php if ($footerRight) : ?>
                                <?php foreach ($footerRight as $k => $ftr) : ?>
                                    <div class="py-1">
                                        <a href="<?= $ftr->url ?>"><?= $ftr->title ?></a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <a class="font-weight-bold" data-toggle="collapse" href="#ns-support" role="button" aria-expanded="false" aria-controls="ns-support">Xem thêm <i class="fas fa-chevron-down"></i></a>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 d-flex flex-column pt-2">
                        <h6 class="font-weight-bold">TỔNG ĐÀI HỖ TRỢ (GỌI MIỄN PHÍ)</h6>
                        <table>
                            <tr>
                                <td>
                                    <span>Mua hàng: <span class="font-weight-bold">0934.6688.11</span></span>
                                </td>
                                <td class="pl-2">
                                    <span class="w-100 text-right">8:00 - 22:00</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Kỹ thuật: <span class="font-weight-bold">096.139.1551</span></span>
                                </td>
                                <td class="pl-2">
                                    <span class="w-100 text-right">8:00 - 22:00</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Bảo hành: <span class="font-weight-bold">03.8871.8871</span></span>
                                </td>
                                <td class="pl-2">
                                    <span class="w-100 text-right">8:00 - 22:00</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Khiếu nại: <span class="font-weight-bold">03.8871.8871</span></span>
                                </td>
                                <td class="pl-2">
                                    <span class="w-100 text-right">8:00 - 22:00</span>
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#">
                                <img src="<?= THEME_URL_URI . '/assets/images/14971568174511_da-thong-bao-bo-cong-thuong.png' ?>" alt="Cer">
                            </a>
                            <a href="#">
                                <img src="<?= THEME_URL_URI . '/assets/images/dmca_protected_sml_120n.png' ?>" alt="Cer">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 d-flex flex-column social pr-md-0 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=196686057561795&autoLogAppEvents=1" nonce="LO5IiGEC"></script>
                            <div class="fb-like" data-href="https://www.facebook.com/dienmaynewsun/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>

                        </div>
                        <p class="mt-4">Website cùng tập đoàn:</p>
                        <a href="https://dienmaynewsun.com/" title="">
                            <img class="logo" src="<?= THEME_URL_URI ?>/assets/assets/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-2 py-2">
            <div class="container">
                <p>© <?= date('Y') ?>. Công Ty Cổ Phần Sản Xuất Và Xuất Nhập Khẩu Tân Thái Sơn. GPDKKD: 0107742332 do Sở kế hoạch và
                    đầu tư Tp. Hà Nội cấp ngày 02/01/2007.</p>
                <p>Địa chỉ: 214/19 đường Nguyễn Xiển, Q. Thanh Xuân, Tp. Hà Nội. Điện thoại: 0934.6688.11. Email:
                    newsun@dienmaynewsun.com. Xem chính sách sử dụng web</p>
            </div>
            <a href="#" class="top-up"><i class="fas fa-arrow-up"></i></a>
        </div>
    </footer>

    <?php wp_footer() ?>
    </div>
    </body>

    </html>
<?php endif; ?>