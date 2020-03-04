<?php
/* footer config */
if ( ! function_exists( 'pixwell_register_options_footer' ) ) {
	function pixwell_register_options_footer() {
		return array(
			'id'     => 'pixwell_config_section_footer',
			'title'  => esc_html__( 'Footer Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for your site footer. Navigate to Appearance > Widgets to add widgets to footer sections.', 'pixwell' ),
			'icon'   => 'el el-th',
			'fields' => array(

				array(
					'id'     => 'section_start_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Style Settings', 'pixwell' ),
					'indent' => true,
				),
				array(
					'id'          => 'footer_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Footer Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'select a background for the footer: image, color, etc', 'pixwell' ),
					'default'     => array(),
					'output'      => array( '.footer-wrap' )
				),
				array(
					'id'       => 'footer_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a color style for footer text.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'dark'
				),
				array(
					'id'       => 'footer_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Footer Logo', 'pixwell' ),
					'subtitle' => esc_html__( 'Select or upload the footer logo (auto*240px), allowed extensions are .jpg, .png and .gif.', 'pixwell' )
				),
				array(
					'id'       => 'footer_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Icons', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable social icons in the footer.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'footer_social_color',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Icons Color', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable color for social icons.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'footer_menu',
					'type'     => 'switch',
					'title'    => esc_html__( 'Footer Menu', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable menu in the footer.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'             => 'footer_menu_font',
					'type'           => 'typography',
					'title'          => esc_html__( 'Footer Menu Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'select font values for the footer menu.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-size: 16px | font-weight: 700 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'all_styles'     => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array(
						'.footer-menu-inner'
					)
				),
				array(
					'id'     => 'section_end_meta_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				array(
					'id'     => 'section_start_footer_widget',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer Widget Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'footer_widget_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Widget Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the widget section at the footer.', 'pixwell' ),
					'options'  => array(
						'1' => esc_html__( '4 Columns', 'pixwell' ),
						'2' => esc_html__( '4 Columns with 1st Big', 'pixwell' )
					),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_footer_widget',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_footer_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Copyright Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'footer_copyright',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Copyright Text', 'pixwell' ),
					'subtitle' => esc_html__( 'input your copyright text or HTML.', 'pixwell' ),
					'default'  => '',
				),
				array(
					'id'     => 'section_end_footer_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}
