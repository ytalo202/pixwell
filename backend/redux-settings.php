<?php
/**
 * redux config
 */
include_once get_theme_file_path( 'backend/panels/default-settings.php' );

if ( ! class_exists( 'ReduxFramework' ) ) {
	return false;
}

if ( is_admin() ) {
	add_action( 'redux/page/pixwell_theme_options/enqueue', 'pixwell_register_style_redux' );
}

/** redux style */
if ( ! function_exists( 'pixwell_register_style_redux' ) ) {
	function pixwell_register_style_redux() {
		wp_register_style( 'pixwell-style-redux', get_theme_file_uri( 'backend/assets/redux.css' ), array( 'redux-admin-css' ), PIXWELL_THEME_VERSION, 'all' );
		wp_enqueue_style( 'pixwell-style-redux' );
		wp_dequeue_script( 'redux-rtl-css' );
	}
};

include_once get_theme_file_path( 'backend/panels/general.php' );
include_once get_theme_file_path( 'backend/panels/logo.php' );
include_once get_theme_file_path( 'backend/panels/header.php' );
include_once get_theme_file_path( 'backend/panels/sidebar.php' );
include_once get_theme_file_path( 'backend/panels/footer.php' );
include_once get_theme_file_path( 'backend/panels/elements-style.php' );
include_once get_theme_file_path( 'backend/panels/posts-style.php' );
include_once get_theme_file_path( 'backend/panels/blog-pages.php' );
include_once get_theme_file_path( 'backend/panels/single-post.php' );
include_once get_theme_file_path( 'backend/panels/post-types.php' );
include_once get_theme_file_path( 'backend/panels/color.php' );
include_once get_theme_file_path( 'backend/panels/site-socials.php' );
include_once get_theme_file_path( 'backend/panels/translation.php' );
include_once get_theme_file_path( 'backend/panels/typography.php' );
include_once get_theme_file_path( 'backend/panels/seo.php' );
include_once get_theme_file_path( 'backend/panels/special.php' );
include_once get_theme_file_path( 'backend/panels/wc.php' );
include_once get_theme_file_path( 'backend/panels/amp.php' );
include_once get_theme_file_path( 'backend/panels/cookie.php' );

$pixwell_opt_name = 'pixwell_theme_options';
$pixwell_args     = array(
	'opt_name'             => $pixwell_opt_name,
	'display_name'         => esc_html__( 'Pixwell Panel', 'pixwell' ),
	'display_version'      => wp_get_theme()->get( 'Version' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'pixwell' ),
	'page_title'           => esc_html__( 'Theme Options', 'pixwell' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => false,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-admin-generic',
	'admin_bar_priority'   => 50,
	'global_variable'      => $pixwell_opt_name,
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => 54,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => '',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => 'pixwell_options',
	'show_options_object'  => false,
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'show_import_export'   => true,
	'transient_time'       => 6400,
	'use_cdn'              => true,
	'output'               => true,
	'output_tag'           => true,
	'disable_tracking'     => true,
	'database'             => '',
	'system_info'          => false,
);

Redux::setArgs( $pixwell_opt_name, $pixwell_args );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_general() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_logo() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_global() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_header() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_header_general() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_topbar() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_main_menu() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_header_mobile() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_header_transparent() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_sidebar() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_footer() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_off_canvas() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_classic() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_classic_2() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_grid_1() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_grid_2() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_grid_3() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_grid_4() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_grid_5() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_grid_6() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_list_1() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_list_2() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_list_3() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_list_4() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_list_6() );

Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_overlay_1() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_overlay_2() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_overlay_3() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_overlay_4() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_overlay_5() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_overlay_6() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_overlay_7() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_overlay_8() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_overlay_9() );

Redux::setSection( $pixwell_opt_name, pixwell_register_options_styling_masonry_1() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_index() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_cat() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_search() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_author() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_archive() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_single_post() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_single_post_styling() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_single_post_layout() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_single_post_section() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_single_post_left() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_single_post_share() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_single_post_related() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_single_next_post() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_portfolio() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_gallery() );
if ( class_exists( 'rb_deal_core' ) ) {
	Redux::setSection( $pixwell_opt_name, pixwell_register_options_deal() );
}
Redux::setSection( $pixwell_opt_name, pixwell_register_options_social_profile() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_typo() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_typo_body() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_typo_title() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_typo_meta() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_typo_heading() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_color() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_newsletter() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_bookmark() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_reaction() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_seo() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_cookie() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_translation() );
Redux::setSection( $pixwell_opt_name, pixwell_register_options_wc() );
if ( class_exists( 'WooCommerce' ) ) {
	Redux::setSection( $pixwell_opt_name, pixwell_register_options_wc_page() );
	Redux::setSection( $pixwell_opt_name, pixwell_register_options_wc_styling() );
}
Redux::setSection( $pixwell_opt_name, pixwell_register_options_amp() );
if ( function_exists( 'amp_init' ) ) {
	Redux::setSection( $pixwell_opt_name, pixwell_register_options_amp_general() );
	Redux::setSection( $pixwell_opt_name, pixwell_register_options_amp_footer() );
}