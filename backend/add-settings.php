<?php
/**
 * @param bool $display_default
 *
 * @return array
 * sidebar name
 */
if ( ! function_exists( 'pixwell_add_settings_sidebar_name' ) ) {
	function pixwell_add_settings_sidebar_name( $display_default = false ) {

		$sidebar_data  = array();
		$theme_options = get_option( 'pixwell_theme_options' );
		if ( true === $display_default ) {
			$sidebar_data['default'] = esc_html__( 'Default from Theme Options', 'pixwell' );
		};
		$sidebar_data['pixwell_sidebar_default'] = esc_html__( 'Default Sidebar', 'pixwell' );

		if ( ! empty( $theme_options['pixwell_multi_sidebar'] ) && is_array( $theme_options['pixwell_multi_sidebar'] ) ) {
			foreach ( $theme_options['pixwell_multi_sidebar'] as $sidebar ) {

				$id                  = 'pixwell_sidebar_multi_' . pixwell_convert_to_id( trim( $sidebar ) );
				$sidebar_data[ $id ] = $sidebar;
			};
		};

		return $sidebar_data;
	}
}

/**
 * @param bool $default
 *
 * @return array
 * sidebar position
 */
if ( ! function_exists( 'pixwell_add_settings_sidebar_pos' ) ) {
	function pixwell_add_settings_sidebar_pos( $default = true ) {

		if ( ! is_admin() ) {
			return false;
		}

		$sidebar = array(
			'left'  => array(
				'alt'   => 'left sidebar',
				'img'   => get_theme_file_uri( 'assets/images/sidebar-left.png' ),
				'title' => esc_html__( 'Left', 'pixwell' )
			),
			'right' => array(
				'alt'   => 'right sidebar',
				'img'   => get_theme_file_uri( 'assets/images/sidebar-right.png' ),
				'title' => esc_html__( 'Right', 'pixwell' )
			)
		);

		if ( true === $default ) {
			$sidebar['default'] = array(
				'alt'   => 'Default',
				'img'   => get_theme_file_uri( 'assets/images/sidebar-default.png' ),
				'title' => esc_html__( 'Default', 'pixwell' )
			);
		};

		return $sidebar;
	}
}

/**
 * @return array|bool
 * text style config
 */
if ( ! function_exists( 'pixwell_add_settings_text_style' ) ) {
	function pixwell_add_settings_text_style() {

		if ( ! is_admin() ) {
			return false;
		}

		return array(
			'dark'  => array(
				'alt'   => 'dark',
				'img'   => get_template_directory_uri() . '/assets/images/text-dark.png',
				'title' => esc_html__( 'Dark', 'pixwell' )
			),
			'light' => array(
				'alt'   => 'light',
				'img'   => get_template_directory_uri() . '/assets/images/text-light.png',
				'title' => esc_html__( 'Light', 'pixwell' )
			),
		);
	}
}


/**
 * @return array|bool
 * single post layout
 */
if ( ! function_exists( 'pixwell_add_settings_single_layouts' ) ) {
	function pixwell_add_settings_single_layouts() {

		if ( ! is_admin() ) {
			return false;
		}

		return array(
			'1' => array(
				'alt'   => 'layout 1',
				'img'   => get_theme_file_uri( 'assets/images/single-1.png' ),
				'title' => esc_html__( 'Classic', 'pixwell' )
			),
			'2' => array(
				'alt'   => 'layout 2',
				'img'   => get_theme_file_uri( 'assets/images/single-2.png' ),
				'title' => esc_html__( 'FullWide', 'pixwell' )
			),
			'3' => array(
				'alt'   => 'layout 3',
				'img'   => get_theme_file_uri( 'assets/images/single-3.png' ),
				'title' => esc_html__( 'FullScreen', 'pixwell' )
			),
			'4' => array(
				'alt'   => 'layout 4',
				'img'   => get_theme_file_uri( 'assets/images/single-4.png' ),
				'title' => esc_html__( 'Focus Reading', 'pixwell' )
			),
			'5' => array(
				'alt'   => 'layout 5',
				'img'   => get_theme_file_uri( 'assets/images/single-5.png' ),
				'title' => esc_html__( 'No Featured', 'pixwell' )
			)
		);
	}
}


/**
 * @return array|bool
 * blog layout
 */
if ( ! function_exists( 'pixwell_add_settings_blog_layouts' ) ) {
	function pixwell_add_settings_blog_layouts() {

		if ( ! is_admin() ) {
			return false;
		}

		return array(
			'classic'   => array(
				'img'   => get_theme_file_uri( 'assets/images/ct-classic.png' ),
				'title' => esc_html__( 'Classic (Content)', 'pixwell' )
			),
			'ct_list'   => array(
				'img'   => get_theme_file_uri( 'assets/images/ct-list.png' ),
				'title' => esc_html__( 'List (Content)', 'pixwell' )
			),
			'ct_grid_1' => array(
				'img'   => get_theme_file_uri( 'assets/images/ct-grid-1.png' ),
				'title' => esc_html__( 'Grid 1 (Content)', 'pixwell' )
			),
			'ct_grid_2' => array(
				'img'   => get_theme_file_uri( 'assets/images/ct-grid-2.png' ),
				'title' => esc_html__( 'Grid 2 (Content)', 'pixwell' )
			),
			'fw_grid_1' => array(
				'img'   => get_theme_file_uri( 'assets/images/fw-grid-1.png' ),
				'title' => esc_html__( 'FullWidth Grid 1', 'pixwell' )
			),
			'fw_grid_2' => array(
				'img'   => get_theme_file_uri( 'assets/images/fw-grid-2.png' ),
				'title' => esc_html__( 'FullWidth Grid 2', 'pixwell' )
			),
			'fw_grid_3' => array(
				'img'   => get_theme_file_uri( 'assets/images/fw-grid-3.png' ),
				'title' => esc_html__( 'FullWidth Grid 3', 'pixwell' )
			),
			'fw_list_1' => array(
				'img'   => get_theme_file_uri( 'assets/images/fw-list-1.png' ),
				'title' => esc_html__( 'FullWidth List 1', 'pixwell' )
			),
			'fw_list_2' => array(
				'img'   => get_theme_file_uri( 'assets/images/fw-list-2.png' ),
				'title' => esc_html__( 'FullWidth List 2', 'pixwell' )
			),
		);
	}
}


/**
 * @param bool $ajax
 *
 * @return array
 * blog pagination config
 */
if ( ! function_exists( 'pixwell_add_settings_blog_pagination' ) ) {
	function pixwell_add_settings_blog_pagination( $ajax = true ) {

		if ( ! is_admin() ) {
			return false;
		}

		if ( true === $ajax ) {
			$option = array(
				'number'   => esc_html__( 'Numeric', 'pixwell' ),
				'simple'   => esc_html__( 'Simple', 'pixwell' ),
				'loadmore' => esc_html__( 'Load More', 'pixwell' ),
				'infinite' => esc_html__( 'Infinite Scroll', 'pixwell' ),
			);
		} else {
			$option = array(
				'number' => esc_html__( 'Numeric', 'pixwell' ),
				'simple' => esc_html__( 'Simple', 'pixwell' ),
			);
		}

		return $option;
	}
}


/**
 * @param string $type
 * @param string $custom_data
 *
 * @return array
 * quick filter config
 */
if ( ! function_exists( 'pixwell_add_settings_quick_filters' ) ) {
	function pixwell_add_settings_quick_filters( $type = 'category', $custom_data = '' ) {

		$data = array();

		switch ( $type ) {

			case 'category' :
				$data_cat = get_categories( array(
					'include'    => esc_attr( $custom_data ),
					'number'     => 10,
					'hide_empty' => 1,
				) );
				if ( ! empty( $custom_data ) ) {
					$custom_cat_ids = explode( ',', $custom_data );
					foreach ( $custom_cat_ids as $custom_cat_id_el ) {
						$custom_cat_id_el = trim( $custom_cat_id_el );
						foreach ( $data_cat as $data_cat_el ) {
							if ( $custom_cat_id_el == $data_cat_el->cat_ID ) {
								$data[] = array(
									'id'   => $data_cat_el->cat_ID,
									'name' => $data_cat_el->name
								);
							}
						}
					}
				} else {
					foreach ( $data_cat as $data_cat_el ) {
						$data[] = array(
							'id'   => $data_cat_el->cat_ID,
							'name' => $data_cat_el->name
						);
					}
				}
				break;

			case 'tag' :
				$data_tag = get_tags( array(
						'include'    => esc_attr( $custom_data ),
						'number'     => 10,
						'hide_empty' => 1
					)
				);
				if ( ! empty( $custom_data ) ) {
					$custom_tag_ids = explode( ',', $custom_data );
					foreach ( $custom_tag_ids as $custom_tag_id_el ) {

						$custom_tag_id_el = trim( $custom_tag_id_el );
						foreach ( $data_tag as $data_tag_el ) {
							if ( $custom_tag_id_el == $data_tag_el->name ) {
								$data[] = array(
									'id'   => $data_tag_el->slug,
									'name' => $data_tag_el->name
								);
							}
						}
					}
				} else {
					foreach ( $data_tag as $data_tag_el ) {
						$data[] = array(
							'id'   => $data_tag_el->slug,
							'name' => $data_tag_el->name
						);
					}
				}
				break;

			case 'author' :
				$data_author = get_users( array(
						'who'     => 'authors',
						'include' => esc_attr( $custom_data ),
					)
				);
				if ( ! empty( $data_author ) && is_array( $data_author ) ) {
					foreach ( $data_author as $data_author_el ) {
						$data[] = array(
							'id'   => $data_author_el->ID,
							'name' => $data_author_el->display_name
						);
					};
				}
				break;
		};

		return $data;
	}
}

/**
 * @return array
 * single layout
 */
if ( ! function_exists( 'pixwell_add_settings_meta_single_layout' ) ) {
	function pixwell_add_settings_meta_single_layout() {

		if ( ! is_admin() ) {
			return false;
		}

		return array(
			'default' => array(
				'image' => get_theme_file_uri( 'assets/images/default.png' ),
				'title' => esc_html__( 'Default', 'pixwell' )
			),
			'1'       => array(
				'image' => get_theme_file_uri( 'assets/images/single-1.png' ),
				'title' => esc_html__( 'Classic', 'pixwell' )
			),
			'2'       => array(
				'image' => get_theme_file_uri( 'assets/images/single-2.png' ),
				'title' => esc_html__( 'FullWide', 'pixwell' )
			),
			'3'       => array(
				'image' => get_theme_file_uri( 'assets/images/single-3.png' ),
				'title' => esc_html__( 'FullScreen', 'pixwell' )
			),
			'4'       => array(
				'image' => get_theme_file_uri( 'assets/images/single-4.png' ),
				'title' => esc_html__( 'Focus Reading', 'pixwell' )
			),
			'5'       => array(
				'image' => get_theme_file_uri( 'assets/images/single-5.png' ),
				'title' => esc_html__( 'No Featured', 'pixwell' )
			)
		);
	}
}

/**
 * @return array|bool
 * sidebar position
 */
if ( ! function_exists( 'pixwell_add_settings_meta_sidebar_pos' ) ) {
	function pixwell_add_settings_meta_sidebar_pos() {

		if ( ! is_admin() ) {
			return false;
		}

		return array(
			'default' => array(
				'image' => get_theme_file_uri( 'assets/images/sidebar-default.png' ),
				'title' => esc_html__( 'Default', 'pixwell' )
			),
			'left'    => array(
				'image' => get_theme_file_uri( 'assets/images/sidebar-left.png' ),
				'title' => esc_html__( 'Left', 'pixwell' )
			),
			'right'   => array(
				'image' => get_theme_file_uri( 'assets/images/sidebar-right.png' ),
				'title' => esc_html__( 'Right', 'pixwell' )
			)
		);
	}
}

