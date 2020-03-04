<?php
/** load templates */
include_once get_theme_file_path( '/templates/single/parts.php' );
include_once get_theme_file_path( '/templates/single/layout-1.php' );
include_once get_theme_file_path( '/templates/single/layout-2.php' );
include_once get_theme_file_path( '/templates/single/layout-3.php' );
include_once get_theme_file_path( '/templates/single/layout-4.php' );
include_once get_theme_file_path( '/templates/single/layout-5.php' );
include_once get_theme_file_path( '/templates/single/layout-custom.php' );

/** render single */
if ( ! function_exists( 'pixwell_single' ) ) :
	function pixwell_single() {

		if ( 'post' != get_post_type() ) {
			pixwell_single_layout_cpt();
			return;
		}

		$ajax_next_post = pixwell_get_option( 'ajax_next_post' );
		$ajax_next_cat  = pixwell_get_option( 'ajax_next_cat' );
		$hide_sidebar   = pixwell_get_option( 'ajax_next_hide_sidebar' );

		$class_name = 'single-post-infinite clearfix';
		if ( ! empty( $hide_sidebar ) ) {
			$class_name .= ' hide-sb';
		}

		if ( ! empty( $ajax_next_cat ) ) {
			$post_prev = get_previous_post( true );
		} else {
			$post_prev = get_previous_post();
		}

		if ( ! empty( $ajax_next_post ) && ! empty( $post_prev ) ) : ?>
			<div id="single-post-infinite" class="<?php echo esc_attr( $class_name ); ?>" data-nextposturl="<?php echo esc_url( get_permalink( $post_prev ) ); ?>">
				<div class="single-p-outer" data-postid="<?php echo get_the_ID(); ?>" data-postlink="<?php echo esc_url( get_permalink() ); ?>">
					<?php pixwell_single_render_layout(); ?>
				</div>
			</div>
			<aside id="single-infinite-point" class="single-infinite-point pagination-wrap clearfix">
				<span class="loadmore-animation"></span>
			</aside>
		<?php
		else :
			pixwell_single_render_layout();
		endif;
	}
endif;


/** render single post layouts */
if ( ! function_exists( 'pixwell_single_render_layout' ) ) {
	function pixwell_single_render_layout() {

		if ( ! has_post_thumbnail() ) {
			$layout = 1;
		} else {
			$layout = pixwell_get_single_layout();
		}

		switch ( $layout ) {
			case '1':
				pixwell_single_layout_1();
				break;
			case '2':
				pixwell_single_layout_2();
				break;
			case '3':
				pixwell_single_layout_3();
				break;
			case '4':
				pixwell_single_layout_4();
				break;
			case '5':
				pixwell_single_layout_5();
				break;
			default:
				pixwell_single_layout_1();
		}
	}
}

