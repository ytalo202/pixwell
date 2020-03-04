<?php
/** this file support Woocommerce plugins */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating' );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

add_action( 'woocommerce_before_shop_loop_item_title', 'pixwell_buttons_wrapper_open', 15 );
add_action( 'woocommerce_before_shop_loop_item_title', 'pixwell_loop_wishlist', 20 );

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 25 );
add_action( 'woocommerce_before_shop_loop_item_title', 'pixwell_buttons_wrapper_close', 95 );
add_action( 'woocommerce_before_shop_loop_item_title', 'pixwell_loop_product_thumbnail', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'pixwell_loop_product_title', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 12 );
add_action( 'woocommerce_checkout_before_customer_details', 'pixwell_checkout_customer_details_before' );
add_action( 'woocommerce_checkout_after_customer_details', 'pixwell_checkout_customer_details_after' );
add_action( 'woocommerce_checkout_after_order_review', 'pixwell_checkout_order_after' );
add_action( 'woocommerce_after_cart', 'pixwell_cart_after', 20 );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 25 );
add_action( 'woocommerce_before_single_product', 'pixwell_single_product_before', 5 );
add_action( 'woocommerce_after_single_product', 'pixwell_single_product_after', 25 );
add_action( 'woocommerce_before_single_product_summary', 'pixwell_single_product_image_before', 1 );
add_action( 'woocommerce_before_single_product_summary', 'pixwell_single_product_summary_before', 100 );
add_action( 'woocommerce_after_single_product_summary', 'pixwell_single_product_summary_after', 1 );
add_action( 'woocommerce_after_main_content', 'woocommerce_get_sidebar', 5 );
add_action( 'woocommerce_before_shop_loop', 'pixwell_wc_before_shop_loop', 5 );
add_action( 'woocommerce_no_products_found', 'pixwell_wc_before_shop_loop', 5 );
add_action( 'woocommerce_after_shop_loop', 'pixwell_wc_after_shop_loop', 99 );
add_action( 'woocommerce_no_products_found', 'pixwell_wc_after_shop_loop', 99 );
add_action( 'woocommerce_after_main_content', 'pixwell_wc_after_main_content', 10 );
add_action( 'woocommerce_before_shop_loop', 'pixwell_wc_before_result_count', 19 );
add_action( 'woocommerce_before_shop_loop', 'pixwell_wc_after_catalog_ordering', 31 );

add_filter( 'woocommerce_add_to_cart_fragments', 'pixwell_wc_add_to_cart_fragments', 10 );
add_filter( 'woocommerce_loop_add_to_cart_link', 'pixwell_loop_add_to_cart_wrapper', 20 );
add_filter( 'woocommerce_breadcrumb_defaults', 'pixwell_wc_breadcrumb' );
add_filter( 'woocommerce_product_tabs', 'pixwell_wc_review_box' );
add_filter( 'woocommerce_output_related_products_args', 'pixwell_wc_related_posts_per_page' );
add_filter( 'woocommerce_product_additional_information_heading', 'pixwell_additional_information_heading' );
add_filter( 'woocommerce_get_image_size_single', 'pixwell_wc_image_size_single', 10 );
add_filter( 'loop_shop_per_page', 'pixwell_wc_shop_products_per_page', 99 );
add_filter( 'woocommerce_cross_sells_columns', 'pixwell_wc_cross_sells_columns' );
add_filter( 'woocommerce_sale_flash', 'pixwell_wc_sale_percent', 10, 3 );
add_filter( 'loop_shop_columns', 'pixwell_wc_shop_columns' );

add_action( 'woocommerce_before_main_content', 'pixwell_remove_single_breadcrumb', 1 );



/**
 * wishlist
 */
if ( ! function_exists( 'pixwell_loop_wishlist' ) ) :
	function pixwell_loop_wishlist() {
		$wishlist = pixwell_get_option( 'wc_wishlist' );
		if ( ! empty( $wishlist ) && shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
		}
	}
endif;


if ( ! function_exists( 'pixwell_loop_add_to_cart_wrapper' ) ) :
	function pixwell_loop_add_to_cart_wrapper( $content ) {
		return '<div class="add-to-cart">' . $content . '</div>';
	}
endif;


if ( ! function_exists( 'pixwell_buttons_wrapper_open' ) ) :
	function pixwell_buttons_wrapper_open() {
		echo '<div class="product-buttons  cart-tooltips">';
	}
endif;


if ( ! function_exists( 'pixwell_buttons_wrapper_close' ) ) :
	function pixwell_buttons_wrapper_close() {
		echo '</div>';
	}
endif;


if ( ! function_exists( 'pixwell_loop_product_title' ) ) :
	function pixwell_loop_product_title() {
		?>
		<h2 class="woocommerce-loop-product__title h4">
			<a href="<?php echo get_the_permalink(); ?>" class="woocommerce-loop-product-link p-url"><?php the_title(); ?></a>
		</h2>
	<?php
	}
endif;

if ( ! function_exists( 'pixwell_loop_product_thumbnail' ) ) :
	function pixwell_loop_product_thumbnail() {
		?>
		<a href="<?php echo get_the_permalink(); ?>" class="woocommerce-loop-product-link"> <?php echo woocommerce_get_product_thumbnail(); ?></a>
	<?php
	}
endif;


if ( ! function_exists( 'pixwell_checkout_customer_details_before' ) ):
	function pixwell_checkout_customer_details_before() {
		?>
		<div class="checkout-col col-left">
	<?php
	}

endif;

if ( ! function_exists( 'pixwell_checkout_customer_details_after' ) ):
	function pixwell_checkout_customer_details_after() {
		?>
		</div><div class="checkout-col col-right">
	<?php
	}

endif;


if ( ! function_exists( 'pixwell_checkout_order_after' ) ):
	function pixwell_checkout_order_after() {
		?>
		</div>
	<?php
	}
endif;

if ( ! function_exists( 'pixwell_cart_after' ) ):
	function pixwell_cart_after() {
		?>
		<div class="clearfix"></div>
	<?php
	}
endif;


/**
 * before product page
 */
if ( ! function_exists( 'pixwell_single_product_before' ) ):
	function pixwell_single_product_before() {
		?>
		<div class="single-product-wrap clearfix">
	<?php
	}

endif;

/*
 * after product page
 */
if ( ! function_exists( 'pixwell_single_product_after' ) ):
	function pixwell_single_product_after() {
		?>
		</div>
	<?php
	}
endif;


/**
 * @param $args
 *
 * @return mixed
 * breadcrumb filter
 */
if ( ! function_exists( 'pixwell_wc_breadcrumb' ) ):
	function pixwell_wc_breadcrumb( $args ) {

		$args['wrap_before'] = '<aside id="site-breadcrumb" class="breadcrumb breadcrumb-wc"><div class="breadcrumb-inner rbc-container"> ';
		$args['wrap_after']  = '</div></aside>';
		$args['delimiter']   = '&nbsp;&gt;&nbsp;';

		return $args;
	}
endif;


/** single product */
if ( ! function_exists( 'pixwell_single_product_image_before' ) ):
	function pixwell_single_product_image_before() { ?>
		<div class="rb-row single-product-content"><div class="rb-col-d6 rb-col-m12"><div class="wc-single-featured">
	<?php
	}
endif;

/** before summary */
if ( ! function_exists( 'pixwell_single_product_summary_before' ) ):
function pixwell_single_product_summary_before() {
	?>
	</div></div>
	<div class="rb-col-d6 rb-col-m12">
<?php
}
endif;

/** after summary */
if ( ! function_exists( 'pixwell_single_product_summary_after' ) ):
	function pixwell_single_product_summary_after() {
		?>
		</div></div>
	<?php
	}
endif;

/** remove description */
if ( ! function_exists( 'pixwell_additional_information_heading' ) ) :
	function pixwell_additional_information_heading( $heading ) {
		return false;
	}
endif;


/**
 * @param $size
 *
 * @return mixed
 * single image height
 */
if ( ! function_exists( 'pixwell_wc_image_size_single' ) ) :
	function pixwell_wc_image_size_single( $size ) {

		if ( ! empty( $size['width'] ) ) {
			$size['height'] = intval( $size['width'] * 1.5 );
		}
		$size['crop'] = 1;

		return $size;
	}
endif;


/** product review box */
if ( ! function_exists( 'pixwell_wc_review_box' ) ) :
	function pixwell_wc_review_box( $tabs ) {
		$check = pixwell_get_option( 'wc_box_review' );
		if ( empty( $check ) ) {
			unset( $tabs['reviews'] );
		}

		return $tabs;
	}

endif;

/** shop posts per page */
if ( ! function_exists( 'pixwell_wc_related_posts_per_page' ) ) :
	function pixwell_wc_related_posts_per_page( $args ) {
		$total                  = pixwell_get_option( 'wc_related_posts_per_page' );
		$args['posts_per_page'] = $total;
		$args['columns']        = 4;

		return $args;
	}

endif;

/** cross sell */
if ( ! function_exists( 'pixwell_wc_cross_sells_columns' ) ) :
	function pixwell_wc_cross_sells_columns( $columns ) {
		return 4;
	}

endif;

/** shop wrapper */
if ( ! function_exists( 'pixwell_wc_before_shop_loop' ) ):
	function pixwell_wc_before_shop_loop() {
		if ( is_shop() ):
			$pixwell_wc_sidebar          = pixwell_get_option( 'wc_shop_sidebar' );
			$pixwell_wc_sidebar_position = pixwell_get_option( 'wc_shop_sidebar_position' );
		elseif ( is_product_category() ) :
			$pixwell_wc_sidebar          = pixwell_get_option( 'wc_archive_sidebar' );
			$pixwell_wc_sidebar_position = pixwell_get_option( 'wc_archive_sidebar_position' );
		endif;
		if ( ! empty( $pixwell_wc_sidebar ) && ! empty( $pixwell_wc_sidebar_position ) ) : ?>
			<div class="page-content rbc-content-section is-sidebar-<?php echo esc_attr( $pixwell_wc_sidebar_position ) ?>">
			<div class="rbc-wrap rbc-container clearfix">
			<div class="rbc-content site-main">
			<div class="content-wrap">
		<?php else: ?>
			<div class="page-content rbc-fw-section none-sidebar">
			<div class="rbc-wrap rbc-container clearfix">
			<div class="rbc-content site-main">
			<div class="content-wrap">
		<?php endif;
	}
endif;

/** close site-main */
if ( ! function_exists( 'pixwell_wc_after_shop_loop' ) ):
	function pixwell_wc_after_shop_loop() {
		echo '</div></div>';
	}
endif;

/** close wrapper page-content */
if ( ! function_exists( 'pixwell_wc_after_main_content' ) ) {
	function pixwell_wc_after_main_content() {
		echo '</div></div>';
	}
}

/** count bar outer */
if ( ! function_exists( 'pixwell_wc_before_result_count' ) ) {
	function    pixwell_wc_before_result_count() {
		echo '<aside class="result-wrap">';
	}
}


if ( ! function_exists( 'pixwell_wc_after_catalog_ordering' ) ) {
	function pixwell_wc_after_catalog_ordering() {
		echo '</aside>';
	}
}

/** listing columns */
if ( ! function_exists( 'pixwell_wc_shop_columns' ) ) {
	function pixwell_wc_shop_columns() {

		if ( is_shop() ):
			$pixwell_wc_sidebar = pixwell_get_option( 'wc_shop_sidebar' );
		elseif ( is_product_category() ) :
			$pixwell_wc_sidebar = pixwell_get_option( 'wc_archive_sidebar' );
		endif;
		if ( ! empty( $pixwell_wc_sidebar ) ) {
			return 3;
		} else {
			return 4;
		}
	}
}

/** percent sale */
if ( ! function_exists( 'pixwell_wc_sale_percent' ) ):
	function pixwell_wc_sale_percent( $html, $post, $product ) {

		$sale_percent = pixwell_get_option( 'wc_sale_percent' );
		if ( empty( $sale_percent ) || 0 == $product->get_regular_price() ) {
			return $html;
		} else {
			$attachment_ids = $product->get_gallery_image_ids();
			$class_name     = 'onsale percent ';
			if ( empty( $attachment_ids ) ) {
				$class_name = 'onsale percent without-gallery';
			}
			$percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );

			return '<span class="' . esc_attr( $class_name ) . '"><span class="onsale-inner"><strong>' . '-' . esc_html( $percentage ) . '</strong><i>&#37;' . '</i></span></span>';
		}
	}
endif;


/** mini cart ajax */
if ( ! function_exists( 'pixwell_wc_add_to_cart_fragments' ) ) {
	function pixwell_wc_add_to_cart_fragments( $fragments ) {
		ob_start(); ?>
		<span class="cart-counter rb-counter"><?php echo sprintf( '%d', WC()->cart->cart_contents_count ); ?></span>
		<?php
		$fragments['.cart-icon .cart-counter'] = ob_get_clean();

		$mini_cart = $fragments['div.widget_shopping_cart_content'];
		unset( $fragments['div.widget_shopping_cart_content'] );
		$fragments['div.mini-cart-wrap'] = '<div class="mini-cart-wrap woocommerce">' . $mini_cart . '</div>';

		return $fragments;
	}
}

/** shop post per page */
if ( ! function_exists( 'pixwell_wc_shop_products_per_page' ) ) {
	function pixwell_wc_shop_products_per_page( $total ) {
		$posts_per_page = pixwell_get_option( 'wc_shop_posts_per_page' );
		if ( ! empty( $posts_per_page ) ) {
			$total = $posts_per_page;
		}

		return $total;
	}
}

/** remove default breadcrumb pos */
if ( ! function_exists( 'pixwell_remove_single_breadcrumb' ) ) {
	function pixwell_remove_single_breadcrumb() {
		if ( is_product() ) {
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		}
	}
}

