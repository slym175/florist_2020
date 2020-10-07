<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/10/2020
 * Time: 11:21 AM
 */
global $product;

$average = $product->get_average_rating();

?>
<div class="detail-product">
    <?php wc_get_template( 'single-product/product-slide.php' ); ?>
    <div class="info-product">
        <h5><?= $product->get_name() ?></h5>
        <div class="dg-detail">
            <div class="star star-rating">
                <span style="width: <?= floor(($average / 5) * 100) ?>%;margin-top: 0px !important;"></span>
            </div>
            <span>(<?= $product->get_review_count() ?> đánh giá)</span>
        </div>
        <div class="price-detail">
            <p>350.000 ₫ - 450.000 ₫</p><span>Chậu</span>
        </div>
        <table class="ctsp-1">
            <tr>
                <th>Số lượng</th>
                <th> Giá</th>
            </tr>
            <tr>
                <td>Từ 1 - 5</td>
                <td>450.000 ₫</td>
            </tr>
            <tr>
                <td>Từ 5 - 9</td>
                <td>400.000 ₫</td>
            </tr>
            <tr>
                <td>Từ 10 - 20</td>
                <td> 350.000 ₫</td>
            </tr>
        </table>
        <div class="description-detail">
            <p>Là hoa đồng tiền - loại medium trồng từ giống nuôi cấy mô, cây khỏe, sạch bệnh, độ đồng đều cao, cây sinh
                trưởng và phát triển tốt. đồng tiền thường được lựa chọn rất nhiều trong các kệ hoa khai trương, hoa
                chúc mừng.</p>
        </div>
        <h6>Sản phẩm thường mua cùng:</h6>
        <div class="product-inner">
            <div class="item">
                <form>
                    <input type="checkbox" name="">
                </form>
                <div class="img">
                    <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/33.png" alt=""></a>
                </div>
                <div class="title">
                    <p><a href="" title="">Hoa cúc đại đóa hồng lai, size trung</a></p>
                    <p> 450.000 ₫ <span>550.000 ₫</span></p>
                </div>
                <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-">
                    <input aria-label="quantity" class="input-qty" max="20" min="1" name="" type="number" value="1">
                    <input class="plus is-form" type="button" value="+">
                </div>
            </div>
            <div class="item">
                <form>
                    <input type="checkbox" name="">
                </form>
                <div class="img">
                    <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/34.png" alt=""></a>
                </div>
                <div class="title">
                    <p><a href="" title="">Chậu trồng hoa bằng nhựa giả tre đan</a></p>
                    <p> 450.000 ₫ <span>550.000 ₫</span></p>
                </div>
                <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-">
                    <input aria-label="quantity" class="input-qty" max="20" min="1" name="" type="number" value="1">
                    <input class="plus is-form" type="button" value="+">
                </div>
            </div>
            <div class="item">
                <form>
                    <input type="checkbox" name="">
                </form>
                <div class="img">
                    <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/35.png" alt=""></a>
                </div>
                <div class="title">
                    <p><a href="" title="">Chậu trồng hoa inox màu vàng kim</a></p>
                    <p> 450.000 ₫ <span>550.000 ₫</span></p>
                </div>
                <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-">
                    <input aria-label="quantity" class="input-qty" max="20" min="1" name="" type="number" value="1">
                    <input class="plus is-form" type="button" value="+">
                </div>
            </div>
        </div>
        <div class="add-product">
            <p>Số lượng:</p>
            <div class="buttons_added">
                <input class="minus is-form" type="button" value="-">
                <input aria-label="quantity" class="input-qty" max="20" min="1" name="" type="number" value="1">
                <input class="plus is-form" type="button" value="+">
            </div>
            <a href="" title="" class="btn-detail" tabindex="0">Mua ngay</a>
        </div>
        <div class="img-service img-service-text">
            <a href="" title=""> <img src="<?= THEME_URL_URI ?>/assets/img/banner3.png" alt=""> </a>
            <p>Giảm giá 5% Khi mua từ 2 sản phẩm</p>
        </div>
        <ul class="category-detail">
            <li><strong>Danh mục:</strong></li>
            <li><a href="" title="">Hoa chậu, </a></li>
            <li><a href="" title="">cây giống, </a></li>
            <li><a href="" title="">hoa đồng tiền, </a></li>
        </ul>
    </div>
</div>