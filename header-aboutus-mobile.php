<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="utf-8">
    <title><?= get_the_title() ?></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1,user-scalable=0">

    <?php $vs='1.1.4'; ?>
    <script src="https://kit.fontawesome.com/30dda5888f.js"  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= THEME_URL_URI ?>/assets/OwlCarousel/dist/assets/owl.carousel.min.css">
    <!--    <link rel="stylesheet" href="/assets/OwlCarousel/dist/assets/owl.theme.default.min.css">-->
    <link rel="stylesheet" href="<?= THEME_URL_URI ?>/assets/css/mobile/style.css?v=<?= $vs ?>">
    <link rel="stylesheet" href="<?= THEME_URL_URI ?>/assets/css/mobile/thanh_fix.css?v=<?=$vs?>">
    <style>
        .opacity0 {
            opacity: 0;
        }
        .amp-img {
            width: 100%;
        }
    </style>
    <script src="<?= THEME_URL_URI ?>/assets/js/mobile/jquery.js"></script>
    <link rel='stylesheet' id='woocommerce-general-css'  href='/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=4.3.0' type='text/css' media='all' />

    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required { visibility: visible; }</style>
    <?php wp_head() ?>
</head>

<body>
<!-- start header -->
<header class="">
    <img src="<?= THEME_URL_URI ?>/assets/assets/mobile/Image 12.png" alt="Banner" height="52" width="100%" />
    <nav class="navbar navbar-expand-xl navbar-light app-nav-bar p-0">
        <div class="d-flex justify-content-around align-items-center w-100">
            <a class="navbar-brand" href="<?= home_url() ?>">
                <img src="<?= get_theme_mod('logo_mobile') ?>" alt="Logo" height="21" width="45" />
            </a>
            <div class="search-input">
                <?php get_product_search_form('mobile'); ?>
            </div>
            <?php
            get_template_part('mobile/template_parts/menu/menu', 'header');
            ?>

        </div>
        <?php if(is_front_page()) : ?>
            <div class="px-3 branch-location">
                <a href="<?= get_page_link(PAGE_SHOPADDRESS_ID) ?>">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Xem danh sách các chi nhánh (8:00 - 18:00)</span>
                </a>
            </div>
        <?php endif ?>
        <?php get_view('mobile/nt_templates/content/home/category.php'); ?>
    </nav>
</header>
<!-- end header -->
<!-- start main -->
<main>