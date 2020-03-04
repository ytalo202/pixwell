<?php
/** amp panel */
if ( ! function_exists( 'pixwell_register_options_amp' ) ) {
	function pixwell_register_options_amp() {
		if ( function_exists( 'amp_init' ) ) {
			return array(
				'id'    => 'pixwell_config_section_amp',
				'title' => esc_html__( 'AMP Settings', 'pixwell' ),
				'desc'  => esc_html__( 'Select options for the shop.', 'pixwell' ),
				'icon'  => 'el el-shopping-cart'
			);
		} else {
			return array(
				'id'     => 'pixwell_config_section_amp',
				'title'  => esc_html__( 'AMP Settings', 'pixwell' ),
				'desc'   => esc_html__( 'Select options for AMP settings.', 'pixwell' ),
				'icon'   => 'el el-road',
				'fields' => array(
					array(
						'id'    => 'amp_info_warning',
						'type'  => 'info',
						'title' => esc_html__( 'AMP Plugin is missing!', 'pixwell' ),
						'style' => 'warning',
						'desc'  => html_entity_decode( esc_html__( 'Accelerated Mobile Pages support, Please install <a target="_blank" href=\"https://wordpress.org/plugins/amp\">Automattic AMP</a> plugin to activate the features.', 'pixwell' ) ),
					),
				)
			);
		}
	}
}

/** general settings */
if ( ! function_exists( 'pixwell_register_options_amp_general' ) ) {
	function pixwell_register_options_amp_general() {
		return array(
			'id'         => 'pixwell_config_section_amp_general',
			'title'      => esc_html__( 'General Settings', 'pixwell' ),
			'desc'       => esc_html__( 'Select options for the AMP page.', 'pixwell' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_amp_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'amp_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Logo Upload', 'pixwell' ),
					'subtitle' => esc_html__( 'upload your AMP logo, allowed extensions are .jpg, .png and .gif.', 'pixwell' )
				),
				array(
					'id'       => 'amp_top_menu',
					'type'     => 'select',
					'data'     => 'menu',
					'title'    => esc_html__( 'Top Menu', 'pixwell' ),
					'subtitle' => esc_html__( 'Aside a menu for the AMP menu toggle button.', 'pixwell' )
				),
				array(
					'id'     => 'section_end_amp_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

/** footer settings */
if ( ! function_exists( 'pixwell_register_options_amp_footer' ) ) {
	function pixwell_register_options_amp_footer() {
		return array(
			'id'         => 'pixwell_config_section_amp_footer',
			'title'      => esc_html__( 'Footer Settings', 'pixwell' ),
			'desc'       => esc_html__( 'Select options for the AMP footer.', 'pixwell' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_amp_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer Settings', 'pixwell' ),
					'indent' => true,
				),
				array(
					'id'       => 'amp_back_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Back to Top', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the back to top button.', 'pixwell' )
				),
				array(
					'id'       => 'amp_footer_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Footer Logo', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload AMP footer logo, allowed extensions are .jpg, .png and .gif.', 'pixwell' )
				),
				array(
					'id'    => 'amp_copyright_text',
					'type'  => 'textarea',
					'title' => esc_html__( 'Copyright Text', 'pixwell' ),
				),
				array(
					'id'       => 'amp_footer_menu',
					'type'     => 'select',
					'data'     => 'menu',
					'title'    => esc_html__( 'Footer Menu', 'pixwell' ),
					'subtitle' => esc_html__( 'Aside a menu for the AMP footer.', 'pixwell' )
				),
				array(
					'id'          => 'amp_footer_color',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Footer Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select text color for the footer.', 'pixwell' )
				),
				array(
					'id'          => 'amp_footer_bg',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Footer Background Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select background color for the footer.', 'pixwell' )
				),
				array(
					'id'     => 'section_end_amp_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}
