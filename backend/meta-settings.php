<?php
/** add single metaboxes */
if ( function_exists( 'rb_register_meta_boxes' ) ) {
	add_filter( 'rb_meta_boxes', 'pixwell_register_metaboxes' );
}

/** metaboxes configs */
function pixwell_register_metaboxes( $pixwell_meta = array() ) {
	$pixwell_meta[] = array(
		'id'         => 'pixwell_post_options',
		'title'      => esc_html__( 'Pixwell Post Options', 'pixwell' ),
		'context'    => 'normal',
		'post_types' => array( 'post' ),
		'tabs'       => array(
			array(
				'id'     => 'pixwell-general',
				'title'  => esc_html__( 'General Settings', 'pixwell' ),
				'fields' => array(
					array(
						'id'      => 'title_tagline',
						'name'    => esc_html__( 'Title Tagline', 'pixwell' ),
						'desc'    => esc_html__( 'Input tagline for this post, this will display under the single post title.', 'pixwell' ),
						'type'    => 'textarea',
						'default' => ''
					),
					array(
						'name'        => esc_html__( 'Primary Category', 'pixwell' ),
						'id'          => 'primary_cat',
						'type'        => 'category_select',
						'taxonomy'    => 'category',
						'placeholder' => esc_html__( 'Select a Primary Category', 'pixwell' ),
						'desc'        => esc_html__( 'It is useful in case this post has a lot of categories and you want to display only one in listings.', 'pixwell' ),
						'default'     => ''
					),
					array(
						'id'      => 'meta_custom',
						'name'    => esc_html__( 'Custom Entry Meta - Value', 'pixwell' ),
						'desc'    => esc_html__( 'Input the value or text for your custom meta. (Theme Options > Design & Styles > Custom Entry Meta Settings)', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
					array(
						'id'      => 'single_top',
						'name'    => esc_html__( 'Top Content Section', 'pixwell' ),
						'desc'    => esc_html__( 'Enable or disable the widget section at the top of post content for this post.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'1'  => esc_html__( 'Enable', 'pixwell' ),
							'-1' => esc_html__( 'Disable', 'pixwell' )
						),
						'default' => '1'
					),
					array(
						'id'      => 'single_bottom',
						'name'    => esc_html__( 'Bottom Content Section', 'pixwell' ),
						'desc'    => esc_html__( 'Enable or disable the widget section at the bottom of post content for this post.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'1'  => esc_html__( 'Enable', 'pixwell' ),
							'-1' => esc_html__( 'Disable', 'pixwell' )
						),
						'default' => '1'
					),
					array(
						'id'      => 'single_schema',
						'name'    => esc_html__( 'SEO - Article Markup', 'pixwell' ),
						'desc'    => esc_html__( 'Enable or disable Schema markup for this article. Disable default schema markup for this post if you use a 3rd plugin to create another post type for example Recipe, Videos.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
							'-1'      => esc_html__( 'Enable', 'pixwell' ),
							'1'       => esc_html__( 'Disable', 'pixwell' )
						),
						'default' => 'default'
					)
				)
			),
			array(
				'id'     => 'pixwell-layout',
				'title'  => esc_html__( 'Layout Settings', 'pixwell' ),
				'fields' => array(
					array(
						'id'      => 'post_layout',
						'name'    => esc_html__( 'Single Layout', 'pixwell' ),
						'desc'    => esc_html__( 'Select a layout for this post, this option will override default settings in theme options.', 'pixwell' ),
						'type'    => 'image_select',
						'class'   => 'big',
						'options' => pixwell_add_settings_meta_single_layout(),
						'default' => 'default'
					),
					array(
						'id'      => 'sidebar_name',
						'name'    => esc_html__( 'Sidebar Name', 'pixwell' ),
						'desc'    => esc_html__( 'Assign a sidebar for this post if you select layouts have sidebar, This option will override default settings in theme options.', 'pixwell' ),
						'type'    => 'select',
						'options' => pixwell_add_settings_sidebar_name( true ),
						'default' => 'default'
					),
					array(
						'id'      => 'sidebar_pos',
						'name'    => esc_html__( 'Sidebar Position', 'pixwell' ),
						'desc'    => esc_html__( 'Select sidebar position for this post, This option will override default settings in theme options.', 'pixwell' ),
						'class'   => 'sidebar-select',
						'type'    => 'image_select',
						'options' => pixwell_add_settings_meta_sidebar_pos(),
						'default' => 'default'
					),
					array(
						'id'      => 'feat_size',
						'name'    => esc_html__( 'Featured Image Size', 'pixwell' ),
						'desc'    => esc_html__( 'Select the quality for this featured image, this option will override default settings in theme options.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'default' => esc_html__( 'Default From Theme Options', 'pixwell' ),
							'full'    => esc_html__( 'Full Size', 'pixwell' ),
							'crop'    => esc_html__( 'Crop Size', 'pixwell' )
						),
						'default' => 'default'
					),
					array(
						'id'      => 'feat_credit',
						'name'    => esc_html__( 'Featured Credit Text', 'pixwell' ),
						'desc'    => esc_html__( 'Input a credit text for the featured image, leave blank if you want to use the image title.', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					)
				)
			),
			/** post review */
			array(
				'id'     => 'pixwell-review',
				'title'  => esc_html__( 'Review Settings', 'pixwell' ),
				'fields' => array(
					array(
						'id'      => 'post_review',
						'name'    => esc_html__( 'Review Box', 'pixwell' ),
						'desc'    => esc_html__( 'Enable or disable the review for this post.', 'pixwell' ),
						'type'    => 'select',
						'class'   => 'ruby-review-checkbox',
						'options' => array(
							'-1' => esc_html__( '-- Disable --', 'pixwell' ),
							'1'  => esc_html__( 'Enable', 'pixwell' )
						),
						'default' => '-1'
					),
					array(
						'id'      => 'review_users',
						'name'    => esc_html__( 'Users Review', 'pixwell' ),
						'desc'    => esc_html__( 'Enable or disable users can review this post.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'-1' => esc_html__( '-- Disable --', 'pixwell' ),
							'1'  => esc_html__( 'Enable', 'pixwell' ),
						),
						'default' => '-1'
					),
					array(
						'id'      => 'review_style',
						'name'    => esc_html__( 'Review Box Style', 'pixwell' ),
						'desc'    => esc_html__( 'Select box review style.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'-1' => esc_html__( '-- Dark --', 'pixwell' ),
							'1'  => esc_html__( 'Light', 'pixwell' )
						),
						'default' => '-1'
					),
					array(
						'id'   => 'review_feat',
						'name' => esc_html__( 'Review Featured Image', 'pixwell' ),
						'desc' => esc_html__( 'Upload featured header image for your review box.', 'pixwell' ),
						'type' => 'file'
					),
					array(
						'id'   => 'review_label_1',
						'name' => esc_html__( 'Criteria 1 - Label', 'pixwell' ),
						'desc' => esc_html__( 'Input a label for criteria 1.', 'pixwell' ),
						'type' => 'text'
					),
					array(
						'name'  => esc_html__( 'Criteria 1 - Stars', 'pixwell' ),
						'desc'  => esc_html__( 'Input number of stars for criteria 1. The input should is a number between 1 and 5.', 'pixwell' ),
						'id'    => 'review_star_1',
						'type'  => 'text',
						'class' => 'input-small'
					),
					array(
						'id'   => 'review_label_2',
						'name' => esc_html__( 'Criteria 2 - Label', 'pixwell' ),
						'desc' => esc_html__( 'Input a label for criteria 2.', 'pixwell' ),
						'type' => 'text',
					),
					array(
						'id'    => 'review_star_2',
						'name'  => esc_html__( 'Criteria 2 - Stars', 'pixwell' ),
						'desc'  => esc_html__( 'Input number of stars for criteria 2. The input should is a number between 1 and 5.', 'pixwell' ),
						'type'  => 'text',
						'class' => 'input-small'
					),
					array(
						'id'   => 'review_label_3',
						'name' => esc_html__( 'Criteria 3 - Label', 'pixwell' ),
						'desc' => esc_html__( 'Input a label for criteria 3.', 'pixwell' ),
						'type' => 'text',
					),
					array(
						'id'    => 'review_star_3',
						'name'  => esc_html__( 'Criteria 3 - Stars', 'pixwell' ),
						'desc'  => esc_html__( 'Input number of stars for criteria 3. The input should is a number between 1 and 5.', 'pixwell' ),
						'type'  => 'text',
						'class' => 'input-small'
					),
					array(
						'id'   => 'review_label_4',
						'name' => esc_html__( 'Criteria 4 - Label', 'pixwell' ),
						'desc' => esc_html__( 'Input a label for criteria 4.', 'pixwell' ),
						'type' => 'text',
					),
					array(
						'id'    => 'review_star_4',
						'name'  => esc_html__( 'Criteria 4 - Stars', 'pixwell' ),
						'desc'  => esc_html__( 'Input number of stars for criteria 4. The input should is a number between 1 and 5.', 'pixwell' ),
						'type'  => 'text',
						'class' => 'input-small'
					),
					array(
						'id'   => 'review_label_5',
						'name' => esc_html__( 'Criteria 5 - Label', 'pixwell' ),
						'desc' => esc_html__( 'Input a label for criteria 5.', 'pixwell' ),
						'type' => 'text'
					),
					array(
						'id'    => 'review_star_5',
						'name'  => esc_html__( 'Criteria 5 - Stars', 'pixwell' ),
						'desc'  => esc_html__( 'Input number of stars for criteria 1. The input should is a number between 1 and 5.', 'pixwell' ),
						'type'  => 'text',
						'class' => 'input-small'
					),
					array(
						'id'   => 'review_label_6',
						'name' => esc_html__( 'Criteria 6 - Label', 'pixwell' ),
						'desc' => esc_html__( 'Input a label for criteria 6.', 'pixwell' ),
						'type' => 'text'
					),
					array(
						'id'    => 'review_star_6',
						'name'  => esc_html__( 'Criteria 6 - Stars', 'pixwell' ),
						'desc'  => esc_html__( 'Input number of stars for criteria 6. The input should is a number between 1 and 5.', 'pixwell' ),
						'type'  => 'text',
						'class' => 'input-small'
					),
					array(
						'id'   => 'review_label_7',
						'name' => esc_html__( 'Criteria 7 - Label', 'pixwell' ),
						'desc' => esc_html__( 'Input a label for criteria 6.', 'pixwell' ),
						'type' => 'text'
					),
					array(
						'id'    => 'review_star_7',
						'name'  => esc_html__( 'Criteria 7 - Stars', 'pixwell' ),
						'desc'  => esc_html__( 'Input number of stars for criteria 7. The input should is a number between 1 and 5.', 'pixwell' ),
						'type'  => 'text',
						'class' => 'input-small'
					),
					array(
						'id'   => 'review_meta',
						'name' => esc_html__( 'Short Meta Info', 'pixwell' ),
						'desc' => esc_html__( 'Input short meta info to display before the review score, For example: Good, Bad...', 'pixwell' ),
						'type' => 'text'
					),
					array(
						'id'   => 'review_pros',
						'name' => esc_html__( 'Pros Summary Section', 'pixwell' ),
						'desc' => esc_html__( 'Input pros summary for this review, separated by "/" example: positive 1/positive 2/positive 3', 'pixwell' ),
						'type' => 'textarea'
					),
					array(
						'id'   => 'review_cons',
						'name' => esc_html__( 'Cons Summary Section', 'pixwell' ),
						'desc' => esc_html__( 'Input cons summary for this review, separated by "/" example: negative 1/negative 2/negative 3', 'pixwell' ),
						'type' => 'textarea'
					),
					array(
						'id'   => 'review_summary',
						'name' => esc_html__( 'Final Summary Section', 'pixwell' ),
						'desc' => esc_html__( 'Input final summary for this review.', 'pixwell' ),
						'type' => 'textarea'
					)
				)
			),
			/** post video */
			array(
				'id'     => 'pixwell-video',
				'title'  => esc_html__( 'Video Settings', 'pixwell' ),
				'fields' => array(
					array(
						'id'      => 'video_url',
						'name'    => esc_html__( 'Video URL', 'pixwell' ),
						'desc'    => esc_html__( 'Input your video link, support: Youtube, Vimeo, DailyMotion. Do not forget to check "Video" in Post Format section.', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
					array(
						'id'   => 'video_embed',
						'name' => esc_html__( 'Iframe Embed Code', 'pixwell' ),
						'desc' => esc_html__( 'Input iframe embed code if WordPress cannot support your video URL.', 'pixwell' ),
						'type' => 'textarea'
					),
					array(
						'id'   => 'video_hosted',
						'name' => esc_html__( 'Self-Hosted Video', 'pixwell' ),
						'desc' => esc_html__( 'Upload your video file, support: mp4, m4v, webm, ogv, wmv, flv files.', 'pixwell' ),
						'type' => 'file'
					),
					array(
						'id'      => 'video_autoplay',
						'name'    => esc_html__( 'Autoplay Video', 'pixwell' ),
						'desc'    => esc_html__( 'enable or disable autoplay video for this post.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
							'1'       => esc_html__( 'Enable', 'pixwell' ),
							'-1'      => esc_html__( 'Disable', 'pixwell' )
						),
						'default' => 'default'
					),
				)
			),
			/** post audio */
			array(
				'id'     => 'pixwell-audio',
				'title'  => esc_html__( 'Audio Settings', 'pixwell' ),
				'fields' => array(
					array(
						'id'   => 'audio_url',
						'name' => esc_html__( 'Audio URL', 'pixwell' ),
						'desc' => esc_html__( 'Input your audio URL, support: SoundCloud, MixCloud. Do not forget to check "Audio" in Post Format section.', 'pixwell' ),
						'type' => 'text'
					),
					array(
						'id'   => 'audio_embed',
						'name' => esc_html__( 'Iframe Embed Code', 'pixwell' ),
						'desc' => esc_html__( 'Input iframe embed code if WordPress cannot support your audio URL.', 'pixwell' ),
						'type' => 'textarea'
					),
					array(
						'id'   => 'audio_hosted',
						'name' => esc_html__( 'Self-Hosted Audio', 'pixwell' ),
						'desc' => esc_html__( 'Upload your audio file, support: mp3, ogg, wma, m4a, wav files.', 'pixwell' ),
						'type' => 'file'
					)
				)
			),
			/** post gallery */
			array(
				'id'     => 'pixwell-gallery',
				'title'  => esc_html__( 'Gallery Settings', 'pixwell' ),
				'fields' => array(
					array(
						'id'      => 'gallery_data',
						'name'    => esc_html__( 'Upload Gallery', 'pixwell' ),
						'desc'    => esc_html__( 'Upload your images for this gallery, The gallery popup will get the title, caption and description of each image to display.', 'pixwell' ),
						'type'    => 'images',
						'default' => ''
					),
					array(
						'id'      => 'gallery_layout',
						'name'    => esc_html__( 'Gallery Layout', 'pixwell' ),
						'desc'    => esc_html__( 'select a layout for this gallery post, this option will override default settings in theme options.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'default' => esc_html__( 'Default From Theme Options', 'pixwell' ),
							'slide'   => esc_html__( 'Slider', 'pixwell' ),
							'list'    => esc_html__( 'List', 'pixwell' ),
							'grid'    => esc_html__( 'Small Grid', 'pixwell' )

						),
						'default' => 'default'
					)
				)
			),
			array(
				'id'     => 'pixwell-left-side',
				'title'  => esc_html__( 'Left Side Settings', 'pixwell' ),
				'fields' => array(
					array(
						'id'      => 'single_left',
						'name'    => esc_html__( 'Left Content Section', 'pixwell' ),
						'desc'    => esc_html__( 'Enable or disable the left side section, this option will override default settings in theme options.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
							'1'       => esc_html__( 'Enable', 'pixwell' ),
							'-1'      => esc_html__( 'Disable', 'pixwell' )
						),
						'default' => 'default'
					),
					array(
						'id'      => 'single_left_article',
						'name'    => esc_html__( 'Recommended Article', 'pixwell' ),
						'desc'    => esc_html__( 'Enable or disable the recommended article at the left side section, this option will override default settings in theme options.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'default' => esc_html__( 'Default from Theme Options', 'pixwell' ),
							'1'       => esc_html__( 'Enable', 'pixwell' ),
							'-1'      => esc_html__( 'Disable', 'pixwell' )
						),
						'default' => 'default'
					),
				)
			),
			/** Source/Via */
			array(
				'id'     => 'pixwell-via',
				'title'  => esc_html__( 'Source/Via Settings', 'pixwell' ),
				'fields' => array(
					array(
						'id'      => 'source_name',
						'name'    => esc_html__( 'Source Name', 'pixwell' ),
						'desc'    => esc_html__( 'Input a source name for this post, it will display at the bottom of post content.', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
					array(
						'id'      => 'source_url',
						'name'    => esc_html__( 'Source URL', 'pixwell' ),
						'desc'    => esc_html__( 'Input a source URL for this post.', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
					array(
						'id'      => 'via_name',
						'name'    => esc_html__( 'Via Name', 'pixwell' ),
						'desc'    => esc_html__( 'Input a via name for this post, it will display at the bottom of post content.', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
					array(
						'id'      => 'via_url',
						'name'    => esc_html__( 'via URL', 'pixwell' ),
						'desc'    => esc_html__( 'Input a via URL for this post.', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					)
				)
			),
			array(
				'id'     => 'pixwell-shop',
				'title'  => esc_html__( 'Shop The Post', 'pixwell' ),
				'fields' => array(
					array(
						'id'      => 'shop_post',
						'name'    => esc_html__( 'Shop the Post Section', 'pixwell' ),
						'desc'    => esc_html__( 'Enable or disable Shop the Post for this section.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'-1' => esc_html__( '-- Disable --', 'pixwell' ),
							'1'  => esc_html__( 'Enable', 'pixwell' )
						),
						'default' => '-1'
					),
					array(
						'id'      => 'shop_post_position',
						'name'    => esc_html__( 'Position', 'pixwell' ),
						'desc'    => esc_html__( 'Select position for the shop the post section.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'top'    => esc_html__( 'Top Content', 'pixwell' ),
							'bottom' => esc_html__( 'Bottom Content', 'pixwell' )
						),
						'default' => 'top'
					),
					array(
						'id'      => 'shop_post_title',
						'name'    => esc_html__( 'Header', 'pixwell' ),
						'desc'    => esc_html__( 'Input the header title for this section.', 'pixwell' ),
						'type'    => 'text',
						'default' => esc_html__( 'Shop This Post', 'pixwell' )
					),
					array(
						'id'      => 'shop_post_embed',
						'name'    => esc_html__( 'Embed Code', 'pixwell' ),
						'desc'    => esc_html__( 'Input your embed product code. Leave blank this field if you want to use woocommerce products.', 'pixwell' ),
						'type'    => 'textarea',
						'default' => ''
					),
					array(
						'id'      => 'shop_post_wc',
						'name'    => esc_html__( 'Woocommerce Product IDs', 'pixwell' ),
						'desc'    => esc_html__( 'Input product category IDs. separated product tag ids by comma. For example: 1000,1001,1002', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
				)
			),
			array(
				'id'     => 'pixwell-sponsor',
				'title'  => esc_html__( 'Sponsored Post', 'pixwell' ),
				'fields' => array(
					array(
						'id'      => 'sponsor_post',
						'name'    => esc_html__( 'Sponsored Post', 'pixwell' ),
						'desc'    => esc_html__( 'Enable or disable sponsored type for this post.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'-1' => esc_html__( '-- Disable --', 'pixwell' ),
							'1'  => esc_html__( 'Enable', 'pixwell' )
						),
						'default' => '-1'
					),
					array(
						'id'      => 'sponsor_url',
						'name'    => esc_html__( 'Sponsor URL', 'pixwell' ),
						'desc'    => esc_html__( 'Input the sponsor website URL.', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
					array(
						'id'      => 'sponsor_name',
						'name'    => esc_html__( 'Sponsor Name', 'pixwell' ),
						'desc'    => esc_html__( 'Input sponsor name', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
					array(
						'id'   => 'sponsor_logo',
						'name' => esc_html__( 'Sponsor Logo', 'pixwell' ),
						'desc' => esc_html__( 'Upload sponsor logo', 'pixwell' ),
						'type' => 'file'
					),
					array(
						'id'      => 'sponsor_redirect',
						'name'    => esc_html__( 'Directly Redirect', 'pixwell' ),
						'desc'    => esc_html__( 'Directly redirect to the sponsor website when clicking on the post listing title.', 'pixwell' ),
						'type'    => 'select',
						'options' => array(
							'-1' => esc_html__( '-- Disable --', 'pixwell' ),
							'1'  => esc_html__( 'Enable', 'pixwell' )
						),
					),
				)
			),
			array(
				'id'     => 'pixwell-shares',
				'title'  => 'Fake Shares Count',
				'fields' => array(
					array(
						'id'      => 'start_share',
						'name'    => esc_html__( 'Fake Share Counter Value', 'pixwell' ),
						'desc'    => esc_html__( 'Input a starting share value for this post, Leave blank if you want to display real data. NOTE: The share counter supports FACEBOOK & PINTEREST', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
					array(
						'id'      => 'start_view',
						'name'    => esc_html__( 'Fake View Counter Value', 'pixwell' ),
						'desc'    => esc_html__( 'Input a starting view value for this post. Leave blank if you want to display real data.', 'pixwell' ),
						'type'    => 'text',
						'default' => ''
					),
				)
			),
		)
	);

	/** page meta boxes */
	$pixwell_meta[] = array(
		'id'              => 'pixwell_page_options',
		'title'           => esc_html__( 'Pixwell Page Options', 'pixwell' ),
		'context'         => 'normal',
		'except_template' => 'rbc-frontend.php',
		'post_types'      => array( 'page' ),
		'fields'          => array(
			array(
				'id'      => 'page_layout',
				'name'    => esc_html__( 'Page Layout', 'pixwell' ),
				'desc'    => esc_html__( 'Select layout for this page.', 'pixwell' ),
				'type'    => 'select',
				'options' => array(
					'-1' => esc_html__( '-- FullWidth --', 'pixwell' ),
					'1'  => esc_html__( 'Content with Sidebar', 'pixwell' ),
				),
				'default' => '-1'
			),
			array(
				'id'      => 'page_title',
				'name'    => esc_html__( 'Page Header', 'pixwell' ),
				'desc'    => esc_html__( 'Enable or disable the page header (title and featured image).', 'pixwell' ),
				'type'    => 'select',
				'options' => array(
					'-1' => esc_html__( '-- Enable --', 'pixwell' ),
					'1'  => esc_html__( 'Disable', 'pixwell' ),
				),
				'default' => '-1'
			),
			array(
				'id'      => 'page_max_width',
				'name'    => esc_html__( 'FullWidth Content - MaxWidth', 'pixwell' ),
				'desc'    => esc_html__( 'Select max-width of this page content in the fullwidth layout (in pixel), Leave blank if you would like to set as the default.', 'pixwell' ),
				'type'    => 'text',
				'class'   => 'input-small',
				'default' => ''
			),
			array(
				'id'      => 'page_sidebar_name',
				'name'    => esc_html__( 'Sidebar Name', 'pixwell' ),
				'desc'    => esc_html__( 'Assign a sidebar for this post if you select layouts have sidebar, This option will override default settings in theme options.', 'pixwell' ),
				'options' => pixwell_add_settings_sidebar_name( false ),
				'type'    => 'select',
				'default' => 'pixwell_sidebar_default'
			),
			array(
				'id'      => 'page_sidebar_pos',
				'name'    => esc_html__( 'Sidebar Position', 'pixwell' ),
				'desc'    => esc_html__( 'Select sidebar position for this post, This option will override default settings in theme options.', 'pixwell' ),
				'class'   => 'sidebar-select',
				'type'    => 'image_select',
				'options' => pixwell_add_settings_meta_sidebar_pos(),
				'default' => 'default'
			)
		)
	);

	/** header options */
	$pixwell_meta[] = array(
		'id'               => 'pixwell_page_header_options',
		'title'            => esc_html__( 'Header Options', 'pixwell' ),
		'context'          => 'normal',
		'post_types'       => array( 'page' ),
		'include_template' => 'rbc-frontend.php',
		'fields'           => array(
			array(
				'id'      => 'header_float',
				'name'    => esc_html__( 'Header Transparent', 'pixwell' ),
				'desc'    => esc_html__( 'Enable or disable transparent header for this page.', 'pixwell' ),
				'type'    => 'select',
				'options' => array(
					'-1' => esc_html__( '-- Disable --', 'pixwell' ),
					'1'  => esc_html__( 'Enable', 'pixwell' ),
				),
				'default' => '-1'
			),
			array(
				'id'      => 'navbar_border',
				'name'    => esc_html__( 'Header 3 - Navigation Border', 'pixwell' ),
				'desc'    => esc_html__( 'Enable or disable the bottom border in header 3 layout.', 'pixwell' ),
				'type'    => 'select',
				'options' => array(
					'-1' => esc_html__( '-- Disable --', 'pixwell' ),
					'1'  => esc_html__( 'Enable', 'pixwell' ),
				),
				'default' => '-1'
			),
			array(
				'id'      => 'header_banner_border',
				'name'    => esc_html__( 'Header 7 - Banner Border', 'pixwell' ),
				'desc'    => esc_html__( 'Enable or disable the bottom border in header 7 layout.', 'pixwell' ),
				'type'    => 'select',
				'options' => array(
					'-1' => esc_html__( '-- Disable --', 'pixwell' ),
					'1'  => esc_html__( 'Enable', 'pixwell' ),
				),
				'default' => '-1'
			)
		)
	);

	/** ruby composer meta box */
	$pixwell_meta[] = array(
		'id'               => 'pixwell_page_composer_options',
		'title'            => esc_html__( 'RUBY COMPOSER - Latest Blog Section', 'pixwell' ),
		'context'          => 'normal',
		'include_template' => 'rbc-frontend.php',
		'post_types'       => array( 'page' ),
		'fields'           => array(
			array(
				'id'      => 'composer_blog',
				'name'    => esc_html__( 'Latest Blog Section', 'pixwell' ),
				'desc'    => esc_html__( 'Enable or disable the latest blog section.', 'pixwell' ),
				'type'    => 'select',
				'options' => array(
					'-1' => esc_html__( '-- Disable --', 'pixwell' ),
					'1'  => esc_html__( 'Enable', 'pixwell' )
				),
				'default' => '-1'
			),
			array(
				'id'      => 'composer_blog_title',
				'name'    => esc_html__( 'Section Title', 'pixwell' ),
				'desc'    => esc_html__( 'Input a title for this section.', 'pixwell' ),
				'type'    => 'text',
				'default' => esc_html__( 'The Latest News', 'pixwell' )
			),
			array(
				'id'      => 'composer_blog_layout',
				'name'    => esc_html__( 'Blog Layout', 'pixwell' ),
				'desc'    => esc_html__( 'Select blog listing layout for this page.', 'pixwell' ),
				'type'    => 'image_select',
				'class'   => 'big',
				'options' => array(
					'classic'   => get_theme_file_uri( 'assets/images/ct-classic.png' ),
					'ct_list'   => get_theme_file_uri( 'assets/images/ct-list.png' ),
					'ct_grid_1' => get_theme_file_uri( 'assets/images/ct-grid-1.png' ),
					'ct_grid_2' => get_theme_file_uri( 'assets/images/ct-grid-2.png' ),
					'fw_grid_1' => get_theme_file_uri( 'assets/images/fw-grid-1.png' ),
					'fw_grid_2' => get_theme_file_uri( 'assets/images/fw-grid-2.png' ),
					'fw_grid_3' => get_theme_file_uri( 'assets/images/fw-grid-3.png' ),
					'fw_list_1' => get_theme_file_uri( 'assets/images/fw-list-1.png' ),
					'fw_list_2' => get_theme_file_uri( 'assets/images/fw-list-2.png' )
				),
				'default' => 'classic'
			),
			array(
				'id'      => 'composer_blog_posts_per_page',
				'name'    => esc_html__( 'Posts per Page', 'pixwell' ),
				'desc'    => esc_html__( 'Select total posts to show per page.', 'pixwell' ),
				'type'    => 'text',
				'class'   => 'input-small',
				'default' => '6'
			),
			array(
				'id'    => 'composer_blog_offset',
				'name'  => esc_html__( 'Post Offset', 'pixwell' ),
				'desc'  => esc_html__( 'Select offset (number of posts to pass over) for this section, default is 0.', 'pixwell' ),
				'type'  => 'text',
				'class' => 'input-small'
			),
			array(
				'id'      => 'composer_blog_pagination',
				'name'    => esc_html__( 'Pagination', 'pixwell' ),
				'desc'    => esc_html__( 'Select pagination type for this section.', 'pixwell' ),
				'type'    => 'select',
				'options' => pixwell_add_settings_blog_pagination( false ),
				'default' => 'number'
			),
			array(
				'id'      => 'composer_blog_sidebar_name',
				'type'    => 'select',
				'name'    => esc_html__( 'Sidebar Name', 'pixwell' ),
				'desc'    => esc_html__( 'Assign a sidebar for this post if you select layouts have sidebar, This option will override default settings in theme options.', 'pixwell' ),
				'options' => pixwell_add_settings_sidebar_name( false ),
				'default' => 'pixwell_sidebar_default'
			),
			array(
				'id'      => 'composer_blog_sidebar_pos',
				'name'    => esc_html__( 'Sidebar Position', 'pixwell' ),
				'desc'    => esc_html__( 'Select sidebar position for this section.', 'pixwell' ),
				'class'   => 'sidebar-select',
				'type'    => 'image_select',
				'options' => pixwell_add_settings_meta_sidebar_pos(),
				'default' => 'default'
			)
		)
	);


	return $pixwell_meta;
}
