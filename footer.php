<?php
    $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
    // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);

    $menu_left_id = $menuLocations['footer-menu-left']; // Get the *primary* menu ID
    $menu_right_id = $menuLocations['footer-menu-right']; // Get the *primary* menu ID

    $footerLeft = wp_get_nav_menu_items($menu_left_id);
    $footerRight = wp_get_nav_menu_items($menu_right_id);

?>
    <footer>
		<div class="footer-pc">
			<div class="container container-fluid">
				<div class="row">
					<div class="col-md-4 footer-1">
						<div class="logo-footer">
							<a href="" title=""> <img src="<?= THEME_URL_URI . '/assets/img/logot.png' ?>" alt=""> </a>
						</div>
						<ul class="list-dc">
							<li> <span> <img src="<?= THEME_URL_URI . '/assets/img/dc.png' ?>" alt=""></span>
								<p>61A, Khu nhà phố Thủy Nguyên, KĐT Ecopark, Văn Giang, Hưng Yên</p>
							</li>
							<li> <span> <img src="<?= THEME_URL_URI . '/assets/img/phone.png' ?>" alt=""></span>
								<p>0963 596 696</p>
							</li>
							<li> <span> <img src="<?= THEME_URL_URI . '/assets/img/mail.png' ?>" alt=""></span>
								<p>floristviet@gmail.com</p>
							</li>
							<li>
								<a href="" title=""> <img src="<?= THEME_URL_URI . '/assets/img/face.png' ?>" alt=""></a>
								<a href="" title=""> <img src="<?= THEME_URL_URI . '/assets/img/ins.png' ?>" alt=""></a>
								<a href="" title=""> <img src="<?= THEME_URL_URI . '/assets/img/icon3.png' ?>" alt=""></a>
								<a href="" title=""> <img src="<?= THEME_URL_URI . '/assets/img/icon4.png' ?>" alt=""></a>
								<a href="" title=""> <img src="<?= THEME_URL_URI . '/assets/img/icon5.png' ?>" alt=""></a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 footer-default">
						<h5>VỀ FLORIST VIETNAM</h5>
						<ul class="list-cate">
							<li> <a href="" title=""> Giới thiệu</a> </li>
							<li> <a href="" title=""> Liên hệ</a> </li>
							<li> <a href="" title=""> Tuyển dụng </a> </li>
						</ul>
					</div>
					<div class="col-md-2 footer-default">
						<h5>DANH MỤC</h5>
						<ul class="list-cate">
							<li> <a href="" title=""> Quà tặng</a> </li>
							<li> <a href="" title=""> Kinh nghiệm</a> </li>
							<li> <a href="" title=""> Đi & viết </a> </li>
						</ul>
					</div>
					<div class="col-md-3 footer-default">
						<h5>NHẬN THÔNG TIN TỪ FLORIST VIETNAM</h5>
						<p>Xin vui lòng để lại địa chỉ email, chúng tôi sẽ cập nhật những tin tức mới nhất của Florist
							Việt Nam tới quý khách.</p>
						<form class="form-footer">
							<span>
								<input type="" name="" placeholder="Nhập email của bạn...">
								<a href="" title=""> <img src="<?= THEME_URL_URI . '/assets/img/gui.png' ?>" alt=""> </a>
							</span>
						</form>
					</div>
				</div>
			</div>
			<div class="copyrightter">
				@2020 Bản quyền thuộc công ty <a href="" title=""> Florist Việt Nam</a>
			</div>
		</div>
	</footer>

	<a href="#" class="icon-link backtotop" title=""> <img src="<?= THEME_URL_URI . '/assets/img/top.png' ?>" alt=""> </a>
	<a href="" class="icon-link icon-1" title=""> <img src="<?= THEME_URL_URI . '/assets/img/i1.png' ?>" alt=""> </a>
	<a href="" class="icon-link icon-2" title=""> <img src="<?= THEME_URL_URI . '/assets/img/i2.png' ?>" alt=""> </a>
	<a href="" class="icon-link icon-3" title=""> <img src="<?= THEME_URL_URI . '/assets/img/i3.png' ?>" alt=""> </a>
	<a href="" class="icon-link icon-4" title=""> <img src="<?= THEME_URL_URI . '/assets/img/i4.png' ?>" alt=""> </a>

	<div class="icon-box-mb">
		<a href="" class="icon-mb" title=""> <img src="<?= THEME_URL_URI . '/assets/img/i1.png' ?>" alt=""> </a>
		<a href="" class="icon-mb" title=""> <img src="<?= THEME_URL_URI . '/assets/img/i2.png' ?>" alt=""> </a>
		<a href="" class="icon-mb" title=""> <img src="<?= THEME_URL_URI . '/assets/img/i3.png' ?>" alt=""> </a>
		<a href="" class="icon-mb" title=""> <img src="<?= THEME_URL_URI . '/assets/img/i4.png' ?>" alt=""> </a>
		<a href="#" class="icon-mb backtotop" title=""> <img src="<?= THEME_URL_URI . '/assets/img/top.png' ?>" alt=""> </a>
    </div>
    
    <?php wp_footer() ?>
</body>

</html>