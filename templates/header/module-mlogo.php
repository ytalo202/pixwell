<?php
/** mobile logo */
$pixwell_m_logo     = pixwell_get_option( 'mobile_logo' );
$pixwell_logo_title = get_bloginfo( 'name' );

if ( empty( $pixwell_m_logo['url'] ) ) {
	$pixwell_m_logo = pixwell_get_option( 'retina_site_logo' );
}
if ( empty( $pixwell_m_logo['url'] ) ) {
	$pixwell_m_logo = pixwell_get_option( 'site_logo' );
}

if ( ! empty( $pixwell_m_logo['url'] ) ) : ?>
	<aside class="logo-mobile-wrap is-logo-image">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-mobile">
			<img height="<?php echo esc_attr( $pixwell_m_logo['height'] ); ?>" width="<?php echo esc_attr( $pixwell_m_logo['width'] ); ?>" src="<?php echo esc_url( $pixwell_m_logo['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_title ); ?>">
		</a>
	</aside>
<?php else : ?>
	<aside class="logo-mobile-wrap is-logo-text">
		<a class="logo-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><strong><?php echo esc_html( $pixwell_logo_title ); ?></strong></a>
	</aside>
<?php endif;
