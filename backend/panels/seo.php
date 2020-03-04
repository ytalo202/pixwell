<?php
/** SEO config */
if ( ! function_exists( 'pixwell_register_options_seo' ) ) {
	function pixwell_register_options_seo() {
		return array(
			'id'     => 'pixwell_config_section_seo',
			'title'  => esc_html__( 'SEO Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select SEO options for your site. This panel helps your site optimized for SEO and appear better on the search engines.', 'pixwell' ),
			'icon'   => 'el el-graph',
			'fields' => array(
				array(
					'id'     => 'section_start_seo_snippets',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'SEO Snippets', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'organization_markup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Organization Schema Markup', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable schema markup for the website, helps generate brand signals. Disable this option if you want to use 3rd party plugin.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'website_markup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sitelinks Search Box', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable website markup, helps to show the Search Box feature for brand SERPs and can help your site name to appear in search results.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'site_breadcrumb',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumbs bar', 'pixwell' ),
					'subtitle' => esc_html__( 'Breadcrumbs are a hierarchy of links displayed in search engines and your site. This option requests the "Breadcrumb NavXT".', 'pixwell' ),
					'default'  => 1,
				),
				array(
					'id'       => 'article_markup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Article Markup', 'pixwell' ),
					'subtitle' => esc_html__( 'Disable default schema markup for single post page if you want to use 3rd party plugin.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_seo_snippets',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_seo_information',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Organization Info', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'site_description',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Home Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Short description will display when searching your main site URL. Leave blank if you use 3rd plugins.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'site_phone',
					'type'     => 'text',
					'title'    => esc_html__( 'Phone Number', 'pixwell' ),
					'subtitle' => esc_html__( 'input your company phone number.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'site_email',
					'type'     => 'text',
					'title'    => esc_html__( 'Email', 'pixwell' ),
					'subtitle' => esc_html__( 'input your company main email.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'site_locality',
					'type'     => 'text',
					'title'    => esc_html__( 'Locality Address', 'pixwell' ),
					'subtitle' => esc_html__( 'input your company city and country address.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'site_street',
					'type'     => 'text',
					'title'    => esc_html__( 'Street Address', 'pixwell' ),
					'subtitle' => esc_html__( 'input your company street address.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'postal_code',
					'type'     => 'text',
					'title'    => esc_html__( 'Postal Code', 'pixwell' ),
					'subtitle' => esc_html__( 'input your company local postal code.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_seo_information',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_og_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Open Graph', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'open_graph',
					'type'     => 'switch',
					'title'    => esc_html__( 'Open Graph', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable Open Graph (share to social). This option will be automatically disabled if you use Yoast SEO.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'facebook_app_id',
					'type'     => 'text',
					'title'    => esc_html__( 'Facebook APP ID', 'pixwell' ),
					'subtitle' => esc_html__( 'input your facebook app ID for OG tags.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_og_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}