<?php
/* general config */
if ( ! function_exists( 'pixwell_register_options_general' ) ) {
	function pixwell_register_options_general() {
		return array(
			'id'     => 'pixwell_config_section_general',
			'title'  => esc_html__( 'General Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for your website.', 'pixwell' ),
			'icon'   => 'el el-icon-globe',
			'fields' => array(

				array(
					'id'       => 'site_tooltips',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tooltips', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable tooltips when hovering on icons.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'gif_support',
					'type'     => 'switch',
					'title'    => esc_html__( 'GIF Support', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable GIF image support.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'site_back_to_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Back to Top Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable back to top button.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'icon_touch_apple',
					'type'     => 'media',
					'title'    => esc_html__( 'iOS Bookmarklet Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload icon for the Apple touch (72 x 72px), allowed extensions are .jpg, .png, .gif', 'pixwell' ),
					'desc'     => esc_html__( '72 x 72px', 'pixwell' )
				),
				array(
					'id'       => 'icon_touch_metro',
					'type'     => 'media',
					'title'    => esc_html__( 'Metro UI Bookmarklet Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload icon for the Metro interface (144 x 144px), allowed extensions are .jpg, .png, .gif', 'pixwell' ),
					'desc'     => esc_html__( '144 x 144px', 'pixwell' )
				),
				array(
					'id'       => 'css_file',
					'type'     => 'switch',
					'title'    => esc_html__( 'Force write Dynamic CSS to file', 'pixwell' ),
					'subtitle' => esc_html__( 'Write CSS to file to reduce CPU usage and reduce the load time.', 'pixwell' ),
					'desc'     => esc_html__( 'The dynamic file CSS may not apply immediately on some servers due to the server cache.', 'pixwell' ),
					'default'  => 0,
				),
			)
		);
	}
}
