<?php
if ( ! function_exists( 'pixwell_register_options_wc' ) ) {
	function pixwell_register_options_wc() {

		if ( class_exists( 'WooCommerce' ) ) {
			return array(
				'id'    => 'pixwell_config_section_wc',
				'title' => esc_html__( 'WooCommerce', 'pixwell' ),
				'desc'  => esc_html__( 'Select options for the shop.', 'pixwell' ),
				'icon'  => 'el el-shopping-cart'
			);
		} else {
			return array(
				'id'     => 'pixwell_config_section_wc',
				'title'  => esc_html__( 'WooCommerce', 'pixwell' ),
				'desc'   => esc_html__( 'Select options for the shop.', 'pixwell' ),
				'icon'   => 'el el-shopping-cart',
				'fields' => array(
					array(
						'id'    => 'wc_info_warning',
						'type'  => 'info',
						'title' => esc_html__( 'WooCommerce Plugin is missing!', 'pixwell' ),
						'style' => 'warning',
						'desc'  => html_entity_decode( esc_html__( 'Please install <a href=\'https://wordpress.org/plugins/woocommerce/\'>Woocommerce</a> plugin to enable the theme features.', 'pixwell' ) ),
					),
				)
			);
		}

	}
}

/**
 * @return array
 * single product
 */
if ( ! function_exists( 'pixwell_register_options_wc_page' ) ) {
	function pixwell_register_options_wc_page() {
		return array(
			'id'         => 'pixwell_config_section_wc_page',
			'title'      => esc_html__( 'WooCommerce Pages', 'pixwell' ),
			'desc'       => esc_html__( 'Select options for the shop and archive and single product pages.', 'pixwell' ),
			'icon'       => 'el el-folder-open',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_wc_shop',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Shop Page Options', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'wc_shop_posts_per_page',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Products per Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Select number of products per page, leave blank if you want to set as Settings default.', 'pixwell' ),
					'switch'   => true,
					'default'  => ''
				),
				array(
					'id'       => 'wc_shop_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Shop Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sidebar for the shop page.', 'pixwell' ),
					'options'  => array(
						'0' => esc_html__( '--Disable--', 'pixwell' ),
						'1' => esc_html__( 'Enable', 'pixwell' ),
					),
					'default'  => '0',
				),
				array(
					'id'       => 'wc_shop_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Shop Sidebar Name', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a sidebar for the shop page.', 'pixwell' ),
					'required' => array( 'wc_shop_sidebar', '=', '1' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default',
				),
				array(
					'id'       => 'wc_shop_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Shop Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the shop page.', 'pixwell' ),
					'required' => array( 'wc_shop_sidebar', '=', '1' ),
					'options'  => pixwell_add_settings_sidebar_pos( false ),
					'default'  => 'right'
				),
				array(
					'id'     => 'section_end_wc_shop',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_wc_archive',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Archive Shop Pages Options', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'wc_archive_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Archive Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sidebar for archive shop pages.', 'pixwell' ),
					'options'  => array(
						'0' => esc_html__( '--Disable--', 'pixwell' ),
						'1' => esc_html__( 'Enable', 'pixwell' ),
					),
					'default'  => '0',
				),
				array(
					'id'       => 'wc_archive_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Name', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a sidebar for product category and archive pages.', 'pixwell' ),
					'required' => array( 'wc_archive_sidebar', '=', '1' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default',
				),
				array(
					'id'       => 'wc_archive_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a sidebar position for product category and archive pages.', 'pixwell' ),
					'required' => array( 'wc_archive_sidebar', '=', '1' ),
					'options'  => pixwell_add_settings_sidebar_pos( false ),
					'default'  => 'none'
				),
				array(
					'id'     => 'section_end_wc_archive',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_wc_single',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single Product Page', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'wc_box_review',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Review Box', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable the review box in the single product page.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'wc_related_posts_per_page',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Total Related Products', 'pixwell' ),
					'subtitle' => esc_html__( 'Select total related product to show at once. leave blank if you want to set as default.', 'pixwell' ),
					'switch'   => true,
					'default'  => '4'
				),
				array(
					'id'     => 'section_end_wc_single',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

/**
 * @return array
 * styling
 */
if ( ! function_exists( 'pixwell_register_options_wc_styling' ) ) {
	function pixwell_register_options_wc_styling() {
		return array(
			'id'         => 'pixwell_config_section_wc_styling',
			'title'      => esc_html__( 'Elements Styling', 'pixwell' ),
			'desc'       => esc_html__( 'Select styling options of your shop.', 'pixwell' ),
			'icon'       => 'el el-adjust-alt',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_wc_styling',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Meta Options', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'wc_sale_percent',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Percentage Saved', 'pixwell' ),
					'subtitle' => esc_html__( 'display Percentage saved on WooCommerce sale products', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'wc_wishlist',
					'type'     => 'switch',
					'title'    => esc_html__( 'Wishlist Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable the Wishlist icon in the product listing.', 'pixwell' ),
					'desc'     => esc_html__( 'This option requests the Wishlist plugin to work.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'          => 'wc_price_color',
					'title'       => esc_html__( 'Price Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a color value for the pricing, this option will override on default theme color, Leave blank if you want to set default (#333).', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color'
				),
				array(
					'id'          => 'wc_sale_color',
					'title'       => esc_html__( 'Sale Icon Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select a background color value for the sale icon, this option will override on default theme color, Leave blank if you want to set default (#88d398).', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_wc_styling',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_wc_typo',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Typography Options', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'             => 'font_price',
					'type'           => 'typography',
					'title'          => esc_html__( 'Product Price Font', 'pixwell' ),
					'subtitle'       => esc_html__( 'Select font values for price elements.', 'pixwell' ),
					'desc'           => esc_html__( 'Default [ font-family: Montserrat | font-size: 16px | font-weight: 500 ]', 'pixwell' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '',
						'font-family'    => 'Montserrat',
						'font-weight'    => '500',
						'text-transform' => '',
					),
					'output'         => array(
						'.woocommerce .price',
						'.woocommerce div.product .product-loop-content .price',
						'.woocommerce span.onsale',
						'.woocommerce span.onsale.percent',
						'.woocommerce-Price-amount.amount',
						'.woocommerce .quantity .qty'
					)
				),
				array(
					'id'     => 'section_end_wc_typo',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}
