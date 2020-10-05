<?php
if (wp_is_mobile()) :
    get_header('mobile');
else : ?>
    <!DOCTYPE html>
    <html <?php language_attributes() ?>>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="stylesheet" href="<?= THEME_URL_URI . '/assets/css/style.css' ?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/30dda5888f.js" crossorigin="anonymous"></script>
        <?php wp_head() ?>
    </head>

    <body <?php body_class() ?>>
        <div class="container-fluid m-0 p-0">
            <header class="header">
                <div class="container-fluid app-navbar">
                    <div class="container">
                        <div class="row">
                            <nav class="navbar navbar-expand-lg navbar-light col-12 d-md-flex justify-content-between px-0">
                                <a class="navbar-brand p-0" href="<?= home_url() ?>">
                                    <img src="<?= get_theme_mod('logo') ?>" class="img-fluid" alt="logo">
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active mt-2 mt-lg-0">
                                            <?php
                                            get_product_search_form();
                                            ?>
                                        </li>
                                    </ul>
                                    <?php
                                    get_template_part('template_parts/menu/menu', 'primary');
                                    ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row py-1">
                        <div class="border-right cate">
                        <a href="#" class="header-bar-item border-left font-weight-bold text-dark-3"><i class="fas fa-bars ml-2 mr-md-2 mr-1"></i> Danh mục sản phẩm <i class="fa fa-caret-down ml-2 mt-1" aria-hidden="true"></i></a>
                            <!-- Danh mục sản phẩm -->
                            <?php echo nt()->load_template('content/home/category', ''); ?>
                        </div>
                        <?php
                        get_template_part('template_parts/menu/menu', 'header');
                        ?>

                    </div>
                </div>
            </header>
        <?php endif; ?>