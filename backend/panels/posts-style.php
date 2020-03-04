<?php

/** element style */
if ( ! function_exists( 'pixwell_register_options_styling' ) ) {
	function pixwell_register_options_styling() {
		return array(
			'id'    => 'pixwell_config_section_styling',
			'title' => esc_html__( 'Modules Design', 'pixwell' ),
			'icon'  => 'el el-idea',
		);
	}
}

/** classic style config */
if ( ! function_exists( 'pixwell_register_options_styling_classic' ) ) {
	function pixwell_register_options_styling_classic() {
		return array(
			'id'         => 'pixwell_config_section_styling_classic',
			'title'      => esc_html__( 'Post Classic 1', 'pixwell' ),
			'icon'       => 'el el-align-justify',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout classic. This is the default classic layout. Show in blocks below: <em>Classic (Content)</em><em>Blog, Archive Listing: Classic (Content)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_classic',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-classic.jpg' ) . '" alt="classic">' ),
				),
				array(
					'id'       => 'padding_content_classic',
					'title'    => esc_html__( 'Padding Content', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the padding style at the left and the right of content for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'cat_info_classic',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_classic',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1,
				),
				array(
					'id'       => 'excerpt_length_classic',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 40
				),
				array(
					'id'       => 'excerpt_classic',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support readmore tag, title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
						'moretag' => esc_html__( 'Use Read More Tag (disable excerpt length)', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_classic',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					)
				),
				array(
					'id'       => 'readmore_classic',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'review_classic',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'bookmark_classic',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				),
			)
		);
	}
}


/** classic 2 config */
if ( ! function_exists( 'pixwell_register_options_styling_classic_2' ) ) {
	function pixwell_register_options_styling_classic_2() {
		return array(
			'id'         => 'pixwell_config_section_styling_classic_2',
			'title'      => esc_html__( 'Post Classic 2', 'pixwell' ),
			'icon'       => 'el el-align-justify',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout classic - centered mode. This is the centered mode classic layout. Show in blocks below: <em>Masonry Mix 1 (Content)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_classic_2',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-classic-2.jpg' ) . '" alt="classic 2">' ),
				),
				array(
					'id'       => 'cat_info_classic_2',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_classic_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1,
				),
				array(
					'id'       => 'excerpt_length_classic_2',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_classic_2',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support readmore tag, title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
						'moretag' => esc_html__( 'Use Read More Tag (disable excerpt length)', 'pixwell' ),
					),
					'default'  => 40
				),
				array(
					'id'       => 'entry_meta_classic_2',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					)
				),
				array(
					'id'       => 'readmore_classic_2',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'review_classic',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'bookmark_classic_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				),
			)
		);
	}
}


/** grid 1 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_1' ) ) {
	function pixwell_register_options_styling_grid_1() {
		return array(
			'id'         => 'pixwell_config_section_styling_grid_1',
			'title'      => esc_html__( 'Post Grid 1', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for layout grid 1. This is the default grid post layout. Show in blocks below: <em>Grid 1 (FullWidth)</em><em>Grid 1 (Content)</em><em>Mix 1 (FullWidth & Content)</em><em>Blog, Archive Listing: Grid 1 (Content), FullWidth Grid 1</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_grid_1',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-1.jpg' ) . '" alt="grid 1">' ),
				),
				array(
					'id'       => 'cat_info_grid_1',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_grid_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1,
				),
				array(
					'id'       => 'excerpt_length_grid_1',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_grid_1',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_grid_1',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
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
					'id'       => 'readmore_grid_1',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'review_grid_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'bookmark_grid_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}


/** grid 2 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_2' ) ) {
	function pixwell_register_options_styling_grid_2() {
		return array(
			'id'         => 'pixwell_config_section_styling_grid_2',
			'title'      => esc_html__( 'Post Grid 2', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for layout grid 2. This is a small grid post layout. Show in blocks below: <em>Grid 2 (FullWidth)</em><em>Grid 2 (Content)</em><em>Blog, Archive Listing: Grid 2 (Content), FullWidth Grid 2</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_grid_2',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-2.jpg' ) . '" alt="grid 2">' ),
				),
				array(
					'id'       => 'cat_info_grid_2',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_grid_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_length_grid_2',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_grid_2',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_grid_2',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'date' => esc_html__( 'Date', 'pixwell' )
						),
						'disabled' => array(
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' )
						)
					),
				),
				array(
					'id'       => 'readmore_grid_2',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'review_grid_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'bookmark_grid_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}


/** grid 3 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_3' ) ) {
	function pixwell_register_options_styling_grid_3() {
		return array(
			'id'         => 'pixwell_config_section_styling_grid_3',
			'title'      => esc_html__( 'Post Grid 3', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for layout grid 3. This is a big grid post layout. Show in block below: <em>Grid 3 (FullWidth)</em><em>Blog, Archive FullWidth Grid 3 Listing</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_grid_3',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-3.jpg' ) . '" alt="grid 3">' ),
				),
				array(
					'id'       => 'padding_content_grid_3',
					'title'    => esc_html__( 'Padding Content', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the padding style at the left and the right of content for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'cat_info_grid_3',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_grid_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1,
				),
				array(
					'id'       => 'excerpt_length_grid_3',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_grid_3',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_grid_3',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					)
				),
				array(
					'id'       => 'readmore_grid_3',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'review_grid_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'bookmark_grid_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}

/** grid 4 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_4' ) ) {
	function pixwell_register_options_styling_grid_4() {
		return array(
			'id'         => 'pixwell_config_section_styling_grid_4',
			'title'      => esc_html__( 'Post Grid 4', 'pixwell' ),
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout grid 4. This is a mini grid post layout. Show in blocks below: <em>Grid 4 (FullWidth)</em><em>Grid 2 (Content)</em><em>Mega Category Menu</em>', 'pixwell' ) ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_grid_4',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-4.jpg' ) . '" alt="grid 4">' ),
				),
				array(
					'id'       => 'cat_info_grid_4',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_grid_4',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(),
						'disabled' => array(
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' )
						)
					)
				),
				array(
					'id'       => 'review_grid_4',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'bookmark_grid_4',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}


/** grid 5 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_5' ) ) {
	function pixwell_register_options_styling_grid_5() {
		return array(
			'id'         => 'pixwell_config_section_styling_grid_5',
			'title'      => esc_html__( 'Post Grid 5', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout grid 5. This is a vertical featured image size grid post layout. Show in block below: <em>Carousel Slider (Wrapper)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_grid_5',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-5.jpg' ) . '" alt="grid 5">' ),
				),
				array(
					'id'       => 'cat_info_grid_5',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_grid_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1,
				),
				array(
					'id'       => 'entry_meta_grid_5',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'date' => esc_html__( 'Date', 'pixwell' )
						),
						'disabled' => array(
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' )
						)
					)
				),
				array(
					'id'       => 'review_grid_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true
				),
				array(
					'id'       => 'bookmark_grid_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}


/** grid 6 */
if ( ! function_exists( 'pixwell_register_options_styling_grid_6' ) ) {
	function pixwell_register_options_styling_grid_6() {
		return array(
			'id'         => 'pixwell_config_section_styling_grid_6',
			'title'      => esc_html__( 'Post Grid 6', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout grid 6. This is a vertical featured image size & background content grid post layout. Show in block below: <em>Blogger Carousel (Wrapper)</em><em>Food Carousel (Stretched)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_grid_6',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-grid-6.jpg' ) . '" alt="grid 6">' ),
				),
				array(
					'id'       => 'cat_info_grid_6',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_grid_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1,
				),
				array(
					'id'       => 'entry_meta_grid_6',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(),
						'disabled' => array(
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' )
						)
					)
				),
				array(
					'id'       => 'review_grid_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true
				),
				array(
					'id'       => 'bookmark_grid_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'          => 'content_bg_grid_6',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Content Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select content background for this post, Default is #f2f2f2.', 'pixwell' ),
					'default'     => 0
				),
				array(
					'id'       => 'text_style_grid_6',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Content Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select text style for this grid layout to fit with the background setting.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'dark'
				),
			)
		);
	}
}


/** list 1 */
if ( ! function_exists( 'pixwell_register_options_styling_list_1' ) ) {
	function pixwell_register_options_styling_list_1() {
		return array(
			'id'         => 'pixwell_config_section_styling_list_1',
			'title'      => esc_html__( 'Post List 1', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout list 1. This is a big list post layout. Show in blocks below: <em>List 1 (FullWidth)</em><em>Blog, Archive Listing: FullWidth List 1</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_list_1',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-1.jpg' ) . '" alt="list 1">' ),
				),
				array(
					'id'       => 'cat_info_list_1',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_list_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'excerpt_length_list_1',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_list_1',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_list_1',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					)
				),
				array(
					'id'       => 'readmore_list_1',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'review_list_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'border_list_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Top Border', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the top border for this layout.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'bookmark_list_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}


/** list 2 */
if ( ! function_exists( 'pixwell_register_options_styling_list_2' ) ) {
	function pixwell_register_options_styling_list_2() {
		return array(
			'id'         => 'pixwell_config_section_styling_list_2',
			'title'      => esc_html__( 'Post List 2', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout list 2. This is a small list post layout. Show in blocks below: <em>List 2 (FullWidth)</em><em>Blog, Archive Listing: FullWidth List 2</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_list_2',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-2.jpg' ) . '" alt="list 2">' ),
				),
				array(
					'id'       => 'cat_info_list_2',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'custom_info_list_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_length_list_2',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_list_2',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_list_2',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					)
				),
				array(
					'id'       => 'readmore_list_2',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'review_list_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true
				),
				array(
					'id'       => 'bookmark_list_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}


/** list 3 */
if ( ! function_exists( 'pixwell_register_options_styling_list_3' ) ) {
	function pixwell_register_options_styling_list_3() {
		return array(
			'id'         => 'pixwell_config_section_styling_list_3',
			'title'      => esc_html__( 'Post List 3', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout grid 3. This is the list of grid post layout. Show in blocks below: <em>List (Content)</em><em>Blog, Archive Listing: List (Content)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_list_3',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-3.jpg' ) . '" alt="list 3">' ),
				),
				array(
					'id'       => 'cat_info_list_3',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'custom_info_list_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_length_list_3',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_list_3',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_list_3',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					)
				),
				array(
					'id'       => 'readmore_list_3',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'review_list_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => true
				),
				array(
					'id'       => 'bookmark_list_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}


/** list 4 */
if ( ! function_exists( 'pixwell_register_options_styling_list_4' ) ) {
	function pixwell_register_options_styling_list_4() {
		return array(
			'id'         => 'pixwell_config_section_styling_list_4',
			'title'      => esc_html__( 'Post list 4', 'pixwell' ),
			'icon'       => 'el el-th-list',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout list 4. This is the mini list post layout. Show in blocks below: <em>FullWidth Mix 2 (1/3 Row)</em><em>Content Mix 2 (1/2 Row)</em><em>Mix 1 (FullWidth & Content)</em><em>Sidebar Widget Posts</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_list_4',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-4.jpg' ) . '" alt="list 4">' ),
				),
				array(
					'id'       => 'entry_meta_list_4',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'date' => esc_html__( 'Date', 'pixwell' ),
						),
						'disabled' => array(
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' )
						)
					)
				)
			)
		);
	}
}


/** list 6 */
if ( ! function_exists( 'pixwell_register_options_styling_list_6' ) ) {
	function pixwell_register_options_styling_list_6() {
		return array(
			'id'         => 'pixwell_config_section_styling_list_6',
			'title'      => esc_html__( 'Post List 6', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout list 6. This is the big list layout. Show in blocks below: <em>Deal Slider (Wrapper)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_list_6',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-list-6.jpg' ) . '" alt="list 6">' ),
				),
				array(
					'id'       => 'cat_info_list_6',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_list_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'excerpt_length_list_6',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 40
				),
				array(
					'id'       => 'excerpt_list_6',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => 'tagline'
				),
				array(
					'id'       => 'entry_meta_list_6',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					'id'       => 'readmore_list_6',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'review_list_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'bookmark_list_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'          => 'content_bg_list_6',
					'type'        => 'color',
					'transparent' => false,
					'title'       => esc_html__( 'Content Background', 'pixwell' ),
					'subtitle'    => esc_html__( 'Select content background for this post, Default is #f2f2f2.', 'pixwell' ),
					'default'     => 0
				),
				array(
					'id'       => 'text_style_list_6',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Content Text Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select text style for this grid layout to fit with the background setting.', 'pixwell' ),
					'options'  => pixwell_add_settings_text_style(),
					'default'  => 'dark'
				),
			)
		);
	}
}


/** overlay 1 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_1' ) ) {
	function pixwell_register_options_styling_overlay_1() {
		return array(
			'id'         => 'pixwell_config_section_styling_overlay_1',
			'title'      => esc_html__( 'Post Overlay 1', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout overlay 1. This is a big overlay post layout. Show in blocks below: <em>Grid (Wrapper)</em><em>FullWide Grid (Stretched)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_overlay_1',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-1.jpg' ) . '" alt="overlay 1">' ),
				),
				array(
					'id'       => 'cat_info_overlay_1',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_overlay_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'excerpt_length_overlay_1',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 60
				),
				array(
					'id'       => 'excerpt_overlay_1',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for overlay 1 layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => 'tagline'
				),
				array(
					'id'       => 'entry_meta_overlay_1',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					'id'       => 'readmore_overlay_1',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'review_overlay_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'bookmark_overlay_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}


/** overlay 2 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_2' ) ) {
	function pixwell_register_options_styling_overlay_2() {
		return array(
			'id'         => 'pixwell_config_section_styling_overlay_2',
			'title'      => esc_html__( 'Post Overlay 2', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout overlay 2, this is a small horizontal rectangle overlay layout. Show in blocks below: <em>Wrapper Grid</em><em>Mix Grid (Wrapper)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_overlay_2',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-2.jpg' ) . '" alt="overlay 2">' ),
				),
				array(
					'id'       => 'cat_info_overlay_2',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'custom_info_overlay_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_overlay_2',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'custom' => esc_html__( 'Custom', 'pixwell' )
						),
						'disabled' => array(
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' )
						)
					)
				),
				array(
					'id'       => 'bookmark_overlay_2',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			),
		);
	}
}


/** overlay 3 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_3' ) ) {
	function pixwell_register_options_styling_overlay_3() {
		return array(
			'id'         => 'pixwell_config_section_styling_overlay_3',
			'title'      => esc_html__( 'Post Overlay 3', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout overlay 3, this is a small vertical rectangle overlay layout. Show in block below: <em>FullWide Grid (Stretched)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_overlay_3',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-3.jpg' ) . '" alt="overlay 3">' ),
				),
				array(
					'id'       => 'cat_info_overlay_3',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_overlay_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_overlay_3',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'custom' => esc_html__( 'Custom', 'pixwell' )
						),
						'disabled' => array(
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' )
						)
					)
				),
				array(
					'id'       => 'bookmark_overlay_3',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			),
		);
	}
}

/** overlay 4 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_4' ) ) {
	function pixwell_register_options_styling_overlay_4() {
		return array(
			'id'         => 'pixwell_config_section_styling_overlay_4',
			'title'      => esc_html__( 'Post Overlay 4', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for layout overlay 4. This is a full-wide post layout. Show in blocks below: <em>Slider (Wrapper)</em><em>FullWide Slider (Stretched)</em><em>Full Overlay Grid (Stretched)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_overlay_4',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-4.jpg' ) . '" alt="overlay 4">' ),
				),
				array(
					'id'       => 'cat_info_overlay_4',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_overlay_4',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => true
				),
				array(
					'id'       => 'excerpt_length_overlay_4',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_overlay_4',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => '0'
				),
				array(
					'id'       => 'entry_meta_overlay_4',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					)
				),
				array(
					'id'       => 'bookmark_overlay_4',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			),
		);
	}
}


/** overlay 5 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_5' ) ) {
	function pixwell_register_options_styling_overlay_5() {
		return array(
			'id'         => 'pixwell_config_section_styling_overlay_5',
			'title'      => esc_html__( 'Post Overlay 5', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for layout overlay 5, this is a medium vertical rectangle overlay layout. Show in blocks below: <em>FullWidth Mix 1 (1/3 Row)</em><em>Content Mix 1 (1/2 Row)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_overlay_5',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-5.jpg' ) . '" alt="overlay 5">' ),
				),
				array(
					'id'       => 'cat_info_overlay_5',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_overlay_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_overlay_5',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on the this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'author' => esc_html__( 'Author', 'pixwell' ),
							'date'   => esc_html__( 'Date', 'pixwell' ),
						),
						'disabled' => array(
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' )
						)
					)
				),
				array(
					'id'       => 'bookmark_overlay_5',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			),
		);
	}
}


/** overlay 6 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_6' ) ) {
	function pixwell_register_options_styling_overlay_6() {
		return array(
			'id'         => 'pixwell_config_section_styling_overlay_6',
			'title'      => esc_html__( 'Post Overlay 6', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for layout overlay 6, this is a big overlay rectangle overlay layout. Show in block below: <em>LifeStyle Slider (Wrapper)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_overlay_6',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-6.jpg' ) . '" alt="overlay 6">' ),
				),
				array(
					'id'       => 'cat_info_overlay_6',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_overlay_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_overlay_6',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'author' => esc_html__( 'Author', 'pixwell' ),
						),
						'disabled' => array(
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' )
						)
					)
				),
				array(
					'id'       => 'bookmark_overlay_6',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			),
		);
	}
}


/** overlay 7 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_7' ) ) {
	function pixwell_register_options_styling_overlay_7() {
		return array(
			'id'         => 'pixwell_config_section_styling_overlay_7',
			'title'      => esc_html__( 'Post Overlay 7', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the layout overlay 7. This is a overlay post layout. Show in blocks below: <em>Photography Grid (Stretched)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_overlay_7',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-7.jpg' ) . '" alt="overlay 7">' ),
				),
				array(
					'id'       => 'cat_info_overlay_7',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_overlay_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => true
				),
				array(
					'id'       => 'excerpt_length_overlay_7',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_overlay_7',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => '0'
				),
				array(
					'id'       => 'entry_meta_overlay_7',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					)
				),
				array(
					'id'       => 'bookmark_overlay_7',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			),
		);
	}
}


/** overlay 8 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_8' ) ) {
	function pixwell_register_options_styling_overlay_8() {
		return array(
			'id'         => 'pixwell_config_section_styling_overlay_8',
			'title'      => esc_html__( 'Post Overlay 8', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for layout overlay 8, this is a big overlay rectangle overlay layout. Show in block below: <em>Baby Carousel (Stretched)</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_overlay_8',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-8.jpg' ) . '" alt="overlay 8">' ),
				),
				array(
					'id'       => 'cat_info_overlay_8',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_overlay_8',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_overlay_8',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'date' => esc_html__( 'Date', 'pixwell' ),
						),
						'disabled' => array(
							'author'  => esc_html__( 'Author', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' )
						)
					)
				),
				array(
					'id'       => 'bookmark_overlay_8',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			),
		);
	}
}

/** overlay 9 */
if ( ! function_exists( 'pixwell_register_options_styling_overlay_9' ) ) {
	function pixwell_register_options_styling_overlay_9() {
		return array(
			'id'         => 'pixwell_config_section_styling_overlay_9',
			'title'      => esc_html__( 'Post Overlay 9', 'pixwell' ),
			'icon'       => 'el el-th-large',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for layout overlay 9. This is a fullwidth post layout. Show in blocks below: <em>Gadget Slider</em>', 'pixwell' ) ),
			'fields'     => array(
				array(
					'id'    => 'information_overlay_9',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-overlay-9.jpg' ) . '" alt="overlay 9">' ),
				),
				array(
					'id'       => 'cat_info_overlay_9',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_overlay_9',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => true
				),
				array(
					'id'       => 'excerpt_length_overlay_9',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_overlay_9',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => '0'
				),
				array(
					'id'       => 'entry_meta_overlay_9',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
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
					)
				),
				array(
					'id'       => 'bookmark_overlay_9',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			),
		);
	}
}


/** masonry 1 */
if ( ! function_exists( 'pixwell_register_options_styling_masonry_1' ) ) {
	function pixwell_register_options_styling_masonry_1() {
		return array(
			'id'         => 'pixwell_config_section_styling_masonry_1',
			'title'      => esc_html__( 'Post Masonry 1', 'pixwell' ),
			'icon'       => 'el el-random',
			'desc'       => html_entity_decode( esc_html__( 'Setup styles for the masonry grid 1 layout. This is a masonry grid layout (centered). Show in blocks below: <em>Masonry Grid 1 (FullWidth)</em><em>Masonry Mix 1 (Content)</em>', 'pixwell' ) ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'    => 'information_masonry_1',
					'type'  => 'info',
					'class' => 'layout-info',
					'title' => esc_html__( 'This Layout Looks Like:', 'pixwell' ),
					'style' => 'success',
					'desc'  => html_entity_decode( '<img src="' . get_theme_file_uri( 'assets/images/m-masonry-1.jpg' ) . '" alt="masonry 1">' ),
				),
				array(
					'id'       => 'cat_info_masonry_1',
					'title'    => esc_html__( 'Category Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable category meta info on the thumbnails (featured image).', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'custom_info_masonry_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Custom Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the custom meta display after the category icon.', 'pixwell' ),
					'default'  => 1,
				),
				array(
					'id'       => 'excerpt_length_masonry_1',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Max Excerpt Length', 'pixwell' ),
					'subtitle' => esc_html__( 'select max length of excerpts for this layout. Leave blank or set is 0 if you want to display all excerpt, -1 to disable it.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'excerpt_masonry_1',
					'title'    => esc_html__( 'Excerpt/Summary Type', 'pixwell' ),
					'subtitle' => esc_html__( 'select the Summary Type for this layout, support title tagline or excerpt.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'       => esc_html__( 'Excerpt', 'pixwell' ),
						'tagline' => esc_html__( 'Title Tagline', 'pixwell' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'entry_meta_masonry_1',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Info', 'pixwell' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info  to appear on this layout.', 'pixwell' ),
					'desc'     => esc_html__( 'The view counter feature requests the Post Views Counter plugin to work.', 'pixwell' ),
					'options'  => array(
						'enabled'  => array(
							'author' => esc_html__( 'Author', 'pixwell' ),
						),
						'disabled' => array(
							'date'    => esc_html__( 'Date', 'pixwell' ),
							'cat'     => esc_html__( 'Category', 'pixwell' ),
							'tag'     => esc_html__( 'Tags', 'pixwell' ),
							'view'    => esc_html__( 'View', 'pixwell' ),
							'comment' => esc_html__( 'Comment', 'pixwell' ),
							'custom'  => esc_html__( 'Custom', 'pixwell' )
						)
					),
				),
				array(
					'id'       => 'readmore_masonry_1',
					'title'    => esc_html__( 'Read More Button', 'pixwell' ),
					'subtitle' => esc_html__( 'enable or disable read more button for this layout.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'review_masonry_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable review icon on the featured image.', 'pixwell' ),
					'default'  => 1
				),
				array(
					'id'       => 'bookmark_masonry_1',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable read it later icon for this layout.', 'pixwell' ),
					'default'  => 0
				)
			)
		);
	}
}
