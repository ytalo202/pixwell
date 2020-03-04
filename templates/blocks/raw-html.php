<?php
/**
 * @param $attrs
 * Raw HTML and shortcode
 */
if ( ! function_exists( 'pixwell_rbc_raw_html' ) ) {
	function pixwell_rbc_raw_html( $attrs, $content ) {
		$settings            = shortcode_atts( array(
			'uuid'           => '',
			'title'          => '',
			'viewmore_title' => '',
			'viewmore_link'  => '',
			'wp_autop'       => ''
		), $attrs );
		$settings['classes'] = 'fw-block raw-html none-margin';

		ob_start();
		pixwell_block_open( $settings );
		pixwell_block_header( $settings );
		pixwell_block_content_open( $settings );
		if ( function_exists( 'pixwell_decode_shortcode' ) ) {
			if ( pixwell_decode_shortcode( $content ) ) {
				$content = pixwell_decode_shortcode( $content );
			}
		}
		if ( ! empty( $attrs['wp_autop'] ) ) {
			$content = wpautop( $content );
		}
		echo apply_filters( 'the_content', $content );
		pixwell_block_content_close();
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
if ( ! function_exists( 'pixwell_register_fw_raw_html' ) ) {
	function pixwell_register_fw_raw_html( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = array();
		}

		$blocks[] = array(
			'name'        => 'fw_raw_html',
			'title'       => esc_html__( 'Raw HTML - Shortcodes', 'pixwell' ),
			'description' => esc_html__( 'Display raw HTML content or shortcodes', 'pixwell' ),
			'section'     => array( 'fullwidth', 'content' ),
			'img'         => get_theme_file_uri( 'assets/images/code.png' ),
			'inputs'      => array(
				array(
					'name'        => 'raw_html',
					'type'        => 'textarea',
					'tab'         => 'general',
					'title'       => esc_html__( 'Raw HTML or Shortcode', 'pixwell' ),
					'description' => esc_html__( 'Input the block header tagline, this is description display below the block title.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'wp_autop',
					'type'        => 'select',
					'tab'         => 'general',
					'title'       => esc_html__( 'WP AutoP', 'pixwell' ),
					'description' => esc_html__( 'Changes double line-breaks in the text into HTML paragraphs(p tag).', 'pixwell' ),
					'options'     => array(
						'0' => esc_html__( '--Disable--', 'pixwell' ),
						'1' => esc_html__( 'Enable', 'pixwell' ),

					),
					'default'     => '0'
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
					),
				),
				array(
					'name'        => 'header_color',
					'type'        => 'text',
					'tab'         => 'design',
					'title'       => esc_html__( 'Header Style Color', 'pixwell' ),
					'description' => esc_html__( 'Input hex color value (ie: #ff8763) for the block header title.', 'pixwell' )
				)
			),
		);

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_fw_raw_html', 2000 );