<?php

/**
 * @return array
 * social profiles - web
 */
if ( ! function_exists( 'pixwell_get_web_socials' ) ) {
	function pixwell_get_web_socials() {

		$data               = array();
		$data['facebook']   = pixwell_get_option( 'social_facebook' );
		$data['twitter']    = pixwell_get_option( 'social_twitter' );
		$data['instagram']  = pixwell_get_option( 'social_instagram' );
		$data['pinterest']  = pixwell_get_option( 'social_pinterest' );
		$data['linkedin']   = pixwell_get_option( 'social_linkedin' );
		$data['tumblr']     = pixwell_get_option( 'social_tumblr' );
		$data['flickr']     = pixwell_get_option( 'social_flickr' );
		$data['skype']      = pixwell_get_option( 'social_skype' );
		$data['snapchat']   = pixwell_get_option( 'social_snapchat' );
		$data['myspace']    = pixwell_get_option( 'social_myspace' );
		$data['youtube']    = pixwell_get_option( 'social_youtube' );
		$data['bloglovin']  = pixwell_get_option( 'social_bloglovin' );
		$data['digg']       = pixwell_get_option( 'social_digg' );
		$data['dribbble']   = pixwell_get_option( 'social_dribbble' );
		$data['soundcloud'] = pixwell_get_option( 'social_soundcloud' );
		$data['vimeo']      = pixwell_get_option( 'social_vimeo' );
		$data['reddit']     = pixwell_get_option( 'social_reddit' );
		$data['vkontakte']  = pixwell_get_option( 'social_vk' );
		$data['whatsapp']   = pixwell_get_option( 'social_whatsapp' );
		$data['rss']        = pixwell_get_option( 'social_rss' );

		return $data;
	}
}


/**
 * @param string $author_id
 *
 * @return array
 * users - social profiles
 */
if ( ! function_exists( 'pixwell_get_author_socials' ) ) {
	function pixwell_get_author_socials( $author_id = '' ) {

		if ( empty( $author_id ) ) {
			return false;
		}

		$data               = array();
		$data['website']    = get_the_author_meta( 'user_url', $author_id );
		$data['facebook']   = get_the_author_meta( 'facebook', $author_id );
		$data['twitter']    = get_the_author_meta( 'twitter', $author_id );
		$data['instagram']  = get_the_author_meta( 'instagram', $author_id );
		$data['pinterest']  = get_the_author_meta( 'pinterest', $author_id );
		$data['linkedin']   = get_the_author_meta( 'linkedin', $author_id );
		$data['tumblr']     = get_the_author_meta( 'tumblr', $author_id );
		$data['flickr']     = get_the_author_meta( 'flickr', $author_id );
		$data['skype']      = get_the_author_meta( 'skype', $author_id );
		$data['snapchat']   = get_the_author_meta( 'snapchat', $author_id );
		$data['myspace']    = get_the_author_meta( 'myspace', $author_id );
		$data['youtube']    = get_the_author_meta( 'youtube', $author_id );
		$data['bloglovin']  = get_the_author_meta( 'bloglovin', $author_id );
		$data['digg']       = get_the_author_meta( 'digg', $author_id );
		$data['dribbble']   = get_the_author_meta( 'dribbble', $author_id );
		$data['soundcloud'] = get_the_author_meta( 'soundcloud', $author_id );
		$data['vimeo']      = get_the_author_meta( 'vimeo', $author_id );
		$data['reddit']     = get_the_author_meta( 'reddit', $author_id );
		$data['vkontakte']  = get_the_author_meta( 'vkontakte', $author_id );
		$data['whatsapp']   = get_the_author_meta( 'whatsapp', $author_id );
		$data['rss']        = get_the_author_meta( 'rss', $author_id );

		return $data;
	}
}

