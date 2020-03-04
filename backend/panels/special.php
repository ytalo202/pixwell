<?php
/** newsletter */
if ( ! function_exists( 'pixwell_register_options_newsletter' ) ) {
	function pixwell_register_options_newsletter() {
		return array(
			'id'     => 'pixwell_theme_ops_section_subscribe',
			'title'  => esc_html__( 'Newsletter Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for the ruby newsletter popup form.', 'pixwell' ),
			'icon'   => 'el el-envelope',
			'fields' => array(
				array(
					'id'    => 'newsletter_download',
					'type'  => 'info',
					'title' => esc_html__( 'Download Ruby Subscribed Emails', 'pixwell' ),
					'style' => 'success',
					'desc'  => '<a class="download-btn" href="' . admin_url( 'tools.php?download=subscribed-emails.csv' ) . '">Download</a>',
				),
				array(
					'id'     => 'section_start_newsletter_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Newsletter Popup Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'newsletter_popup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Ruby Newsletter Popup', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the newsletter popup', 'pixwell' ),
					'default'  => true
				),
				array(
					'id'       => 'newsletter_popup_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Title', 'pixwell' ),
					'subtitle' => esc_html__( 'Input title for the newsletter popup form', 'pixwell' ),
					'default'  => esc_html__( 'Subscribe Newsletter', 'pixwell' ),
				),
				array(
					'id'       => 'newsletter_popup_description',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Description', 'pixwell' ),
					'subtitle' => esc_html__( 'Input description for the newsletter popup form', 'pixwell' ),
					'default'  => esc_html__( 'Get our latest news straight into your inbox.', 'pixwell' ),
				),
				array(
					'id'       => 'newsletter_popup_privacy',
					'type'     => 'text',
					'title'    => esc_html__( 'Privacy Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input privacy text for the newsletter popup form', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'newsletter_popup_cover',
					'type'     => 'media',
					'title'    => esc_html__( 'Cover Image', 'pixwell' ),
					'subtitle' => esc_html__( 'select cover image for the newsletter popup form', 'pixwell' ),
				),
				array(
					'id'       => 'newsletter_popup_submit',
					'type'     => 'text',
					'title'    => esc_html__( 'Submit Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input submit text for the newsletter popup form', 'pixwell' ),
					'default'  => esc_html__( 'Sign Up', 'pixwell' ),
				),
				array(
					'id'       => 'newsletter_popup_expired',
					'type'     => 'select',
					'title'    => esc_html__( 'Popup Expired', 'pixwell' ),
					'subtitle' => esc_html__( 'The period to redisplay the popup when visitors closed it.', 'pixwell' ),
					'options'  => array(
						'1'  => esc_html__( '1 Day', 'pixwell' ),
						'2'  => esc_html__( '2 Days', 'pixwell' ),
						'3'  => esc_html__( '3 Days', 'pixwell' ),
						'7'  => esc_html__( '1 Week', 'pixwell' ),
						'14' => esc_html__( '2 Weeks', 'pixwell' ),
						'21' => esc_html__( '3 Weeks', 'pixwell' ),
						'30' => esc_html__( '1 Month', 'pixwell' )
					),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_newsletter_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_newsletter_response_text',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Newsletter Response Info Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'newsletter_placeholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Email Placeholder Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input email placeholder text for the newsletter popup form', 'pixwell' ),
					'default'  => esc_html__( 'Input your e-mail', 'pixwell' ),
				),
				array(
					'id'       => 'newsletter_privacy_error',
					'type'     => 'text',
					'title'    => esc_html__( 'Notice - Privacy Error', 'pixwell' ),
					'subtitle' => esc_html__( 'Input privacy error text', 'pixwell' ),
					'default'  => esc_html__( 'Please accept the terms of our newsletter.', 'pixwell' ),
				),
				array(
					'id'       => 'newsletter_email_error',
					'type'     => 'text',
					'title'    => esc_html__( 'Notice - Email Error', 'pixwell' ),
					'subtitle' => esc_html__( 'Input email error text', 'pixwell' ),
					'default'  => esc_html__( 'Please input your email address.', 'pixwell' ),
				),
				array(
					'id'       => 'newsletter_email_exists',
					'type'     => 'text',
					'title'    => esc_html__( 'Notice - Email Exists', 'pixwell' ),
					'subtitle' => esc_html__( 'Input email exists text', 'pixwell' ),
					'default'  => esc_html__( 'That email is already subscribed.', 'pixwell' ),
				),
				array(
					'id'       => 'newsletter_success',
					'type'     => 'text',
					'title'    => esc_html__( 'Notice - Success', 'pixwell' ),
					'subtitle' => esc_html__( 'Input success text', 'pixwell' ),
					'default'  => esc_html__( 'Your address has been added.', 'pixwell' ),
				),
				array(
					'id'     => 'section_end_newsletter_response_text',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}


/** read it later */
if ( ! function_exists( 'pixwell_register_options_bookmark' ) ) {
	function pixwell_register_options_bookmark() {
		return array(
			'id'     => 'pixwell_theme_ops_section_bookmark',
			'title'  => esc_html__( 'Read it Later Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for the read it later feature.', 'pixwell' ),
			'icon'   => 'el el-heart',
			'fields' => array(
				array(
					'id'     => 'section_start_ruby_bookmark',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Read it Later Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'    => 'bookmark_notice',
					'type'  => 'info',
					'style' => 'success',
					'desc'  => esc_html__( 'This feature requests to create a page with the "Read it Later" template and assign it to the "Read it Later Page" option to view the bookmark list.', 'pixwell' ),
				),
				array(
					'id'       => 'header_bookmark',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read it Later', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the read it later button in the header.', 'pixwell' ),
					'default'  => 0
				),
				array(
					'id'       => 'header_bookmark_url',
					'type'     => 'select',
					'data'     => 'page',
					'title'    => esc_html__( 'Read it Later Page', 'pixwell' ),
					'subtitle' => esc_html__( 'Assign a page has created with the Read it Later template.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_ruby_bookmark',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}


/** reaction */
if ( ! function_exists( 'pixwell_register_options_reaction' ) ) {
	function pixwell_register_options_reaction() {
		return array(
			'id'     => 'pixwell_theme_ops_section_reaction',
			'title'  => esc_html__( 'Reaction Settings', 'pixwell' ),
			'desc'   => esc_html__( 'Select options for the reaction section.', 'pixwell' ),
			'icon'   => 'el el-smiley',
			'fields' => array(
				array(
					'id'     => 'section_start_ruby_reaction',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Reaction Settings', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_reaction',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reaction Section', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the reaction section at the end of single post pages.', 'pixwell' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'reaction_love',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reaction - Love', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the love reaction item.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'reaction_sad',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reaction - Sad', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sad reaction item.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'reaction_happy',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reaction - Happy', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the happy reaction item.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'reaction_sleepy',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reaction - Sleepy', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the sleepy reaction item.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'reaction_angry',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reaction - Angry', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the angry reaction item.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'reaction_dead',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reaction - Dead', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the dead reaction item.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'reaction_wink',
					'type'     => 'switch',
					'title'    => esc_html__( 'Reaction - Wink', 'pixwell' ),
					'subtitle' => esc_html__( 'Enable or disable the wink reaction item.', 'pixwell' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_ruby_reaction',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}



