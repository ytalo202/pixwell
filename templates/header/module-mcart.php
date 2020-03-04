<?php
/** cart icon */
if ( ! class_exists( 'Woocommerce' ) || ! function_exists( 'wc_get_cart_url' ) || ! function_exists( 'is_cart' ) || is_cart() ) {
	return false;
}
$pixwell_mobile_cart = pixwell_get_option( 'mobile_cart' );
if ( ! empty( $pixwell_mobile_cart ) ): ?>
	<div class="nav-cart">
	<a class="cart-link" href="<?php echo esc_url( wc_get_cart_url() ) ?>" title="<?php echo esc_attr( pixwell_translate( 'view_cart' ) ); ?>">
		<span class="cart-icon"><i class="rbi rbi-shop-bag"></i><em class="cart-counter rb-counter"><?php echo esc_attr( WC()->cart->cart_contents_count ); ?></em></span>
	</a>
	</div>
<?php endif;