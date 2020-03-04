<?php
/** social profiles */
if ( ! function_exists( 'pixwell_register_options_social_profile' ) ) {
	function pixwell_register_options_social_profile() {
		return array(
			'id'     => 'social_theme_options_section_social_profile',
			'title'  => esc_html__( 'Site Social Profiles', 'pixwell' ),
			'icon'   => 'el el-twitter',
			'desc'   => esc_html__( 'options below for setting up the sites socials. To add users/authors socials, go to the Users -> your site profile.', 'pixwell' ),
			'fields' => array(
				array(
					'id'     => 'section_start_social_profile',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Social Profiles', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'social_facebook',
					'type'     => 'text',
					'title'    => esc_html__( 'Facebook URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'social_twitter',
					'type'     => 'text',
					'title'    => esc_html__( 'Twitter URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'social_instagram',
					'type'     => 'text',
					'title'    => esc_html__( 'Instagram URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'social_pinterest',
					'type'     => 'text',
					'title'    => esc_html__( 'Pinterest URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' ),
					'default'  => ''
				),
				array(
					'id'       => 'social_linkedin',
					'type'     => 'text',
					'title'    => esc_html__( 'LinkedIn URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_tumblr',
					'type'     => 'text',
					'title'    => esc_html__( 'Tumblr URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_flickr',
					'type'     => 'text',
					'title'    => esc_html__( 'Flickr URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_skype',
					'type'     => 'text',
					'title'    => esc_html__( 'Skype URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_snapchat',
					'type'     => 'text',
					'title'    => esc_html__( 'Snapchat URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_myspace',
					'type'     => 'text',
					'title'    => esc_html__( 'Myspace URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_youtube',
					'type'     => 'text',
					'title'    => esc_html__( 'Youtube URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_bloglovin',
					'type'     => 'text',
					'title'    => esc_html__( 'Bloglovin URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_digg',
					'type'     => 'text',
					'title'    => esc_html__( 'Digg URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_dribbble',
					'type'     => 'text',
					'title'    => esc_html__( 'Dribbble URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_soundcloud',
					'type'     => 'text',
					'title'    => esc_html__( 'Soundcloud URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_vimeo',
					'type'     => 'text',
					'title'    => esc_html__( 'Vimeo URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_reddit',
					'type'     => 'text',
					'title'    => esc_html__( 'Reddit URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_vk',
					'type'     => 'text',
					'title'    => esc_html__( 'VKontakte URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_whatsapp',
					'type'     => 'text',
					'title'    => esc_html__( 'Whatsapp URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'       => 'social_rss',
					'type'     => 'text',
					'title'    => esc_html__( 'Rss URL ', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'pixwell' )
				),
				array(
					'id'     => 'section_end_social_profile',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_social_profile_custom',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Custom Social Profiles', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'social_custom_1_url',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Custom social 1 - URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL.', 'pixwell' )
				),
				array(
					'id'       => 'social_custom_1_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 1 - Name', 'pixwell' ),
					'subtitle' => esc_html__( 'input the name of the social, for example: facebook, twitter.', 'pixwell' )
				),
				array(
					'id'       => 'social_custom_1_icon',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 1 - Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'input the name of font icon, for example: rbi rbi-facebook. Pixwell supports font ruby icons, you can find all icons here: https://icons.themeruby.com/pixwell/', 'pixwell' ),
					'default'  => '',
				),
				array(
					'id'          => 'social_custom_1_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Custom Social 1 - Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'select a color for this social icon.', 'pixwell' )
				),
				array(
					'id'       => 'social_custom_2_url',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Custom social 2 - URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL.', 'pixwell' )
				),
				array(
					'id'       => 'social_custom_2_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 2 - Name', 'pixwell' ),
					'subtitle' => esc_html__( 'input the name of the social, for example: facebook, twitter.', 'pixwell' )
				),
				array(
					'id'       => 'social_custom_2_icon',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 2 - Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'input the name of font icon, for example: rbi rbi-facebook. Pixwell supports font ruby icons, you can find all icons here: https://icons.themeruby.com/pixwell/', 'pixwell' ),
					'default'  => '',
				),
				array(
					'id'          => 'social_custom_2_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Custom Social 2 - Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'select a color for this social icon.', 'pixwell' )
				),
				array(
					'id'       => 'social_custom_3_url',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Custom social 3 - URL', 'pixwell' ),
					'subtitle' => esc_html__( 'input your site profile URL.', 'pixwell' )
				),
				array(
					'id'       => 'social_custom_3_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 3 - Name', 'pixwell' ),
					'subtitle' => esc_html__( 'input the name of the social, for example: facebook, twitter.', 'pixwell' )
				),
				array(
					'id'       => 'social_custom_3_icon',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 3 - Icon', 'pixwell' ),
					'subtitle' => esc_html__( 'input the name of font icon, for example: rbi rbi-facebook. Pixwell supports font ruby icons, you can find all icons here: https://icons.themeruby.com/pixwell/', 'pixwell' ),
					'default'  => '',
				),
				array(
					'id'          => 'social_custom_3_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Custom Social 3 - Color', 'pixwell' ),
					'subtitle'    => esc_html__( 'select a color for this social icon.', 'pixwell' )
				),
				array(
					'id'     => 'section_end_social_profile_custom',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}