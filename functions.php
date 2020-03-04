<?php
/** PIXWELL */
define( 'PIXWELL_THEME_VERSION', '2.3' );

add_action( 'after_setup_theme', 'pixwell_theme_setup', 1 );
add_action( 'after_setup_theme', 'pixwell_add_image_size', 20 );
add_action( 'admin_enqueue_scripts', 'pixwell_register_script_backend' );
add_action( 'wp_enqueue_scripts', 'pixwell_add_default_fonts', 5 );
add_action( 'wp_enqueue_scripts', 'pixwell_register_script_frontend', 10 );
add_action( 'enqueue_block_editor_assets', 'pixwell_enqueue_editor', 90 );
add_action( 'enqueue_block_editor_assets', 'pixwell_editor_dynamic', 99 );

/** load translate */
load_theme_textdomain( 'pixwell', get_theme_file_path( 'languages' ) );

include_once get_theme_file_path( 'backend/include-files.php' );
include_once get_theme_file_path( 'includes/include-files.php' );
include_once get_theme_file_path( 'templates/include-files.php' );


/** setup */
if ( ! function_exists( 'pixwell_theme_setup' ) ) {
	function pixwell_theme_setup() {

		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 1170;
		}

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style'
			) );
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'yoast-seo-breadcrumbs' );
		add_theme_support( 'editor-style' );
		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'woocommerce', array(
			'gallery_thumbnail_image_width' => 110,
			'thumbnail_image_width'         => 300,
			'single_image_width'            => 760,
		) );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		register_nav_menus( array(
			'pixwell_menu_main'      => esc_html__( 'Main Menu', 'pixwell' ),
			'pixwell_menu_offcanvas' => esc_html__( 'Left Aside Menu (Mobile Menu)', 'pixwell' ),
			'pixwell_menu_top'       => esc_html__( 'Top Bar Menu', 'pixwell' ),
			'pixwell_menu_footer'    => esc_html__( 'Footer Menu', 'pixwell' )
		) );
	}
}

if ( ! function_exists( 'pixwell_enqueue_editor' ) ) {
	function pixwell_enqueue_editor() {

		wp_enqueue_style( 'pixwell-google-font-editor', esc_url_raw( pixwell_editor_font_urls() ), array(), PIXWELL_THEME_VERSION, 'all' );
		wp_enqueue_style( 'pixwell-editor-icon', get_theme_file_uri( 'assets/css/rb-icon.css' ), array(), PIXWELL_THEME_VERSION, 'all' );
		wp_enqueue_style( 'pixwell-editor-style', get_theme_file_uri( 'backend/assets/editor.css' ), array(
			'pixwell-google-font-editor',
			'pixwell-editor-icon'
		), PIXWELL_THEME_VERSION, 'all' );
	}
}


/** registering image sizes */
if ( ! function_exists( 'pixwell_add_image_size' ) ) {
	function pixwell_add_image_size() {

		$crop = true;

		$theme_options = get_option( 'pixwell_theme_options' );
		if ( ! empty( $theme_options['pos_feat'] ) && ( 'top' == $theme_options['pos_feat'] ) ) {
			$crop = array( 'center', 'top' );
		}

		add_image_size( 'pixwell_370x250', 370, 250, $crop );
		add_image_size( 'pixwell_370x250-2x', 740, 500, $crop );
		add_image_size( 'pixwell_370x250-3x', 1110, 750, $crop );
		add_image_size( 'pixwell_280x210', 280, 210, $crop );
		add_image_size( 'pixwell_280x210-small', 100, 75, $crop );
		add_image_size( 'pixwell_280x210-2x', 560, 420, $crop );
		add_image_size( 'pixwell_400x450', 400, 450, $crop );
		add_image_size( 'pixwell_450x0', 450, 0, $crop );
		add_image_size( 'pixwell_400x600', 400, 600, $crop );
		add_image_size( 'pixwell_780x0', 780, 0, $crop );
		add_image_size( 'pixwell_780x0-2x', 1600, 0, $crop );
		add_image_size( 'pixwell_780x0-3x', 2000, 0, $crop );

		if ( ! empty( $theme_options['lazy_load'] ) ) {
			add_image_size( 'pixwell_400x450-holder', 40, 45, $crop );
			add_image_size( 'pixwell_450x0-holder', 30, 0, $crop );
			add_image_size( 'pixwell_400x600-holder', 20, 30, $crop );
			add_image_size( 'pixwell_370x250-holder', 37, 25, $crop );
			add_image_size( 'pixwell_280x210-holder', 28, 21, $crop );
			add_image_size( 'pixwell_780x0-holder', 30, 0, $crop );
		}
	}
}


/** load default fonts */
if ( ! function_exists( 'pixwell_font_urls' ) ) {
	function pixwell_font_urls() {

		$fonts_url       = '';
		$font_quicksand  = _x( 'on', 'Quicksand font: on or off', 'pixwell' );
		$font_montserrat = _x( 'on', 'Montserrat font: on or off', 'pixwell' );
		$font_poppins    = _x( 'on', 'Poppins font: on or off', 'pixwell' );

		if ( 'off' !== $font_quicksand || 'off' !== $font_montserrat ) {

			$font_families = array();
			if ( 'off' !== $font_quicksand ) {
				$font_families[] = 'Quicksand:300,400,500,600,700';
			}
			if ( 'off' !== $font_montserrat ) {
				$font_families[] = 'Montserrat:400,400i,500,600,700,900';
			}
			if ( 'off' !== $font_poppins ) {
				$font_families[] = 'Poppins:400,400i,700,700i';
			}
			$params    = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);
			$fonts_url = add_query_arg( $params, 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

/** default fonts */
if ( ! function_exists( 'pixwell_add_default_fonts' ) ) {
	function pixwell_add_default_fonts() {
		wp_enqueue_style( 'google-font-quicksand-montserrat-poppins', esc_url_raw( pixwell_font_urls() ), array(), PIXWELL_THEME_VERSION, 'all' );
	}
}

/** register scripts */
if ( ! function_exists( 'pixwell_register_script_frontend' ) ) {
	function pixwell_register_script_frontend() {

		if ( is_admin() ) {
			return;
		}

		wp_enqueue_style( 'pixwell-icons', get_theme_file_uri( 'assets/css/rb-icon.css' ), array(), PIXWELL_THEME_VERSION, 'all' );
		wp_enqueue_style( 'pixwell-main', get_theme_file_uri( 'assets/css/main.css' ), array( 'pixwell-icons' ), PIXWELL_THEME_VERSION, 'all' );
		wp_enqueue_style( 'pixwell-responsive', get_theme_file_uri( 'assets/css/responsive.css' ), array( 'pixwell-main' ), PIXWELL_THEME_VERSION, 'all' );
		if ( class_exists( 'WooCommerce' ) ) {
			wp_deregister_style( 'yith-wcwl-font-awesome' );
			wp_enqueue_style( 'pixwell-wc', get_theme_file_uri( 'assets/css/woocommerce.css' ), array( 'pixwell-icons' ), PIXWELL_THEME_VERSION, 'all' );
		}
		wp_enqueue_style( 'pixwell-style', get_stylesheet_uri(), array( 'pixwell-responsive' ), PIXWELL_THEME_VERSION, 'all' );

		/** load scripts */
		wp_enqueue_script( 'html5', get_theme_file_uri( 'assets/js/html5shiv.min.js' ), array(), '3.7.3' );
		wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'jquery-waypoints', get_theme_file_uri( 'assets/js/jquery.waypoints.min.js' ), array( 'jquery' ), '3.1.1', true );
		wp_enqueue_script( 'owl-carousel', get_theme_file_uri( 'assets/js/owl.carousel.min.js' ), array( 'jquery' ), '1.8.1', true );
		wp_enqueue_script( 'pixwell-sticky', get_theme_file_uri( 'assets/js/rbsticky.min.js' ), array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'jquery-tipsy', get_theme_file_uri( 'assets/js/jquery.tipsy.min.js' ), array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'jquery-uitotop', get_theme_file_uri( 'assets/js/jquery.ui.totop.min.js' ), array( 'jquery' ), 'v1.2', true );
		wp_enqueue_script( 'jquery-isotope', get_theme_file_uri( 'assets/js/jquery.isotope.min.js' ), array( 'jquery' ), '3.0.6', true );

		wp_enqueue_script( 'pixwell-global', get_theme_file_uri( 'assets/js/global.js' ), array(
			'jquery',
			'imagesloaded',
			'jquery-waypoints',
			'owl-carousel',
			'pixwell-sticky',
			'jquery-tipsy',
			'jquery-uitotop',
			'jquery-isotope'
		), PIXWELL_THEME_VERSION, true );

		wp_localize_script( 'pixwell-global', 'pixwellParams', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

/** register backend scripts */
if ( ! function_exists( 'pixwell_register_script_backend' ) ) {
	function pixwell_register_script_backend( $hook ) {
		if ( $hook == 'post.php' || $hook == 'post-new.php' || 'widgets.php' == $hook || 'nav-menus.php' == $hook || 'term.php' == $hook ) {
			wp_register_style( 'pixwell-admin', get_theme_file_uri( 'backend/assets/admin.css' ), array(), PIXWELL_THEME_VERSION, 'all' );
			wp_enqueue_style( 'pixwell-admin' );
		}
	}
}