<?php
/**
 * @param $attrs
 * fullwidth feat 2
 */
if ( ! function_exists( 'pixwell_rbc_fw_feat_2' ) ) {
	function pixwell_rbc_fw_feat_2( $attrs ) {
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
			'offset'         => '',
			'title'          => '',
			'viewmore_title' => '',
			'viewmore_link'  => '',
			'columns'        => true
		), $attrs );

		$settings['classes']         = 'fw-block fw-feat-2 none-margin rb-p20-gutter';
		$settings['content_classes'] = 'rb-n10-all rb-sh';
		$settings['posts_per_page']  = 3;
		$settings['no_found_rows']   = true;

		$query_data = pixwell_query( $settings );

		ob_start();
		pixwell_block_open( $settings, $query_data );
		pixwell_block_header( $settings );

		if ( ! $query_data->have_posts() || $query_data->post_count < 3 ) {
			pixwell_not_enough( 3 );
		} else {
			pixwell_block_content_open( $settings );
			$counter = 1;
			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				if ( 1 == $counter ) {
					echo '<div class="p-outer nth-1 rb-col-d6 rb-col-m12 rb-p10-all">';
					pixwell_post_overlay_1( $settings );
					echo '</div>';
				} elseif ( 2 == $counter ) {
					echo '<div class="p-outer nth-2 rb-col-m12 rb-p10-all">';
					pixwell_post_overlay_3( $settings );
					echo '</div>';
				} else {
					echo '<div class="p-outer nth-3 rb-col-m12 rb-p10-all">';
					pixwell_post_overlay_3( $settings );
					echo '</div>';
				}
				$counter ++;
				if ( $counter > 3 ) {
					break;
				}
			endwhile;
			pixwell_block_content_close();
			wp_reset_postdata();
		}

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
if ( ! function_exists( 'pixwell_register_fw_feat_2' ) ) {
	function pixwell_register_fw_feat_2( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = array();
		}

		$blocks[] = array(
			'name'        => 'fw_feat_2',
			'title'       => esc_html__( 'FullWide Grid (Stretched)', 'pixwell' ),
			'description' => esc_html__( 'Display your posts as a featured grid (3 columns) in the fullwidth (Stretched) section.', 'pixwell' ),
			'tips'        => esc_html__( 'Switch parent section settings to FullWidth Stretched to make sure the block display correctly.', 'pixwell' ),
			'section'     => 'fullwidth',
			'img'         => get_theme_file_uri( 'assets/images/fw-feat-2.png' ),
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
					'default'     => ''
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
				),
				array(
					'name'        => 'header_color',
					'type'        => 'text',
					'tab'         => 'design',
					'title'       => esc_html__( 'Header Style Color', 'pixwell' ),
					'description' => esc_html__( 'Input hex color value (ie: #ff8763) for the block header title.', 'pixwell' )
				),
			)
		);

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_fw_feat_2', 16 );