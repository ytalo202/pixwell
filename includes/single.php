<?php
/**
 * @return bool|mixed
 * single post layout
 */
if ( ! function_exists( 'pixwell_get_single_layout' ) ) {
	function pixwell_get_single_layout() {
		$layout = rb_get_meta( 'post_layout' );
		if ( empty( $layout ) || 'default' == $layout ) {
			$layout = pixwell_get_option( 'single_post_layout' );
		}

		return $layout;
	}
}

/**
 * @return array
 * sidebar position
 */
if ( ! function_exists( 'pixwell_get_single_sidebar_name' ) ) {
	function pixwell_get_single_sidebar_name() {

		global $wp_query;

		if ( isset( $wp_query->query_vars['rbsnp'] ) ) {
			$setting = pixwell_get_option( 'ajax_next_sidebar_name' );
			if ( ! empty( $setting ) ) {
				return $setting;
			}
		}

		$setting = rb_get_meta( 'sidebar_name' );
		if ( empty( $setting ) || 'default' == $setting ) {
			$setting = pixwell_get_option( 'single_post_sidebar_name' );
		}

		if ( empty( $setting ) ) {
			$setting = 'pixwell_sidebar_default';
		}

		return $setting;
	}
}

/**
 * @return bool
 * single_post_left_section
 */
if ( ! function_exists( 'pixwell_get_single_left_section' ) ) {
	function pixwell_get_single_left_section() {

		$setting = rb_get_meta( 'single_left' );

		if ( empty( $setting ) || 'default' == $setting ) {
			$setting = pixwell_get_option( 'single_post_left_section' );
		}

		if ( empty( $setting ) || - 1 == $setting ) {
			return false;
		}

		/** check inner sections */
		$share_left = pixwell_get_option( 'share_left' );
		if ( empty( $share_left ) || ! function_exists( 'pixwell_render_share_icon' ) ) {
			$share_left = 0;
		}
		if ( 1 == $share_left ) {
			$settings = array(
				'facebook'  => pixwell_get_option( 'share_left_facebook' ),
				'twitter'   => pixwell_get_option( 'share_left_twitter' ),
				'pinterest' => pixwell_get_option( 'share_left_pinterest' ),
				'linkedin'  => pixwell_get_option( 'share_left_linkedin' ),
				'tumblr'    => pixwell_get_option( 'share_left_tumblr' ),
				'reddit'    => pixwell_get_option( 'share_left_reddit' ),
				'vk'        => pixwell_get_option( 'share_left_vk' ),
				'email'     => pixwell_get_option( 'share_left_email' ),
			);

			if ( ! array_filter( $settings ) ) {
				$share_left = 0;
			}
		}

		ob_start();
		pixwell_single_left_article();
		$left_article = ob_get_clean();

		if ( empty( $share_left ) && empty( $left_article ) ) {
			return false;
		}

		return true;
	}
}

/**
 * @return bool
 * left article
 */
if ( ! function_exists( 'pixwell_get_single_left_article' ) ) {
	function pixwell_get_single_left_article() {
		$setting = rb_get_meta( 'single_left_article' );
		if ( empty( $setting ) || 'default' == $setting ) {
			$setting = pixwell_get_option( 'single_post_left_article' );
		} else {
			if ( 1 == $setting ) {
				return 1;
			} else {
				return 0;
			}
		}

		return $setting;
	}
}


/**
 * @return bool|mixed
 * single sidebar pos
 */
if ( ! function_exists( 'pixwell_get_single_sidebar_pos' ) ) {
	function pixwell_get_single_sidebar_pos() {
		$setting = rb_get_meta( 'sidebar_pos' );
		if ( empty( $setting ) || 'default' == $setting ) {
			$setting = pixwell_get_option( 'single_post_sidebar_pos' );
			if ( empty( $setting ) || 'default' == $setting ) {
				$setting = pixwell_get_option( 'site_sidebar_pos' );
			}
		}

		if ( empty( $setting ) ) {
			$setting = 'right';
		}

		return $setting;
	}
}


/**
 * @return bool|mixed
 * check featured size
 */
if ( ! function_exists( 'pixwell_get_single_feat_size' ) ) {
	function pixwell_get_single_feat_size() {
		$size = rb_get_meta( 'feat_size' );
		if ( empty( $size ) || 'default' == $size ) {
			$size = pixwell_get_option( 'single_feat_size' );
		}

		return $size;
	}
}

/**
 * @return bool|mixed
 * check featured size
 */
if ( ! function_exists( 'pixwell_get_single_gallery_layout' ) ) {
	function pixwell_get_single_gallery_layout() {
		$layout = rb_get_meta( 'gallery_layout' );
		if ( empty( $layout ) || 'default' == $layout ) {
			$layout = pixwell_get_option( 'single_post_gallery_layout' );
		}

		return $layout;
	}
}

/**
 * @return bool|int|string
 * check video autoplay
 */
if ( ! function_exists( 'pixwell_get_video_autoplay' ) ) {
	function pixwell_get_video_autoplay() {
		$setting = rb_get_meta( 'video_autoplay' );
		if ( empty( $setting ) || 'default' == $setting ) {
			return pixwell_get_option( 'single_post_video_autoplay' );
		} else {
			if ( 1 == $setting ) {
				return 1;
			} else {
				return 0;
			}
		}
	}
}

/**
 * @return bool|false|mixed|string
 * iframe video
 */
if ( ! function_exists( 'pixwell_get_embed_video_url' ) ) {
	function pixwell_get_embed_video_url() {
		if ( 'video' != get_post_format() ) {
			return false;
		}

		$self_hosted_video_id = rb_get_meta( 'video_hosted' );
		$auto_play            = pixwell_get_video_autoplay();

		if ( ! empty( $auto_play ) ) {
			$auto_play = 'on';
		} else {
			$auto_play = 'off';
		}

		if ( ! empty( $self_hosted_video_id ) ) {

			$wp_version = floatval( get_bloginfo( 'version' ) );
			if ( $wp_version < "3.6" ) {
				return '<p class="rb-error">' . esc_html__( 'Please update WordPress to the latest version to display this video.', 'pixwell' ) . '</p>';
			}

			$self_hosted_video_url = wp_get_attachment_url( $self_hosted_video_id );

			$params = array(
				'src'      => $self_hosted_video_url,
				'width'    => 740,
				'height'   => 415,
				'autoplay' => $auto_play
			);

			return wp_video_shortcode( $params );

		} else {

			$params = array(
				'width'  => 740,
				'height' => 415
			);

			$video_url = rb_get_meta( 'video_url' );
			$embed     = wp_oembed_get( $video_url, $params );

			if ( ! empty( $embed ) ) {
				return $embed;
			} else {
				$embed = rb_get_meta( 'video_embed' );
				if ( ! empty( $embed ) ) {
					return $embed;
				} else {
					return false;
				}
			}
		}
	}
}


/**
 * @return bool|false|mixed|string
 * audio iframe
 */
if ( ! function_exists( 'pixwell_get_embed_audio_html' ) ) {
	function pixwell_get_embed_audio_html() {
		if ( 'audio' != get_post_format() ) {
			return false;
		}

		$self_hosted_audio_id = rb_get_meta( 'audio_hosted' );

		if ( ! empty( $self_hosted_audio_id ) ) {

			$wp_version = floatval( get_bloginfo( 'version' ) );

			if ( $wp_version < "3.6" ) {
				return '<p class="ruby-error">' . esc_html__( 'Please update WordPress to the latest version to display this audio.', 'pixwell' ) . '</p>';
			}
			$self_hosted_audio_url = wp_get_attachment_url( $self_hosted_audio_id );

			$params = array(
				'src' => $self_hosted_audio_url,
			);

			return wp_audio_shortcode( $params );

		} else {
			$audio_url = rb_get_meta( 'audio_url' );
			$embed     = wp_oembed_get( $audio_url, array( 'height' => 400, 'width' => 900 ) );
			if ( ! empty( $embed ) ) {
				return $embed;
			} else {
				$embed = rb_get_meta( 'audio_embed' );
				if ( ! empty( $embed ) ) {
					return $embed;
				} else {
					return false;
				}
			}
		}
	}
}


/**
 * @return bool|mixed
 * check review
 */
if ( ! function_exists( 'pixwell_is_post_review' ) ) {
	function pixwell_is_post_review() {
		$review = rb_get_meta( 'post_review' );
		if ( ! empty( $review ) && $review == 1 ) {
			return true;
		}

		return false;
	}
}


/**
 * @return string
 * check post format
 */
if ( ! function_exists( 'pixwell_get_post_format' ) ) {
	function pixwell_get_post_format() {
		$post_format = get_post_format();
		if ( 'video' == $post_format ) {
			$url             = rb_get_meta( 'video_url' );
			$embed           = rb_get_meta( 'video_embed' );
			$self_host_video = rb_get_meta( 'video_hosted' );

			if ( ! empty( $url ) || ! empty( $embed ) || ! empty( $self_host_video ) ) {
				return 'video';
			} else {
				return 'thumbnail';
			}
		} elseif ( 'audio' == $post_format ) {
			$url             = rb_get_meta( 'audio_url' );
			$embed           = rb_get_meta( 'audio_embed' );
			$self_host_audio = rb_get_meta( 'audio_hosted' );

			if ( ! empty( $url ) || ! empty( $embed ) || ! empty( $self_host_audio ) ) {
				return 'audio';
			} else {
				return 'thumbnail';
			}
		} elseif ( 'gallery' == $post_format ) {
			$gallery = rb_get_meta( 'gallery_data' );
			if ( ! empty( $gallery ) ) {
				return 'gallery';
			} else {
				return 'thumbnail';
			}
		} else {
			return 'thumbnail';
		}
	}
}

/**
 * @return array
 * single page settings
 */
if ( ! function_exists( 'pixwell_get_page_settings' ) ) {
	function pixwell_get_page_settings() {
		$settings                 = array();
		$settings['layout']       = rb_get_meta( 'page_layout' );
		$settings['title']        = rb_get_meta( 'page_title' );
		$settings['sidebar_name'] = rb_get_meta( 'page_sidebar_name' );
		$settings['sidebar_pos']  = rb_get_meta( 'page_sidebar_pos' );
		if ( empty( $settings['sidebar_pos'] ) || 'default' == $settings['sidebar_pos'] ) {
			$settings['sidebar_pos'] = pixwell_get_option( 'site_sidebar_pos' );
		}

		return $settings;

	}
}


/** get schema markup */
if ( ! function_exists( 'pixwell_get_schema_markup' ) ) {
	function pixwell_get_schema_markup() {

		$setting = rb_get_meta( 'single_schema' );
		if ( ! empty( $setting ) && 1 == $setting ) {
			return true;
		}

		$setting = pixwell_get_option( 'article_markup' );
		if ( ! empty( $setting ) ) {
			return true;
		}

		return false;
	}
}

/** single post shop */
if ( ! function_exists( 'pixwell_get_single_shop' ) ) {
	function pixwell_get_single_shop() {
		$settings             = array();
		$settings['title']    = rb_get_meta( 'shop_post_title' );
		$settings['embed']    = rb_get_meta( 'shop_post_embed' );
		$settings['wc']       = rb_get_meta( 'shop_post_wc' );

		return $settings;
	}
}