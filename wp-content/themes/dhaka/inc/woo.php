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