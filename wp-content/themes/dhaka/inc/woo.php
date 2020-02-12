<?php

if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}

/**
 * Update mini-cart when products are added to the cart via AJAX
 */
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
    ob_start();
    ?>
    <div class="mini-cart">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['div.mini-cart'] = ob_get_clean();
    return $fragments;
} );

/**
 * Update contents count via AJAX
 */
add_filter('woocommerce_add_to_cart_fragments', 'themetim_header_add_to_cart_fragment');

function themetim_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-basket"></i><span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'themetim'), $woocommerce->cart->cart_contents_count ); ?></span></a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}

/**
 * Gallery WC Support
 */
function dhaka_gallery_thumns_wc_support() {

    add_theme_support( 'woocommerce', array(
        'gallery_thumbnail_image_width' => 600,
    ) );
    add_theme_support( 'wc-product-gallery-lightbox' );
}
add_action( 'after_setup_theme', 'dhaka_gallery_thumns_wc_support' );


/**
 * Opening div for our content wrapper
 */
add_action('woocommerce_before_main_content', 'dhaka_open_div', 5);

function dhaka_open_div() {
    echo '<div class="container"><div class="col-lg-12 col-md-12 col-xs-12" >';
}

/**
 * Closing div for our content wrapper
 */
add_action('woocommerce_after_main_content', 'dhaka_close_div', 50);

function dhaka_close_div() {
    echo '</div></div>';
}

/**
 * Added Row
 */
add_action( 'woocommerce_before_single_product_summary', 'dhaka_product_wrapper_start', 1 );
function dhaka_product_wrapper_start() {
    echo '<div class="row">';
}
add_action( 'woocommerce_after_single_product_summary', 'dhaka_product_wrapper_end', 1 );
function dhaka_product_wrapper_end() {
    echo '</div>';
}