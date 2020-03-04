<?php
/** load includes */
include_once get_theme_file_path( 'includes/menu.php' );
include_once get_theme_file_path( 'includes/core.php' );
include_once get_theme_file_path( 'includes/actions.php' );
include_once get_theme_file_path( 'includes/query.php' );
include_once get_theme_file_path( 'includes/posts.php' );
include_once get_theme_file_path( 'includes/single.php' );
include_once get_theme_file_path( 'includes/blog-pages.php' );
include_once get_theme_file_path( 'includes/translation.php' );
include_once get_theme_file_path( 'includes/dynamic-css.php' );
include_once get_theme_file_path( 'includes/social-data.php' );
if ( class_exists( 'WooCommerce' ) ) {
	require get_theme_file_path( 'includes/wc.php' );
}