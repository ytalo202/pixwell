<?php
/**
 * @return bool
 * taxonomy config
 */
if ( ! function_exists( 'pixwell_register_taxonomy_category' ) ) {
	function pixwell_register_taxonomy_category() {

		if ( ! class_exists( 'RW_Taxonomy_Meta' ) ) {
			return false;
		}

		$sections   = array();
		$sections[] = array(
			'title'      => esc_html__( 'Pixwell Category Options', 'pixwell' ),
			'taxonomies' => array( 'category' ),
			'id'         => 'pixwell_meta_categories',
			'fields'     => array(
				array(
					'id'   => 'cat_icon',
					'name' => esc_html__( 'Category Icon - Color', 'pixwell' ),
					'desc' => esc_html__( 'Select a color for meta category meta info to display in the post listing.', 'pixwell' ),
					'type' => 'color',
					'std'  => '',
				),
				array(
					'id'   => 'cat_featured',
					'name' => esc_html__( 'Category Featured Image', 'pixwell' ),
					'desc' => esc_html__( 'Upload a featured image for this category (~600*400px). This image will display in the category list block (RUBY COMPOSER).', 'pixwell' ),
					'type' => 'image'
				),
				array(
					'id'      => 'header_style',
					'name'    => esc_html__( 'Header Style', 'pixwell' ),
					'desc'    => esc_html__( 'Select a header style for this category page.', 'pixwell' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'center'  => esc_html__( 'Center', 'pixwell' ),
						'left'    => esc_html__( 'Left', 'pixwell' ),
						'boxed'   => esc_html__( 'Boxed', 'pixwell' )
					),
					'std'     => 'default'
				),
				array(
					'id'   => 'header_image_bg',
					'name' => esc_html__( 'Header - Background Image', 'pixwell' ),
					'desc' => esc_html__( 'Upload a header background image (recommend size: ~ 2000*450px) for this category page (Parallax animation supported).', 'pixwell' ),
					'type' => 'image'
				),
				array(
					'id'   => 'header_solid_bg',
					'name' => esc_html__( 'Header - Solid Background Color', 'pixwell' ),
					'desc' => esc_html__( 'Select header background solid color for this category, Default is #fafafa.', 'pixwell' ),
					'type' => 'color',
					'std'  => '',
				),
				array(
					'id'      => 'header_text_style',
					'name'    => esc_html__( 'Header - Text Color Style', 'pixwell' ),
					'desc'    => esc_html__( 'Select header category text color style for this category to suit with the category featured background image.', 'pixwell' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default form Theme Options', 'pixwell' ),
						'dark'    => esc_html__( 'Dark', 'pixwell' ),
						'light'   => esc_html__( 'Light', 'pixwell' )
					),
					'std'     => 'default'
				),
				array(
					'name'    => esc_html__( 'Blog Layout', 'pixwell' ),
					'id'      => 'layout',
					'desc'    => esc_html__( 'Select blog listing layout for this category.', 'pixwell' ),
					'type'    => 'select',
					'options' => array(
						'default'   => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'classic'   => esc_html__( 'Classic (Content)', 'pixwell' ),
						'ct_list'   => esc_html__( 'List (Content)', 'pixwell' ),
						'ct_grid_1' => esc_html__( 'Grid 1 (Content)', 'pixwell' ),
						'ct_grid_2' => esc_html__( 'Grid 2 (Content)', 'pixwell' ),
						'fw_grid_1' => esc_html__( 'FullWidth Grid 1', 'pixwell' ),
						'fw_grid_2' => esc_html__( 'FullWidth Grid 2', 'pixwell' ),
						'fw_grid_3' => esc_html__( 'FullWidth Grid 3', 'pixwell' ),
						'fw_list_1' => esc_html__( 'FullWidth List 1', 'pixwell' ),
						'fw_list_2' => esc_html__( 'FullWidth List 2', 'pixwell' )
					),
					'std'     => 'default'
				),
				array(
					'name'    => esc_html__( 'Sidebar Name', 'pixwell' ),
					'id'      => 'sidebar_name',
					'desc'    => esc_html__( 'Assign a sidebar name for this category page. This setting will apply to the blog layouts have sidebar.', 'pixwell' ),
					'type'    => 'select',
					'options' => pixwell_add_settings_sidebar_name( true ),
					'std'     => 'default',
				),
				array(
					'name'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'id'      => 'sidebar_pos',
					'desc'    => esc_html__( 'Select sidebar position for this category.', 'pixwell' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'right'   => esc_html__( 'Right', 'pixwell' ),
						'left'    => esc_html__( 'Left', 'pixwell' )
					),
					'std'     => 'default',
				),
				array(
					'name' => esc_html__( 'Number Of Posts', 'pixwell' ),
					'id'   => 'posts_per_page',
					'desc' => esc_html__( 'select number of posts for this category. Leave blank or set 0 if you want to use settings of theme options.', 'pixwell' ),
					'type' => 'text',
					'std'  => '',
				),
				array(
					'name'    => esc_html__( 'Pagination Type', 'pixwell' ),
					'id'      => 'pagination',
					'desc'    => esc_html__( 'Select pagination type for this category.', 'pixwell' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'number'  => esc_html__( 'Numeric', 'pixwell' ),
						'simple'  => esc_html__( 'Simple', 'pixwell' )
					),
					'std'     => 'default'
				),
				array(
					'name'    => esc_html__( 'Category Breadcrumb', 'pixwell' ),
					'id'      => 'breadcrumb',
					'desc'    => esc_html__( 'Enable or disable the breadcrumb on this category.', 'pixwell' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
						'1'       => esc_html__( 'Enable', 'pixwell' ),
						'-1'      => esc_html__( 'Disable', 'pixwell' )
					),
					'std'     => 'default'
				)
			)
		);

		foreach ( $sections as $section ) {
			new RW_Taxonomy_Meta( $section );
		}
	}
}

add_action( 'admin_init', 'pixwell_register_taxonomy_category' );