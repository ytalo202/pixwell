<?php
/** delete cache */
add_action( 'after_switch_theme', 'pixwell_delete_editor_styles_cache' );
add_action( 'redux/options/pixwell_theme_options/saved', 'pixwell_delete_editor_styles_cache' );
add_action( 'redux/options/pixwell_theme_options/reset', 'pixwell_delete_editor_styles_cache' );
add_action( 'redux/options/pixwell_theme_options/section/reset', 'pixwell_delete_editor_styles_cache' );

/** editor fonts */
if ( ! function_exists( 'pixwell_editor_font_urls' ) ) {
	function pixwell_editor_font_urls() {

		if ( ! class_exists( 'ReduxFramework' ) ) {
			return pixwell_font_urls();
		}

		$body_font    = pixwell_get_option( 'font_body' );
		$heading_font = pixwell_get_option( 'font_h1' );
		$meta_font    = pixwell_get_option( 'font_post_meta' );

		$font_families = array();
		if ( ! empty( $body_font['font-family'] ) ) {
			$font_families[] = $body_font['font-family'] . ':300,400,500,600,700';
		} else {
			$font_families[] = 'Poppins:400,400i,700,700i';
		}
		if ( ! empty( $heading_font['font-family'] ) ) {
			$font_families[] = $heading_font['font-family'] . ':300,400,500,600,700';
		} else {
			$font_families[] = 'Quicksand:300,400,500,600,700';
		}

		if ( ! empty( $meta_font['font-family'] ) ) {
			$font_families[] = $meta_font['font-family'] . ':400';
		} else {
			$font_families[] = 'Montserrat:400';
		}


		$params    = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $params, 'https://fonts.googleapis.com/css' );

		return $fonts_url;
	}
}

/** dynamic editor */
if ( ! function_exists( 'pixwell_editor_dynamic' ) ) {
	function pixwell_editor_dynamic() {

		if ( ! class_exists( 'ReduxFramework' ) || empty( pixwell_get_option( 'font_body' ) ) ) {
			return;
		}

		$cache = get_option( 'pixwell_editor_cache' );
		if ( empty( $cache ) ) {
			$editor_css   = '';
			$body_font    = pixwell_get_option( 'font_body' );
			$heading_font = pixwell_get_option( 'font_h1' );
			$global_color = pixwell_get_option( 'global_color' );
			$meta_font    = pixwell_get_option( 'font_post_meta' );
			$font_h1_size = pixwell_get_option( 'font_h1_size' );
			$font_h2_size = pixwell_get_option( 'font_h2_size' );
			$font_h3_size = pixwell_get_option( 'font_h3_size' );
			$font_h4_size = pixwell_get_option( 'font_h4_size' );
			$font_h5_size = pixwell_get_option( 'font_h5_size' );
			$font_h6_size = pixwell_get_option( 'font_h6_size' );

			if ( ! empty( $body_font['font-family'] ) ) {
				$editor_css .= '.edit-post-layout__content p, .edit-post-layout__content, .editor-styles-wrapper p, .editor-styles-wrapper, .wp-block-file,';
				$editor_css .= '.edit-post-layout__content .wp-block-latest-comments__comment-link, .edit-post-layout__content .wp-block-latest-posts__list a,';
				$editor_css .= '.edit-post-editor-regions__content p, .edit-post-layout__content, .editor-styles-wrapper p, .editor-styles-wrapper, .wp-block-file,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-latest-comments__comment-link, .edit-post-editor-regions__content .wp-block-latest-posts__list a';
				$editor_css .= '{font-family: ' . $body_font['font-family'] . ' !important;';
				if ( ! empty( $heading_font['font-size'] ) ) {
					$editor_css .= 'font-size: ' . $body_font['font-size'] . ';';
				}
				$editor_css .= '}';
			}

			if ( ! empty( $heading_font['font-family'] ) ) {
				$editor_css .= '.edit-post-layout__content h1, .edit-post-layout__content h2,';
				$editor_css .= '.edit-post-layout__content h3, .edit-post-layout__content h4,';
				$editor_css .= '.edit-post-layout__content h5, .edit-post-layout__content h6,';
				$editor_css .= '.editor-post-title__block .editor-post-title__input,';
				$editor_css .= '.wp-block-cover h2, .wp-block-quote, .wp-block-pullquote, .wp-block-quote:not(.is-large):not(.is-style-large),';
				$editor_css .= '.edit-post-layout__content .wp-block-quote, .edit-post-layout__content .wp-block-quote:not(.is-large):not(.is-style-large), ';
				$editor_css .= '.edit-post-editor-regions__content h1, .edit-post-editor-regions__content h2,';
				$editor_css .= '.edit-post-editor-regions__content h3, .edit-post-editor-regions__content h4,';
				$editor_css .= '.edit-post-editor-regions__content h5, .edit-post-editor-regions__content h6,';
				$editor_css .= '.editor-post-title__block .editor-post-title__input,';
				$editor_css .= '.wp-block-cover h2, .wp-block-quote, .wp-block-pullquote, .wp-block-quote:not(.is-large):not(.is-style-large),';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-quote, .edit-post-editor-regions__content .wp-block-quote:not(.is-large):not(.is-style-large)';
				$editor_css .= '{font-family: ' . $heading_font['font-family'] . ' !important;';
				if ( ! empty( $heading_font['font-family'] ) ) {
					$editor_css .= 'font-weight: ' . $heading_font['font-weight'] . ';';
				}
				$editor_css .= '}';
			}

			if ( ! empty( $meta_font['font-family'] ) ) {
				$editor_css .= '.wp-block-quote__citation, .wp-block-pullquote__citation, .wp-block-image figcaption,';
				$editor_css .= '.edit-post-layout__content .wp-block-archives-dropdown select,';
				$editor_css .= '.edit-post-layout__content .wp-block-latest-posts__post-date,';
				$editor_css .= '.edit-post-layout__content .wp-block-latest-comments__comment-date,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-archives-dropdown select,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-latest-posts__post-date,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-latest-comments__comment-date';
				$editor_css .= '{font-family: ' . $meta_font['font-family'] . ' !important;';
				if ( ! empty( $meta_font['font-size'] ) ) {
					$editor_css .= 'font-size: ' . $meta_font['font-size'] . ';';
				}
				$editor_css .= '}';
			}

			if ( ! empty( $font_h1_size ) ) {
				$editor_css .= '.edit-post-layout__content h1.rich-text, .edit-post-editor-regions__content h1.rich-text {font-size: ' . absint( $font_h1_size ) . 'px; }';
			}
			if ( ! empty( $font_h2_size ) ) {
				$editor_css .= '.edit-post-layout__content h2.rich-text, .edit-post-editor-regions__content h2.rich-text {font-size: ' . absint( $font_h2_size ) . 'px; }';
			}
			if ( ! empty( $font_h3_size ) ) {
				$editor_css .= '.edit-post-layout__content h3.rich-text, .edit-post-editor-regions__content h3.rich-text {font-size: ' . absint( $font_h3_size ) . 'px; }';
			}
			if ( ! empty( $font_h4_size ) ) {
				$editor_css .= '.edit-post-layout__content .wp-block-latest-comments__comment-link, .edit-post-layout__content .wp-block-latest-posts__list a,';
				$editor_css .= '.edit-post-editor-regions__content .wp-block-latest-comments__comment-link, .edit-post-editor-regions__content .wp-block-latest-posts__list a,';
				$editor_css .= '.edit-post-layout__content h4.rich-text, .edit-post-editor-regions__content  h4.rich-text {font-size: ' . absint( $font_h4_size ) . 'px; }';
			}
			if ( ! empty( $font_h5_size ) ) {
				$editor_css .= '.edit-post-layout__content h5.rich-text, .edit-post-editor-regions__content h5.rich-text {font-size: ' . absint( $font_h5_size ) . 'px; }';
			}
			if ( ! empty( $font_h6_size ) ) {
				$editor_css .= '.edit-post-layout__content h6.rich-text, .edit-post-editor-regions__content h6.rich-text {font-size: ' . absint( $font_h6_size ) . 'px; }';
			}

			if ( ! empty( $global_color ) && '#ff8763' != strtolower( $global_color ) ) {
				$editor_css .= '.wp-block-button.is-style-outline, .wp-block-button.is-style-outline:hover,';
				$editor_css .= '.wp-block-button.is-style-outline:focus, .wp-block-button.is-style-outline:active,';
				$editor_css .= '.wp-block-file .wp-block-file__textlink, .wp-block-file .wp-block-file__textlink:hover, ';
				$editor_css .= ' .edit-post-layout__content-rich-text__editable a, a:active, a:hover';
				$editor_css .= '{ color: ' . $global_color . '}';

				$editor_css .= '.wp-block-file .wp-block-file__button';
				$editor_css .= '{ background-color: ' . $global_color . '}';
			}

			$cache = addslashes( $editor_css );
			delete_option( 'pixwell_editor_cache' );
			add_option( 'pixwell_editor_cache', $cache );
		} else {
			$editor_css = stripslashes( $cache );
		}

		if ( ! empty( $editor_css ) ) {
			wp_add_inline_style( 'pixwell-editor-style', $editor_css );
		}
	}
}

/** delete dynamic css */
if ( ! function_exists( 'pixwell_delete_editor_styles_cache' ) ) {
	function pixwell_delete_editor_styles_cache() {
		delete_option( 'pixwell_editor_cache' );

		return;
	}
}