<?php
/** typo config */
if ( ! function_exists( 'pixwell_register_options_typo' ) ) {
	function pixwell_register_options_typo() {
		return array(
			'id'    => 'pixwell_config_section_typo',
			'title' => esc_html__( 'Typography Settings', 'pixwell' ),
			'icon'  => 'el el-fontsize',
		);
	}
}

/** body typography */
if ( ! function_exists( 'pixwell_register_options_typo_body' ) ) {
	function pixwell_register_options_typo_body() {
		return array(
			'id'         => 'pixwell_config_section_typo_body',
			'title'      => esc_html__( 'Main Site Body', 'pixwell' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'Select font values for site body. These options will apply to your pages, posts content.', 'pixwell' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_font_body',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Body Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_body',
					'type'           => 'typography',
					'title'          => esc_html__( 'Body Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'these options will apply to almost post and page content on your site.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Poppins | font-size: 16px | font-weight: 400 | color: #333 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'all_styles'     => true,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( 'html' )
				),
				array(
					'id'             => 'font_excerpt',
					'type'           => 'typography',
					'title'          => esc_html__( 'Post Summary Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'these options will apply to for the post excerpt on your site.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Poppins | font-size: 13px | font-weight: 400 | color: #666 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'output'         => array(
						'.p-wrap .entry-summary',
						'.twitter-content.entry-summary',
						'.author-description',
						'.rssSummary'
					)
				),
				array(
					'id'            => 'font_size_mobile',
					'type'          => 'slider',
					'title'         => esc_html__( 'Content Font Size on Mobiles', 'pixwell' ),
					'subtitle'      => esc_html__( 'Select a percent font size value (%) for page/post content to display on mobile devices.', 'pixwell' ),
					'default'       => 90,
					'min'           => 1,
					'step'          => 1,
					'max'           => 100,
					'display_value' => 'label'
				),
				array(
					'id'     => 'section_end_font_body',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}


/** heading tags typo */
if ( ! function_exists( 'pixwell_register_options_typo_title' ) ) {
	function pixwell_register_options_typo_title() {
		return array(
			'id'         => 'pixwell_config_section_typo_title',
			'title'      => esc_html__( 'Post Title - H Tags', 'pixwell' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'Select font value for header tags (H1 -> H6) Those options below also apply to the post titles.', 'pixwell' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_font_h1',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H1 Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_h1',
					'type'           => 'typography',
					'title'          => esc_html__( 'H1 Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the H1 tag and [ CSS classname: .h1 ]', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-weight: 700 | color: #333 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-weight'    => true,
					'font-size'      => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( 'h1, .h1' )
				),
				array(
					'id'       => 'font_h1_size',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H1 - Font Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on desktop devices, Leave blank if you want to set as the default.', 'pixwell' ),
					'desc'     => esc_html__( 'Default font-size: 40px. If you input font size, please add value for responsive settings too.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h1_size_mobile',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H1 - Mobile Font Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on mobile devices (screen width < 768px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h1_size_tablet',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H1 - Tablet Font Size (Vertical)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 992px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h1_size_tablet_hoz',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H1 - Tablet Font Size (Horizontal)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 1024px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'     => 'section_end_font_h1',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_h2',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H2 Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_h2',
					'type'           => 'typography',
					'title'          => esc_html__( 'H2 Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the H2 tag and [ CSS classname: .h2 ]', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-weight: 700 | color: #333 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-weight'    => true,
					'font-size'      => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( 'h2, .h2' )
				),
				array(
					'id'       => 'font_h2_size',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H2 - Font Size', 'pixwell' ),
					'desc'     => esc_html__( 'Default font-size: 26px. If you input font size, please add value for responsive settings too.', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on desktop devices, Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h2_size_mobile',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H2 - Mobile Font Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on mobile devices (screen width < 768px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h2_size_tablet',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H2 - Tablet Font Size (Vertical)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 992px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h2_size_tablet_hoz',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H2 - Tablet Font Size (Horizontal)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 1024px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'     => 'section_end_font_h2',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_h3',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H3 Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_h3',
					'type'           => 'typography',
					'title'          => esc_html__( 'H3 Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the H3 tag and [ CSS classname: .h3 ]', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-weight: 700 | color: #333 ]. ', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-weight'    => true,
					'font-size'      => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( 'h3, .h3' )
				),
				array(
					'id'       => 'font_h3_size',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H3 - Font Size', 'pixwell' ),
					'desc'     => esc_html__( 'Default font-size: 20px. If you input font size, please add value for responsive settings too.', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on desktop devices, Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h3_size_mobile',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H3 - Mobile Font Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on mobile devices (screen width < 768px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h3_size_tablet',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H3 - Tablet Font Size (Vertical)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 992px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h3_size_tablet_hoz',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H3 - Tablet Font Size (Horizontal)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 1024px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'     => 'section_end_font_h3',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_h4',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H4 Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_h4',
					'type'           => 'typography',
					'title'          => esc_html__( 'H4 Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the H4 tag and [ CSS classname: .h4 ]', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-weight: 700 | color: #333 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-weight'    => true,
					'font-size'      => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( 'h4, .h4' )
				),
				array(
					'id'       => 'font_h4_size',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H4 - Font Size', 'pixwell' ),
					'desc'     => esc_html__( 'Default font-size: 16px. If you input font size, please add value for responsive settings too.', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on desktop devices, Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h4_size_mobile',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H4 - Mobile Font Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on mobile devices (screen width < 768px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h4_size_tablet',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H4 - Tablet Font Size (Vertical)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 992px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h4_size_tablet_hoz',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H4 - Tablet Font Size (Horizontal)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 1024px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'     => 'section_end_font_h4',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_h5',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H5 Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_h5',
					'type'           => 'typography',
					'title'          => esc_html__( 'H5 Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the H5 tag and [ CSS classname: .h5 ]', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-weight: 700 | color: #333 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-weight'    => true,
					'font-size'      => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( 'h5, .h5' )
				),
				array(
					'id'       => 'font_h5_size',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H5 - Font Size', 'pixwell' ),
					'desc'     => esc_html__( 'Default font-size: 15px. If you input font size, please add value for responsive settings too.', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on desktop devices, Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h5_size_mobile',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H5 - Mobile Font Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on mobile devices (screen width < 768px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h5_size_tablet',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H5 - Tablet Font Size (Vertical)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 992px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h5_size_tablet_hoz',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H5 - Tablet Font Size (Horizontal)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 1024px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'     => 'section_end_font_h5',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_h6',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H6 Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_h6',
					'type'           => 'typography',
					'title'          => esc_html__( 'Font H6', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the H6 tag and [ CSS classname: .h6 ]', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-weight: 700 | color: #333 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-weight'    => true,
					'font-size'      => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( 'h6, .h6' )
				),
				array(
					'id'       => 'font_h6_size',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H6 - Font Size', 'pixwell' ),
					'desc'     => esc_html__( 'Default font-size: 14px. If you input font size, please add value for responsive settings too.', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on desktop devices, Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h6_size_mobile',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H6 - Mobile Font Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on mobile devices (screen width < 768px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h6_size_tablet',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H6 - Tablet Font Size (Vertical)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 992px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'       => 'font_h6_size_tablet_hoz',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'H6 - Tablet Font Size (Horizontal)', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for this heading tag on tablet devices (screen width < 1024px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'     => 'section_end_font_h6',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_title_transform',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Title - Text Transform Uppercase', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'title_uppercase',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Title - Uppercase Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable text-transform uppercase for the post title. This option will only apply to the post title (without H tags)', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_title_transform',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

/** entry meta typography */
if ( ! function_exists( 'pixwell_register_options_typo_meta' ) ) {
	function pixwell_register_options_typo_meta() {
		return array(
			'id'         => 'pixwell_config_section_typo_meta',
			'title'      => esc_html__( 'Post Entry Meta', 'pixwell' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'Select font values for all post entry meta info in your site.', 'pixwell' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_section_font_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Meta Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_cat_icon',
					'type'           => 'typography',
					'title'          => esc_html__( 'Category Icon Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the category icon display in featured thumbnails.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Montserrat | font-size: 11px | font-weight: 700 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'all_styles'     => false,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( '.p-cat-info' )
				),
				array(
					'id'             => 'font_post_meta',
					'type'           => 'typography',
					'title'          => esc_html__( 'Entry Meta Info Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for entry meta info: date, view, comment... Those options will not apply to the author meta.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Montserrat | font-size: 11px | font-weight: 500 | color: #777 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'all_styles'     => false,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'output'         => array( '.p-meta-info, .wp-block-latest-posts__post-date' )
				),
				array(
					'id'             => 'font_post_meta_author',
					'type'           => 'typography',
					'title'          => esc_html__( 'Author Meta Info Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'select special font values for the author meta info. This option will also apply to sponsor brand meta info.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Montserrat | font-size: 11px | font-weight: 600 | color: #333 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'all_styles'     => false,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'output'         => array( '.meta-info-author.author' )
				),
				array(
					'id'     => 'section_end_section_font_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_section_font_btn',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Button Typography Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_button',
					'type'           => 'typography',
					'title'          => esc_html__( 'Button Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the readmore button and other buttons in your site...', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Montserrat | font-size: 11px | font-weight: 600 | color: #333 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'all_styles'     => false,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px'
				),
				array(
					'id'             => 'font_input',
					'type'           => 'typography',
					'title'          => esc_html__( 'Input/Label Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for all input and label on your site.', 'pixwell' ),
					'desc'           => esc_html__( 'Default  [ font-family: Montserrat | font-size: 14px | font-weight: 400 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'all_styles'     => false,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px'
				),
				array(
					'id'             => 'font_breadcrumb',
					'type'           => 'typography',
					'title'          => esc_html__( 'Breadcrumb Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for breadcrumb bar, This option will also apply to small other elements ie: caption, pagination...', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Montserrat | font-size: 12px | font-weight: 600 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'all_styles'     => false,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( '.breadcrumb' )
				),
				array(
					'id'     => 'section_end_section_font_btn',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}


/** heading typography */
if ( ! function_exists( 'pixwell_register_options_typo_heading' ) ) {
	function pixwell_register_options_typo_heading() {
		return array(
			'id'         => 'pixwell_config_section_typo_heading',
			'title'      => esc_html__( 'Block/Widget Header', 'pixwell' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'Select font values for block and widget header.', 'pixwell' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_font_heading_block',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'FW/Content Sections', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_header_block',
					'type'           => 'typography',
					'title'          => esc_html__( 'Header Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the header of content and fullwidth blocks.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-size: 20px | font-weight: 700 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'all_styles'     => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'output'         => array( '.block-title, .block-header .block-title' )
				),
				array(
					'id'       => 'font_header_block_size_mobile',
					'type'     => 'text',
					'validate' => 'number',
					'title'    => esc_html__( 'Block header - Mobile Font Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select font size value (px) for block header on mobile devices (screen width < 768px), Leave blank if you want to set as the default.', 'pixwell' ),
				),
				array(
					'id'             => 'font_header_filter',
					'type'           => 'typography',
					'title'          => esc_html__( 'Quick Filter Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the ajax quick filter bar and the view more link.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Montserrat | font-size: 11px | font-weight: 600 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'all_styles'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'output'         => array( '.ajax-quick-filter', '.block-view-more' )
				),
				array(
					'id'     => 'section_end_font_heading_block',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_heading_widget',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sidebar Widgets', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_header_widget',
					'type'           => 'typography',
					'title'          => esc_html__( 'Widget Header Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the sidebar widget header. These options will apply to sidebar widgets and other sections.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-size: 18px | font-weight: 700 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'all_styles'     => false,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( '.widget-title' )
				),
				array(
					'id'             => 'font_widget_menu',
					'type'           => 'typography',
					'title'          => esc_html__( 'Widget Menu Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the menu widget.', 'pixwell' ),
					'desc'           => esc_html__( 'Default font values based on the post title font settings.', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'all_styles'     => false,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(),
					'output'         => array( 'body .widget.widget_nav_menu .menu-item' )
				),
				array(
					'id'     => 'section_end_font_heading_widget',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}