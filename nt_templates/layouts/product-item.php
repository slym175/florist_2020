                            
                            <div class="product-item">
                                <div class="img">
                                    <a href="<?= get_permalink( $product->get_id() ) ?>" title="<?= $product->get_name() ?>"> 
                                        <?= $product->get_image() ?>
                                    </a>
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
                                        <a href="<?= get_permalink( $product->get_id() ) ?>" title="<?= $product->get_name() ?>"><?= $product->get_name() ?></a>
                                    </div>
                                    <div class="box">
                                        <p><?= $product->get_regular_price() ?><span>550.000 ₫</span> </p>
                                        <div class="gh">
                                            <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/ghn.png" alt=""> </a>
                                            <a href="" title="" class="hover"> <img src="<?= THEME_URL_URI ?>/assets/img/ght.png" alt=""> </a>
                                        </div>
                                    </div>
                                </div>
                                <?php $dis = ClaWoocommerce::get_percent_discount($product->get_regular_price(), $product->get_regular_price()); ?>
                                <?php if($product->get_sale_price() != 0 && $dis != 0) :?>
                                    <div class="sale">
                                        <img src="<?= THEME_URL_URI ?>/assets/img/gg.png" alt=""> <span> <?= $dis ?>%</span>
                                    </div>
                                <?php endif ?>
                            </div>