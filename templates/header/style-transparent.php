<?php
/**
 * transparent header template
 */
$pixwell_transparent_header_style      = pixwell_get_option( 'transparent_header_style' );
$pixwell_transparent_header_text_style = pixwell_get_option( 'transparent_header_text_style' );
$pixwell_header_classes                = 'header-wrap header-1 header-float';
$pixwell_transparent_classes           = 'navbar-wrap transparent-navbar-wrap';
$pixwell_transparent_inner_classes     = 'navbar-holder is-main-nav';

if ( empty( $pixwell_transparent_header_style ) ) {
	$pixwell_header_classes .= ' is-wrapper';
	$pixwell_transparent_inner_classes .= ' rbc-container';
} else {
	$pixwell_header_classes .= ' is-wide';
}

if ( empty( $pixwell_transparent_header_text_style ) || 'dark' != $pixwell_transparent_header_text_style ) {
	$pixwell_transparent_classes .= ' light-style';
	$pixwell_transparent_inner_classes .= ' is-light-text';
} else {
	$pixwell_transparent_classes .= ' dark-style';
} ?>
<header id="site-header" class="<?php echo esc_attr( $pixwell_header_classes ); ?>">
	<?php if ( is_active_sidebar( 'pixwell_header_ad' ) ) {
		dynamic_sidebar( 'pixwell_header_ad' );
	} ?>
	<div class="navbar-outer">
		<?php get_template_part( 'templates/header/module', 'mnav' ); ?>
		<div class="<?php echo esc_attr( $pixwell_transparent_classes ); ?>">
			<div class="<?php echo esc_attr( $pixwell_transparent_inner_classes ); ?>">
				<div class="navbar-inner rb-m20-gutter">
					<div class="navbar-left">
						<?php get_template_part( 'templates/header/module', 'toggle' ); ?>
						<?php get_template_part( 'templates/header/module', 'logotp' ); ?>
						<?php get_template_part( 'templates/header/module', 'menu' ); ?>
					</div>
					<div class="navbar-right">
						<?php get_template_part( 'templates/header/module', 'social' ); ?>
						<?php get_template_part( 'templates/header/module', 'trend' ); ?>
						<?php get_template_part( 'templates/header/module', 'bookmark' ); ?>
						<?php get_template_part( 'templates/header/module', 'cart' ); ?>
						<?php get_template_part( 'templates/header/module', 'search' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php get_template_part( 'templates/header/module', 'sticky' ); ?>
</header>