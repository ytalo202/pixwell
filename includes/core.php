<?php
/**
 * @param $option_name
 *
 * @return string
 * get theme options
 */
if ( ! function_exists( 'pixwell_get_option' ) ) {
	function pixwell_get_option( $option_name ) {

		$settings = get_option( 'pixwell_theme_options' );
		if ( empty( $settings ) ) {
			$settings = pixwell_default_option_values();
		}

		if ( ! empty( $settings[ $option_name ] ) ) {
			return $settings[ $option_name ];
		}

		return false;
	}
}

/**
 * @param $meta
 * @param $post_id
 *
 * @return bool
 * fallback if don't active plugin
 */
if ( ! function_exists( 'rb_get_meta' ) ) {
	function rb_get_meta( $meta = null, $post_id = null ) {
		return false;
	}
}

/**
 * @param $name
 *
 * @return mixed
 * string to name
 */
if ( ! function_exists( 'pixwell_convert_to_id' ) ) {
	function pixwell_convert_to_id( $name ) {
		$name = strtolower( strip_tags( $name ) );
		$name = str_replace( ' ', '-', $name );

		return preg_replace( '/[^A-Za-z0-9\-]/', '', $name );
	}
}

/** get protocol */
if ( ! function_exists( 'pixwell_protocol' ) ) {
	function pixwell_protocol() {
		if ( ! is_ssl() ) {
			return 'http';
		}

		return 'https';
	}
}

/** fallback pixwell_breadcrumb */
if ( ! function_exists( 'pixwell_breadcrumb' ) ) {
	function pixwell_breadcrumb() {
		return false;
	}
}

/** fallback rb_render_newsletter */
if ( ! function_exists( 'rb_render_newsletter' ) ) {
	function rb_render_newsletter() {
		return false;
	}
}

/** filter content for ajax */
if ( ! function_exists( 'pixwell_filter_content_ajax' ) ) {
	function pixwell_filter_content_ajax( $content ) {
		global $wp_query;
		if ( ! isset( $wp_query->query_vars['rbsnp'] ) || ! is_single() ) {
			return $content;
		} else {
			return str_replace( "(adsbygoogle = window.adsbygoogle || []).push({});", '', $content );
		}
	}
}