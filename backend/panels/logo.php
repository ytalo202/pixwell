<?php
/** site logo */
if ( ! function_exists( 'pixwell_register_options_logo' ) ) {
	function pixwell_register_options_logo() {
		return array(
			'id'     => 'pixwell_config_section_site_logo',
			'title'  => esc_html__( 'Logo Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select or upload logos for you website. To setup favicon, Navigate to Appearance > Customize > Site Identity > Site Icon.', 'pixwell' ),
			'icon'   => 'el el-star',
			'fields' => array(
				array(
					'id'     => 'section_start_site_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Upload Logos', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'site_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Logo - Main site', 'pixwell' ),
					'subtitle' => esc_html__( 'Select or upload site logo, allowed extensions are .jpg, .png and .gif.', 'pixwell' )
				),
				array(
					'id'       => 'retina_site_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Retina Logo - Main Site', 'pixwell' ),
					'subtitle' => esc_html__( 'Select or upload retina (2x) logo, allowed extensions are .jpg, .png and .gif', 'pixwell' )
				),
				array(
					'id'       => 'mobile_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Logo - Mobile Devices', 'pixwell' ),
					'subtitle' => esc_html__( 'upload logo for displaying on mobile devices (height recommended for logo image: 120px) , allowed extensions are .jpg, .png and .gif', 'pixwell' )
				),
				array(
					'id'       => 'sticky_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Logo - Sticky Menu', 'pixwell' ),
					'subtitle' => esc_html__( 'Select or upload the sticky logo (height recommended for logo image: 60px), allowed extensions are .jpg, .png and .gif', 'pixwell' )
				),
				array(
					'id'       => 'retina_sticky_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Retina Logo - Sticky Menu', 'pixwell' ),
					'subtitle' => esc_html__( 'Select or upload the retina (2x) sticky logo (height recommended for logo image: 120px), allowed extensions are .jpg, .png and .gif', 'pixwell' )
				),
				array(
					'id'       => 'site_logo_float',
					'type'     => 'media',
					'title'    => esc_html__( 'Logo - Transparent Header', 'pixwell' ),
					'subtitle' => esc_html__( 'Select or upload transparent logo (height recommended for logo image: 60px), allowed extensions are .jpg, .png and .gif', 'pixwell' )
				),
				array(
					'id'       => 'retina_site_logo_float',
					'type'     => 'media',
					'title'    => esc_html__( 'Retina Logo - Transparent Header', 'pixwell' ),
					'subtitle' => esc_html__( 'Select or upload retina (2x) transparent logo (height recommended for logo image: 120px), allowed extensions are .jpg, .png and .gif', 'pixwell' )
				),
				array(
					'id'     => 'section_end_site_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Text Logo Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_logo_text',
					'type'           => 'typography',
					'title'          => esc_html__( 'Logo Text Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'select font values for the logo text if you use a logo text.', 'pixwell' ),
					'desc'           => esc_html__( 'Default: Montserrat [ font-size: 32px | font-weight: 900 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'all_styles'     => false,
					'units'          => 'px',
					'output'         => array(
						'.is-logo-text .logo-title'
					)
				),
				array(
					'id'     => 'section_end_font_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}
