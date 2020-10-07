<!DOCTYPE html>
<html>

<head>
	<title> Trang chủ mobile</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<meta name="description" content="">
	<meta name="keywords" content="">
	<?php wp_head() ?>
</head>

<body>
	<header>
		<div class="header-pc">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="logo">
							<div class="img">
                                <a href="<?= home_url() ?>" title=""> <img src="<?= get_theme_mod( 'logo' ) ? get_theme_mod( 'logo' ) : THEME_URL_URI.'/assets/img/logo.png' ?>" alt="Logo"> </a>
							</div>
						</div>
						<div class="info">
							<div class="list-action">
								<ul class="login">
									<li><a href="" title=""> <span> <img src="<?= THEME_URL_URI ?>/assets/img/dn.png" alt=""> </span> Đăng
											nhập </a> </li>
									<li><a href="" title="" class="gh"> <img src="<?= THEME_URL_URI ?>/assets/img/gh.png" alt=""><span> 0
											</span> </a> </li>
									<li>
										<div class="img">
											<img src="<?= THEME_URL_URI ?>/assets/img/vn.png" alt="">
											<img src="<?= THEME_URL_URI ?>/assets/img/vn.png" alt="" class="english">
										</div>
										<span class="select-item">
											<select>
												<option> vi </option>
												<option> en </option>
											</select>
											<img src="<?= THEME_URL_URI ?>/assets/img/select.png" alt="">
										</span>
									</li>
								</ul>
							</div>
							<div class="search-form">
								<div class="hotline">
									<span> <img src="<?= THEME_URL_URI ?>/assets/img/hotline.png" alt=""> </span>
									<span>
										<p>Hotline:</p>
										<a href="" title=""><strong>0818 596 696</strong></a>
									</span>
								</div>
								<div class="form-search">
                                    <?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-menu">
				<div class="container">
					<div class="row">
						<ul class="menu-pc">
							<li class="active"> <a href="" title=""> trang chủ </a> </li>
							<li class=""> <a href="" title=""> SẢN PHẨM </a> </li>
							<li class=""> <a href="" title=""> HOT DEAL </a> </li>
							<li class=""> <a href="" title=""> QUÀ TẶNG </a> </li>
							<li class=""> <a href="" title=""> KINH NGHIỆM </a> </li>
							<li class=""> <a href="" title=""> ĐI & VIẾT </a> </li>
							<li class=""> <a href="" title=""> VỀ FLORIST VIETNAM </a> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="header-mb">
			<div class="logo-mb">
				<a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/logo.png" alt=""> </a>
			</div>
			<div class="right-logo-box">
				<div class="bottom-mb">
					<div class="search-mb">
						<div class="form-search">
							<form>
								<input type="text" name="" placeholder="Nhập từ tìm kiếm...">
								<a href="" class="btn btn-search" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/search.png" alt="">
								</a>
							</form>
						</div>
					</div>
					<div class="humberger-menu">
						<img src="<?= THEME_URL_URI ?>/assets/img/humberger.png" alt="">
					</div>

				</div>
			</div>
			<div class="sub-menu">
				<div class="sm-list">
					<div class="block-mb one">
						<div class="block-item">
							<div class="icon">
								<img src="<?= THEME_URL_URI ?>/assets/img/102.png" alt="">
							</div>
							<div class="block-title">
								<a href="javascript:;" title=""> Sản phẩm </a>
								<img src="<?= THEME_URL_URI ?>/assets/img/109.png" alt="" class="hover">
							</div>
							<div class="block-text">
								<ul>
									<li><a href="" title=""> Sản phẩm 1 </a></li>
									<li><a href="" title=""> Sản phẩm 2 </a></li>
								</ul>
							</div>
						</div>
						<div class="block-item">
							<div class="icon">
								<img src="<?= THEME_URL_URI ?>/assets/img/106.png" alt="">
							</div>
							<div class="block-title">
								<a href="" title="">Quà tặng</a>
							</div>
						</div>
						<div class="block-item">
							<div class="icon">
								<img src="<?= THEME_URL_URI ?>/assets/img/105.png" alt="">
							</div>
							<div class="block-title">
								<a href="" title="">Hot Deal</a>
							</div>
						</div>
						<div class="block-item">
							<div class="icon">
								<img src="<?= THEME_URL_URI ?>/assets/img/103.png" alt="">
							</div>
							<div class="block-title">
								<a href="" title="">Kinh nghiệm</a>
							</div>
						</div>
						<div class="block-item">
							<div class="icon">
								<img src="<?= THEME_URL_URI ?>/assets/img/107.png" alt="">
							</div>
							<div class="block-title">
								<a href="" title="">Đi & viết</a>
							</div>
						</div>
						<div class="block-item">
							<div class="icon">
								<img src="<?= THEME_URL_URI ?>/assets/img/101.png" alt="">
							</div>
							<div class="block-title">
								<a href="javascript:;" title="">Về Florist Việt Nam</a>
								<img src="<?= THEME_URL_URI ?>/assets/img/109.png" alt="" class="hover">
							</div>
							<div class="block-text">
								<ul>
									<li>
										<a href="" title="">Về Florist Việt Nam 1</a>
									</li>
									<li>
										<a href="" title="">Về Florist Việt Nam 2</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="block-item">
							<div class="icon">
								<img src="<?= THEME_URL_URI ?>/assets/img/108.png" alt="">
							</div>
							<div class="block-title">
								<a href="" title="">Ngôn ngữ</a>
								<img src="<?= THEME_URL_URI ?>/assets/img/109.png" alt="" class="hover">
							</div>
							<div class="block-text">
								<ul>
									<li><a href="" title="">Tiếng Việt <img src="<?= THEME_URL_URI ?>/assets/img/vietnam.png" alt=""></a>
									</li>
									<li><a href="" title="">Tiếng Anh <img src="<?= THEME_URL_URI ?>/assets/img/anh.png" alt=""></a> </a>
									</li>
								</ul>
							</div>
						</div>
						<div class="block-item">
							<div class="icon">
								<img src="<?= THEME_URL_URI ?>/assets/img/104.png" alt="">
							</div>
							<div class="block-title">
								<a href="" title="">Đăng nhập</a>
							</div>
						</div>
						<div class="block-item">
							<div class="close-mb">
								<img src="<?= THEME_URL_URI ?>/assets/img/110.png" alt="">
							</div>
						</div>
						<div class="block-item block-item-hotline">
							<div class="hl-mb">
								<img src="<?= THEME_URL_URI ?>/assets/img/111.png" alt="">
								<p>HOTLINE: <strong> <a href="" title="">0369 745 858</a></strong></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>