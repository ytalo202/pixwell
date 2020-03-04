<?php
/** header mini cart */
if ( ! class_exists( 'Woocommerce' ) || ! function_exists( 'wc_get_cart_url' ) || ! function_exists( 'is_cart' ) || is_cart() ) {
	return false;
}
$pixwell_header_cart = pixwell_get_option( 'navbar_cart' );
if ( ! empty( $pixwell_header_cart ) ): ?>
	<aside class="rb-mini-cart nav-cart is-hover">
		<a class="rb-cart-link cart-link" href="<?php echo esc_url( wc_get_cart_url() ) ?>" title="<?php echo esc_attr( pixwell_translate( 'view_cart' ) ); ?>">
			<span class="cart-icon"><i class="rbi rbi-shop-bag"></i><em class="cart-counter rb-counter"><?php echo esc_attr( WC()->cart->cart_contents_count ); ?></em></span>
		</a>
		<?php if ( function_exists( 'woocommerce_mini_cart' ) ): ?>
			<div class="nav-mini-cart header-lightbox">
				<div class="mini-cart-wrap woocommerce">
					<div class="widget_shopping_cart_content">
						<?php woocommerce_mini_cart(); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</aside>
<?php endif;