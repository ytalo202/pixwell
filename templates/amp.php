<?php
/** this file manager AMP feature */
add_action( 'amp_post_template_head', 'pixwell_amp_fonts', 1 );
add_action( 'amp_post_template_head', 'pixwell_amp_style', 10 );
add_action( 'amp_post_template_head', 'pixwell_amp_top_menu', 15 );
add_action( 'amp_post_template_footer', 'pixwell_amp_render_menu' );

if ( ! function_exists( 'pixwell_amp_top_menu' ) ) {
	function pixwell_amp_top_menu() {
		$amp_menu = pixwell_get_option( 'amp_top_menu' );
		if ( empty( $amp_menu ) ) {
			return;
		} ?>
		<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
	<?php
	}
}

/** load style */
if ( ! function_exists( 'pixwell_amp_style' ) ) {
	function pixwell_amp_style() {
		?>
		<style amp-custom>
			<?php include_once get_theme_file_path('amp/style.css'); ?>
		</style>
	<?php
	}
}

/** render site menu */
if ( ! function_exists( 'pixwell_amp_render_menu' ) ) {
	function pixwell_amp_render_menu() {
		$amp_menu = pixwell_get_option( 'amp_top_menu' );
		if ( empty( $amp_menu ) ) {
			return;
		} ?>
		<amp-sidebar id="sidebar-left" class="sample-sidebar" layout="nodisplay" side="left">
			<aside class="amp-aside">
				<div on="tap:sidebar-left.close" class="menu-close"><span class="icon-close"></span></div>
				<nav class="amp-nav">
					<?php wp_nav_menu( array(
						'container'       => 'div',
						'menu_id'         => 'mobile-nav',
						'menu_class'      => 'mobile-nav-inner',
						'container_class' => 'sidebar-link',
						'menu'            => $amp_menu,
						'echo'            => true,
						'depth'           => 1,
					) ); ?>
				</nav>
			</aside>
		</amp-sidebar>
	<?php
	}
}

/** amp fonts */
if ( ! function_exists( 'pixwell_amp_fonts' ) ) {
	function pixwell_amp_fonts() {

		$font_families   = array();
		$font_families[] = 'Montserrat:400,400i,500,600,700,900';
		$font_families[] = 'Quicksand:300,400,500,700';
		$font_families   = apply_filters( 'pixwell_amp_fonts', $font_families );

		$params          = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url       = add_query_arg( $params, 'https://fonts.googleapis.com/css' ); ?>
		<link rel="stylesheet" href="<?php echo esc_url( $fonts_url ); ?>">
	<?php
	}
}
