<?php

add_action( 'wp_enqueue_scripts', 'woo_css_styles', 900 );
/**
 * WOO CSS styles.
 * @since 1.0.0
 */
function woo_css_styles() {
        wp_enqueue_style( 'woocss' , get_stylesheet_directory_uri() . '/includes-child/woocommerce/woo.css', array(), '2.0.0', 'all' );
}

/**
 * WOO Customizer Options
 * @since 1.0.0
 */
include_once( get_stylesheet_directory() . '/includes-child/woocommerce/customize-woo.php' );

/**
 * Supports for zoom/slider/gallery
 * @since 1.0.0
 */
// add_theme_support( 'wc-product-gallery-lightbox' );
// add_theme_support( 'wc-product-gallery-slider' );
// add_theme_support( 'wc-product-gallery-zoom' );


add_filter( 'loop_shop_per_page', 'bt_new_loop_shop_per_page', 20 );
/**
 * How many products per page
 * @since 1.0.0
 */
function bt_new_loop_shop_per_page( $cols ) {
        // $cols contains the current number of products per page based on the value stored on Options -> Reading
        // Return the number of products you wanna show per page.
        $cols = 12;
        return $cols;
}


add_filter( 'woocommerce_pagination_args', 'bt_woocommerce_pagination' );
/**
 * Update the next and previous arrows to the default style.
 *
 * @since 1.0.0
 *
 * @return string New next and previous text string.
 */
function bt_woocommerce_pagination( $args ) {

	$args['prev_text'] = sprintf( '&laquo; %s', __( 'Previous Page', 'beavertron' ) );
	$args['next_text'] = sprintf( '%s &raquo;', __( 'Next Page', 'beavertron' ) );

	return $args;

}

/**
 * Removes Order Notes Title - Additional Information
 * @since 1.0.0
 */
// add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

/**
 * Remove display notice - Showing all x results
 * @since 1.0.0
 */
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

/**
 * Remove default sorting drop-down from WooCommerce
 * @since 1.0.0
 */
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


// add_filter( 'woocommerce_checkout_fields' , 'bt_remove_order_notes' );
/**
 * Remove Order Notes Field
 * @since 1.0.0
 */
function bt_remove_order_notes( $fields ) {
        unset($fields['order']['order_comments']);
        return $fields;
}


// add_filter('woocommerce_billing_fields','bt_custom_billing_fields');
/**
 * Remove some fields from billing form
 * @since 1.0.0
 * @link https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
 */
function bt_custom_billing_fields( $fields = array() ) {
        unset($fields['billing_company']);
        // unset($fields['billing_address_1']);
        // unset($fields['billing_address_2']);
        // unset($fields['billing_state']);
        // unset($fields['billing_city']);
        // unset($fields['billing_phone']);
        // unset($fields['billing_postcode']);
        // unset($fields['billing_country']);
        return $fields;
}

//add_filter('woocommerce_shipping_fields','bt_custom_shipping_fields');
/**
 * Remove some fields from shipping form
 * @since 1.0.0
 * @link https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
 */
function bt_custom_shipping_fields( $fields = array() ) {
        unset($fields['shipping_company']);
        // unset($fields['shipping_address_1']);
        // unset($fields['shipping_address_2']);
        // unset($fields['shipping_state']);
        // unset($fields['shipping_city']);
        // unset($fields['shipping_phone']);
        // unset($fields['shipping_postcode']);
        // unset($fields['shipping_country']);
        return $fields;
}


//add_filter( 'woocommerce_thankyou_order_received_text', 'bt_thank_you' );
/**
 * Filter thank you text for digital downloads or the first page after payment
 * @since 1.0.0
 */
function bt_thank_you() {
	$added_text = '<p>Thank you your order has been received. Your download link is below. You will also receive an email with your PDF download link.</p>';
	return $added_text ;
}