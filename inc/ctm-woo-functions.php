<?php 

/**
 * Change number of related products output
*/ 
add_filter( 'woocommerce_output_related_products_args', 'ctm_related_products_args', 20 );
function ctm_related_products_args( $args ) {
    $args['posts_per_page'] = 8; // 6 related products
    return $args;
}

/**
 * @snippet Move product tabs beside the feat image - WooCommerce
 */

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60 );

function product_change_title_position() {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    add_action( 'woocommerce_before_single_product', 'woocommerce_template_single_title', 5 );
}

add_action( 'init', 'product_change_title_position' );

/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {

    // Adds the new tab
    $ship_tab_title = get_field('pro_shipping_tab_title','option');

    if (!empty($ship_tab_title)) {
        // code...
        $tabs['shipping_tab'] = array(
            'title'     => __( 'Shipping / Returns', 'woocommerce' ),
            'priority'  => 20,
            'callback'  => 'woo_shipping_return_tab_content'
        );
    }

    return $tabs;
}

function woo_shipping_return_tab_content() {
    $ship_tab_cnt = get_field('pro_shipping_tab_content','option');
    if (!empty($ship_tab_cnt)) {
        echo $ship_tab_cnt;
    }
}

// Remove default short description hook to avoid duplication
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

// Remove tab titles from the content area in WooCommerce tabs
add_filter( 'woocommerce_product_description_heading', '__return_null' );  // For the Description tab
add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );  // For the Additional Information tab

// Add custom content to the product description tab
add_filter('the_content', 'add_custom_data_to_description_tab');

function add_custom_data_to_description_tab($content) {
    if (is_product()) {
        global $post;
        $custom_content = '';
        $ship_logo_cnt = get_field('pro_shipping_logo_details','option');

        if (!empty($ship_logo_cnt)) {
            // Add your custom content here
            $custom_content .= '<div class="pro-desc-logos">';
            foreach ($ship_logo_cnt as $key => $value) {
                $custom_content .= '<a href="'.$value['link']['url'].'" title="'.$value['link']['title'].'" target="'.(empty($value['link']['target']) ? '_self' : $value['link']['target']).'">';

                $custom_content .= '<img src="'.$value['logo']['url'].'" />';
                $custom_content .= '<p>'.$value["text"].'</p>';
                $custom_content .= '</a>';
            }
            $custom_content .= '</div>';
        }
        
        // Append the custom content to the product description
        $content .= $custom_content;
    }

    return $content;
}

// Customize the content of the Additional Information tab
add_filter( 'woocommerce_product_tabs', 'customize_additional_information_tab', 20 );
function customize_additional_information_tab( $tabs ) {
    if ( isset( $tabs['additional_information'] ) ) {
        // Replace the default callback with custom content
        $tabs['additional_information']['callback'] = 'custom_additional_information_content';
    }
    return $tabs;
}

// Callback function to display the custom ACF fields in the Additional Information tab
function custom_additional_information_content() {
    global $product;

    // Check if ACF function exists
    if ( function_exists( 'get_field' ) ) {
        // Get the 'product_details' ACF field (assuming it's a repeater or group)
        $product_details = get_field( 'product_details', $product->get_id() );

        if ( $product_details ) {
            // If it's a repeater or group field, loop through the subfields
            echo '<table class="woocommerce-product-attributes shop_attributes">
            <tbody>';
            foreach ( $product_details as $detail ) {
                $title = isset( $detail['title'] ) ? $detail['title'] : '';
                $description = isset( $detail['description'] ) ? $detail['description'] : '';

                echo '<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_color">';
                // Display the title and description
                if ( $title ) {
                    echo '<th class="woocommerce-product-attributes-item__label">' . esc_html( $title ) . '</th>';
                }
                if ( $description ) {
                    echo '<td class="woocommerce-product-attributes-item__value"><p>' . esc_html( $description ) . '</p>
                    </td>';
                }

                echo '</tr>';
            }
            echo '</tbody></table>';
        }
    }

    // Optionally, you can still show the default WooCommerce additional information (e.g., product attributes)
    wc_display_product_attributes( $product );
}

function filter_search_to_only_products( $query ) {
    if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
        $query->set( 'post_type', 'product' ); // Restrict search to products
    }
}
add_action( 'pre_get_posts', 'filter_search_to_only_products' );

add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 100, 2 );
function hide_shipping_when_free_is_available( $rates, $package ) {
    // Only run in the front end
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return $rates;
    }

    // Check if free shipping is available
    $free = false;
    foreach ( $rates as $rate_id => $rate ) {
        if ( 'free_shipping' === $rate->method_id ) {
            $free = true;
            break;
        }
    }

    // Remove flat rate if free shipping is available
    if ( $free ) {
        foreach ( $rates as $rate_id => $rate ) {
            if ( 'flat_rate' === $rate->method_id ) {
                unset( $rates[$rate_id] );
            }
        }
    }

    return $rates;
}

// Change Home breadcrumb link to Shop page link, except on the Shop page
add_filter('woocommerce_breadcrumb_home_url', 'replace_home_breadcrumb_link_except_shop');
function replace_home_breadcrumb_link_except_shop()
{
    if (!is_shop()) {
        return get_permalink(wc_get_page_id('shop')); // Returns the Shop page link
    }
    return home_url(); // Keeps the original home link on the Shop page
}

// Replace Home text with Shop in breadcrumb, except on the Shop page
add_filter('woocommerce_breadcrumb_defaults', 'replace_home_breadcrumb_text_except_shop');
function replace_home_breadcrumb_text_except_shop($defaults)
{
    if (!is_shop()) {
        $defaults['home'] = 'Shop'; // Replaces 'Home' with 'Shop'
    }
    return $defaults;
}

// Show stock count only when 1 item is left in stock considering cart quantity, for both simple and variable products
add_filter( 'woocommerce_get_availability', 'show_limited_stock_with_cart_quantity_for_variations', 10, 2 );
function show_limited_stock_with_cart_quantity_for_variations( $availability, $product ) {

    // Check if product manages stock
    if ( $product->managing_stock() ) {
        // Get current stock quantity
        $stock_quantity = $product->get_stock_quantity();

        // Get cart quantity for this product or variation
        $cart_quantity = 0;
        foreach ( WC()->cart->get_cart() as $cart_item ) {
            // Check if the product is a variation and matches the current product
            if ( $cart_item['variation_id'] == $product->get_id() || $cart_item['product_id'] == $product->get_id() ) {
                $cart_quantity += $cart_item['quantity'];
            }
        }

        // Calculate remaining stock after considering cart quantity
        $remaining_stock = $stock_quantity - $cart_quantity;

        // If only 1 item is left after considering cart quantity, show the limited stock message
        if ( $remaining_stock == 1 ) {
            $availability['availability'] = __( 'Only 1 left in stock!', 'woocommerce' );
        } else {
            // Remove stock count for all other stock levels
            $availability['availability'] = '';
        }
    }

    return $availability;
}