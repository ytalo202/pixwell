<?php
/** single post config */
if ( ! function_exists( 'pixwell_register_options_single_post' ) ) {
	function pixwell_register_options_single_post() {
		return array(
			'title' => esc_html__( 'Single Post Settings', 'pixwell' ),
			'id'    => 'pixwell_config_section_single_post',
			'desc'  => esc_html__( 'Select options for the single post, Options below will apply to all single post pages.', 'pixwell' ),
			'icon'  => 'el el-file',
		);
	}
}

/** single style */
if ( ! function_exists( 'pixwell_register_options_single_post_styling' ) ) {
	function pixwell_register_options_single_post_styling() {
		return array(
			'title'      => esc_html__( 'Styles & Design', 'pixwell' ),
			'id'         => 'pixwell_config_section_single_post_styling',
			'desc'       => esc_html__( 'Select options for entry meta and other elements in single post pages. Options below will apply to all single post pages.', 'pixwell' ),
			'icon'       => 'el el-adjust-alt',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Meta Style', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_cat_info',
					'type'     => 'switch',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category icon in the single post.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_custom_info',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Entry Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta in the single post.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_avatar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Avatar Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable avatar icon.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_entry_meta',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Bar Manager', 'pixwell' ),
					'subtitle' => esc_html__( 'organize how you want the entry meta info to appear in single post pages.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' )
						),
						'disabled' => array(
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' )
						)
					),
				),
				array(
					'id'     => 'section_end_single_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_featured_section',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'single_feat_size',
					'type'     => 'select',
					'title'    => esc_html__( 'Featured Image Size', 'pixwell' ),
					'subtitle' => esc_html__( 'Select size for the featured image, this option will apply to all single post layouts.', 'pixwell' ),
					'options'  => array(
						'full' => esc_html__( 'Full Size', 'pixwell' ),
						'crop' => esc_html__( 'Crop Size', 'pixwell' )
					),
					'default'  => 'full',
				),
				array(
					'id'       => 'single_post_parallax',
					'type'     => 'switch',
					'title'    => esc_html__( 'Parallax Animation', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable parallax animation when scrolling. This option will affect Full Wide and Full Screen layouts.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_video_autoplay',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Video Auto Play', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable embed featured video.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_gallery_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Gallery Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a default layout for gallery post format.', 'pixwell' ),
					'options'  => array(
						'slide' => esc_html__( 'Slider', 'pixwell' ),
						'list'  => esc_html__( 'List Images', 'pixwell' ),
						'grid'  => esc_html__( 'Small Grid', 'pixwell' )
					),
					'default'  => 'slide'
				),
				array(
					'id'     => 'section_end_single_featured_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			),
		);
	}
}


/** single layout */
if ( ! function_exists( 'pixwell_register_options_single_post_layout' ) ) {
	function pixwell_register_options_single_post_layout() {

		return array(
			'title'      => esc_html__( 'Single Layout', 'pixwell' ),
			'id'         => 'pixwell_config_section_single_post_layout',
			'desc'       => esc_html__( 'Select default layout for the single post page, this option will apply to all single posts page. You can set an individual layout for each post in the Posts > Edit Post > Pixwell Post Options.', 'pixwell' ),
			'icon'       => 'el el-laptop',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'single_post_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Single Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a default layout for the single post pages.', 'pixwell' ),
					'desc'     => esc_html__( 'Some layouts requests FEATURED IMAGE to work, Single layout automatically back to "Classic" if it hasn\'t  featuredimage.', 'pixwell' ),
					'options'  => pixwell_add_settings_single_layouts(),
					'default'  => '1',
				),
				array(
					'id'       => 'single_post_header_align',
					'type'     => 'switch',
					'title'    => esc_html__( 'Layout Classic - Header Center', 'pixwell' ),
					'subtitle' => esc_html__( 'Align the header to the center. This option will apply to the "Classic" layout.', 'pixwell' ),
					'default'  => '0'
				),
				array(
					'id'       => 'single_post_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for single post pages, this option will apply to all single posts pages. You can set an individual sidebar for each post in the post editor page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default'
				),
				array(
					'id'       => 'single_post_sidebar_pos',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for single post pages, this option will override default sidebar position option and will apply to all single post pages, You can set an individual sidebar position for each post in the post editor page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default'
				)
			)
		);
	}
}


/** single sections */
if ( ! function_exists( 'pixwell_register_options_single_post_section' ) ) {
	function pixwell_register_options_single_post_section() {
		return array(
			'title'      => esc_html__( 'Single Sections', 'pixwell' ),
			'id'         => 'pixwell_config_section_single_post_section',
			'desc'       => esc_html__( 'Select options for sections in single post pages.', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_section_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer Content Area', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_tag',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Tags at The Bottom', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the tags bar at the bottom of the post content.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_source',
					'type'     => 'switch',
					'title'    => esc_html__( 'Source Information', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the source bar at the bottom of the post content.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_via',
					'type'     => 'switch',
					'title'    => esc_html__( 'Via Information', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the via bar at the bottom of the post content.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_like',
					'type'     => 'switch',
					'title'    => esc_html__( 'LIKE/TWEET Buttons', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable post like/tweet buttons at the bottom of post contents.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_start_single_section_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_box',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single Boxes/Sections', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_author',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author Card', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the author card in single post pages.', 'pixwell' ),
					'desc'     => esc_html__( 'The author card box requests author information (Users > Your profiles) for displaying.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_navigation',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next/Prev Articles', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the next/previous link navigation in single post pages.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_comment_btn',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show/Hide Comment Button', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable comment box buttons in the single post pages.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_box',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

/** single shares to social */
if ( ! function_exists( 'pixwell_register_options_single_post_share' ) ) {
	function pixwell_register_options_single_post_share() {

		return array(
			'title'      => esc_html__( 'Top & Bottom Shares', 'pixwell' ),
			'id'         => 'pixwell_config_section_single_post_share',
			'desc'       => esc_html__( 'Select options for the share on socials sections.', 'pixwell' ),
			'icon'       => 'el el-share',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_post_total_shares',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'The Total of Shares to Social', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'total_share',
					'type'     => 'switch',
					'title'    => esc_html__( 'Total Shares Counter', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable total shares to socials. The data will count the total of shares from Facebook, Pinterest, and LinkedIn.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_post_total_shares',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_social_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sharing Bar at The Top', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'share_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Top Sharing Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable top share section.  This section will display below the single entry meta info.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_top_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Facebook', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Facebook.', 'pixwell' ),
					'required' => array( 'share_top', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_top_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Twitter', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Twitter.', 'pixwell' ),
					'required' => array( 'share_top', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_top_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Pinterest', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Pinterest.', 'pixwell' ),
					'required' => array( 'share_top', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_top_whatsapp',
					'type'     => 'switch',
					'title'    => esc_html__( 'WhatsApp', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on WhatsApp.', 'pixwell' ),
					'required' => array( 'share_top', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_top_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'LinkedIn', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on LinkedIn.', 'pixwell' ),
					'required' => array( 'share_top', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_top_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tumblr', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Tumblr.', 'pixwell' ),
					'required' => array( 'share_top', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_top_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reddit', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Reddit.', 'pixwell' ),
					'required' => array( 'share_top', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_top_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Vkontakte', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Vkontakte.', 'pixwell' ),
					'required' => array( 'share_top', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_top_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Email.', 'pixwell' ),
					'required' => array( 'share_top', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_post_social_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_social_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sharing Bar at The Bottom Content', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'share_bottom',
					'type'     => 'switch',
					'title'    => esc_html__( 'Bottom Sharing Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the bottom share section, This section will display below the single post content.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_bottom_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Facebook', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Facebook.', 'pixwell' ),
					'required' => array( 'share_bottom', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_bottom_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Twitter', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Twitter.', 'pixwell' ),
					'required' => array( 'share_bottom', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_bottom_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Pinterest', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Pinterest.', 'pixwell' ),
					'required' => array( 'share_bottom', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_bottom_whatsapp',
					'type'     => 'switch',
					'title'    => esc_html__( 'WhatsApp', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on WhatsApp.', 'pixwell' ),
					'required' => array( 'share_bottom', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_bottom_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'LinkedIn', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on LinkedIn.', 'pixwell' ),
					'required' => array( 'share_bottom', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_bottom_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tumblr', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Tumblr.', 'pixwell' ),
					'required' => array( 'share_bottom', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_bottom_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reddit', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Reddit.', 'pixwell' ),
					'required' => array( 'share_bottom', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_bottom_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Vkontakte', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Vkontakte.', 'pixwell' ),
					'required' => array( 'share_bottom', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_bottom_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Email.', 'pixwell' ),
					'required' => array( 'share_bottom', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_post_social_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
			)
		);
	}
}

/** related section */
if ( ! function_exists( 'pixwell_register_options_single_post_related' ) ) {
	function pixwell_register_options_single_post_related() {
		return array(
			'title'      => esc_html__( 'Related Section', 'pixwell' ),
			'id'         => 'pixwell_config_section_single_post_related',
			'desc'       => esc_html__( 'Select options for the related section.', 'pixwell' ),
			'icon'       => 'el el-paper-clip ',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_post_related',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Related Posts Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_related',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Section', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the related section in single post pages.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_related_layout',
					'type'     => 'select',
					'required' => array( 'single_post_related', '=', '1' ),
					'title'    => esc_html__( 'Blog Listing Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the posts listing.', 'pixwell' ),
					'options'  => array(
						'fw_grid_1' => esc_html__( 'FullWidth Grid 1', 'pixwell' ),
						'fw_grid_2' => esc_html__( 'FullWidth Grid 2', 'pixwell' ),
						'fw_list_1' => esc_html__( 'FullWidth List 1', 'pixwell' ),
						'fw_list_2' => esc_html__( 'FullWidth List 2', 'pixwell' ),
					),
					'default'  => 'fw_grid_2'
				),
				array(
					'id'       => 'single_post_related_where',
					'type'     => 'select',
					'required' => array( 'single_post_related', '=', '1' ),
					'title'    => esc_html__( 'Filter Type', 'pixwell' ),
					'subtitle' => esc_html__( 'What posts should be displayed in the related section.', 'pixwell' ),
					'options'  => array(
						'all' => esc_html__( 'Same Tags & Categories', 'pixwell' ),
						'tag' => esc_html__( 'Same Tags', 'pixwell' ),
						'cat' => esc_html__( 'Same Categories', 'pixwell' ),
					),
					'default'  => 'all'
				),
				array(
					'id'       => 'single_post_related_total',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'required' => array( 'single_post_related', '=', '1' ),
					'title'    => esc_html__( 'Number of Posts', 'pixwell' ),
					'subtitle' => esc_html__( 'Select number of posts to show at once.', 'pixwell' ),
					'default'  => 4
				),
				array(
					'id'       => 'single_post_related_pagination',
					'title'    => esc_html__( 'Pagination Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a pagination type for the related block.', 'pixwell' ),
					'type'     => 'select',
					'required' => array( 'single_post_related', '=', '1' ),
					'options'  => array(
						'0'        => esc_html__( 'Disabled', 'pixwell' ),
						'loadmore' => esc_html__( 'Load More', 'pixwell' ),
					),
					'default'  => '0'
				),
				array(
					'id'     => 'section_end_single_post_related',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

/** left content section */
if ( ! function_exists( 'pixwell_register_options_single_post_left' ) ) {
	function pixwell_register_options_single_post_left() {

		return array(
			'id'         => 'pixwell_config_section_single_left',
			'title'      => esc_html__( 'Left Content Section', 'pixwell' ),
			'desc'       => esc_html__( 'Select option to display at the left of the post content.', 'pixwell' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_post_social_left_section',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Left Content Sections Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_left_section',
					'title'    => esc_html__( 'Left Content Section', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the left content section. This section is displayed at the left of single post content.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => '1'
				),
				array(
					'id'       => 'share_left',
					'type'     => 'switch',
					'title'    => esc_html__( 'Left Share Bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the left share bar in the left content section. This option will apply to all posts.', 'pixwell' ),
					'required' => array( 'single_post_left_section', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_left_article',
					'title'    => esc_html__( 'Recommended Article', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the recommended article in the left content section.', 'pixwell' ),
					'required' => array( 'single_post_left_section', '=', '1' ),
					'type'     => 'switch',
					'default'  => '1'
				),
				array(
					'id'     => 'section_end_single_post_left_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_social_left',
					'title'  => esc_html__( 'Share at The Left Content', 'pixwell' ),
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'indent' => true
				),
				array(
					'id'       => 'share_left_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Facebook', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Facebook.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_left_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Twitter', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Twitter.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_left_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Pinterest', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Pinterest.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_left_whatsapp',
					'type'     => 'switch',
					'title'    => esc_html__( 'WhatsApp', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on WhatsApp.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_left_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'LinkedIn', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on LinkedIn.', 'pixwell' ),
					'required' => array( 'share_left', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_left_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tumblr', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Tumblr.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_left_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reddit', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Reddit.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_left_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Vkontakte', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Vkontakte.', 'pixwell' ),
					'required' => array( 'share_left', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_left_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Email.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_post_social_left_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
			)
		);
	}
}


/** infinite load next */
if ( ! function_exists( 'pixwell_register_options_single_next_post' ) ) {
	function pixwell_register_options_single_next_post() {
		return array(
			'id'         => 'pixwell_config_section_single_next',
			'title'      => esc_html__( 'Infinite Next Posts', 'pixwell' ),
			'desc'       => esc_html__( 'Select option for infinite load next posts.', 'pixwell' ),
			'icon'       => 'el el-repeat',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_post_next_section',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Infinite Next Posts Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'ajax_next_post',
					'type'     => 'switch',
					'title'    => esc_html__( 'Infinite Load Next Posts', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable ajax load next posts when scrolling down.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'ajax_next_cat',
					'type'     => 'switch',
					'title'    => esc_html__( 'Same Category Posts', 'pixwell' ),
					'subtitle' => esc_html__( 'Only load posts has same category with the current posts.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'ajax_next_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a special sidebar for all next load posts, Recommended use simple or advert content.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default'
				),
				array(
					'id'       => 'ajax_next_related',
					'type'     => 'select',
					'title'    => esc_html__( 'Related Section', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the related section when load next posts.', 'pixwell' ),
					'options'  => array(
						'0' => esc_html__( '-Disable-', 'pixwell' ),
						'1' => esc_html__( 'Enable', 'pixwell' )
					),
					'default'  => '0'
				),
				array(
					'id'       => 'ajax_next_hide_sidebar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hide Sidebar on Mobile', 'pixwell' ),
					'subtitle' => esc_html__( 'Hide sidebars on mobile when load next posts.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_post_next_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}