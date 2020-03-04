<?php
/** footer logo */
$pixwell_logo         = pixwell_get_option( 'footer_logo' );
$pixwell_menu         = pixwell_get_option( 'footer_menu' );
$pixwell_social       = pixwell_get_option( 'footer_social' );
$pixwell_social_color = pixwell_get_option( 'footer_social_color' );
if ( $pixwell_social ) {
	$pixwell_social_render = pixwell_render_social_icons( pixwell_get_web_socials(), true );
}
if ( empty( $pixwell_logo['url'] ) && ( empty( $pixwell_menu ) || ! has_nav_menu( 'pixwell_menu_footer' ) ) && empty( $pixwell_social_render ) ) {
	return false;
}
if ( ! empty( $pixwell_logo['alt'] ) ) {
	$pixwell_logo_alt = $pixwell_logo['alt'];
} else {
	$pixwell_logo_alt = get_bloginfo( 'name' );
} ?>
<div class="footer-logo footer-section">
	<div class="rbc-container footer-logo-inner">
		<?php if ( ! empty( $pixwell_logo['url'] ) ): ?>
			<div class="footer-logo-wrap">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
					<img height="<?php echo esc_attr( $pixwell_logo['height'] ); ?>" width="<?php echo esc_attr( $pixwell_logo['width'] ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_alt ); ?>">
				</a>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $pixwell_social )) :
		if ( ! empty( $pixwell_social_color )): ?>
		<div class="footer-social-wrap is-color">
		<?php else : ?>
		<div class="footer-social-wrap">
		<?php endif; ?>
			<div class="footer-social social-icons is-bg-icon tooltips-s"><?php echo pixwell_render_social_icons( pixwell_get_web_socials(), true ); ?></div>
		</div>
		<?php endif;
		if ( ! empty( $pixwell_menu ) && has_nav_menu( 'pixwell_menu_footer' ) ) : ?>
			<?php wp_nav_menu( array(
				'theme_location' => 'pixwell_menu_footer',
				'menu_id'        => 'footer-menu',
				'container'      => false,
				'menu_class'     => 'footer-menu-inner',
				'depth'          => 1,
				'echo'           => true
			) ); ?>
		<?php endif; ?>
		</div>
</div>