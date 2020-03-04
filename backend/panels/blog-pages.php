<?php

/* panel blog */
if ( ! function_exists( 'pixwell_register_options_index' ) ) {
	function pixwell_register_options_index() {
		return array(
			'id'     => 'pixwell_config_section_index',
			'title'  => esc_html__( 'Blog (Index) Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for the main blog page (index.php).', 'pixwell' ),
			'icon'   => 'el el-wordpress',
			'fields' => array(
				array(
					'id'     => 'section_start_index_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Layout Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_layout_index',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Listing Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the blog page (index.php).', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'classic'
				),
				array(
					'id'       => 'blog_sidebar_name_index',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the blog page, This option will apply on layouts has sidebar.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default'
				),
				array(
					'id'       => 'block_sidebar_pos_index',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the blog page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default'
				),
				array(
					'id'       => 'blog_breadcrumb_index',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb Bar in Blog', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable the breadcrumb bar in the blog page.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_index_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_index_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_pagination_index',
					'title'    => esc_html__( 'Pagination Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a pagination style for the blog page (index.php)', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number'
				),
				array(
					'id'       => 'blog_posts_per_page_index',
					'title'    => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Select number of posts for the blog page, this option will override default settings in "Settings > Reading > Blog pages show at most. Leave blank or set 0 if you want to set as the default.', 'pixwell' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric'
				),
				array(
					'id'     => 'section_end_index_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

/* category page */
if ( ! function_exists( 'pixwell_register_options_cat' ) ) {
	function pixwell_register_options_cat() {
		return array(
			'id'     => 'pixwell_config_section_cat',
			'title'  => esc_html__( 'Category Page Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Global category options (category.php), options below will apply to all category pages on your site. The theme supports individual settings per category in Posts > Categories > Edit Category > Pixwell Category Options.', 'pixwell' ),
			'icon'   => 'el el-folder-close',
			'fields' => array(
				array(
					'id'     => 'section_start_cat_header',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category Header Setting', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'cat_header_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Header Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select header style for all category pages (category.php).', 'pixwell' ),
					'options'  => array(
						'center' => esc_html__( 'Center', 'pixwell' ),
						'left'   => esc_html__( 'Left', 'pixwell' ),
						'boxed'  => esc_html__( 'Boxed', 'pixwell' )
					),
					'default'  => 'center'
				),
				array(
					'id'       => 'cat_header_image_bg',
					'type'     => 'media',
					'title'    => esc_html__( 'Category Header - Background Image', 'pixwell' ),
					'subtitle' => esc_html__( 'Upload a header background image (recommend size: ~ 2000*500px) for all categories.', 'pixwell' ),
				),
				array(
					'id'          => 'cat_header_solid_bg',
					'title'       => esc_html__( 'Category Header - Solid Background Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select header background solid color for all category, default is #f2f2f2.', 'pixwell' ),
					'type'        => 'color',
					'transparent' => false
				),
				array(
					'id'       => 'cat_header_text_style',
					'title'    => esc_html__( 'Category Header - Text Color Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select header category text color style for all category to suit with the category featured background image.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'dark'  => esc_html__( '--Dark--', 'pixwell' ),
						'light' => esc_html__( 'Light', 'pixwell' )
					),
					'default'  => 'dark'
				),
				array(
					'id'     => 'section_end_cat_header',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_cat_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Layout Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_layout_cat',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Listing Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for category pages (category.php).', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'classic'
				),
				array(
					'id'       => 'blog_sidebar_name_cat',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for category pages, This option will apply on layouts has sidebar.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default'
				),
				array(
					'id'       => 'block_sidebar_pos_cat',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for category pages.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default'
				),
				array(
					'id'       => 'blog_breadcrumb_cat',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb on Category', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable the breadcrumb bar in category pages.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_cat_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_cat_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_pagination_cat',
					'title'    => esc_html__( 'Pagination Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a pagination style for category pages (category.php)', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number'
				),
				array(
					'id'       => 'blog_posts_per_page_cat',
					'title'    => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Select number of posts for category pages, this option will override default settings in "Settings > Reading > Blog pages show at most. Leave blank or set 0 if you want to set as the default.', 'pixwell' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric'
				),
				array(
					'id'     => 'section_end_cat_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}


/* author page */
if ( ! function_exists( 'pixwell_register_options_author' ) ) {
	function pixwell_register_options_author() {
		return array(
			'id'     => 'pixwell_config_section_author',
			'title'  => esc_html__( 'Author Page Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Author page options (author.php), options below will apply to the author page.', 'pixwell' ),
			'icon'   => 'el el-user',
			'fields' => array(
				array(
					'id'     => 'section_start_author_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Layout Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_layout_author',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Listing Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the author page (author.php).', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'classic'
				),
				array(
					'id'       => 'blog_sidebar_name_author',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the author page, This option will apply on layouts has sidebar.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default'
				),
				array(
					'id'       => 'block_sidebar_pos_author',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the author page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default'
				),
				array(
					'id'       => 'blog_breadcrumb_author',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb on Blog Page', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable the breadcrumb bar in the author page.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'author_header_style',
					'title'    => esc_html__( 'Author Header Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select the author header style.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0' => esc_html__( 'Full Details', 'pixwell' ),
						'1' => esc_html__( 'Simplicity', 'pixwell' )
					),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_author_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_author_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_pagination_author',
					'title'    => esc_html__( 'Pagination Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a pagination style for the author page (author.php)', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number'
				),
				array(
					'id'       => 'blog_posts_per_page_author',
					'title'    => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Select number of posts for the author page, this option will override default settings in "Settings > Reading > Blog pages show at most. Leave blank or set 0 if you want to set as the default.', 'pixwell' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric'
				),
				array(
					'id'     => 'section_end_author_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

/* search page */
if ( ! function_exists( 'pixwell_register_options_search' ) ) {
	function pixwell_register_options_search() {
		return array(
			'id'     => 'pixwell_config_section_search',
			'title'  => esc_html__( 'Search Page Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Search page options (search.php), options below will apply to the search page.', 'pixwell' ),
			'icon'   => 'el el-search',
			'fields' => array(
				array(
					'id'     => 'section_start_search_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Layout Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'search_header_form',
					'title'    => esc_html__( 'Header Search Form', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable the search form at the top of the search page.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'blog_layout_search',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Listing Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the search page (search.php).', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'fw_grid_2'
				),
				array(
					'id'       => 'blog_sidebar_name_search',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the search page, This option will apply on layouts has sidebar.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default'
				),
				array(
					'id'       => 'block_sidebar_pos_search',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the search page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default'
				),
				array(
					'id'       => 'blog_breadcrumb_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb in Search page', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable the breadcrumb bar in the search page.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'search_post',
					'type'     => 'switch',
					'title'    => esc_html__( 'Only Display Posts Result', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable only search post results.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_search_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_search_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_pagination_search',
					'title'    => esc_html__( 'Pagination Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a pagination style for the search page (search.php)', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number'
				),
				array(
					'id'       => 'blog_posts_per_page_search',
					'title'    => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Select number of posts for the search page, this option will override default settings in "Settings > Reading > Blog pages show at most. Leave blank or set 0 if you want to set as the default.', 'pixwell' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 12,
				),
				array(
					'id'     => 'section_end_search_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}


/* blog archive */
if ( ! function_exists( 'pixwell_register_options_archive' ) ) {
	function pixwell_register_options_archive() {
		return array(
			'id'     => 'pixwell_config_section_archive',
			'title'  => esc_html__( 'Archive Page Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Archive page options (archive.php), options below will apply to the archive page.', 'pixwell' ),
			'icon'   => 'el el-folder-close',
			'fields' => array(
				array(
					'id'     => 'section_start_archive_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Layout Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_layout_archive',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Listing Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a layout for the archive page (archive.php).', 'pixwell' ),
					'options'  => pixwell_add_settings_blog_layouts(),
					'default'  => 'classic'
				),
				array(
					'id'       => 'blog_sidebar_name_archive',
					'type'     => 'select',
					'title'    => esc_html__( 'Assign a Sidebar', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a sidebar for the archive page, This option will apply on layouts has sidebar.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_name(),
					'default'  => 'pixwell_sidebar_default'
				),
				array(
					'id'       => 'block_sidebar_pos_archive',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select sidebar position for the archive page.', 'pixwell' ),
					'options'  => pixwell_add_settings_sidebar_pos(),
					'default'  => 'default'
				),
				array(
					'id'       => 'blog_breadcrumb_archive',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumb on Blog Page', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable the breadcrumb bar in the archive page.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_archive_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_archive_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_pagination_archive',
					'title'    => esc_html__( 'Pagination Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a pagination style for the archive page (archive.php)', 'pixwell' ),
					'type'     => 'select',
					'options'  => pixwell_add_settings_blog_pagination( false ),
					'default'  => 'number'
				),
				array(
					'id'       => 'blog_posts_per_page_archive',
					'title'    => esc_html__( 'Posts per Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Select number of posts for the archive page, this option will override default settings in "Settings > Reading > Blog pages show at most. Leave blank or set 0 if you want to set as the default.', 'pixwell' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric'
				),
				array(
					'id'     => 'section_end_archive_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

