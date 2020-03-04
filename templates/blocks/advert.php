<?php
/**
 * @param $attrs
 * advert block
 */
if ( ! function_exists( 'pixwell_rbc_advert' ) ) {
	function pixwell_rbc_advert( $attrs, $content ) {
		$settings = shortcode_atts( array(
			'uuid'            => '',
			'title'           => '',
			'destination'     => '',
			'image'           => '',
			'ad_size'         => '',
			'ad_size_desktop' => '',
			'ad_size_tablet'  => '',
			'ad_size_mobile'  => '',
		), $attrs );

		$settings['id']        = $settings['uuid'];
		$settings['ad_script'] = $content;
		$settings['classes']   = 'fw-block block-advert none-margin';
		$settings['block_tag'] = 'div';

		ob_start();
		pixwell_block_open( $settings );
		pixwell_block_content_open( $settings );
		if ( ! empty( $settings['image'] ) ) : ?>
			<aside class="advert-wrap advert-image"><?php pixwell_ad_image( $settings ); ?></aside>
		<?php else : ?>
			<aside class="advert-wrap advert-script"><?php pixwell_ad_script( $settings ); ?></aside>
		<?php endif;
		pixwell_block_content_close();
		pixwell_block_close( $settings );

		return ob_get_clean();
	}
}


/**
 * @param $blocks
 *
 * @return array
 * register block settings
 */
if ( ! function_exists( 'pixwell_register_advert' ) ) {
	function pixwell_register_advert( $blocks ) {

		if ( ! is_array( $blocks ) ) {
			$blocks = array();
		}

		$blocks[] = array(
			'name'        => 'advert',
			'title'       => esc_html__( 'Advert', 'pixwell' ),
			'description' => esc_html__( 'Display adverts in fullwidth and content section.', 'pixwell' ),
			'section'     => array( 'fullwidth', 'content' ),
			'img'         => get_theme_file_uri( 'assets/images/ad.png' ),
			'inputs'      => array(
				array(
					'name'        => 'title',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Small Title', 'pixwell' ),
					'description' => esc_html__( 'Input a small title to display at the top of your advert', 'pixwell' ),
					'default'     => esc_html__( '- Advertisement -', 'pixwell' )
				),
				array(
					'name'        => 'destination',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Image type - Destination Link', 'pixwell' ),
					'description' => esc_html__( 'Input advert destination if you use image ad type.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'image',
					'type'        => 'text',
					'tab'         => 'general',
					'title'       => esc_html__( 'Image type - Image', 'pixwell' ),
					'description' => esc_html__( 'Input the attachment URL of advert image.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'raw_html',
					'type'        => 'textarea',
					'tab'         => 'general',
					'title'       => esc_html__( 'JS or Google AdSense Code', 'pixwell' ),
					'description' => esc_html__( 'Please leave empty image type options if you use the script option.', 'pixwell' ),
					'default'     => ''
				),
				array(
					'name'        => 'ad_size',
					'type'        => 'select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Adsense Responsive', 'pixwell' ),
					'description' => esc_html__( 'Select size for adsense. Those option only apply to Adsense script.', 'pixwell' ),
					'options'     => array(
						'0' => esc_html__( 'From the Script', 'pixwell' ),
						'1' => esc_html__( 'Custom Size (Settings Below)', 'pixwell' ),
					),
					'default'     => '0'
				),
				array(
					'name'        => 'ad_size_desktop',
					'type'        => 'select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Ad Size Desktop', 'pixwell' ),
					'description' => esc_html__( 'Select the ad size for desktop devices.', 'pixwell' ),
					'options'     => array(
						'0'  => esc_html__( 'Hide on Desktop', 'pixwell' ),
						'1'  => esc_html__( 'Leaderboard (728x90)', 'pixwell' ),
						'2'  => esc_html__( 'Banner (468x60)', 'pixwell' ),
						'3'  => esc_html__( 'Half banner (234x60)', 'pixwell' ),
						'4'  => esc_html__( 'Button (125x125)', 'pixwell' ),
						'5'  => esc_html__( 'Skyscraper (120x600)', 'pixwell' ),
						'6'  => esc_html__( 'Wide Skyscraper (160x600)', 'pixwell' ),
						'7'  => esc_html__( 'Small Rectangle (180x150)', 'pixwell' ),
						'8'  => esc_html__( 'Vertical Banner (120 x 240)', 'pixwell' ),
						'9'  => esc_html__( 'Small Square (200x200)', 'pixwell' ),
						'10' => esc_html__( 'Square (250x250)', 'pixwell' ),
						'11' => esc_html__( 'Medium Rectangle (300x250)', 'pixwell' ),
						'12' => esc_html__( 'Large Rectangle (336x280)', 'pixwell' ),
						'13' => esc_html__( 'Half Page (300x600)', 'pixwell' ),
						'14' => esc_html__( 'Portrait (300x1050)', 'pixwell' ),
						'15' => esc_html__( 'Mobile Banner (320x50)', 'pixwell' ),
						'16' => esc_html__( 'Large Leaderboard (970x90)', 'pixwell' ),
						'17' => esc_html__( 'Billboard (970x250)', 'pixwell' ),
					),
					'default'     => '1'
				),
				array(
					'name'        => 'ad_size_tablet',
					'type'        => 'select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Ad Size Tablet', 'pixwell' ),
					'description' => esc_html__( 'Select ad size for tablet devices (screen width less than 800px).', 'pixwell' ),
					'options'     => array(
						'0'  => esc_html__( 'Hide on Desktop', 'pixwell' ),
						'1'  => esc_html__( 'Leaderboard (728x90)', 'pixwell' ),
						'2'  => esc_html__( 'Banner (468x60)', 'pixwell' ),
						'3'  => esc_html__( 'Half banner (234x60)', 'pixwell' ),
						'4'  => esc_html__( 'Button (125x125)', 'pixwell' ),
						'5'  => esc_html__( 'Skyscraper (120x600)', 'pixwell' ),
						'6'  => esc_html__( 'Wide Skyscraper (160x600)', 'pixwell' ),
						'7'  => esc_html__( 'Small Rectangle (180x150)', 'pixwell' ),
						'8'  => esc_html__( 'Vertical Banner (120 x 240)', 'pixwell' ),
						'9'  => esc_html__( 'Small Square (200x200)', 'pixwell' ),
						'10' => esc_html__( 'Square (250x250)', 'pixwell' ),
						'11' => esc_html__( 'Medium Rectangle (300x250)', 'pixwell' ),
						'12' => esc_html__( 'Large Rectangle (336x280)', 'pixwell' ),
						'13' => esc_html__( 'Half Page (300x600)', 'pixwell' ),
						'14' => esc_html__( 'Portrait (300x1050)', 'pixwell' ),
						'15' => esc_html__( 'Mobile Banner (320x50)', 'pixwell' ),
						'16' => esc_html__( 'Large Leaderboard (970x90)', 'pixwell' ),
						'17' => esc_html__( 'Billboard (970x250)', 'pixwell' ),
					),
					'default'     => '2'
				),
				array(
					'name'        => 'ad_size_mobile',
					'type'        => 'select',
					'tab'         => 'general',
					'title'       => esc_html__( 'Ad Size Mobile', 'pixwell' ),
					'description' => esc_html__( 'Select ad size for mobile devices (Screen width less than 500px )', 'pixwell' ),
					'options'     => array(
						'0'  => esc_html__( 'Hide on Desktop', 'pixwell' ),
						'1'  => esc_html__( 'Leaderboard (728x90)', 'pixwell' ),
						'2'  => esc_html__( 'Banner (468x60)', 'pixwell' ),
						'3'  => esc_html__( 'Half banner (234x60)', 'pixwell' ),
						'4'  => esc_html__( 'Button (125x125)', 'pixwell' ),
						'5'  => esc_html__( 'Skyscraper (120x600)', 'pixwell' ),
						'6'  => esc_html__( 'Wide Skyscraper (160x600)', 'pixwell' ),
						'7'  => esc_html__( 'Small Rectangle (180x150)', 'pixwell' ),
						'8'  => esc_html__( 'Vertical Banner (120 x 240)', 'pixwell' ),
						'9'  => esc_html__( 'Small Square (200x200)', 'pixwell' ),
						'10' => esc_html__( 'Square (250x250)', 'pixwell' ),
						'11' => esc_html__( 'Medium Rectangle (300x250)', 'pixwell' ),
						'12' => esc_html__( 'Large Rectangle (336x280)', 'pixwell' ),
						'13' => esc_html__( 'Half Page (300x600)', 'pixwell' ),
						'14' => esc_html__( 'Portrait (300x1050)', 'pixwell' ),
						'15' => esc_html__( 'Mobile Banner (320x50)', 'pixwell' ),
						'16' => esc_html__( 'Large Leaderboard (970x90)', 'pixwell' ),
						'17' => esc_html__( 'Billboard (970x250)', 'pixwell' ),
					),
					'default'     => '3'
				),
				array(
					'name'        => 'margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block, default is 50px', 'pixwell' ),
					'default'     => array(
						'top'    => 0,
						'bottom' => 50
					),
				),
				array(
					'name'        => 'mobile_margin',
					'type'        => 'dimension',
					'tab'         => 'design',
					'title'       => esc_html__( 'Mobile - Margin', 'pixwell' ),
					'description' => esc_html__( 'Select margin top and bottom values (in px) for this block in mobile devices, default is 35px', 'pixwell' ),
					'default'     => array(
						'top'    => 0,
						'bottom' => 35
					),
				),
			),
		);

		return $blocks;
	}
}

add_filter( 'rbc_add_block', 'pixwell_register_advert', 2010 );