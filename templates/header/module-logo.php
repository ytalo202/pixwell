<?php
$pixwell_logo        = pixwell_get_option( 'site_logo' );
$pixwell_logo_retina = pixwell_get_option( 'retina_site_logo' );
$pixwell_logo_name   = get_bloginfo( 'name' );
if ( ! empty( $pixwell_logo['url'] ) ) : ?>
	<div class="logo-wrap is-logo-image site-branding">
		<?php if ( empty( $pixwell_logo_retina['url'] ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( $pixwell_logo_name ) ?>">
				<img class="logo-default" height="<?php echo esc_attr( $pixwell_logo['height'] ); ?>" width="<?php echo esc_attr( $pixwell_logo['width'] ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>">
			</a>
		<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( $pixwell_logo_name ); ?>">
				<img class="logo-default logo-retina" height="<?php echo esc_attr( $pixwell_logo['height'] ); ?>" width="<?php echo esc_attr( $pixwell_logo['width'] ); ?>" src="<?php echo esc_url( $pixwell_logo['url'] ) ?>" srcset="<?php echo esc_url( $pixwell_logo['url'] ) ?> 1x, <?php echo esc_url( $pixwell_logo_retina['url'] ); ?> 2x" alt="<?php echo esc_attr( $pixwell_logo_name ); ?>">
			</a>
		<?php endif;
		if ( is_front_page() ) : ?>
			<h1 class="logo-title"><?php echo esc_html( $pixwell_logo_name ); ?></h1>
			<?php if ( get_bloginfo( 'description' ) ) : ?>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php endif;
		endif; ?>
	</div>
<?php else : ?>
	<div class="logo-wrap is-logo-text site-branding">
		<?php if ( is_front_page() ) : ?>
			<h1 class="logo-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $pixwell_logo_name ) ?>"><?php echo esc_html( $pixwell_logo_name ); ?></a>
			</h1>
		<?php else: ?>
			<p class="logo-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $pixwell_logo_name ) ?>"><?php echo esc_html( $pixwell_logo_name ); ?></a>
			</p>
		<?php endif;
		if ( get_bloginfo( 'description' ) ) : ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		<?php endif; ?>
	</div>
<?php endif;
