<?php
/* color config */
if ( ! function_exists( 'pixwell_register_options_color' ) ) {
	function pixwell_register_options_color() {
		return array(
			'id'     => 'pixwell_config_section_color',
			'title'  => esc_html__( 'Color Settings', 'pixwell' ),
			'desc'   => esc_html__( 'select color options for your site.', 'pixwell' ),
			'icon'   => 'el el-tint',
			'fields' => array(
				array(
					'id'     => 'section_start_global_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Global Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'          => 'global_color',
					'title'       => esc_html__( 'Global Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'select global color, It will be used for all links, menu, category overlays, main page and many contrasting elements. leave blank if you want set as defaults.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'hyperlink_color',
					'title'       => esc_html__( 'Hyperlink Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a color value for the hyperlink, this option will override on default theme color, Leave blank if you want to set as defaults.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'review_color',
					'title'       => esc_html__( 'Review Icon Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a color value for the review icon, Leave blank if you want to set as defaults.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'popup_bg_color',
					'title'       => esc_html__( 'Gallery Popup Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a color gallery popup, Support dark colors. Leave blank if you want to set as defaults (#111111).', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_global_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}
