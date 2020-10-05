</main>
<!-- end main -->

<?php
    $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
    // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);

    $menu_left_id = $menuLocations['footer-menu-left']; // Get the *primary* menu ID
    $menu_right_id = $menuLocations['footer-menu-right']; // Get the *primary* menu ID

    $footerLeft = wp_get_nav_menu_items($menu_left_id);
    $footerRight = wp_get_nav_menu_items($menu_right_id);
?>
<!-- start footer -->
<footer class="mt-3 border-top footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <h1 class="my-2 mt-0">TỔNG ĐÀI HỖ TRỢ</h1>
                <table class="mb-2 font-14 w-100">
                    <tbody>
                        <tr class="text-2">
                            <td class="py-1">Mua hàng: <a href="tel:0934668811" class="font-weight-bold">0934.6688.11</a></td>
                            <td class="py-1 pl-3">(8:00 - 22:00)</td>
                        </tr>
                        <tr class="text-2">
                            <td class="py-1">Kỹ thuật: <a href="tel:0961391551" class="font-weight-bold">096.139.1551</a></td>
                            <td class="py-1 pl-3">(8:00 - 22:00)</td>
                        </tr>
                        <tr class="text-2">
                            <td class="py-1">Bảo hành: <a href="tel:0388718871" class="font-weight-bold">03.8871.8871</a></td>
                            <td class="py-1 pl-3">(8:00 - 22:00)</td>
                        </tr>
                        <tr class="text-2">
                            <td class="py-1">Khiếu nại: <a href="tel:0388718871" class="font-weight-bold">03.8871.8871</a></td>
                            <td class="py-1 pl-3">(8:00 - 22:00)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 col-12 o-place pl-md-0">
<!--                <h4 class="my-2">Xem 4 siêu thị (8:00 - 22:00 )</h4>-->
                <div class="o-place-info">
                    <a data-toggle="collapse" href="#collapseInfo" role="button" aria-expanded="false" aria-controls="collapseInfo">
                        Các thông tin khác <i class="fas fa-angle-down ml-3"></i>
                    </a>
                    <div class="collapse" id="collapseInfo">
                        <h6 class="font-weight-bold mt-2">THÔNG TIN NEWSUN</h6>
                        <div>
                            <?php if ($footerLeft) : ?>
                                <?php foreach ($footerLeft as $key => $ftl) : ?>
                                    <div>
                                        <a href="<?= $ftl->url ?>"><?= $ftl->title ?></a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <h6 class="font-weight-bold mt-2">HỖ TRỢ KHÁCH HÀNG</h6>
                        <div>
                            <?php if ($footerRight) : ?>
                                <?php foreach ($footerRight as $k => $ftr) : ?>
                                    <div>
                                        <a href="<?= $ftr->url ?>"><?= $ftr->title ?></a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-4 pl-md-0">
                <div class="d-flex justify-content-between align-items-center my-2">
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=196686057561795&autoLogAppEvents=1" nonce="LO5IiGEC"></script>
                    <div class="fb-like" data-href="https://www.facebook.com/dienmaynewsun/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
                </div>
                <p class="mt-4">Website cùng tập đoàn:</p>
                <a href="https://dienmaynewsun.com/" title="Logo">
                    <img class="img-fluid" src="<?= THEME_URL_URI ?>/assets/assets/logo.png" style="height: 25px;width: 102px" alt="Logo" />
                </a>
                <div class="d-flex justify-content-start align-items-center">
                    <a href="javascript:void(0)" title="Logo">
                        <img class="img-fluid" src="<?= THEME_URL_URI ?>/assets/assets/14971568174511_da-thong-bao-bo-cong-thuong.png" height="40" width="66" alt="Logo" />
                    </a>
                    <a class="ml-3" href="javascript:void(0)" title="Logo">
                        <img class="img-fluid" src="<?= THEME_URL_URI ?>/assets/assets/dmca_protected_sml_120n.png" height="20" width="102" alt="Logo" />
                    </a>
                </div>
            </div>
            <div class="col-3 col-md-1 i-contact">
                <a href="javascript:void(0)" title="Hỗ trợ online">
                    <img class="img-fluid mt-2" src="<?= THEME_URL_URI ?>/assets/assets/dddd.png" height="82" width="76" layout="responsive" alt="Red Status" />
                </a>
                <a href="#" class="top-up"><i class="fas fa-arrow-up"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="<?= THEME_URL_URI ?>/assets/OwlCarousel/dist/owl.carousel.min.js"></script>
<script src="<?= THEME_URL_URI ?>/assets/js/mobile/thanh.js?v=1.1.1"></script>

<script src="<?= THEME_URL_URI ?>/assets/js/mobile/main.js" type="text/javascript" charset="utf-8" async defer></script>
</body>

</html>