<?php
/**
 * @param $attrs
 * fullwidth feat 4
 */
if ( ! function_exists( 'pixwell_rbc_fw_feat_4' ) ) {
	function pixwell_rbc_fw_feat_4( $attrs ) {
		$settings = shortcode_atts( array(
			'uuid'           => '',
			'category'       => '',
			'categories'     => '',
			'format'         => '',
			'tags'           => '',
			'author'         => '',
			'post_not_in'    => '',
			'post_in'        => '',
			'order'          => '',
			'posts_per_page' => '',
			'offset'         => ''
		), $attrs );

		$settings['classes']       = 'fw-block fw-feat-4 none-margin';
		$settings['no_found_rows'] = true;

		$query_data = pixwell_query( $settings );
		ob_start();
		pixwell_block_open( $settings, $query_data );
		pixwell_block_header( $settings );
		if ( ! $query_data->have_posts() ) :
			pixwell_no_post();
		else :
			pixwell_block_content_open( $settings );
			echo '<div class="load-animation"></div>';
			echo '<div class="rb-owl slider-feat-4 per-load">';
			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				pixwell_post_overlay_4( $settings );
			endwhile;
			echo '</div>';

			pixwell_block_content_close();
			wp_reset_postdata();
		endif;
		pixwell_block_close();

		return ob_get_clean();
	}
}


/**
 * @param $blocks
 *
 * @return array
 * register block settings
 */
if ( ! function_exists( 'pixwell_register_fw_feat_4' ) ) {
	function pixwell_register_fw_feat_4( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = array();
		}

		$blocks[] = array(
			'name'        => 'fw_feat_4',
			'title'       => esc_html__( 'FullWide Slider (Stretched)', 'pixwell' ),
			'description' => esc_html__( 'Display your posts as a full-wide slider in the fullwidth section. This block requests to change the section layout to FullWidth Stretched.', 'pixwell' ),
			'tips'        => esc_html__( 'Switch parent section settings to FullWidth Stretched to make sure the block display correctly.', 'pixwell' ),
			'section'     => 'fullwidth',
			'img'         => get_theme_file_uri( 'assets/images/fw-feat-4.png' ),
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
					'default'     => 4
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
					)
				)
			)
		);

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_fw_feat_4', 14 );