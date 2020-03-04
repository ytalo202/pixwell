<?php
/**
 * @return array
 * get category page settings
 */
if ( ! function_exists( 'pixwell_get_settings_category_page' ) ) {
	function pixwell_get_settings_category_page() {

		$settings = array(
			'header_style'           => '',
			'header_text_style'      => '',
			'global_header_image_bg' => '',
			'layout'                 => '',
			'posts_per_page'         => '',
			'pagination'             => '',
			'sidebar_name'           => '',
			'sidebar_pos'            => '',
			'breadcrumb'             => ''
		);

		$default                           = pixwell_get_settings_blog( 'cat' );
		$default['header_style']           = pixwell_get_option( 'cat_header_style' );
		$default['global_header_image_bg'] = pixwell_get_option( 'cat_header_image_bg' );
		$default['header_text_style']      = pixwell_get_option( 'cat_header_text_style' );

		global $wp_query;
		$cat_id = $wp_query->get_queried_object_id();
		$data   = get_option( 'pixwell_meta_categories', array() );

		if ( isset( $data[ $cat_id ] ) ) {
			$settings = wp_parse_args( $data[ $cat_id ], $settings );
		}

		foreach ( $settings as $key => $val ) {
			if ( ( empty( $val ) || 'default' == $val ) && isset( $default[ $key ] ) ) {
				$settings[ $key ] = $default[ $key ];
			}
		}

		$settings = pixwell_get_settings_blog_sidebar( $settings );

		return $settings;
	}
}

/**
 * @param string $page
 *
 * @return array
 * blog page settings
 */
if ( ! function_exists( 'pixwell_get_settings_blog' ) ) {
	function pixwell_get_settings_blog( $page = 'archive' ) {

		$settings = array();
		$page     = trim( $page );

		$settings['layout']         = pixwell_get_option( 'blog_layout_' . $page );
		$settings['posts_per_page'] = pixwell_get_option( 'blog_posts_per_page_' . $page );
		if ( empty( $settings['posts_per_page'] ) ) {
			$settings['posts_per_page'] = get_option( 'posts_per_page' );
		}
		$settings['pagination'] = pixwell_get_option( 'blog_pagination_' . $page );

		$settings['sidebar_name'] = pixwell_get_option( 'blog_sidebar_name_' . $page );
		$settings['sidebar_pos']  = pixwell_get_option( 'block_sidebar_pos_' . $page );
		if ( 'default' == $settings['sidebar_pos'] ) {
			$settings['sidebar_pos'] = pixwell_get_option( 'site_sidebar_pos' );
		}

		$settings               = pixwell_get_settings_blog_sidebar( $settings );
		$settings['breadcrumb'] = pixwell_get_option( 'blog_breadcrumb_' . $page );

		return $settings;
	}
}

/**
 * @param $settings
 *
 * @return mixed
 * check sidebar depend on layout
 */
if ( ! function_exists( 'pixwell_get_settings_blog_sidebar' ) ) {
	function pixwell_get_settings_blog_sidebar( $settings ) {
		if ( 'fw_grid_1' == $settings['layout'] || 'fw_grid_2' == $settings['layout'] || 'fw_grid_3' == $settings['layout'] || 'fw_list_1' == $settings['layout'] || 'fw_list_2' == $settings['layout'] ) {
			$settings['sidebar_name'] = '';
			$settings['sidebar_pos']  = '';
		}

		return $settings;
	}
}

