<?php
/**
 * @param array $settings
 * fullwidth masonry 1
 */
if ( ! function_exists( 'pixwell_rbc_fw_masonry_1' ) ) {
	function pixwell_rbc_fw_masonry_1( $attrs ) {
		$settings = shortcode_atts( array(
			'uuid'               => '',
			'name'               => 'fw_masonry_1',
			'category'           => '',
			'categories'         => '',
			'format'             => '',
			'tags'               => '',
			'author'             => '',
			'post_not_in'        => '',
			'post_in'            => '',
			'order'              => '',
			'posts_per_page'     => '',
			'offset'             => '',
			'title'              => '',
			'viewmore_title'     => '',
			'viewmore_link'      => '',
			'quick_filter'       => '',
			'quick_filter_ids'   => '',
			'quick_filter_label' => '',
			'pagination'         => '',
			'text_style'         => ''
		), $attrs );

		$settings['classes']         = 'fw-block fw-masonry-1 is-masonry';
		$settings['content_classes'] = 'rb-n20-gutter is-masonry-reload';

		$query_data = pixwell_query( $settings );
		ob_start();

		pixwell_block_open( $settings, $query_data );
		pixwell_block_header( $settings );
		if ( $query_data->have_posts() ) :
			pixwell_block_content_open( $settings );
			pixwell_rbc_fw_masonry_1_listing( $settings, $query_data );
			pixwell_block_content_close();
			pixwell_render_pagination( $settings, $query_data );
			wp_reset_postdata();
		else:
			pixwell_no_post();
		endif;
		pixwell_block_close();

		return ob_get_clean();
	}
}

/**
 * fw masonry 1 listing
 */
if ( ! function_exists( 'pixwell_rbc_fw_masonry_1_listing' ) ) :
	function pixwell_rbc_fw_masonry_1_listing( $settings = array(), $query_data ) {
		if ( method_exists( $query_data, 'have_posts' ) ) :
			echo '<div class="fw-ms-1"></div>';
			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				echo '<div class="fw-mh-1">';
				echo '<div class="rb-p20-gutter">';
				pixwell_post_masonry_1( $settings );
				echo '</div>';
				echo '</div>';
			endwhile;
		endif;
	}
endif;

/**
 * @param $blocks
 *
 * @return array
 * register block settings
 */
if ( ! function_exists( 'pixwell_register_fw_masonry_1' ) ) {
	function pixwell_register_fw_masonry_1( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = array();
		}

		$blocks[] = array(
			'name'        => 'fw_masonry_1',
			'title'       => esc_html__( 'Masonry Grid 1', 'pixwell' ),
			'description' => esc_html__( 'Display your posts as a masonry grid (3 columns) in the fullwidth section.', 'pixwell' ),
			'section'     => 'fullwidth',
			'img'         => get_theme_file_uri( 'assets/images/fw-masonry-1.png' ),
			'inputs'      => array(
				array(
					'type'        => 'category',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Category Filter', 'pixwell' ),
					'description' => esc_html__( 'Select category filter for this block.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'type'        => 'categories',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Categories Filter', 'pixwell' ),
					'description' => esc_html__( 'Select categories filter for this block. This option will override category filter option.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'tags',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Tags Slug Filter', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by tags slug, separated by commas (for example: tagslug1,tagslug2,tagslug3)', 'pixwell' ),
					'default'     => ''
				),
				array(
					'type'        => 'format',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Post Format', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by post format', 'pixwell' ),
					'default'     => ''
				),
				array(
					'type'        => 'author',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Author Filter', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by the author.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'post_not_in',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Exclude Post IDs', 'pixwell' ),
					'description' => esc_html__( 'Exclude some post IDs from this block, separated by commas (for example: 1,2,3).', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'post_in',
					'type'        => 'text',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Post IDs Filter', 'pixwell' ),
					'description' => esc_html__( 'Filter posts by post IDs. separated by commas (for example: 1,2,3)', 'pixwell' ),
					'default'     => ''
				),
				array(
					'type'        => 'order',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Sort Order', 'pixwell' ),
					'description' => esc_html__( 'Select sort order type for this block.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'posts_per_page',
					'type'        => 'number',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Posts per Page', 'pixwell' ),
					'description' => esc_html__( 'Select number of posts per page (total posts to show).', 'pixwell' ),
					'default'     => 6
				),
				array(
					'name'        => 'offset',
					'type'        => 'number',
					'tab'         => 'filter',
					'title'       => esc_html__( 'Post Offset', 'pixwell' ),
					'description' => esc_html__( 'Select number of posts to pass over. Leave blank or set 0 if you want to show at the beginning.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'title',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'Block Title', 'pixwell' ),
					'description' => esc_html__( 'Input block title, Leave blank if you want to disable block header.', 'pixwell' ),
					'default'     => esc_html__( 'Latest News', 'pixwell' )
				),
				array(
					'name'        => 'viewmore_link',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'View More URL', 'pixwell' ),
					'description' => esc_html__( 'Input the block destination link, Leave blank if you want to disable clickable on the block header.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'viewmore_title',
					'type'        => 'text',
					'tab'         => 'header',
					'title'       => esc_html__( 'View More Label', 'pixwell' ),
					'description' => esc_html__( 'Input the block header tagline, this is description display below the block title.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'pagination',
					'type'        => 'select',
					'tab'         => 'pagination',
					'title'       => esc_html__( 'Pagination', 'pixwell' ),
					'description' => esc_html__( 'Select ajax pagination for this block, default is disable.', 'pixwell' ),
					'options'     => array(
						'0'               => esc_html__( '-Disable-', 'pixwell' ),
						'next_prev'       => esc_html__( 'Next Prev', 'pixwell' ),
						'loadmore'        => esc_html__( 'Load More', 'pixwell' ),
						'infinite_scroll' => esc_html__( 'infinite Scroll', 'pixwell' )
					),
					'default'     => 0
				),
				array(
					'name'        => 'margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block, default is 50px', 'pixwell' ),
					'default'     => array(
						'top'    => 0,
						'bottom' => 50
					),
				),
				array(
					'name'        => 'mobile_margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Mobile - Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block in mobile devices, default is 35px', 'pixwell' ),
					'default'     => array(
						'top'    => 0,
						'bottom' => 35
					),
				),
				array(
					'name'        => 'header_color',
					'type'        => 'text',
					'tab'         => 'design',
					'title'       => esc_html__( 'Header Style Color', 'pixwell' ),
					'description' => esc_html__( 'Input hex color value (ie: #ff8763) for the block header title.', 'pixwell' )
				),
				array(
					'name'        => 'text_style',
					'type'        => 'select',
					'tab'         => 'design',
					'title'       => esc_html__( 'Text Style', 'pixwell' ),
					'description' => esc_html__( 'Select block text style, Select light if you have a dark background.', 'pixwell' ),
					'options'     => array(
						'0'     => esc_html__( '-Dark-', 'pixwell' ),
						'light' => esc_html__( 'Light', 'pixwell' )
					),
					'default'     => 0
				)
			)
		);

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_fw_masonry_1', 50 );
