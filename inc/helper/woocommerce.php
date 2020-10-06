<?php

/**
 * Created by trugnduc.vnu@gmail.com.
 * User: trungduc
 * Date: 6/24/2020
 * Time: 11:43 AM
 */
class FloristWoocommerce
{

    function __construct()
    {
        add_action('product_cat_add_form_fields', 'wh_taxonomy_add_new_meta_field', 10, 1);
        add_action('product_cat_edit_form_fields', 'wh_taxonomy_edit_meta_field', 10, 1);
    }

    function woocommerce_form_field($key, $args, $value = null)
    {
        $defaults = array(
            'type' => 'text',
            'label' => '',
            'description' => '',
            'placeholder' => '',
            'maxlength' => false,
            'required' => false,
            'autocomplete' => false,
            'id' => $key,
            'class' => array(),
            'label_class' => array('col-sm-2 col-form-label text-right'),
            'input_class' => array('form-control'),
            'return' => false,
            'options' => array(),
            'custom_attributes' => array(),
            'validate' => array(),
            'default' => '',
            'autofocus' => '',
            'priority' => '',
        );

        $args = wp_parse_args($args, $defaults);
        $args = apply_filters('woocommerce_form_field_args', $args, $key, $value);

        if ($args['required']) {
            $args['class'][] = 'validate-required';
            $required = '';
        } else {
            $required = '';
        }

        if (is_string($args['label_class'])) {
            $args['label_class'] = array($args['label_class']);
        }

        if (is_null($value)) {
            $value = $args['default'];
        }

        // Custom attribute handling.
        $custom_attributes = array();
        $args['custom_attributes'] = array_filter((array)$args['custom_attributes'], 'strlen');

        if ($args['maxlength']) {
            $args['custom_attributes']['maxlength'] = absint($args['maxlength']);
        }

        if (!empty($args['autocomplete'])) {
            $args['custom_attributes']['autocomplete'] = $args['autocomplete'];
        }

        if (true === $args['autofocus']) {
            $args['custom_attributes']['autofocus'] = 'autofocus';
        }

        if ($args['description']) {
            $args['custom_attributes']['aria-describedby'] = $args['id'] . '-description';
        }

        if (!empty($args['custom_attributes']) && is_array($args['custom_attributes'])) {
            foreach ($args['custom_attributes'] as $attribute => $attribute_value) {
                $custom_attributes[] = esc_attr($attribute) . '="' . esc_attr($attribute_value) . '"';
            }
        }

        if (!empty($args['validate'])) {
            foreach ($args['validate'] as $validate) {
                $args['class'][] = 'validate-' . $validate;
            }
        }

        $field = '';
        $label_id = $args['id'];
        $sort = $args['priority'] ? $args['priority'] : '';
        $field_container = '<div class="form-group row" id="%2$s" data-priority="' . esc_attr($sort) . '">%3$s</div>';

        switch ($args['type']) {
            case 'country':
                $countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

                if (1 === count($countries)) {

                    $field .= '<strong>' . current(array_values($countries)) . '</strong>';

                    $field .= '<input type="hidden" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="' . current(array_keys($countries)) . '" ' . implode(' ', $custom_attributes) . ' class="country_to_state" readonly="readonly" />';

                } else {

                    $field = '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="country_to_state country_select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . '><option value="">' . esc_html__('Select a country / region&hellip;', 'woocommerce') . '</option>';

                    foreach ($countries as $ckey => $cvalue) {
                        $field .= '<option value="' . esc_attr($ckey) . '" ' . selected($value, $ckey, false) . '>' . esc_html($cvalue) . '</option>';
                    }

                    $field .= '</select>';

                    $field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__('Update country / region', 'woocommerce') . '">' . esc_html__('Update country / region', 'woocommerce') . '</button></noscript>';

                }

                break;
            case 'state':
                /* Get country this state field is representing */
                $for_country = isset($args['country']) ? $args['country'] : WC()->checkout->get_value('billing_state' === $key ? 'billing_country' : 'shipping_country');
                $states = WC()->countries->get_states($for_country);

                if (is_array($states) && empty($states)) {

                    $field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';

                    $field .= '<input type="hidden" class="hidden" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="" ' . implode(' ', $custom_attributes) . ' placeholder="' . esc_attr($args['placeholder']) . '" readonly="readonly" data-input-classes="' . esc_attr(implode(' ', $args['input_class'])) . '"/>';

                } elseif (!is_null($for_country) && is_array($states)) {

                    $field .= '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="state_select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . ' data-placeholder="' . esc_attr($args['placeholder'] ? $args['placeholder'] : esc_html__('Select an option&hellip;', 'woocommerce')) . '"  data-input-classes="' . esc_attr(implode(' ', $args['input_class'])) . '">
						<option value="">' . esc_html__('Select an option&hellip;', 'woocommerce') . '</option>';

                    foreach ($states as $ckey => $cvalue) {
                        $field .= '<option value="' . esc_attr($ckey) . '" ' . selected($value, $ckey, false) . '>' . esc_html($cvalue) . '</option>';
                    }

                    $field .= '</select>';

                } else {

                    $field .= '<input type="text" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" value="' . esc_attr($value) . '"  placeholder="' . esc_attr($args['placeholder']) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" ' . implode(' ', $custom_attributes) . ' data-input-classes="' . esc_attr(implode(' ', $args['input_class'])) . '"/>';

                }

                break;
            case 'textarea':
                $field .= '<textarea name="' . esc_attr($key) . '" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($args['placeholder']) . '" ' . (empty($args['custom_attributes']['rows']) ? ' rows="2"' : '') . (empty($args['custom_attributes']['cols']) ? ' cols="5"' : '') . implode(' ', $custom_attributes) . '>' . esc_textarea($value) . '</textarea>';

                break;
            case 'checkbox':
                $field = '<label class="checkbox ' . implode(' ', $args['label_class']) . '" ' . implode(' ', $custom_attributes) . '>
						<input type="' . esc_attr($args['type']) . '" class="input-checkbox ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="1" ' . checked($value, 1, false) . ' /> ' . $args['label'] . $required . '</label>';

                break;
            case 'text':
                $field .= '<div class="col-md-10"><input type="text" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '"  id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($args['placeholder']) . '" value="' . esc_attr($value) . '" ></div>';
                break;
            case 'password':
            case 'datetime':
            case 'datetime-local':
            case 'date':
            case 'month':
            case 'time':
            case 'week':
            case 'number':
            case 'email':
            case 'url':
            case 'tel':
                $field .= '<div class="col-md-10"><input type="' . esc_attr($args['type']) . '" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '"  id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($args['placeholder']) . '" value="' . esc_attr($value) . '"></div>';
                break;
            case 'select':
                $field .= '<div class="col-md-10">';
                $options = '';

//                if (!empty($args['options'])) {
                    foreach ($args['options'] as $option_key => $option_text) {
                        if ('' === $option_key) {
                            // If we have a blank option, select2 needs a placeholder.
                            if (empty($args['placeholder'])) {
                                $args['placeholder'] = $option_text ? $option_text : __('Choose an option', 'woocommerce');
                            }
                            $custom_attributes[] = 'data-allow_clear="true"';
                        }
                        $options .= '<option value="' . esc_attr($option_key) . '" ' . selected($value, $option_key, false) . '>' . esc_html($option_text) . '</option>';
                    }

                    $field .= '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . ' data-placeholder="' . esc_attr($args['placeholder']) . '">
							' . $options . '
						</select></div>';
//                }

                break;
            case 'radio':
                $label_id .= '_' . current(array_keys($args['options']));

                if (!empty($args['options'])) {
                    foreach ($args['options'] as $option_key => $option_text) {
                        $field .= '<input type="radio" class="input-radio ' . esc_attr(implode(' ', $args['input_class'])) . '" value="' . esc_attr($option_key) . '" name="' . esc_attr($key) . '" ' . implode(' ', $custom_attributes) . ' id="' . esc_attr($args['id']) . '_' . esc_attr($option_key) . '"' . checked($value, $option_key, false) . ' />';
                        $field .= '<label for="' . esc_attr($args['id']) . '_' . esc_attr($option_key) . '" class="radio ' . implode(' ', $args['label_class']) . '">' . esc_html($option_text) . '</label>';
                    }
                }

                break;
        }

        if (!empty($field)) {
            $field_html = '';

            if ($args['label'] && 'checkbox' !== $args['type']) {
                $field_html .= '<label for="' . esc_attr($label_id) . '" class="' . esc_attr(implode(' ', $args['label_class'])) . '">' . $args['label'] . $required . '</label>';
            }

            $field_html .= $field;

            if ($args['description']) {
                $field_html .= '<span class="description" id="' . esc_attr($args['id']) . '-description" aria-hidden="true">' . wp_kses_post($args['description']) . '</span>';
            }


            $container_class = esc_attr(implode(' ', $args['class']));
            $container_id = esc_attr($args['id']) . '_field';
            $field = sprintf($field_container, $container_class, $container_id, $field_html);
        }

        /**
         * Filter by type.
         */
        $field = apply_filters('woocommerce_form_field_' . $args['type'], $field, $key, $args, $value);

        /**
         * General filter on form fields.
         *
         * @since 3.4.0
         */
        $field = apply_filters('woocommerce_form_field', $field, $key, $args, $value);

        if ($args['return']) {
            return $field;
        } else {
            echo $field; // WPCS: XSS ok.
        }
    }

}

function get_attributes()
{
    $attribute_taxonomies = wc_get_attribute_taxonomies();
    return $attribute_taxonomies;

}

//Product Cat creation page
function text_domain_taxonomy_add_new_meta_field()
{
    $attributes = get_attributes();
    ?>
    <div class="form-field product_cat_attributes">
        <label for="term_meta[product_cat_attributes_general]">Chọn bộ thuộc tính</label>
        <select name="term_meta[product_cat_attributes_general]" id="term_meta[product_cat_attributes_general]">
            <option value="1" selected>Dùng bộ thuộc tính chung</option>
            <option value="2">Dùng bộ thuộc tùy chỉnh</option>
        </select>
    </div>
    <div class="form-field product_cat_attributes">
        <label for="term_meta[wh_meta_title]">Bộ thuộc tính tùy chỉnh</label>
        <select class="js-example-placeholder-multiple js-states form-control" name="term_meta[product_cat_attributes][]"
                multiple="multiple">
            <?php if ($attributes): ?>
                <?php foreach ($attributes as $attribute): ?>
                    <option value="<?= $attribute->attribute_id ?>"><?= $attribute->attribute_label ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <p class="description">Bộ thuộc tính dùng để filter cho trang danh mục (chỉ áp dụng khi không dùng bộ thuộc tính chung)</p>
    </div>
    <style>
        .product_cat_attributes span.select2 {
            width: 95% !important;
        }
    </style>
    <script>
        jQuery(document).ready(function () {
            jQuery('.js-example-placeholder-multiple').select2({
                placeholder: 'Chọn thuộc tính'
            });
        });
    </script>
    <?php
}

add_action('product_cat_add_form_fields', 'text_domain_taxonomy_add_new_meta_field', 10, 2);

//Product Cat Edit page
function text_domain_taxonomy_edit_meta_field($term)
{

    $term_id = $term->term_id;
    $term_meta = get_option("taxonomy_" . $term_id);
    $attributes = get_attributes();
    ?>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="term_meta[product_cat_attributes]">Bộ thuộc tính tùy chỉnh</label>
        </th>
        <td class="product_cat_attributes">
            <select class="js-example-placeholder-multiple js-states form-control" name="term_meta[product_cat_attributes][]" multiple="multiple">
                <?php if ($attributes): ?>
                    <?php foreach ($attributes as $attribute): ?>
                        <option value="<?= $attribute->attribute_id ?>" <?= (isset($term_meta['product_cat_attributes']) && in_array($attribute->attribute_id,$term_meta['product_cat_attributes']) ? 'selected' : '') ?>><?= $attribute->attribute_label ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="term_meta[product_cat_attributes]">Chọn bộ thuộc tính</label>
        </th>
        <td class="product_cat_attributes">
            <select name="term_meta[product_cat_attributes_general]" id="term_meta[product_cat_attributes_general]">
                <option value="1" <?= (isset($term_meta['product_cat_attributes_general']) && $term_meta['product_cat_attributes_general'] == 1) ? 'selected' : '' ?>>Dùng bộ thuộc tính chung</option>
                <option value="2" <?= (isset($term_meta['product_cat_attributes_general']) && $term_meta['product_cat_attributes_general'] == 2) ? 'selected' : '' ?>>Dùng bộ thuộc tùy chỉnh</option>
            </select>
        </td>
    </tr>
    <style>
        .product_cat_attributes span.select2 {
            width: 100% !important;
        }
    </style>
    <script>
        jQuery(document).ready(function () {
            jQuery('.js-example-placeholder-multiple').select2({
                placeholder: 'Chọn thuộc tính',
                multiple: true,
            });
        });
    </script>
    <?php
}

add_action('product_cat_edit_form_fields', 'text_domain_taxonomy_edit_meta_field', 10, 2);

// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta($term_id)
{
    if (isset($_POST['term_meta'])) {
        $term_meta = get_option("taxonomy_" . $term_id);
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option("taxonomy_" . $term_id, $term_meta);
    }
}

add_action('edited_product_cat', 'save_taxonomy_custom_meta', 10, 2);
add_action('create_product_cat', 'save_taxonomy_custom_meta', 10, 2);