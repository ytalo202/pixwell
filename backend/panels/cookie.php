<?php
/** cookie */
if ( ! function_exists( 'pixwell_register_options_cookie' ) ) {
	function pixwell_register_options_cookie() {
		return array(
			'id'     => 'pixwell_theme_ops_section_cookie',
			'title'  => esc_html__( 'GDPR Cookie Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for cookie popup section.', 'pixwell' ),
			'icon'   => 'el el-info-circle',
			'fields' => array(
				array(
					'id'     => 'section_start_cookie_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Cookie Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'cookie_popup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Cookie Popup', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the cookie popup section', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'cookie_popup_content',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Cookie Content', 'pixwell' ),
					'subtitle' => esc_html__( 'Input content for the cookie popup section, allow raw HTML.', 'pixwell' ),
					'default'  => html_entity_decode( esc_html__( 'Our website uses cookies to improve your experience. Learn more about: <a href="#">Cookie Policy</a>', 'pixwell' ) )
				),
				array(
					'id'       => 'cookie_popup_button',
					'type'     => 'text',
					'title'    => esc_html__( 'Cookie Button Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input the accept button text.', 'pixwell' ),
					'default'  => esc_html__( 'Accept', 'pixwell' )
				),
				array(
					'id'     => 'section_end_cookie_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

