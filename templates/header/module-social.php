<?php
$pixwell_navbar_social = pixwell_get_option( 'navbar_social' );
$social_raw_html       = pixwell_render_social_icons( pixwell_get_web_socials(), true );
if ( ! empty( $pixwell_navbar_social ) && ! empty( $social_raw_html ) ) : ?>
	<div class="navbar-social social-icons is-icon tooltips-n">
		<?php echo pixwell_render_social_icons( pixwell_get_web_socials(), true ); ?>
	</div>
<?php endif;