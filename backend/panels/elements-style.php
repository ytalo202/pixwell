<?php
/* global styling */
if ( ! function_exists( 'pixwell_register_options_styling_global' ) ) {
	function pixwell_register_options_styling_global() {
		return array(
			'id'     => 'pixwell_config_section_styling_global',
			'title'  => esc_html__( 'Styles & Design', 'pixwell' ),
			'icon'   => 'el el-puzzle',
			'desc'   => esc_html__( 'Select style options for blocks and elements on your site. Those options will apply to whole pages.', 'pixwell' ),
			'fields' => array(
				array(
					'id'     => 'section_start_styling_block',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Block & Widget Header Styles', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'block_header_style',
					'title'    => esc_html__( 'Block Header Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select style for the header block/section, this option will apply to all header of composer block and other page sections.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'dot' => esc_html__( '--Default-- (Dot)', 'pixwell' ),
						'1'   => esc_html__( 'Style 1 (Small Border)', 'pixwell' ),
						'2'   => esc_html__( 'Style 2 (Centered & Small Line)', 'pixwell' ),
						'3'   => esc_html__( 'Style 3 (Left No Border Radius)', 'pixwell' ),
						'4'   => esc_html__( 'Style 4 (Background)', 'pixwell' ),
						'5'   => esc_html__( 'Style 5 (Centered and Bold Line)', 'pixwell' ),
						'6'   => esc_html__( 'Style 6 (Left Content with Big Dot)', 'pixwell' ),
					),
					'default'  => 'dot',
				),
				array(
					'id'       => 'widget_header_style',
					'title'    => esc_html__( 'Sidebar - Widget Header Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select style for sidebar widgets.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'1' => esc_html__( '--Default-- (Only Title)', 'pixwell' ),
						'2' => esc_html__( 'Style 2 (Centered)', 'pixwell' ),
						'3' => esc_html__( 'Style 3 (Background)', 'pixwell' )
					),
					'default'  => 1,
				),
				array(
					'id'       => 'entry_meta_style',
					'title'    => esc_html__( 'Entry Meta Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select style for post entry meta.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'0'      => esc_html__( '--Default--', 'pixwell' ),
						'border' => esc_html__( 'Top Border (Fashion Style)', 'pixwell' )
					),
					'default'  => 0,
				),
				array(
					'id'     => 'section_end_styling_block',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_styling_post',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Elements Style & Animation', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'style_element',
					'title'    => esc_html__( 'Elements Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select a style for almost elements and buttons in your website.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'none'      => esc_html__( 'Rectangle', 'pixwell' ),
						'round'     => esc_html__( 'Rounded Corner (Without Featured)', 'pixwell' ),
						'round_all' => esc_html__( 'Rounded Corner (With Featured)', 'pixwell' ),
					),
					'default'  => 'none',
				),
				array(
					'id'       => 'style_cat_icon',
					'title'    => esc_html__( 'Category Icon Style', 'pixwell' ),
					'subtitle' => esc_html__( 'Select the category meta info (The category icon is displayed overlay on the featured image.) style.', 'pixwell' ),
					'type'     => 'select',
					'options'  => array(
						'radius' => esc_html__( '--Default-- (Square)', 'pixwell' ),
						'round'  => esc_html__( 'Rounded Corner', 'pixwell' ),
						'square' => esc_html__( 'Small Square', 'pixwell' ),
						'line'   => esc_html__( 'Underline Text', 'pixwell' ),
						'simple' => esc_html__( 'Text Only', 'pixwell' )
					),
					'default'  => 'radius',
				),
				array(
					'id'       => 'meta_shop_post',
					'title'    => esc_html__( 'Shop the Post Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Display shop the post text with icon, replace to entry meta info of post enabled this feature.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1,
				),
				array(
					'id'       => 'readmore_icon',
					'title'    => esc_html__( 'Read More Arrow Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Show arrow icon after the read more text.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1,
				),
				array(
					'id'       => 'readmore_mobile',
					'title'    => esc_html__( 'Hide Read More on Mobile', 'pixwell' ),
					'subtitle' => esc_html__( 'Hide the read more link on mobile devices.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0,
				),
				array(
					'id'       => 'excerpt_mobile',
					'title'    => esc_html__( 'Hide Excerpt on Mobile', 'pixwell' ),
					'subtitle' => esc_html__( 'Hide post excerpt on mobile devices.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1,
				),
				array(
					'id'       => 'pos_feat',
					'type'     => 'select',
					'title'    => esc_html__( 'Featured Image - Crop Position', 'pixwell' ),
					'subtitle' => esc_html__( 'Select position to crop featured images. Recommended select top position if you have people images.', 'pixwell' ),
					'desc'     => esc_html__( 'Run the Regenerate thumbnail plugin to make the change applies to old images.', 'pixwell' ),
					'options'  => array(
						'center' => esc_html__( 'From The Center', 'pixwell' ),
						'top'    => esc_html__( 'From The Top', 'pixwell' ),
					),
					'default'  => 'center'
				),
				array(
					'id'       => 'feat_overlay',
					'type'     => 'switch',
					'title'    => esc_html__( 'Dark Overlay on Featured Image', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable overlay on the featured images.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'pagination_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Pagination Layout', 'pixwell' ),
					'subtitle' => esc_html__( 'Select pagination button color style for your website.', 'pixwell' ),
					'options'  => array(
						'light' => esc_html__( 'Light Background', 'pixwell' ),
						'dark'  => esc_html__( 'Dark Background', 'pixwell' ),
					),
					'default'  => 'light'
				),
				array(
					'id'     => 'section_end_styling_post',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_styling_entry_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Entry Meta Style', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'meta_date_icon',
					'title'    => esc_html__( 'Icon before Date Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Show the clock icon before the date entry meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				),
				array(
					'id'       => 'human_time',
					'title'    => esc_html__( 'Human Time Format', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the human time format ("ago") for the date.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'meta_author_icon',
					'title'    => esc_html__( 'Avatar before Author Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Show avatar image before the author entry meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1,
				),

				array(
					'id'       => 'meta_comment_icon',
					'title'    => esc_html__( 'Icon before Comment Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Show icon before the comment entry meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				),
				array(
					'id'       => 'meta_view_icon',
					'title'    => esc_html__( 'Icon before View Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'Show eye icon before the view entry meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => false,
				),
				array(
					'id'     => 'section_end_styling_entry_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_lazy_load',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Lazy Load Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'lazy_load',
					'type'     => 'switch',
					'title'    => esc_html__( 'Lazy Load Featured Images', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the lazy load feature images.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_lazy_load',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_styling_custom_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Custom Entry Meta Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'meta_custom',
					'title'    => esc_html__( 'Create Custom Entry Meta', 'pixwell' ),
					'subtitle' => esc_html__( 'The new small entry meta will appear after the category icon on the featured image. This feature allow you can create your own entry meta.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1,
				),
				array(
					'id'       => 'meta_custom_text',
					'title'    => esc_html__( 'Custom Entry Meta - Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input your custom meta text, This text will combine with the value in the post editor (append to the end) to display.', 'pixwell' ),
					'type'     => 'text',
					'default'  => esc_html__( 'reading', 'pixwell' )
				),
				array(
					'id'       => 'meta_custom_icon',
					'title'    => esc_html__( 'Icon CSS Class Name', 'pixwell' ),
					'subtitle' => esc_html__( 'Input the CSS class name of the icon to display at the beginning of the meta.', 'pixwell' ),
					'type'     => 'text',
					'default'  => 'rbi-fish-eye',
				),
				array(
					'id'     => 'section_end_styling_custom_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_styling_post_format',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Format Icons', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'post_icon_video',
					'title'    => esc_html__( 'Video Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the video icon in the featured image.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'post_icon_gallery',
					'title'    => esc_html__( 'Gallery Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the gallery icon in the featured image.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'post_icon_audio',
					'title'    => esc_html__( 'Audio Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the audio icon in the featured image.', 'pixwell' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_styling_post_format',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_styling_slider',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Slider Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'slider_play',
					'type'     => 'switch',
					'title'    => esc_html__( 'Auto Play Next Slides', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable auto play next slides for all sliders in your site.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'slider_speed',
					'type'     => 'text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Auto Play Speed', 'pixwell' ),
					'subtitle' => esc_html__( 'Select the item to next a slide in milliseconds (default is 5500).', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'slider_dot',
					'type'     => 'switch',
					'title'    => esc_html__( 'Slider Dot', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable slider dot in your website.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_styling_slider',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			),
		);
	}
}

