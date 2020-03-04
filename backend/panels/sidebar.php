<?php
/** sidebar config */
if ( ! function_exists( 'pixwell_register_options_sidebar' ) ) {
	function pixwell_register_options_sidebar() {
		return array(
			'id'     => 'pixwell_theme_ops_section_sidebar',
			'title'  => esc_html__( 'Sidebar Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select default options for sidebars, Options below will apply to whole the website.', 'pixwell' ),
			'icon'   => 'el el-th',
			'fields' => array(
				array(
					'id'       => 'pixwell_multi_sidebar',
					'type'     => 'multi_text',
					'class'    => 'medium-text',
					'title'    => esc_html__( 'Create New Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'create or delete an existing sidebar, don\'t forget input name for your sidebar.', 'pixwell' ),
					'desc'     => esc_html__( 'click on the "Create Sidebar" button, then input a name/ID (without special charsets and spacing) into this field to create a new sidebar.', 'pixwell' ),
					'add_text' => esc_html__( 'Click and Input ID to Create a Sidebar', 'pixwell' ),
					'default'  => array()
				),
				array(
					'id'       => 'sidebar_sticky',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sticky Sidebars', 'pixwell' ),
					'subtitle' => esc_html__( 'making sidebar permanently visible when scrolling up and down. Useful when a sidebar is too tall or too short compared to the rest of the content. This features will not apply to mobile devices.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'site_sidebar_pos',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select default sidebar position for your site, This is global options and will be overridden by other "Sidebar Position" settings.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos( false ),
					'default'  => 'right'
				),
			)
		);
	}
}