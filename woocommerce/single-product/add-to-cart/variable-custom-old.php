<?php
/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 7/16/2020
 * Time: 10:27 AM
 */

//'attributes' => $attributes,
//                'product_variations' => $product_variations,
//                'default_attributes' => $default_attributes,
//                'product'   => $product,
//                'get_price'   => $get_price,
//                'woo'   => $woo,

$attribute_select = [];
if ($default_attributes) {
    foreach ($default_attributes as $key => $value) {
        $attribute_select['attribute_' . $key] = $value;
    }
}

?>
<div class="attributes" style="display: none"
     data-product_variations="<?php echo esc_html(wp_json_encode($product_variations)) ?>"
     data-variation_attributes='<?= esc_html(wp_json_encode($product->get_variation_attributes())) ?>'>

</div>
<p class="error"></p>
<style>
    .error {
        margin-bottom: 0px !important;
        color: red;
        text-align: center;
    }
</style>

<?php foreach ($attributes as $attribute): ?>
    <?php if ( wp_is_mobile() ) : ?>
        <div class="product-option">
            <div>
                <?php $label = wc_attribute_label($attribute[0]->taxonomy); ?>
                <p class="font-14"><?= $label ?>:</p>
            </div>
            <ul class="scrolling-wrapper list-unstyled">
                <?php foreach ($attribute as $value): ?>
                    <?php
                    $options[$value->taxonomy] = $value->slug;
                    $get_price_att = (count($attributes) == 1) ? $woo->get_html_price_default_product_variable($options, $product_variations) : '';
                    ?>
                    <li class="nav-item select_attribute" data-value="<?= $value->slug ?>" data-name="<?= $value->taxonomy ?>">
                        <a class="nav-link text-center attribute <?= ($default_attributes && $default_attributes[$value->taxonomy] && $default_attributes[$value->taxonomy] == $value->slug) ? 'active' : '' ?>" href="javascipr:void(0)">
                            <p class="font-12 m-0"><?= $value->name ?></p>
                            <?php if (count($attributes) == 1): ?>
                                <span class="font-12 text-4">
                                    <?= (isset($get_price_att['display_price']) && $get_price_att['display_price']) ? number_format($get_price_att['display_price']) . 'đ' : 'Liên hệ' ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else : ?>
        <div class="py-3">
            <?php $label = wc_attribute_label($attribute[0]->taxonomy); ?>
            <span class="font-14 mr-3 font-weight-bold"><?= $label ?>:</span>
        </div>

        <div class="product-option">
            <ul class="nav justify-content-start list_attributes">
                <?php foreach ($attribute as $value): ?>
                    <?php
                    $options[$value->taxonomy] = $value->slug;
                    $get_price_att = (count($attributes) == 1) ? $woo->get_html_price_default_product_variable($options, $product_variations) : '';
                    ?>
                    <li class="nav-item select_attribute" data-value="<?= $value->slug ?>"
                        data-name="<?= $value->taxonomy ?>">
                        <a class="nav-link text-center attribute <?= ($default_attributes && $default_attributes[$value->taxonomy] && $default_attributes[$value->taxonomy] == $value->slug) ? 'active' : '' ?>"
                           href="javascipr:void(0)">
                            <p class="font-12 m-0"><?= $value->name ?></p>
                            <?php if (count($attributes) == 1): ?>
                                <span class="font-12 text-danger"><?= (isset($get_price_att['display_price']) && $get_price_att['display_price']) ? number_format($get_price_att['display_price']) . 'đ' : 'Liên hệ' ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<div class="py-3">
    <form action="" method="post">
        <?php if(isset($get_price) && $get_price && $get_price['is_in_stock']): ?>
        <a href="<?= '?quick_buy=1&add-to-cart=' . $get_price['variation_id'] ?>"
           onclick="check_out(this)" class="btn text-center btn-order">
            <p class="m-0 font-weight-bold text-white font-14">Đặt hàng ngay</p>
            <p class="m-0 text-white font-10">Giao trong 1 giờ hoặc đặt trong siêu thị</p>
        </a>
        <?php else: ?>
            <a class="btn text-center btn-order">
                <p class="m-0 font-weight-bold text-white font-14">Đặt hàng ngay</p>
                <p class="m-0 text-white font-10">Giao trong 1 giờ hoặc đặt trong siêu thị</p>
            </a>
        <?php endif; ?>
    </form>
</div>

<script>
    var href = 'javascipr:void(0)';
    var message = 'Bạn chưa chọn thuộc tính sản phẩm hoặc sản phẩm bạn chọn hiện đang hết hàng.';
    var variation_attributes = jQuery('.attributes').data('variation_attributes');
    var total_variation = Object.getOwnPropertyNames(variation_attributes).length;

    var attribute_select = {};
    var att_select = '<?= ($attribute_select) ? json_encode($attribute_select) : '' ?>';
    if (att_select) {
        attribute_select = JSON.parse(att_select);
    }
    jQuery(document).ready(function () {
        var attributes = jQuery('.attributes').data('product_variations');

        jQuery('.select_attribute').click(function () {
            jQuery(this).parent().find('.attribute').removeClass('active');
            jQuery(this).find('.attribute').addClass('active');

            var name = jQuery(this).data('name');
            var value = jQuery(this).data('value');
            attribute_select['attribute_' + name] = value;
            if (Object.getOwnPropertyNames(attribute_select).length == total_variation) {
                var is_selected = check_is_object(attribute_select, attributes);
                if (is_selected) {
                    if (is_selected['is_in_stock']) {
                        jQuery('.btn-order').attr('href', '?quick_buy=1&add-to-cart=' + is_selected['variation_id']);
                        show_price('product-price', is_selected);
                        show_message('error', '', false);
                    }
                } else {
                    // jQuery('.btn-order').attr('href', 'javascipt:void(0)');
                    show_message('error', 'Sản phẩm bạn chọn hiện đang hết hàng', true);
                }
            }


        })
    });

    function check_out(t) {
        if (Object.getOwnPropertyNames(attribute_select).length == total_variation) {
            show_message('error', '', false);
        } else {
            show_message('error', 'Bạn vui lòng chọn đầy đủ thuộc tính sản phẩm.', true);
        }
    }

    function isEqual(objA, objB) {
        var aProps = Object.getOwnPropertyNames(objA);
        var bProps = Object.getOwnPropertyNames(objB);
        if (aProps.length != bProps.length) {
            return false;
        }

        for (var i = 0; i < aProps.length; i++) {
            var propName = aProps[i];
            if (objA[propName] !== objB[propName]) {
                return false;
            }
        }
        return true;
    }

    function check_is_object(objA, objB) {
        for (var k in objB) {
            if (isEqual(objB[k]['attributes'], objA)) {
                return objB[k];
            }
        }
        return false;
    }

    function show_message(cla, message, status) {
        if (status) {
            jQuery('.' + cla).html(message);
            jQuery('.' + cla).css('display', 'block');
        } else {
            jQuery('.' + cla).css('display', 'none');
        }
    }

    function show_price(cla, data) {
        var html = '<span class="font-weight-bold mr-3">Giá :</span>';
        if (data['display_regular_price'] == data['display_price']) {
            html += '<span class="text-danger font-weight-bold mr-3 font-18">' + new Intl.NumberFormat().format(data['display_regular_price']) + 'đ</span>';
        } else {
            var sale = (data['display_price']) ? parseInt(((1 - (data['display_price'] / data['display_regular_price'])) * 100)) : '';
            html += '<span class="text-danger font-weight-bold mr-3 font-18">' + new Intl.NumberFormat().format(data['display_price']) + 'đ</span>';
            html += '<span><del class=" mr-3">' + new Intl.NumberFormat().format(data['display_regular_price']) + 'đ</del></span>';
            html += '<span class="text-danger">(-' + sale + '%)</span>';
        }
        jQuery('.' + cla).empty();
        jQuery('.' + cla).append(html);
    }
</script>