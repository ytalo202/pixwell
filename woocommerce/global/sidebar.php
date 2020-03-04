<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! is_shop() && ! is_product_category() ) {
	return false;
}

if ( is_shop() ) {
	$pixwell_wc_sidebar          = pixwell_get_option( 'wc_shop_sidebar' );
	$pixwell_wc_sidebar_position = pixwell_get_option( 'wc_shop_sidebar_position' );
	$pixwell_wc_sidebar_name     = pixwell_get_option( 'wc_shop_sidebar_name' );
} else {
	$pixwell_wc_sidebar          = pixwell_get_option( 'wc_archive_sidebar' );
	$pixwell_wc_sidebar_position = pixwell_get_option( 'wc_archive_sidebar_position' );
	$pixwell_wc_sidebar_name     = pixwell_get_option( 'wc_archive_sidebar_name' );
}

if ( empty( $pixwell_wc_sidebar_name ) ) {
	$pixwell_wc_sidebar_name = 'pixwell_sidebar_default';
}

if ( ! empty( $pixwell_wc_sidebar ) && ! empty( $pixwell_wc_sidebar_position ) ) :
	pixwell_render_sidebar( $pixwell_wc_sidebar_name );
endif;