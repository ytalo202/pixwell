<?php
$pixwell_logo        = pixwell_get_option( 'sticky_logo' );
$pixwell_logo_retina = pixwell_get_option( 'retina_sticky_logo' );
if ( empty( $pixwell_logo['url'] ) ) {
	$pixwell_logo = pixwell_get_option( 'site_logo' );
}
$pixwell_logo_name = get_bloginfo( 'name' );

if ( ! empty( $pixwell_logo['url'] ) ) :
	if ( ! empty( $pixwell_logo_retina['url'] ) ) : ?>
		<div class="logo-wrap is-logo-image site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( $pixwell_logo_name ) ?>">
				<img class="logo-default logo-sticky-retina logo-retina" height="<?php echo esc_attr( $pixwell_logo['height'] ); ?>" width="<?php echo esc_attr( $pixwell_logo['width'] ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>" srcset="<?php echo esc_url( $pixwell_logo['url'] ) ?> 1x, <?php echo esc_url( $pixwell_logo_retina['url'] ); ?> 2x">
			</a>
		</div>
	<?php else : ?>
		<div class="logo-wrap is-logo-image site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( $pixwell_logo_name ) ?>">
				<img class="logo-default" height="<?php echo esc_attr( $pixwell_logo['height'] ); ?>" width="<?php echo esc_attr( $pixwell_logo['width'] ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>">
			</a>
		</div>
	<?php endif;
else : ?>
	<div class="logo-wrap is-logo-text site-branding">
		<p class="h1 logo-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $pixwell_logo_name ) ?>"><?php echo esc_html( $pixwell_logo_name ); ?></a>
		</p>
	</div>
<?php endif;
