<?php
/* portfolio config */
if ( ! function_exists( 'pixwell_register_options_portfolio' ) ) {
	function pixwell_register_options_portfolio() {
		return array(
			'id'     => 'pixwell_config_section_portfolio',
			'title'  => esc_html__( 'Portfolio Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for the portfolio post type.', 'pixwell' ),
			'icon'   => 'dashicons-before dashicons-archive rb-tops-icon',
			'fields' => array(
				array(
					'id'     => 'section_start_portfolio_archive',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Portfolio Category Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'portfolio_archive_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Portfolio Archive Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for portfolio listing to display in categories and archive page.', 'pixwell' ),
					'options'  => array(
						'masonry_3' => esc_html__( 'Masonry 3 Columns', 'pixwell' ),
						'masonry_4' => esc_html__( 'Masonry 4 Columns', 'pixwell' ),
					),
					'default'  => 'masonry_3'
				),
				array(
					'id'       => 'portfolio_posts_per_page',
					'type'     => 'text',
					'title'    => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Select number of posts for the portfolio archive, this option will override default settings in "Settings > Reading > Blog pages show at most. Leave blank or set 0 if you want to set as the default, -1 to display all.', 'pixwell' ),
					'class'    => 'small-text',
					'validate' => 'numeric'
				),
				array(
					'id'     => 'section_end_portfolio_archive',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_portfolio_single',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Portfolio - Single Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'portfolio_info_header',
					'type'     => 'text',
					'title'    => esc_html__( 'Information Title', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a title to display at the top of the portfolio information section.', 'pixwell' ),
					'default'  => esc_html__( 'Info', 'pixwell' )
				),
				array(
					'id'       => 'portfolio_nav',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next/Prev Navigation', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable NEXT/PREV navigation at the bottom of single portfolio.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'portfolio_grid_link',
					'type'     => 'switch',
					'title'    => esc_html__( 'Center Grid Link', 'pixwell' ),
					'subtitle' => esc_html__( 'Display the center grid link.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'portfolio_same_cat',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next/Prev Navigation - Same Categories', 'pixwell' ),
					'subtitle' => esc_html__( 'Only display same categories.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_portfolio_single',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_portfolio_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Breadcrumb Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'portfolio_breadcrumb',
					'type'     => 'switch',
					'title'    => esc_html__( 'Portfolio Breadcrumb', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable breadcrumb on single and archive portfolio pages.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_portfolio_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
				/** permalinks */
				array(
					'id'     => 'section_start_portfolio_permalink',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Permalinks Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'portfolio_permalink',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Permalinks', 'pixwell' ),
					'subtitle' => esc_html__( 'You may enter custom structures for your portfolio URLs here. default value is: portfolio', 'pixwell' ),
					'desc'     => esc_html__( 'default URL: yoursitedomain.com/portfolio/sample-porfolio/', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'portfolio_cat_permalink',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Category Permalinks', 'pixwell' ),
					'subtitle' => esc_html__( 'You may enter custom structures for your portfolio URLs here. default value is: portfolio-category', 'pixwell' ),
					'desc'     => esc_html__( 'default URL: yoursitedomain.com/portfolio-category/sample-category/', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_portfolio_permalink',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

/** gallery config */
if ( ! function_exists( 'pixwell_register_options_gallery' ) ) {
	function pixwell_register_options_gallery() {
		return array(
			'id'     => 'pixwell_config_section_gallery',
			'title'  => esc_html__( 'Gallery Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for the gallery post type.', 'pixwell' ),
			'icon'   => 'dashicons-before dashicons-format-gallery rb-tops-icon',
			'fields' => array(
				array(
					'id'     => 'section_start_gallery_permalink',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Permalinks Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'gallery_permalink',
					'type'     => 'text',
					'title'    => esc_html__( 'Gallery Permalinks', 'pixwell' ),
					'subtitle' => esc_html__( 'You may enter custom structures for your gallery URLs here. default value is: gallery', 'pixwell' ),
					'desc'     => esc_html__( 'default URL: yoursitedomain.com/gallery/sample-gallery/', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'gallery_cat_permalink',
					'type'     => 'text',
					'title'    => esc_html__( 'Gallery Category Permalinks', 'pixwell' ),
					'subtitle' => esc_html__( 'You may enter custom structures for your gallery URLs here. default value is: gallery-category', 'pixwell' ),
					'desc'     => esc_html__( 'default URL: yoursitedomain.com/gallery-category/sample-category/', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_gallery_permalink',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
				array(
					'id'     => 'section_start_gallery_share',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Social Sharing Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'gallery_share',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share on Socials', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sharing bar, This section will display below the gallery.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'gallery_share_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Facebook', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Facebook.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'gallery_share_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Twitter', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Twitter.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'gallery_share_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Pinterest', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Pinterest.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'gallery_share_whatsapp',
					'type'     => 'switch',
					'title'    => esc_html__( 'WhatsApp', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on WhatsApp.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'gallery_share_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'LinkedIn', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on LinkedIn.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'gallery_share_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tumblr', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Tumblr.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'gallery_share_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reddit', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Reddit.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'gallery_share_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Vkontakte', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Vkontakte.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'gallery_share_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable share on Email.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_gallery_share',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}


/** deal post type */
if ( ! function_exists( 'pixwell_register_options_deal' ) ) {
	function pixwell_register_options_deal() {

		return array(
			'id'     => 'pixwell_config_section_deal',
			'title'  => esc_html__( 'Deal Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for the deal post type.', 'pixwell' ),
			'icon'   => 'dashicons-before dashicons-megaphone rb-tops-icon',
			'fields' => array(
				array(
					'id'     => 'section_start_deal_settings',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Deal Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'          => 'card_color',
					'title'       => esc_html__( 'Card Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select color for the card display on the deal featured image. Default is #4ca695.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'coupon_color',
					'title'       => esc_html__( 'Coupon Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select color for the coupon display on the deal featured image. Default is #826abc.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_deal_settings',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}