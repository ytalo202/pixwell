<?php

/**
 * @param $settings
 * @param $block_name
 *
 * @return array
 * get styling options
 */
if ( ! function_exists( 'pixwell_get_meta_setting' ) ) {
	function pixwell_get_meta_setting( $settings, $block_name ) {

		if ( ! is_array( $settings ) ) {
			$settings = array();
		}

		if ( ! isset( $settings['cat_info'] ) ) {
			$settings['cat_info'] = pixwell_get_option( 'cat_info_' . $block_name );
		}
		if ( ! isset( $settings['custom_info'] ) ) {
			$settings['custom_info'] = pixwell_get_option( 'custom_info_' . $block_name );
		}
		if ( ! isset( $settings['entry_meta'] ) ) {
			$settings['entry_meta'] = pixwell_get_option( 'entry_meta_' . $block_name );
		}
		if ( ! isset( $settings['readmore'] ) ) {
			$settings['readmore'] = pixwell_get_option( 'readmore_' . $block_name );
		}
		if ( ! isset( $settings['summary'] ) ) {
			$settings['summary'] = pixwell_get_option( 'excerpt_' . $block_name );
		}
		if ( ! isset( $settings['excerpt'] ) ) {
			$settings['excerpt'] = pixwell_get_option( 'excerpt_length_' . $block_name );
		}
		if ( ! isset( $settings['review'] ) ) {
			$settings['review'] = pixwell_get_option( 'review_' . $block_name );
		}
		if ( ! isset( $settings['bookmark'] ) ) {
			$settings['bookmark'] = pixwell_get_option( 'bookmark_' . $block_name );
		}

		if ( ! empty( $settings['readmore'] ) ) {
			$settings['readmore'] = pixwell_get_option( 'readmore_text' );
			$settings['readmore'] = apply_filters( 'the_title', $settings['readmore'] );
		}

		if ( isset ( $settings['entry_meta']['enabled']['placebo'] ) ) {
			unset ( $settings['entry_meta']['enabled']['placebo'] );
		}

		return $settings;
	}
}

/**
 * @return bool
 * check post thumbnails
 */
if ( ! function_exists( 'pixwell_is_featured_image' ) ) {
	function pixwell_is_featured_image( $size = 'full' ) {
		if ( ! has_post_thumbnail() ) {
			return false;
		}
		$thumbnail = get_the_post_thumbnail( null, $size );
		if ( empty( $thumbnail ) ) {
			return false;
		}

		return true;
	}
}

/**
 * @param string $classes
 * @param int    $length
 * pixwell_is_sponsor_post
 */
if ( ! function_exists( 'pixwell_is_sponsor_post' ) ) :
	function pixwell_is_sponsor_post() {

		$sponsor = rb_get_meta( 'sponsor_post' );
		if ( ! empty( $sponsor ) && 1 == $sponsor ) {
			return true;
		}

		return false;
	}
endif;

/**
 * @param string $classes
 * @param int    $length
 * pixwell_is_sponsor_post
 */
if ( ! function_exists( 'pixwell_is_shop_post' ) ) :
	function pixwell_is_shop_post() {

		$setting = pixwell_get_option( 'meta_shop_post' );
		if ( empty( $setting ) ) {
			return false;
		}

		if ( ! class_exists( 'WooCommerce' ) ) {
			return false;
		}

		$shop_post = rb_get_meta( 'shop_post' );

		if ( ! empty( $shop_post ) && 1 == $shop_post ) {
			return true;
		}

		return false;
	}
endif;