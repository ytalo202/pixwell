<?php
/* composer latest blog */
add_action( 'rbc_after_content', 'pixwell_render_composer_latest_blog' );

if ( ! function_exists( 'pixwell_render_composer_latest_blog' ) ) {
	function pixwell_render_composer_latest_blog() {

		$composer_blog = rb_get_meta( 'composer_blog' );
		if ( empty( $composer_blog ) || $composer_blog != 1 ) {
			return false;
		}
		$settings  = pixwell_get_settings_composer_blog();
		$settings['classes'] = 'rbc-blog-section';

		$get_paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$get_page  = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
		if ( $get_paged > $get_page ) {
			$paged = $get_paged;
		} else {
			$paged = $get_page;
		}

		$query_data = pixwell_query( $settings, $paged );
		if ( $query_data->have_posts() ) {
			pixwell_render_blog( $settings, $query_data );
			wp_reset_postdata();
		}
	}
}


/* composer latest blog */
if ( ! function_exists( 'pixwell_get_settings_composer_blog' ) ) {
	function pixwell_get_settings_composer_blog() {

		$settings                   = array();
		$settings['title']          = rb_get_meta( 'composer_blog_title' );
		$settings['layout']         = rb_get_meta( 'composer_blog_layout' );
		$settings['posts_per_page'] = rb_get_meta( 'composer_blog_posts_per_page' );
		if ( empty( $settings['posts_per_page'] ) ) {
			$settings['posts_per_page'] = get_option( 'posts_per_page' );
		}
		$settings['offset']       = rb_get_meta( 'composer_blog_offset' );
		$settings['pagination']   = rb_get_meta( 'composer_blog_pagination' );
		$settings['sidebar_name'] = rb_get_meta( 'composer_blog_sidebar_name' );
		$settings['sidebar_pos']  = rb_get_meta( 'composer_blog_sidebar_pos' );
		if ( 'default' == $settings['sidebar_pos'] ) {
			$settings['sidebar_pos'] = pixwell_get_option( 'site_sidebar_pos' );
		}

		$settings = pixwell_get_settings_blog_sidebar( $settings );

		return $settings;
	}
}
