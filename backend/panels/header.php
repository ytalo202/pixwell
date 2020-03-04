<?php
/** header config */
if ( ! function_exists( 'pixwell_register_options_header' ) ) {
	function pixwell_register_options_header() {
		return array(
			'id'    => 'pixwell_config_section_header',
			'title' => esc_html__( 'Header Settings', 'pixwell' ),
			'desc'  => esc_html__( 'Select options for your site header.', 'pixwell' ),
			'icon'  => 'el el-th'
		);
	}
}


/** general config */
if ( ! function_exists( 'pixwell_register_options_header_general' ) ) {
	function pixwell_register_options_header_general() {
		return array(
			'id'         => 'pixwell_config_section_header_general',
			'title'      => esc_html__( 'Header Style', 'pixwell' ),
			'icon'       => 'el el-lines',
			'subsection' => true,
			'desc'       => esc_html__( 'Select layout and other options for the header.', 'pixwell' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_header_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header Style', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'header_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select default style for your site header.', 'pixwell' ),
					'options'  => array(
						'1' => esc_html__( '-- Style 1 (Minimalist Left Menu) --', 'pixwell' ),
						'2' => esc_html__( 'Style 2 (Minimalist Right Menu)', 'pixwell' ),
						'3' => esc_html__( 'Style 3 (Elegant Centered Style)', 'pixwell' ),
						'4' => esc_html__( 'Style 4 (Full Wide)', 'pixwell' ),
						'5' => esc_html__( 'Style 5 (Classic Magazine)', 'pixwell' ),
						'6' => esc_html__( 'Style 6 (Elegant Centered Dark Style)', 'pixwell' ),
						'7' => esc_html__( 'Style 7 (Vintage Top Navigation)', 'pixwell' ),
					),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_header_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_header_trend_section',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Trending Section', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'header_trend',
					'type'     => 'switch',
					'title'    => esc_html__( 'Trending Section', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the trending section at the header. This section will display popular view posts.', 'pixwell' ),
					'desc'     => esc_html__( 'Require to install and active the Post View Counter plugin.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'trend_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Trending Header', 'pixwell' ),
					'subtitle' => esc_html__( 'Input title for this section.', 'pixwell' ),
					'default'  => esc_html__( 'Trending Now', 'pixwell' )
				),
				array(
					'id'       => 'trend_filter',
					'type'     => 'select',
					'title'    => esc_html__( 'Trending Filter', 'pixwell' ),
					'subtitle' => esc_html__( 'Select filter for this section.', 'pixwell' ),
					'options'  => array(
						'0'         => esc_html__( 'All Time', 'pixwell' ),
						'popular_m' => esc_html__( 'Last 30 Days', 'pixwell' ),
						'popular_w' => esc_html__( 'Last 7 Days', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'     => 'section_end__header_trend_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_banner_section',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Additional Settings for Header Style 3, 6 & 7', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'header_subscribe_image',
					'type'     => 'media',
					'title'    => esc_html__( 'Header Banner - Subscribe Thumbnail', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload a subscribe thumbnail (70*50px). This feature will only apply to the Header style 3, 6 and 7.', 'pixwell' ),
				),
				array(
					'id'       => 'header_subscribe_desc',
					'type'     => 'text',
					'title'    => esc_html__( 'Header Banner - Subscribe Small Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Input subscribe button text. This feature will only apply to the Header style 3,6 and 7.', 'pixwell' ),
					'default'  => esc_html__( 'Get Our Newsletter', 'pixwell' )
				),
				array(
					'id'       => 'header_subscribe_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Header Banner - Subscribe Button Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input subscribe button text. This feature will only apply to the Header style 3,6 and 7.', 'pixwell' ),
					'default'  => esc_html__( 'SUBSCRIBE', 'pixwell' )
				),
				array(
					'id'       => 'header_subscribe_url',
					'type'     => 'text',
					'title'    => esc_html__( 'Header Banner - Subscribe URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your subscribe form URL destination. This feature will only apply to the Header style 3,6 and 7.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_banner_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_header_style_3',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Additional Settings for Header Style 3', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'          => 'header_banner_color',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Header 3 - Banner Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a text color for header style 3, Default is based on the site body color.', 'pixwell' ),
					'default'     => '',
				),
				array(
					'id'     => 'section_end_header_style_3',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_header_style_6',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Additional Settings for Header Style 6', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'header_banner_background',
					'type'     => 'background',
					'title'    => esc_html__( 'Header 6 - Banner Background', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a dark background color for header style 6. Default is solid color: #111', 'pixwell' ),
					'output'   => array( '.header-6 .banner-wrap' )
				),
				array(
					'id'     => 'section_end_header_style_6',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

/** top bar config */
if ( ! function_exists( 'pixwell_register_options_topbar' ) ) {
	function pixwell_register_options_topbar() {
		return array(
			'id'         => 'pixwell_config_section_topbar',
			'title'      => esc_html__( 'Top Bar', 'pixwell' ),
			'icon'       => 'el el-lines',
			'subsection' => true,
			'desc'       => esc_html__( 'Select options for the top bar.', 'pixwell' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top Bar', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'topbar',
					'title'    => esc_html__( 'Top Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the top bar. This option only applies if you remove the menu that has been assigned for the top bar in Appearance > Menu.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'topbar_width',
					'type'     => 'select',
					'title'    => esc_html__( 'Top Bar Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select width style for the top bar.', 'pixwell' ),
					'options'  => array(
						'0' => esc_html__( 'Has Wrapper', 'pixwell' ),
						'1' => esc_html__( 'FullWidth', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'topbar_phone',
					'title'    => esc_html__( 'Phone Number Info', 'pixwell' ),
					'subtitle' => esc_html__( 'input your company phone, Leave blank if you want to remove it.', 'pixwell' ),
					'type'     => 'text',
					'default'  => ''
				),
				array(
					'id'       => 'topbar_email',
					'title'    => esc_html__( 'Email Info', 'pixwell' ),
					'subtitle' => esc_html__( 'input your email info, Leave blank if you want to remove it.', 'pixwell' ),
					'type'     => 'text',
					'default'  => ''
				),
				array(
					'id'       => 'topbar_link_action',
					'title'    => esc_html__( 'Links Action', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable link to send email and call action.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'topbar_social',
					'title'    => esc_html__( 'Social Icons', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable social icons at the top bar.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'          => 'topbar_gradient',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Top bar Background (Gradient)', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select background color for the top bar, Leave blank "To" if you would like to set a solid color. Default is #333', 'pixwell' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => array(
						'from' => '',
						'to'   => '',
					),
				),
				array(
					'id'       => 'topbar_line',
					'title'    => esc_html__( 'Top Line', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable a small full-wide line at the top of topbar.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'          => 'topbar_line_gradient',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Top Line Background (Gradient)', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select background color for the top line, Leave blank "To" if you would like to set a solid color.', 'pixwell' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => array(
						'from' => '',
						'to'   => '',
					),
				),
				array(
					'id'             => 'font_topbar',
					'type'           => 'typography',
					'title'          => esc_html__( 'Top Bar Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font value for the top bar. Leave blank option if you would like to set as the default value.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-size: 13px | font-weight: 400 | color: #fff ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'all_styles'     => true,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => '',
						'font-weight'    => '',
						'font-size'      => '',
						'color'          => '',
						'text-transform' => '',
						'letter-spacing' => '',
					),
					'output'         => array( '.topbar-wrap' )
				),
				array(
					'id'             => 'font_topbar_menu',
					'type'           => 'typography',
					'title'          => esc_html__( 'Top Bar Menu Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font value for the top bar menu, Leave blank option if you would like to set as the default value.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-size: 13px | font-weight: 500 | color: #fff ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'all_styles'     => true,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => '',
						'font-weight'    => '',
						'font-size'      => '',
						'text-transform' => '',
						'letter-spacing' => '',
					),
					'output'         => array( '.topbar-menu' )
				),
				array(
					'id'     => 'section_end_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}


/** menu config */
if ( ! function_exists( 'pixwell_register_options_main_menu' ) ) {
	function pixwell_register_options_main_menu() {
		return array(
			'id'         => 'pixwell_config_section_main_menu',
			'title'      => esc_html__( 'Main Navigation', 'pixwell' ),
			'icon'       => 'el el-lines',
			'subsection' => true,
			'desc'       => esc_html__( 'Select options for the main navigation.', 'pixwell' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_main_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Main Navigation', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'navbar_height',
					'type'     => 'text',
					'validate' => 'number',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Menu (Navigation) Bar Height', 'pixwell' ),
					'subtitle' => esc_html__( 'Select height value for the main navigation bar (in pixel), Default is 60px.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'navbar_sticky',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sticky Menu Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sticky feature for the main menu (navigation).', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'navbar_sticky_smart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smart Sticky', 'pixwell' ),
					'subtitle' => esc_html__( 'Only stick the main menu when scrolling up.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'sticky_height',
					'type'     => 'text',
					'validate' => 'number',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Sticky Bar Height', 'pixwell' ),
					'subtitle' => esc_html__( 'Select height value for the main navigation bar (in pixel) with sticky, This setting will override on "Menu (Navigation) Bar Height".', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'offcanvas_toggle',
					'type'     => 'switch',
					'title'    => esc_html__( 'Left Side Section Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the left side section button in the header.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'navbar_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Icons', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable social icons at the left of the main navigation bar.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'navbar_cart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Cart Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the cart icon at the right of the main navigation bar.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'navbar_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the search icon at the right of the main navigation bar.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'navbar_search_ajax',
					'type'     => 'switch',
					'title'    => esc_html__( 'Live Search Results', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable ajax search for this section.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_main_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_navbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Main Menu Typography', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_navbar',
					'type'           => 'typography',
					'title'          => esc_html__( 'Main Menu Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for the main menu. Leave blank option if you would like to set as the default value.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Quicksand | font-size: 16px | font-weight: 600 ]', 'pixwell' ),
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
					'output'         => array( '.main-menu > li > a', '.off-canvas-menu > li > a' )
				),
				array(
					'id'             => 'font_navbar_sub',
					'type'           => 'typography',
					'title'          => esc_html__( 'Main Sub Menu Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font for sub-item of the main menu. Recommended: select the same font-family with the main menu to reduce the time load.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-size: 14px | font-weight: 500  ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'all_styles'     => false,
					'line-height'    => false,
					'units'          => 'px',
					'output'         => array( '.main-menu .sub-menu:not(.sub-mega)', '.off-canvas-menu .sub-menu' )
				),
				array(
					'id'     => 'section_end_font_navbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_header_navbar_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Main Menu Background & Text', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'          => 'navbar_bg',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Main Menu Bar Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select background color for the main menu (navigation) bar, Leave blank "To" if you would like to set a solid color. Default is #fff', 'pixwell' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => array(
						'from' => '',
						'to'   => '',
					),
				),
				array(
					'id'          => 'navbar_color',
					'title'       => esc_html__( 'Menu - Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a color value for main navigation text. Leave blank if you want to set as default.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'navbar_color_hover',
					'title'       => esc_html__( 'Menu - Hover Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a color when hovering on main navigation text. Leave blank if you want to set as default.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'       => 'navbar_shadow',
					'type'     => 'switch',
					'title'    => esc_html__( 'Menu - Dark Shadow', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the dark shadow for the main navigation bar.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'          => 'navsub_bg',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Main Sub Menu Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select background color for the sub-items, Leave blank "To" if you would like to set a solid color. Default is #fff', 'pixwell' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => array(
						'from' => '',
						'to'   => '',
					),
				),
				array(
					'id'          => 'navsub_color',
					'title'       => esc_html__( 'Sub Menu Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a color value for submenu text. Leave blank if you want to set as default.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'navsub_color_hover',
					'title'       => esc_html__( 'Sub Menu Text Hover Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select text color when hovering on sub-menu text. Please leave blank if you want to set as default.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'       => 'mega_menu_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Mega Menu Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select text style for mega menus to fit with your sub menu background setting.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'dark'
				),
				array(
					'id'     => 'section_end_header_navbar_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

/** header mobile config */
if ( ! function_exists( 'pixwell_register_options_header_mobile' ) ) {
	function pixwell_register_options_header_mobile() {
		return array(
			'id'         => 'pixwell_config_section_header_mobile',
			'title'      => esc_html__( 'Mobile Header', 'pixwell' ),
			'icon'       => 'el el-lines',
			'subsection' => true,
			'desc'       => esc_html__( 'Select options for the mobile header.', 'pixwell' ),
			'fields'     => array(
				array(
					'id'       => 'mobile_nav_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Mobile Navigation Bar Height', 'pixwell' ),
					'subtitle' => esc_html__( 'Select height value for the mobile navigation bar (in pixel), Default is 60px.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'mobile_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable search icon at the right of the main navigation bar on mobile devices.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'mobile_bookmark',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable Read it Later icon at the right of the main navigation bar on mobile devices.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'mobile_cart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Cart Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the cart icon at the right of the main navigation bar.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'          => 'mobile_nav_bg',
					'type'        => 'color_gradient',
					'title'       => esc_html__( 'Mobile Navigation Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select background color for the mobile navigation bar, Leave blank "To" if you would like to set a solid color. Default is #fff', 'pixwell' ),
					'validate'    => 'color',
					'transparent' => false,
					'default'     => array(
						'from' => '',
						'to'   => '',
					),
				),
				array(
					'id'          => 'mobile_nav_color',
					'title'       => esc_html__( 'Menu - Text Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a color value for mobile navigation text. Leave blank if you want to set as default (#111111).', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'       => 'mobile_logo_pos',
					'type'     => 'select',
					'title'    => esc_html__( 'Mobile Logo Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select the position of the mobile logo.', 'pixwell' ),
					'options'  => array(
						'center' => esc_html__( 'Center Position', 'pixwell' ),
						'left'   => esc_html__( 'Left Position', 'pixwell' ),
					),
					'default'  => 'center'
				),
			)
		);
	}
};


/** transparent */
if ( ! function_exists( 'pixwell_register_options_header_transparent' ) ) {
	function pixwell_register_options_header_transparent() {
		return array(
			'id'         => 'pixwell_config_section_header_transparent',
			'title'      => esc_html__( 'Header Transparent', 'pixwell' ),
			'icon'       => 'el el-lines',
			'subsection' => true,
			'desc'       => esc_html__( 'Select options for the transparent header.', 'pixwell' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_header_transparent',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header Transparent Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'transparent_header_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Transparent Header Width', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a width style for the transparent header.', 'pixwell' ),
					'options'  => array(
						0 => esc_html__( 'Wrapper', 'pixwell' ),
						1 => esc_html__( 'Full Wide', 'pixwell' ),
					),
					'default'  => 0,
				),
				array(
					'id'       => 'transparent_header_bg',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Transparent Header Background', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a color background for the transparent header (allow opacity value), Default is transparent.', 'pixwell' ),
				),
				array(
					'id'       => 'transparent_header_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Transparent Header - Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select text style for then transparent header to fit with your background setting.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'light'
				),
				array(
					'id'     => 'section_end_header_transparent',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
};


/** left-side section config */
if ( ! function_exists( 'pixwell_register_options_off_canvas' ) ) {
	function pixwell_register_options_off_canvas() {
		return array(
			'id'     => 'pixwell_config_section_off_canvas',
			'title'  => esc_html__( 'Left Side Section', 'pixwell' ),
			'icon'   => 'el el-lines',
			'desc'   => esc_html__( 'Select options for the left side section. This section will display main menu on mobile devices.', 'pixwell' ),
			'fields' => array(
				array(
					'id'     => 'section_start_header_offcanvas',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Left Side Section Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'    => 'off_canvas_notice',
					'type'  => 'info',
					'title' => esc_html__( 'Left Side Section Notice:', 'pixwell' ),
					'style' => 'success',
					'desc'  => esc_html__( 'This section requests to setup menu in Appearance > Menu > Manage Locations > Left Aside Menu', 'pixwell' ),
				),
				array(
					'id'       => 'off_canvas_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Section Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select color style for the left side section section. this section display your site menu on mobile devices.', 'pixwell' ),
					'options'  => array(
						'dark'  => esc_html__( 'Dark Style', 'pixwell' ),
						'light' => esc_html__( 'Light Style', 'pixwell' )
					),
					'default'  => 'dark'
				),
				array(
					'id'          => 'off_canvas_bg',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Background Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select custom background color for this section (Recommended background size: 320x250px).', 'pixwell' ),
					'default'     => ''
				),
				array(
					'id'       => 'off_canvas_header_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Section Top Logo', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload a logo image for the header section (Recommended a light logo and the height: 90px).', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'off_canvas_header_logo_height',
					'type'     => 'text',
					'validate' => 'numeric',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Logo Max Height', 'pixwell' ),
					'subtitle' => esc_html__( 'Select max height value for the logo, default is 90px.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'off_canvas_header_bg',
					'type'     => 'media',
					'title'    => esc_html__( 'Section Top Background', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload a background image for this section. Recommended a dark image.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'off_canvas_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Icons', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable social icons in the left side section section.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'off_canvas_subscribe',
					'type'     => 'switch',
					'title'    => esc_html__( 'Subscribe Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the subscribe icon in the left side section section.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'off_canvas_subscribe_text',
					'type'     => 'text',
					'required' => array( 'off_canvas_subscribe', '=', '1' ),
					'title'    => esc_html__( 'Subscribe Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input subscribe button text.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'off_canvas_subscribe_url',
					'type'     => 'text',
					'required' => array( 'off_canvas_subscribe', '=', '1' ),
					'title'    => esc_html__( 'Subscribe URL', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your subscribe form URL destination.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'off_canvas_bookmark',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the Read it Later in the left side section section.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'off_canvas_cart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Cart Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the cart icon in the left side section section.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_header_offcanvas',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}