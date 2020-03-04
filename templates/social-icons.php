<?php
/**
 * @param      $data
 * @param      $class_name
 * @param bool $new_tab
 * @param bool $enable_icon
 *
 * @return string
 * render social icons
 */
if ( ! function_exists( 'pixwell_render_social_icons' ) ) :
	function pixwell_render_social_icons( $data = array(), $new_tab = true, $custom = true ) {

		if ( empty( $data ) ) {
			return false;
		}

		if ( true === $new_tab ) {
			$new_tab = 'target="_blank"';
		} else {
			$new_tab = '';
		}

		extract( shortcode_atts( array(
			'website'    => '',
			'facebook'   => '',
			'twitter'    => '',
			'pinterest'  => '',
			'linkedin'   => '',
			'tumblr'     => '',
			'flickr'     => '',
			'instagram'  => '',
			'skype'      => '',
			'snapchat'   => '',
			'myspace'    => '',
			'youtube'    => '',
			'bloglovin'  => '',
			'digg'       => '',
			'dribbble'   => '',
			'soundcloud' => '',
			'vimeo'      => '',
			'reddit'     => '',
			'vkontakte'  => '',
			'whatsapp'   => '',
			'rss'        => '',
		), $data ) );

		$str = '';

		if ( ! empty( $website ) ) {
			$str .= '<a class="social-link-website" title="' . esc_attr__( 'Website', 'pixwell' ) . '" href="' . esc_url( $website ) . '" ' . $new_tab . '><i class="rbi rbi-link"></i></a>';
		}
		if ( ! empty( $facebook ) ) {
			$str .= '<a class="social-link-facebook" title="' . esc_attr__( 'Facebook', 'pixwell' ) . '" href="' . esc_url( $facebook ) . '" ' . $new_tab . '><i class="rbi rbi-facebook"></i></a>';
		}
		if ( ! empty( $twitter ) ) {
			$str .= '<a class="social-link-twitter" title="' . esc_attr__( 'Twitter', 'pixwell' ) . '" href="' . esc_url( $twitter ) . '" ' . $new_tab . '><i class="rbi rbi-twitter"></i></a>';
		}
		if ( ! empty( $pinterest ) ) {
			$str .= '<a class="social-link-pinterest" title="' . esc_attr__( 'Pinterest', 'pixwell' ) . '" href="' . esc_url( $pinterest ) . '" ' . $new_tab . '><i class="rbi rbi-pinterest-i"></i></a>';
		}
		if ( ! empty( $instagram ) ) {
			$str .= '<a class="social-link-instagram" title="' . esc_attr__( 'Instagram', 'pixwell' ) . '" href="' . esc_url( $instagram ) . '" ' . $new_tab . '><i class="rbi rbi-instagram"></i></a>';
		}
		if ( ! empty( $linkedin ) ) {
			$str .= '<a class="social-link-linkedin" title="' . esc_attr__( 'LinkedIn', 'pixwell' ) . '" href="' . esc_url( $linkedin ) . '" ' . $new_tab . '><i class="rbi rbi-linkedin"></i></a>';
		}
		if ( ! empty( $tumblr ) ) {
			$str .= '<a class="social-link-tumblr" title="' . esc_attr__( 'Tumblr', 'pixwell' ) . '" href="' . esc_url( $tumblr ) . '" ' . $new_tab . '><i class="rbi rbi-tumblr"></i></a>';
		}
		if ( ! empty( $flickr ) ) {
			$str .= '<a class="social-link-flickr" title="' . esc_attr__( 'Flickr', 'pixwell' ) . '" href="' . esc_url( $flickr ) . '" ' . $new_tab . '><i class="rbi rbi-flickr"></i></a>';
		}
		if ( ! empty( $skype ) ) {
			$str .= '<a class="social-link-skype" title="' . esc_attr__( 'Skype', 'pixwell' ) . '" href="' . esc_url( $skype ) . '" ' . $new_tab . '><i class="rbi rbi-skype"></i></a>';
		}
		if ( ! empty( $snapchat ) ) {
			$str .= '<a class="social-link-snapchat" title="' . esc_attr__( 'SnapChat', 'pixwell' ) . '" href="' . esc_url( $snapchat ) . '" ' . $new_tab . '><i class="rbi rbi-snapchat"></i></a>';
		}
		if ( ! empty( $myspace ) ) {
			$str .= '<a class="social-link-myspace" title="' . esc_attr__( 'Myspace', 'pixwell' ) . '" href="' . esc_url( $myspace ) . '" ' . $new_tab . '><i class="rbi rbi-myspace"></i></a>';
		}
		if ( ! empty( $youtube ) ) {
			$str .= '<a class="social-link-youtube" title="' . esc_attr__( 'YouTube', 'pixwell' ) . '" href="' . esc_url( $youtube ) . '" ' . $new_tab . '><i class="rbi rbi-youtube-o"></i></a>';
		}
		if ( ! empty( $bloglovin ) ) {
			$str .= '<a class="social-link-bloglovin" title="' . esc_attr__( 'Bloglovin', 'pixwell' ) . '" href="' . esc_url( $bloglovin ) . '" ' . $new_tab . '><i class="rbi rbi-heart"></i></a>';
		}
		if ( ! empty( $digg ) ) {
			$str .= '<a class="social-link-digg" title="' . esc_attr__( 'Digg', 'pixwell' ) . '" href="' . esc_url( $digg ) . '" ' . $new_tab . '><i class="rbi rbi-digg"></i></a>';
		}
		if ( ! empty( $dribbble ) ) {
			$str .= '<a class="social-link-dribbble" title="' . esc_attr__( 'Dribbble', 'pixwell' ) . '" href="' . esc_url( $dribbble ) . '" ' . $new_tab . '><i class="rbi rbi-dribbble"></i></a>';
		}
		if ( ! empty( $soundcloud ) ) {
			$str .= '<a class="social-link-soundcloud" title="' . esc_attr__( 'SoundCloud', 'pixwell' ) . '" href="' . esc_url( $soundcloud ) . '" ' . $new_tab . '><i class="rbi rbi-soundcloud"></i></a>';
		}
		if ( ! empty( $vimeo ) ) {
			$str .= '<a class="social-link-vimeo" title="' . esc_attr__( 'Vimeo', 'pixwell' ) . '" href="' . esc_url( $vimeo ) . '" ' . $new_tab . '><i class="rbi rbi-vimeo"></i></a>';
		}
		if ( ! empty( $reddit ) ) {
			$str .= '<a class="social-link-reddit" title="' . esc_attr__( 'Reddit', 'pixwell' ) . '" href="' . esc_url( $reddit ) . '" ' . $new_tab . '><i class="rbi rbi-reddit"></i></a>';
		}
		if ( ! empty( $vkontakte ) ) {
			$str .= '<a class="social-link-vk" title="' . esc_attr__( 'Vkontakte', 'pixwell' ) . '" href="' . esc_url( $vkontakte ) . '" ' . $new_tab . '><i class="rbi rbi-vk"></i></a>';
		}
		if ( ! empty( $whatsapp ) ) {
			$str .= '<a class="social-link-whatsapp" title="' . esc_attr__( 'WhatsApp', 'pixwell' ) . '" href="' . esc_url( $whatsapp ) . '" ' . $new_tab . '><i class="rbi rbi-whatsapp"></i></a>';
		}
		if ( ! empty( $rss ) ) {
			$str .= '<a class="social-link-rss" title="' . esc_attr__( 'Rss', 'pixwell' ) . '" href="' . esc_url( $rss ) . '" ' . $new_tab . '><i class="rbi rbi-rss"></i></a>';
		}

		if ( true === $custom ) {

			$social_1_url  = pixwell_get_option( 'social_custom_1_url' );
			$social_1_name = pixwell_get_option( 'social_custom_1_name' );
			$social_1_icon = pixwell_get_option( 'social_custom_1_icon' );

			$social_2_url  = pixwell_get_option( 'social_custom_2_url' );
			$social_2_name = pixwell_get_option( 'social_custom_2_name' );
			$social_2_icon = pixwell_get_option( 'social_custom_2_icon' );

			$social_3_url  = pixwell_get_option( 'social_custom_3_url' );
			$social_3_name = pixwell_get_option( 'social_custom_3_name' );
			$social_3_icon = pixwell_get_option( 'social_custom_3_icon' );

			if ( ! empty( $social_1_url ) && ! empty( $social_1_name ) ) {
				$str .= '<a class="social-link-custom social-link-' . esc_attr( $social_1_name ) . '" title="' . esc_attr( $social_1_name ) . '" href="' . esc_url( $social_1_url ) . '" ' . $new_tab . '><i class="' . esc_attr( $social_1_icon ) . '"></i></a>';
			}
			if ( ! empty( $social_2_url ) && ! empty( $social_2_name ) ) {
				$str .= '<a class="social-link-custom social-link-' . esc_attr( $social_2_name ) . '" title="' . esc_attr( $social_2_name ) . '" href="' . esc_url( $social_2_url ) . '" ' . $new_tab . '><i class="' . esc_attr( $social_2_icon ) . '"></i></a>';
			}
			if ( ! empty( $social_3_url ) && ! empty( $social_3_name ) ) {
				$str .= '<a class="social-link-custom social-link-' . esc_attr( $social_3_name ) . '" title="' . esc_attr( $social_3_name ) . '" href="' . esc_url( $social_3_url ) . '" ' . $new_tab . '><i class="' . esc_attr( $social_3_icon ) . '"></i></a>';
			}
		}

		return $str;
	}

endif;