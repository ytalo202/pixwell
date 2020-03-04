<?php
/** this file generate css for theme. */
add_action( 'redux/options/pixwell_theme_options/saved', 'pixwell_write_dynamic_css' );
add_action( 'redux/options/pixwell_theme_options/reset', 'pixwell_write_dynamic_css' );
add_action( 'redux/options/pixwell_theme_options/section/reset', 'pixwell_write_dynamic_css' );
add_action( 'create_category ', 'pixwell_write_dynamic_css' );
add_action( 'edited_category', 'pixwell_write_dynamic_css' );
add_action( 'after_switch_theme', 'pixwell_write_dynamic_css', 999 );
add_action( 'activated_plugin', 'pixwell_write_dynamic_css', 999 );

if ( ! is_admin() ) {
	add_action( 'wp_enqueue_scripts', 'pixwell_main_dynamic_style', 98 );
	add_action( 'wp_enqueue_scripts', 'pixwell_page_dynamic_style', 99 );
}

/** inline page */
if ( ! function_exists( 'pixwell_page_dynamic_style' ) ) {
	function pixwell_page_dynamic_style() {
		if ( is_page() ) {
			$max_width   = rb_get_meta( 'page_max_width' );
			$page_layout = rb_get_meta( 'page_layout' );
			if ( ! empty( $max_width ) && '1' != $page_layout ) {
				$dynamic_css = 'body.page-template-default article.page {';
				$dynamic_css .= 'max-width: ' . absint( $max_width ) . 'px;';
				$dynamic_css .= '}';
				wp_add_inline_style( 'pixwell-style', $dynamic_css );
			}
		}

		return false;
	}
}

/** generate dynamic css */
if ( ! function_exists( 'pixwell_generate_styles' ) ) {
	function pixwell_generate_styles() {

		$dynamic_css = '';

		$font_body = pixwell_get_option( 'font_body' );
		if ( ! empty( $font_body['font-size'] ) ) {
			$dynamic_css .= 'html { font-size: ' . esc_attr( $font_body['font-size'] ) . '; }';
		}
		if ( ! empty( $font_body['color'] ) ) {
			$dynamic_css .= '.instagram-box.box-intro { background-color: ' . esc_attr( $font_body['color'] ) . '; }';
		}

		/** @var  $topbar_line_gradient */
		$topbar_line_gradient = pixwell_get_option( 'topbar_line_gradient' );
		$topbar_gradient      = pixwell_get_option( 'topbar_gradient' );

		if ( ! empty( $topbar_line_gradient['from'] ) || ! empty( $topbar_line_gradient['to'] ) ) {
			$dynamic_css .= '.topline-wrap {';
			if ( ! empty( $topbar_line_gradient['from'] ) ) {
				$dynamic_css .= 'background-color: ' . esc_attr( $topbar_line_gradient['from'] ) . ';';
			} elseif ( ! empty( $topbar_line_gradient['to'] ) ) {
				$dynamic_css .= 'background-color: ' . esc_attr( $topbar_line_gradient['to'] ) . ';';
			}
			$dynamic_css .= '}';

			if ( ! empty( $topbar_line_gradient['from'] ) && ! empty( $topbar_line_gradient['to'] ) ) {
				$dynamic_css .= '.topline-wrap { background-image: linear-gradient(90deg, ' . esc_attr( $topbar_line_gradient['from'] ) . ', ' . esc_attr( $topbar_line_gradient['to'] ) . '); }';
			}
		}

		if ( ! empty( $topbar_gradient['from'] ) || ! empty( $topbar_gradient['to'] ) ) {
			$dynamic_css .= '.topbar-wrap {';
			if ( ! empty( $topbar_gradient['from'] ) ) {
				$dynamic_css .= 'background-color: ' . esc_attr( $topbar_gradient['from'] ) . ';';
			} elseif ( ! empty( $topbar_gradient['to'] ) ) {
				$dynamic_css .= 'background-color: ' . esc_attr( $topbar_gradient['to'] ) . ';';
			}
			$dynamic_css .= '}';

			if ( ! empty( $topbar_gradient['from'] ) && ! empty( $topbar_gradient['to'] ) ) {
				$dynamic_css .= '.topbar-wrap { background-image: linear-gradient(90deg, ' . esc_attr( $topbar_gradient['from'] ) . ', ' . esc_attr( $topbar_gradient['to'] ) . '); }';

				$dynamic_css .= '.topbar-menu .sub-menu {';
				$dynamic_css .= 'background-color: ' . esc_attr( $topbar_gradient['from'] ) . ';';
				$dynamic_css .= 'background-image: linear-gradient(145deg, ' . esc_attr( $topbar_gradient['from'] ) . ', ' . esc_attr( $topbar_gradient['to'] ) . ');';
				$dynamic_css .= '}';
			}
		}

		/** @var  $navbar_height */
		$navbar_height      = pixwell_get_option( 'navbar_height' );
		$sticky_height      = pixwell_get_option( 'sticky_height' );
		$navbar_bg          = pixwell_get_option( 'navbar_bg' );
		$navbar_color       = pixwell_get_option( 'navbar_color' );
		$navbar_color_hover = pixwell_get_option( 'navbar_color_hover' );
		$navsub_bg          = pixwell_get_option( 'navsub_bg' );
		$navsub_color       = pixwell_get_option( 'navsub_color' );
		$navsub_color_hover = pixwell_get_option( 'navsub_color_hover' );
		$navbar_shadow      = pixwell_get_option( 'navbar_shadow' );

		if ( empty( $navsub_bg['from'] ) && $navbar_bg['from'] ) {
			$navsub_bg = $navbar_bg;
		}

		if ( empty( $navsub_color ) ) {
			$navsub_color = $navbar_color;
		}

		if ( ! empty( $navbar_height ) && '60' != $navbar_height ) {
			$dynamic_css .= '.navbar-inner {';
			$dynamic_css .= 'min-height: ' . intval( $navbar_height ) . 'px;';
			$dynamic_css .= '}';

			$dynamic_css .= '.navbar-inner .logo-wrap img {';
			$dynamic_css .= 'max-height: ' . intval( $navbar_height ) . 'px;';
			$dynamic_css .= '}';

			$dynamic_css .= '.main-menu > li > a {';
			$dynamic_css .= 'height: ' . intval( $navbar_height ) . 'px;';
			$dynamic_css .= '}';
		}

		if ( ! empty( $sticky_height ) ) {
			$dynamic_css .= '.section-sticky .navbar-inner {';
			$dynamic_css .= 'min-height: ' . intval( $sticky_height ) . 'px;';
			$dynamic_css .= '}';

			$dynamic_css .= '.section-sticky .navbar-inner .logo-wrap img {';
			$dynamic_css .= 'max-height: ' . intval( $sticky_height ) . 'px;';
			$dynamic_css .= '}';

			$dynamic_css .= '.section-sticky .main-menu > li > a {';
			$dynamic_css .= 'height: ' . intval( $sticky_height ) . 'px;';
			$dynamic_css .= '}';
		}

		/** navbar color */
		if ( ! empty( $navbar_bg['from'] ) || ! empty( $navbar_bg['to'] ) ) {

			$dynamic_css .= '.navbar-wrap:not(.transparent-navbar-wrap), #mobile-sticky-nav {';
			if ( ! empty( $navbar_bg['from'] ) ) {
				$dynamic_css .= 'background-color: ' . esc_attr( $navbar_bg['from'] ) . ';';
			} elseif ( ! empty( $navbar_bg['to'] ) ) {
				$dynamic_css .= 'background-color: ' . esc_attr( $navbar_bg['to'] ) . ';';
			}
			if ( ! empty( $navbar_bg['from'] ) && ! empty( $navbar_bg['to'] ) ) {
				$dynamic_css .= 'background-image: linear-gradient(90deg, ' . esc_attr( $navbar_bg['from'] ) . ', ' . esc_attr( $navbar_bg['to'] ) . ');';
			}
			if ( ! empty( $navbar_color ) ) {
				$dynamic_css .= 'color: ' . esc_attr( $navbar_color ) . ';';
			}
			$dynamic_css .= '}';

			$dynamic_css .= '.navbar-border-holder { border: none }';
		}

		/** cart & bookmark counter */
		if ( ! empty( $navbar_color ) ) {
			$dynamic_css .= '.header-wrap .navbar-wrap:not(.transparent-navbar-wrap) .cart-counter, .header-wrap:not(.header-float) .navbar-wrap .rb-counter,';
			$dynamic_css .= '.header-wrap:not(.header-float) .is-light-text .rb-counter, .header-float .section-sticky .rb-counter {';
			$dynamic_css .= 'background-color: ' . esc_attr( $navbar_color ) . ';';
			$dynamic_css .= '}';

			$dynamic_css .= '.header-5 .btn-toggle-wrap, .header-5 .section-sticky .logo-wrap,';
			$dynamic_css .= '.header-5 .main-menu > li > a, .header-5 .navbar-right {';
			$dynamic_css .= 'color: ' . esc_attr( $navbar_color ) . ';';
			$dynamic_css .= '}';

			$dynamic_css .= '.navbar-wrap .navbar-social a:hover {';
			$dynamic_css .= 'color: ' . esc_attr( $navbar_color ) . ';';
			$dynamic_css .= 'opacity: .7; }';

			if ( ! empty( $navbar_bg['from'] ) ) {
				$dynamic_css .= '.header-wrap .navbar-wrap:not(.transparent-navbar-wrap) .rb-counter,';
				$dynamic_css .= '.header-wrap:not(.header-float) .navbar-wrap .rb-counter, .header-wrap:not(.header-float) .is-light-text .rb-counter { color: ' . esc_attr( $navbar_bg['from'] ) . '; }';
			} elseif ( ! empty( $navbar_bg['to'] ) ) {
				$dynamic_css .= '.header-wrap .navbar-wrap:not(.transparent-navbar-wrap) .rb-counter,';
				$dynamic_css .= '.header-wrap:not(.header-float) .navbar-wrap .rb-counter, .header-wrap:not(.header-float) .is-light-text .rb-counter { color: ' . esc_attr( $navbar_bg['from'] ) . '; }';;
			}
		}


		/** sub menu */
		$dynamic_css .= '.main-menu .sub-menu {';
		if ( ! empty( $navsub_bg['from'] ) ) {
			$dynamic_css .= 'background-color: ' . esc_attr( $navsub_bg['from'] ) . ';';
		} elseif ( ! empty( $navsub_bg['to'] ) ) {
			$dynamic_css .= 'background-color: ' . esc_attr( $navsub_bg['to'] ) . ';';
		}
		if ( ! empty( $navsub_bg['from'] ) && ! empty( $navsub_bg['to'] ) ) {
			$dynamic_css .= 'background-image: linear-gradient(90deg, ' . esc_attr( $navsub_bg['from'] ) . ', ' . esc_attr( $navsub_bg['to'] ) . ');';
		}
		if ( ! empty( $navsub_color ) ) {
			$dynamic_css .= ' color: ' . esc_attr( $navsub_color ) . ';';
		}
		$dynamic_css .= '}';

		$dynamic_css .= '.main-menu > li.menu-item-has-children > .sub-menu:before {';
		if ( ! empty( $navsub_bg['from'] ) ) {
			$dynamic_css .= 'display: none;';
		} elseif ( ! empty( $navsub_bg['to'] ) ) {
			$dynamic_css .= 'display: none;';
		}
		$dynamic_css .= '}';

		if ( ! empty( $navbar_color_hover ) ) {
			$dynamic_css .= '.main-menu > li > a:hover, .nav-search-link:hover,';
			$dynamic_css .= '.main-menu > li.current-menu-item > a, .header-wrap .cart-link:hover {';
			$dynamic_css .= 'color: ' . esc_attr( $navbar_color_hover ) . ';';
			$dynamic_css .= '}';
			$dynamic_css .= '.main-menu > li>  a > span:before {display: none; }';

			$dynamic_css .= '.navbar-wrap .navbar-social a:hover {';
			$dynamic_css .= 'color: ' . esc_attr( $navbar_color_hover ) . ';';
			$dynamic_css .= 'opacity: 1; }';
		}

		if ( ! empty( $navsub_color_hover ) ) {
			$dynamic_css .= '.main-menu .sub-menu a:not(.p-url):hover > span {';
			$dynamic_css .= 'color: ' . esc_attr( $navsub_color_hover ) . ';';
			$dynamic_css .= '}';
			$dynamic_css .= '.main-menu a > span:before {display: none; }';
		}

		if ( empty( $navbar_shadow ) ) {
			$dynamic_css .= '.navbar-wrap:not(.transparent-navbar-wrap), #mobile-sticky-nav { box-shadow: none !important; }';
		}

		/** Mobile Navigation */
		$mobile_nav_height = pixwell_get_option( 'mobile_nav_height' );
		$mobile_nav_bg     = pixwell_get_option( 'mobile_nav_bg' );
		$mobile_nav_color  = pixwell_get_option( 'mobile_nav_color' );

		$dynamic_css .= '.mobile-nav-inner {';
		if ( ! empty( $mobile_nav_height ) && '60' != $mobile_nav_height ) {
			$dynamic_css .= 'height: ' . intval( $mobile_nav_height ) . 'px;';
		}

		if ( ! empty( $mobile_nav_bg['from'] ) ) {
			$dynamic_css .= 'background-color: ' . esc_attr( $mobile_nav_bg['from'] ) . ';';
		} elseif ( ! empty( $mobile_nav_bg['to'] ) ) {
			$dynamic_css .= 'background-color: ' . esc_attr( $mobile_nav_bg['to'] ) . ';';
		}

		if ( ! empty( $mobile_nav_bg['from'] ) && ! empty( $mobile_nav_bg['to'] ) ) {
			$dynamic_css .= 'background-image: linear-gradient(90deg, ' . esc_attr( $mobile_nav_bg['from'] ) . ', ' . esc_attr( $mobile_nav_bg['to'] ) . ');';
		}

		if ( ! empty( $mobile_nav_color ) ) {
			$dynamic_css .= 'color: ' . esc_attr( $mobile_nav_color ) . ';';
		}

		$dynamic_css .= '}';

		/** menu border */
		if ( ! empty( $mobile_nav_bg['from'] ) || ! empty( $mobile_nav_bg['to'] ) ) {
			$dynamic_css .= '@media only screen and (max-width: 991px) {.navbar-border-holder { border: none }}';
		}

		if ( ! empty( $mobile_nav_color ) ) {
			$dynamic_css .= '@media only screen and (max-width: 991px) {.navbar-border-holder { border-color: ' . esc_attr( $mobile_nav_color ) . ' }}';
		}

		/** off-canvas */
		$off_canvas_header_bg          = pixwell_get_option( 'off_canvas_header_bg' );
		$off_canvas_bg                 = pixwell_get_option( 'off_canvas_bg' );
		$off_canvas_header_logo_height = pixwell_get_option( 'off_canvas_header_logo_height' );

		if ( ! empty( $off_canvas_header_bg['url'] ) ) {
			$dynamic_css .= '.off-canvas-header { background-image: url("' . esc_url( $off_canvas_header_bg['url'] ) . '")}';
		}
		if ( ! empty( $off_canvas_bg ) ) {
			$dynamic_css .= '.off-canvas-wrap { background-color: ' . esc_attr( $off_canvas_bg ) . ' !important; }';
		}
		if ( ! empty( $off_canvas_header_logo_height ) ) {
			$dynamic_css .= 'a.off-canvas-logo img { max-height: ' . intval( $off_canvas_header_logo_height ) . 'px; }';
		}

		/** transparent header */
		$transparent_header_bg = pixwell_get_option( 'transparent_header_bg' );
		if ( ! empty( $transparent_header_bg['rgba'] ) ) {
			$dynamic_css .= '.header-float .transparent-navbar-wrap { background: ' . $transparent_header_bg['rgba'] . ';}';
			$dynamic_css .= '.header-float .navbar-inner { border-bottom: none; }';
		}

		/** header 3 color */
		$header_banner_color = pixwell_get_option( 'header_banner_color' );
		if ( ! empty( $header_banner_color ) ) {
			$dynamic_css .= '.header-3 .banner-left, .header-3 .banner-right { color: ' . $header_banner_color . ' ;}';
			$dynamic_css .= '.header-3 .banner-right .rb-counter { background-color: ' . $header_banner_color . ' ;}';
		}

		/** @var $global_color */
		$global_color    = pixwell_get_option( 'global_color' );
		$hyperlink_color = pixwell_get_option( 'hyperlink_color' );
		$popup_bg_color  = pixwell_get_option( 'popup_bg_color' );
		$review_color    = pixwell_get_option( 'review_color' );
		$card_color      = pixwell_get_option( 'card_color' );
		$coupon_color    = pixwell_get_option( 'coupon_color' );


		if ( ! empty( $global_color ) && '#ff8763' != strtolower( $global_color ) ) {
			/** background */
			$dynamic_css .= 'input[type="submit"]:hover, input[type="submit"]:focus, button:hover, button:focus,';
			$dynamic_css .= 'input[type="button"]:hover, input[type="button"]:focus,';
			$dynamic_css .= '.post-edit-link:hover, a.pagination-link:hover, a.page-numbers:hover,';
			$dynamic_css .= '.post-page-numbers:hover, a.loadmore-link:hover, .pagination-simple .page-numbers:hover,';
			$dynamic_css .= '#off-canvas-close-btn:hover, #off-canvas-close-btn:focus,';
			$dynamic_css .= '.off-canvas-subscribe a, .block-header-3 .block-title:before,';
			$dynamic_css .= '.cookie-accept:hover, .entry-footer a:hover, .box-comment-btn:hover,';
			$dynamic_css .= 'a.comment-reply-link:hover, .review-info, .entry-content a.wp-block-button__link:hover,';
			$dynamic_css .= '#wp-calendar tbody a:hover, .instagram-box.box-intro:hover, .banner-btn a, .headerstrip-btn a,';
			$dynamic_css .= '.is-light-text .widget:not(.woocommerce) .count,';
			$dynamic_css .= '.rb-newsletter.is-light-text button.newsletter-submit,';
			$dynamic_css .= '.cat-icon-round .cat-info-el, .cat-icon-radius .cat-info-el,';
			$dynamic_css .= '.cat-icon-square .cat-info-el:before, .entry-content .wpcf7 label:before,';
			$dynamic_css .= 'body .cooked-recipe-directions .cooked-direction-number, span.cooked-taxonomy a:hover,';
			$dynamic_css .= '.widget_categories a:hover .count, .widget_archive a:hover .count,';
			$dynamic_css .= '.wp-block-categories-list a:hover .count, .wp-block-categories-list a:hover .count,';
			$dynamic_css .= '.entry-content .wp-block-file .wp-block-file__button, #wp-calendar td#today,';
			$dynamic_css .= '.mfp-close:hover, .is-light-text .mfp-close:hover, #rb-close-newsletter:hover,';
			$dynamic_css .= '.tagcloud a:hover, .tagcloud a:focus, .is-light-text .tagcloud a:hover, .is-light-text .tagcloud a:focus,';
			$dynamic_css .= 'input[type="checkbox"].newsletter-checkbox:checked + label:before';
			$dynamic_css .= '{ background-color: ' . $global_color . '}';

			/** color */
			$dynamic_css .= '.page-edit-link:hover, .rb-menu > li.current-menu-item > a > span:before,';
			$dynamic_css .= '.p-url:hover, .p-url:focus, .p-wrap .p-url:hover,';
			$dynamic_css .= '.p-wrap .p-url:focus, .p-link:hover span, .p-link:hover i,';
			$dynamic_css .= '.meta-info-el a:hover, .sponsor-label, .block-header-3 .block-title:before,';
			$dynamic_css .= '.subscribe-box .mc4wp-form-fields input[type="submit"]:hover + i,';
			$dynamic_css .= '.entry-content p a:not(button), .comment-content a,';
			$dynamic_css .= '.author-title a, .logged-in-as a:hover, .comment-list .logged-in-as a:hover,';
			$dynamic_css .= '.gallery-list-label a:hover, .review-el .review-stars,';
			$dynamic_css .= '.share-total, .breadcrumb a:hover, span.not-found-label, .return-home:hover, .section-not-found .page-content .return-home:hover,';
			$dynamic_css .= '.subscribe-box .rb-newsletter.is-light-text button.newsletter-submit-icon:hover,';
			$dynamic_css .= '.subscribe-box .rb-newsletter button.newsletter-submit-icon:hover,';
			$dynamic_css .= '.fw-category-1 .cat-list-item:hover .cat-list-name, .fw-category-1.is-light-text .cat-list-item:hover .cat-list-name,';
			$dynamic_css .= 'body .cooked-icon-recipe-icon, .comment-list .comment-reply-title small a:hover,';
			$dynamic_css .= '.widget_pages a:hover, .widget_meta a:hover, .widget_categories a:hover,';
			$dynamic_css .= '.entry-content .wp-block-categories-list a:hover, .entry-content .wp-block-archives-list a:hover,';
			$dynamic_css .= '.widget_archive a:hover, .widget.widget_nav_menu a:hover,  .p-grid-4.is-pop-style .p-header .counter-index,';
			$dynamic_css .= '.twitter-content.entry-summary a:hover,';
			$dynamic_css .= '.read-it-later:hover, .read-it-later:focus, .address-info a:hover,';
			$dynamic_css .= '.gallery-popup-content .image-popup-description a:hover, .gallery-popup-content .image-popup-description a:focus,';
			$dynamic_css .= '.entry-content ul.wp-block-latest-posts a:hover, .widget_recent_entries a:hover, .recentcomments a:hover, a.rsswidget:hover,';
			$dynamic_css .= '.entry-content .wp-block-latest-comments__comment-meta a:hover,';
			$dynamic_css .= '.entry-content .cooked-recipe-info .cooked-author a:hover, .entry-content a:not(button), .comment-content a,';
			$dynamic_css .= '.about-desc a:hover, .is-light-text .about-desc a:hover, .portfolio-info-el:hover,';
			$dynamic_css .= '.portfolio-nav a:hover, .portfolio-nav-next a:hover > i';
			$dynamic_css .= '{ color: ' . $global_color . '}';

			$dynamic_css .= '.is-style-outline a.wp-block-button__link:hover';
			$dynamic_css .= '{ color: ' . $global_color . '!important}';

			$dynamic_css .= 'a.comment-reply-link:hover, .navbar-holder.is-light-text .header-lightbox,';
			$dynamic_css .= 'input[type="checkbox"].newsletter-checkbox:checked + label:before';
			$dynamic_css .= '{ border-color: ' . $global_color . '}';

			if ( class_exists( 'WooCommerce' ) ) {

				$dynamic_css .= '.product-buttons .add-to-cart a.added_to_cart,';
				$dynamic_css .= '.product-buttons .yith-wcwl-add-to-wishlist a.add_to_wishlist:hover,';
				$dynamic_css .= '.woocommerce .woocommerce-MyAccount-navigation li:not(.is-active) a:hover,';
				$dynamic_css .= '.woocommerce a.remove:hover, .woocommerce div.product form.cart .button,';
				$dynamic_css .= '.woocommerce #respond input#submit:hover, .woocommerce #respond input#submit.alt:hover,';
				$dynamic_css .= '.woocommerce a.button.alt:hover, .woocommerce a.button:hover, .woocommerce button.button:hover,';
				$dynamic_css .= '.woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,';
				$dynamic_css .= '.woocommerce input.button:hover, .product-buttons .add-to-cart a:hover,';
				$dynamic_css .= '.woocommerce .product-buttons .add-to-cart a:hover,';
				$dynamic_css .= '.woocommerce-mini-cart-item a.remove.remove_from_cart_button:hover,';
				$dynamic_css .= '.woocommerce-mini-cart__buttons .button.checkout,';
				$dynamic_css .= '.woocommerce #rememberme:checked + span:before,';
				$dynamic_css .= '#ship-to-different-address-checkbox:checked + span:before';
				$dynamic_css .= '{ background-color: ' . $global_color . '}';

				$dynamic_css .= '.woocommerce-info a.showcoupon:hover,';
				$dynamic_css .= '.wishlist_table tr td.product-stock-status span.wishlist-out-of-stock,';
				$dynamic_css .= '.product_meta a:hover, .woocommerce div.product p.stock.out-of-stock,';
				$dynamic_css .= '.woocommerce div.product form.cart .reset_variations:hover,';
				$dynamic_css .= '.woocommerce div.product .summary .yith-wcwl-add-to-wishlist a:hover,';
				$dynamic_css .= '.woocommerce .single-product-wrap div.product > .yith-wcwl-add-to-wishlist a:hover,';
				$dynamic_css .= '.woocommerce div.product .woocommerce-tabs .yith-wcwl-add-to-wishlist a:hover,';
				$dynamic_css .= '.woocommerce div.product .woocommerce-tabs ul.tabs li:not(.active) a:hover,';
				$dynamic_css .= 'li.woocommerce-mini-cart-item a:not(.remove):hover,';
				$dynamic_css .= '.woocommerce-mini-cart__buttons .button:not(.checkout):hover,';
				$dynamic_css .= '.woocommerce-mini-cart__buttons .button:not(.checkout):focus';
				$dynamic_css .= '{ color: ' . $global_color . '}';

				$dynamic_css .= '.woocommerce #rememberme:checked + span:before,';
				$dynamic_css .= '#ship-to-different-address-checkbox:checked + span:before';
				$dynamic_css .= '{ border-color: ' . $global_color . '}';
			}
		}

		if ( ! empty( $hyperlink_color ) && strlen( $hyperlink_color ) >= 3 ) {
			$dynamic_css .= '.entry-content a:not(button), .comment-content a';
			$dynamic_css .= '{ color: ' . $hyperlink_color . '}';
		}

		if ( ! empty( $review_color ) && strlen( $review_color ) >= 3 ) {
			$dynamic_css .= '.review-info, .p-review-info';
			$dynamic_css .= '{ background-color: ' . $review_color . '}';
			$dynamic_css .= '.review-el .review-stars, .average-stars i';
			$dynamic_css .= '{ color: ' . $review_color . '}';
		}

		if ( ! empty( $popup_bg_color ) && '#111111' != strtolower( $global_color ) ) {
			$dynamic_css .= '.rb-gallery-popup.mfp-bg.mfp-ready.rb-popup-effect';
			$dynamic_css .= '{ background-color: ' . $popup_bg_color . '}';
		}

		if ( ! empty( $card_color ) && '#4ca695' != strtolower( $global_color ) ) {
			$dynamic_css .= '.deal-module .card-label span';
			$dynamic_css .= '{ background-color: ' . $card_color . '}';
		}

		if ( ! empty( $coupon_color ) && '#826abc' != strtolower( $coupon_color ) ) {
			$dynamic_css .= '.deal-module .coupon-label span';
			$dynamic_css .= '{ background-color: ' . $coupon_color . '}';
		}

		/** Category */
		$cat_options  = get_option( 'pixwell_meta_categories', false );
		$cat_solid_bg = pixwell_get_option( 'cat_header_solid_bg' );

		if ( ! empty( $cat_solid_bg ) && strlen( $cat_solid_bg ) >= 3 ) {
			$dynamic_css .= '.category .category-header .header-holder';
			$dynamic_css .= '{ background-color: ' . $cat_solid_bg . '}';
		}

		if ( is_array( $cat_options ) ) {
			foreach ( $cat_options as $cat_id => $settings ) {
				if ( ! empty( $cat_id ) ) {
					if ( ! empty( $settings['cat_icon'] ) && strlen( $settings['cat_icon'] ) >= 3 ) {
						$dynamic_css .= '.cat-icon-round .cat-info-el.cat-info-id-' . esc_attr( $cat_id ) . ',';
						$dynamic_css .= '.cat-icon-radius .cat-info-el.cat-info-id-' . esc_attr( $cat_id ) . ',';
						$dynamic_css .= '.cat-dot-el.cat-info-id-' . esc_attr( $cat_id ) . ',';
						$dynamic_css .= '.cat-icon-square .cat-info-el.cat-info-id-' . esc_attr( $cat_id ) . ':before';
						$dynamic_css .= '{ background-color: ' . $settings['cat_icon'] . '}';

						$dynamic_css .= '.cat-icon-line .cat-info-el.cat-info-id-' . esc_attr( $cat_id );
						$dynamic_css .= '{ border-color: ' . $settings['cat_icon'] . '}';

						$dynamic_css .= '.fw-category-1 .cat-list-item.cat-id-' . esc_attr( $cat_id ) . ' a:hover .cat-list-name,';
						$dynamic_css .= '.fw-category-1.is-light-text .cat-list-item.cat-id-' . esc_attr( $cat_id ) . ' a:hover .cat-list-name';
						$dynamic_css .= '{ color: ' . $settings['cat_icon'] . '}';
					}

					if ( ! empty( $settings['header_solid_bg'] ) && strlen( $settings['header_solid_bg'] ) >= 3 ) {
						$dynamic_css .= 'body.category.category-' . esc_attr( $cat_id ) . ' .category-header .header-holder';
						$dynamic_css .= '{ background-color: ' . $settings['header_solid_bg'] . '}';
					}
				}
			}
		}

		/** comment font */
		$font_excerpt = pixwell_get_option( 'font_excerpt' );
		if ( ! empty( $font_excerpt['font-size'] ) ) {
			$dynamic_css .= '.comment-content, .single-bottom-share a:nth-child(1) span, .single-bottom-share a:nth-child(2) span, p.logged-in-as';
			$dynamic_css .= '{ font-size: ' . esc_attr( $font_excerpt['font-size'] ) . '; }';
		}

		/* meta font */
		$font_post_meta = pixwell_get_option( 'font_post_meta' );
		if ( ! empty( $font_post_meta['font-family'] ) ) {
			$dynamic_css .= '.tipsy, .additional-meta, .sponsor-label, .sponsor-link, .entry-footer .tag-label,';
			$dynamic_css .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$dynamic_css .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$dynamic_css .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$dynamic_css .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$dynamic_css .= '.subscribe-content .desc, .follower-el .right-el, .author-job, .comment-metadata';
			$dynamic_css .= '{ font-family: ' . esc_attr( $font_post_meta['font-family'] ) . '; }';
		}
		if ( ! empty( $font_post_meta['font-weight'] ) ) {
			$dynamic_css .= '.tipsy, .additional-meta, .sponsor-label, .entry-footer .tag-label,';
			$dynamic_css .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$dynamic_css .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$dynamic_css .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$dynamic_css .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$dynamic_css .= '.subscribe-content .desc, .follower-el .right-el, .author-job, .comment-metadata';
			$dynamic_css .= '{ font-weight: ' . esc_attr( $font_post_meta['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_post_meta['font-size'] ) ) {
			$dynamic_css .= '.tipsy, .additional-meta, .sponsor-label, .sponsor-link, .entry-footer .tag-label,';
			$dynamic_css .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$dynamic_css .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$dynamic_css .= '.subscribe-content .desc, .author-job';
			$dynamic_css .= '{ font-size: ' . $font_post_meta['font-size'] . '; }';

			$dynamic_css .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$dynamic_css .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$dynamic_css .= '.comment-metadata, .follower-el .right-el';
			$dynamic_css .= '{ font-size: ' . intval( intval( $font_post_meta['font-size'] ) * 1.1 ) . 'px; }';
		}
		if ( ! empty( $font_post_meta['font-style'] ) ) {
			$dynamic_css .= '.tipsy, .additional-meta, .sponsor-label, .entry-footer .tag-label,';
			$dynamic_css .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$dynamic_css .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$dynamic_css .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$dynamic_css .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$dynamic_css .= '.subscribe-content .desc. .follower-el .right-el, .author-job, .comment-metadata';
			$dynamic_css .= '{ font-style: ' . esc_attr( $font_post_meta['font-style'] ) . '; }';
		}
		if ( ! empty( $font_post_meta['letter-spacing'] ) ) {
			$dynamic_css .= '.tipsy, .additional-meta, .sponsor-label, .entry-footer .tag-label,';
			$dynamic_css .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$dynamic_css .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$dynamic_css .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$dynamic_css .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$dynamic_css .= '.subscribe-content .desc, .follower-el .right-el, .author-job, .comment-metadata';
			$dynamic_css .= '{ letter-spacing: ' . esc_attr( $font_post_meta['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_post_meta['text-transform'] ) ) {
			$dynamic_css .= '.tipsy, .additional-meta, .sponsor-label, .entry-footer .tag-label,';
			$dynamic_css .= '.box-nav .nav-label, .left-article-label, .share-label, .rss-date,';
			$dynamic_css .= '.wp-block-latest-posts__post-date, .wp-block-latest-comments__comment-date,';
			$dynamic_css .= '.image-caption, .wp-caption-text, .gallery-caption, .entry-content .wp-block-audio figcaption,';
			$dynamic_css .= '.entry-content .wp-block-video figcaption, .entry-content .wp-block-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-image figcaption,';
			$dynamic_css .= '.entry-content .wp-block-gallery .blocks-gallery-item figcaption,';
			$dynamic_css .= '.subscribe-content .desc, .follower-el .right-el, .author-job, .comment-metadata';
			$dynamic_css .= '{ text-transform: ' . esc_attr( $font_post_meta['text-transform'] ) . '; }';
		}

		/* author info */
		$font_post_meta_author = pixwell_get_option( 'font_post_meta_author' );
		if ( ! empty( $font_post_meta_author['font-family'] ) ) {
			$dynamic_css .= '.sponsor-link';
			$dynamic_css .= '{ font-family: ' . esc_attr( $font_post_meta_author['font-family'] ) . '; }';
		}
		if ( ! empty( $font_post_meta_author['font-weight'] ) ) {
			$dynamic_css .= '.sponsor-link';
			$dynamic_css .= '{ font-weight: ' . esc_attr( $font_post_meta_author['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_post_meta_author['font-style'] ) ) {
			$dynamic_css .= '.sponsor-link';
			$dynamic_css .= '{ font-style: ' . esc_attr( $font_post_meta_author['font-style'] ) . '; }';
		}
		if ( ! empty( $font_post_meta_author['letter-spacing'] ) ) {
			$dynamic_css .= '.sponsor-link';
			$dynamic_css .= '{ letter-spacing: ' . esc_attr( $font_post_meta_author['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_post_meta_author['text-transform'] ) ) {
			$dynamic_css .= '.sponsor-link';
			$dynamic_css .= '{ text-transform: ' . esc_attr( $font_post_meta_author['text-transform'] ) . '; }';
		}

		/* category info font */
		$font_cat_icon = pixwell_get_option( 'font_cat_icon' );
		if ( ! empty( $font_cat_icon['font-family'] ) ) {
			$dynamic_css .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$dynamic_css .= '{ font-family: ' . esc_attr( $font_cat_icon['font-family'] ) . '; }';
		}
		if ( ! empty( $font_cat_icon['font-weight'] ) ) {
			$dynamic_css .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$dynamic_css .= '{ font-weight: ' . esc_attr( $font_cat_icon['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_cat_icon['font-size'] ) ) {
			$dynamic_css .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$dynamic_css .= '{ font-size: ' . esc_attr( $font_cat_icon['font-size'] ) . ' !important; }';
		}
		if ( ! empty( $font_cat_icon['font-style'] ) ) {
			$dynamic_css .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$dynamic_css .= '{ font-style: ' . esc_attr( $font_cat_icon['font-style'] ) . '; }';
		}
		if ( ! empty( $font_cat_icon['letter-spacing'] ) ) {
			$dynamic_css .= '.cat-info-el { letter-spacing: inherit; }';
			$dynamic_css .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$dynamic_css .= '{ letter-spacing: ' . esc_attr( $font_cat_icon['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_cat_icon['text-transform'] ) ) {
			$dynamic_css .= '.entry-footer a, .tagcloud a, .entry-footer .source, .entry-footer .via-el';
			$dynamic_css .= '{ text-transform: ' . esc_attr( $font_cat_icon['text-transform'] ) . '; }';
		}

		/** font button */
		$font_button = pixwell_get_option( 'font_button' );
		if ( ! empty( $font_button['font-family'] ) ) {
			$dynamic_css .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$dynamic_css .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap';
			$dynamic_css .= '{ font-family: ' . esc_attr( $font_button['font-family'] ) . '; }';
		}
		if ( ! empty( $font_button['font-weight'] ) ) {
			$dynamic_css .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$dynamic_css .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap';
			$dynamic_css .= '{ font-weight: ' . esc_attr( $font_button['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_button['font-size'] ) ) {
			$dynamic_css .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$dynamic_css .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap';
			$dynamic_css .= '{ font-size: ' . esc_attr( $font_button['font-size'] ) . '; }';
		}
		if ( ! empty( $font_button['font-style'] ) ) {
			$dynamic_css .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$dynamic_css .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap';
			$dynamic_css .= '{ font-style: ' . esc_attr( $font_button['font-style'] ) . '; }';
		}
		if ( ! empty( $font_button['letter-spacing'] ) ) {
			$dynamic_css .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$dynamic_css .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap';
			$dynamic_css .= '{ letter-spacing: ' . esc_attr( $font_button['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_button['text-transform'] ) ) {
			$dynamic_css .= '.p-link, .rb-cookie .cookie-accept, a.comment-reply-link, .comment-list .comment-reply-title small a,';
			$dynamic_css .= '.banner-btn a, .headerstrip-btn a, input[type="submit"], button, .pagination-wrap';
			$dynamic_css .= '{ text-transform: ' . esc_attr( $font_button['text-transform'] ) . '; }';
		}


		/** font input */
		$font_input = pixwell_get_option( 'font_input' );
		if ( ! empty( $font_input['font-family'] ) ) {
			$dynamic_css .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$dynamic_css .= 'input[type="search"], input[type="number"]';
			$dynamic_css .= '{ font-family: ' . esc_attr( $font_input['font-family'] ) . '; }';
		}
		if ( ! empty( $font_input['font-size'] ) ) {
			$dynamic_css .= 'select, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$dynamic_css .= 'input[type="search"], input[type="number"]';
			$dynamic_css .= '{ font-size: ' . esc_attr( $font_input['font-size'] ) . '; }';
			$dynamic_css .= 'textarea';
			$dynamic_css .= '{ font-size: ' . esc_attr( $font_input['font-size'] ) . ' !important; }';
		}
		if ( ! empty( $font_input['font-weight'] ) ) {
			$dynamic_css .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$dynamic_css .= 'input[type="search"], input[type="number"]';
			$dynamic_css .= '{ font-weight: ' . esc_attr( $font_input['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_input['font-style'] ) ) {
			$dynamic_css .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$dynamic_css .= 'input[type="search"], input[type="number"]';
			$dynamic_css .= '{ font-style: ' . esc_attr( $font_input['font-style'] ) . '; }';
		}
		if ( ! empty( $font_input['letter-spacing'] ) ) {
			$dynamic_css .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$dynamic_css .= 'input[type="search"], input[type="number"]';
			$dynamic_css .= '{ letter-spacing: ' . esc_attr( $font_input['letter-spacing'] ) . '; }';
		}
		if ( ! empty( $font_input['text-transform'] ) ) {
			$dynamic_css .= 'select, textarea, input[type="text"], input[type="tel"], input[type="email"], input[type="url"],';
			$dynamic_css .= 'input[type="search"], input[type="number"]';
			$dynamic_css .= '{ text-transform: ' . esc_attr( $font_input['text-transform'] ) . '; }';
		}

		/** title font */
		$font_h1 = pixwell_get_option( 'font_h1' );
		if ( ! empty( $font_h1['font-family'] ) ) {
			$dynamic_css .= '.footer-menu-inner, .widget_recent_comments .recentcomments > a:last-child,';
			$dynamic_css .= '.wp-block-latest-comments__comment-link, .wp-block-latest-posts__list a,';
			$dynamic_css .= '.widget_recent_entries li, .wp-block-quote p, blockquote p, .widget_rss li,';
			$dynamic_css .= '.wp-block-latest-posts li, .wp-block-latest-comments__comment-link';
			$dynamic_css .= '{ font-family: ' . esc_attr( $font_h1['font-family'] ) . '; }';
		}
		if ( ! empty( $font_h1['font-weight'] ) ) {
			$dynamic_css .= '.footer-menu-inner, .widget_recent_comments .recentcomments > a:last-child,';
			$dynamic_css .= '.wp-block-latest-comments__comment-link, .wp-block-latest-posts__list a,';
			$dynamic_css .= '.widget_recent_entries li, .wp-block-quote p, blockquote p, .widget_rss li,';
			$dynamic_css .= '.wp-block-latest-posts li, .wp-block-latest-comments__comment-link';
			$dynamic_css .= '{ font-weight: ' . esc_attr( $font_h1['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_h1['font-style'] ) ) {
			$dynamic_css .= '.footer-menu-inner, .widget_recent_comments .recentcomments > a:last-child,';
			$dynamic_css .= '.wp-block-latest-comments__comment-link, .wp-block-latest-posts__list a,';
			$dynamic_css .= '.widget_recent_entries li, .wp-block-quote p, blockquote p, .widget_rss li,';
			$dynamic_css .= '.wp-block-latest-posts li, .wp-block-latest-comments__comment-link';
			$dynamic_css .= '{ font-style: ' . esc_attr( $font_h1['font-style'] ) . '; }';
		}
		if ( ! empty( $font_h1['letter-spacing'] ) ) {
			$dynamic_css .= '.footer-menu-inner, .widget_recent_comments .recentcomments > a:last-child,';
			$dynamic_css .= '.wp-block-latest-comments__comment-link, .wp-block-latest-posts__list a,';
			$dynamic_css .= '.widget_recent_entries li, .wp-block-quote p, blockquote p, .widget_rss li,';
			$dynamic_css .= '.wp-block-latest-posts li, .wp-block-latest-comments__comment-link';
			$dynamic_css .= '{ letter-spacing: ' . esc_attr( $font_h1['letter-spacing'] ) . '; }';
		}

		/** default widget font */
		$font_navbar_sub = pixwell_get_option( 'font_navbar_sub' );
		if ( ! empty( $font_navbar_sub['font-family'] ) ) {
			$dynamic_css .= ' .widget_pages .page_item, .widget_meta li,';
			$dynamic_css .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$dynamic_css .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$dynamic_css .= '{ font-family: ' . esc_attr( $font_navbar_sub['font-family'] ) . '; }';
		}
		if ( ! empty( $font_navbar_sub['font-size'] ) ) {
			$dynamic_css .= '.widget_pages .page_item, .widget_meta li,';
			$dynamic_css .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$dynamic_css .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$dynamic_css .= '{ font-size: ' . esc_attr( $font_navbar_sub['font-size'] ) . '; }';
		}
		if ( ! empty( $font_navbar_sub['font-weight'] ) ) {
			$dynamic_css .= '.widget_pages .page_item, .widget_meta li,';
			$dynamic_css .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$dynamic_css .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$dynamic_css .= '{ font-weight: ' . esc_attr( $font_navbar_sub['font-weight'] ) . '; }';
		}
		if ( ! empty( $font_navbar_sub['font-style'] ) ) {
			$dynamic_css .= '.widget_pages .page_item, .widget_meta li,';
			$dynamic_css .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$dynamic_css .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$dynamic_css .= '{ font-style: ' . esc_attr( $font_navbar_sub['font-style'] ) . '; }';
		}
		if ( ! empty( $font_navbar_sub['letter-spacing'] ) ) {
			$dynamic_css .= '.widget_pages .page_item, .widget_meta li,';
			$dynamic_css .= '.widget_categories .cat-item, .widget_archive li, .widget.widget_nav_menu .menu-item,';
			$dynamic_css .= '.wp-block-archives-list li, .wp-block-categories-list li';
			$dynamic_css .= '{ letter-spacing: ' . esc_attr( $font_navbar_sub['letter-spacing'] ) . '; }';
		}

		/** mobile font size */
		$font_size_mobile = pixwell_get_option( 'font_size_mobile' );
		if ( ! empty( $font_size_mobile ) ) {
			$dynamic_css .= '@media only screen and (max-width: 767px) {';
			$dynamic_css .= '.entry-content { font-size: .' . intval( $font_size_mobile ) . 'rem; }';
			$dynamic_css .= '.p-wrap .entry-summary, .twitter-content.entry-summary, .element-desc, .subscribe-description,';
			$dynamic_css .= '.copyright-inner > *, .summary-content, .pros-cons-wrap ul li,';
			$dynamic_css .= '.gallery-popup-content .image-popup-description > *';
			$dynamic_css .= '{ font-size: .' . intval( intval( $font_size_mobile ) * .85 ) . 'rem; }';
			$dynamic_css .= '}';
		}

		/** block title font */
		$font_header_block = pixwell_get_option( 'font_header_block' );
		if ( ! empty( $font_header_block['font-size'] ) ) {
			$dynamic_css .= '@media only screen and (max-width: 991px) {';
			$dynamic_css .= '.block-header-2 .block-title, .block-header-5 .block-title { font-size: ' . absint( intval( $font_header_block['font-size'] ) * .85 ) . 'px; }';
			$dynamic_css .= '}';

			$dynamic_css .= '@media only screen and (max-width: 767px) {';
			$dynamic_css .= '.block-header-2 .block-title, .block-header-5 .block-title { font-size: ' . absint( intval( $font_header_block['font-size'] ) * .75 ) . 'px; }';
			$dynamic_css .= '}';
		}

		/* H tags responsive font size */
		$font_h1_size            = pixwell_get_option( 'font_h1_size' );
		$font_h1_size_mobile     = pixwell_get_option( 'font_h1_size_mobile' );
		$font_h1_size_tablet     = pixwell_get_option( 'font_h1_size_tablet' );
		$font_h1_size_tablet_hoz = pixwell_get_option( 'font_h1_size_tablet_hoz' );

		$font_h2_size            = pixwell_get_option( 'font_h2_size' );
		$font_h2_size_mobile     = pixwell_get_option( 'font_h2_size_mobile' );
		$font_h2_size_tablet     = pixwell_get_option( 'font_h2_size_tablet' );
		$font_h2_size_tablet_hoz = pixwell_get_option( 'font_h2_size_tablet_hoz' );

		$font_h3_size            = pixwell_get_option( 'font_h3_size' );
		$font_h3_size_mobile     = pixwell_get_option( 'font_h3_size_mobile' );
		$font_h3_size_tablet     = pixwell_get_option( 'font_h3_size_tablet' );
		$font_h3_size_tablet_hoz = pixwell_get_option( 'font_h3_size_tablet_hoz' );

		$font_h4_size            = pixwell_get_option( 'font_h4_size' );
		$font_h4_size_mobile     = pixwell_get_option( 'font_h4_size_mobile' );
		$font_h4_size_tablet     = pixwell_get_option( 'font_h4_size_tablet' );
		$font_h4_size_tablet_hoz = pixwell_get_option( 'font_h4_size_tablet_hoz' );

		$font_h5_size            = pixwell_get_option( 'font_h5_size' );
		$font_h5_size_mobile     = pixwell_get_option( 'font_h5_size_mobile' );
		$font_h5_size_tablet     = pixwell_get_option( 'font_h5_size_tablet' );
		$font_h5_size_tablet_hoz = pixwell_get_option( 'font_h5_size_tablet_hoz' );

		$font_h6_size            = pixwell_get_option( 'font_h6_size' );
		$font_h6_size_mobile     = pixwell_get_option( 'font_h6_size_mobile' );
		$font_h6_size_tablet     = pixwell_get_option( 'font_h6_size_tablet' );
		$font_h6_size_tablet_hoz = pixwell_get_option( 'font_h6_size_tablet_hoz' );

		$font_header_block_size_mobile = pixwell_get_option( 'font_header_block_size_mobile' );
		$title_uppercase               = pixwell_get_option( 'title_uppercase' );


		if ( ! empty( $font_h1_size ) ) {
			$dynamic_css .= 'h1, .h1, h1.single-title {font-size: ' . absint( $font_h1_size ) . 'px; }';
		}
		if ( ! empty( $font_h2_size ) ) {
			$dynamic_css .= 'h2, .h2 {font-size: ' . absint( $font_h2_size ) . 'px; }';
		}
		if ( ! empty( $font_h3_size ) ) {
			$dynamic_css .= 'h3, .h3 {font-size: ' . absint( $font_h3_size ) . 'px; }';
		}
		if ( ! empty( $font_h4_size ) ) {
			$dynamic_css .= 'h4, .h4 {font-size: ' . absint( $font_h4_size ) . 'px; }';
		}
		if ( ! empty( $font_h5_size ) ) {
			$dynamic_css .= 'h5, .h5 {font-size: ' . absint( $font_h5_size ) . 'px; }';
		}
		if ( ! empty( $font_h6_size ) ) {
			$dynamic_css .= 'h6, .h6 {font-size: ' . absint( $font_h6_size ) . 'px; }';
		}

		$dynamic_css .= '@media only screen and (max-width: 1024px) {';
		if ( ! empty( $font_h1_size_tablet_hoz ) ) {
			$dynamic_css .= 'h1, .h1, h1.single-title {font-size: ' . absint( $font_h1_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h2_size_tablet_hoz ) ) {
			$dynamic_css .= 'h2, .h2 {font-size: ' . absint( $font_h2_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h3_size_tablet_hoz ) ) {
			$dynamic_css .= 'h3, .h3 {font-size: ' . absint( $font_h3_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h4_size_tablet_hoz ) ) {
			$dynamic_css .= 'h4, .h4 {font-size: ' . absint( $font_h4_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h5_size_tablet_hoz ) ) {
			$dynamic_css .= 'h5, .h5 {font-size: ' . absint( $font_h5_size_tablet_hoz ) . 'px; }';
		}
		if ( ! empty( $font_h6_size_tablet_hoz ) ) {
			$dynamic_css .= 'h6, .h6 {font-size: ' . absint( $font_h6_size_tablet_hoz ) . 'px; }';
		}
		$dynamic_css .= '}';

		$dynamic_css .= '@media only screen and (max-width: 991px) {';
		if ( ! empty( $font_h1_size_tablet ) ) {
			$dynamic_css .= 'h1, .h1, h1.single-title {font-size: ' . absint( $font_h1_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h2_size_tablet ) ) {
			$dynamic_css .= 'h2, .h2 {font-size: ' . absint( $font_h2_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h3_size_tablet ) ) {
			$dynamic_css .= 'h3, .h3 {font-size: ' . absint( $font_h3_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h4_size_tablet ) ) {
			$dynamic_css .= 'h4, .h4 {font-size: ' . absint( $font_h4_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h5_size_tablet ) ) {
			$dynamic_css .= 'h5, .h5 {font-size: ' . absint( $font_h5_size_tablet ) . 'px; }';
		}
		if ( ! empty( $font_h6_size_tablet ) ) {
			$dynamic_css .= 'h6, .h6 {font-size: ' . absint( $font_h6_size_tablet ) . 'px; }';
		}
		$dynamic_css .= '}';

		$dynamic_css .= '@media only screen and (max-width: 767px) {';
		if ( ! empty( $font_h1_size_mobile ) ) {
			$dynamic_css .= 'h1, .h1, h1.single-title {font-size: ' . absint( $font_h1_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h2_size_mobile ) ) {
			$dynamic_css .= 'h2, .h2 {font-size: ' . absint( $font_h2_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h3_size_mobile ) ) {
			$dynamic_css .= 'h3, .h3 {font-size: ' . absint( $font_h3_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h4_size_mobile ) ) {
			$dynamic_css .= 'h4, .h4 {font-size: ' . absint( $font_h4_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h5_size_mobile ) ) {
			$dynamic_css .= 'h5, .h5 {font-size: ' . absint( $font_h5_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_h6_size_mobile ) ) {
			$dynamic_css .= 'h6, .h6 {font-size: ' . absint( $font_h6_size_mobile ) . 'px; }';
		}
		if ( ! empty( $font_header_block_size_mobile ) ) {
			$dynamic_css .= '.block-title, .block-header .block-title {font-size: ' . absint( $font_header_block_size_mobile ) . 'px !important; }';
			$dynamic_css .= '.widget-title {font-size: ' . absint( intval( $font_header_block_size_mobile ) * .85 ) . 'px !important; }';
		}
		$dynamic_css .= '}';

		/** update case title */
		if ( ! empty( $title_uppercase ) ) {
			$dynamic_css .= '.p-wrap .entry-title, .author-box .author-title, .single-title.entry-title, .widget_recent_entries a, .nav-title {text-transform: uppercase;}';
		}

		/** grid 6 BG */
		$content_bg_grid_6 = pixwell_get_option( 'content_bg_grid_6' );
		if ( ! empty( $content_bg_grid_6 ) && strlen( $content_bg_grid_6 ) >= 3 ) {
			$dynamic_css .= '.p-grid-6 .p-content-wrap { background-color: ' . $content_bg_grid_6 . ';}';
		}

		/** list 6 BG */
		$content_bg_list_6 = pixwell_get_option( 'content_bg_list_6' );
		$text_style_list_6 = pixwell_get_option( 'text_style_list_6' );
		if ( ! empty( $content_bg_list_6 ) && strlen( $content_bg_list_6 ) >= 3 ) {
			$dynamic_css .= '.p-list-6 { background-color: ' . $content_bg_list_6 . ';}';
		}
		if ( ! empty( $text_style_list_6 ) && 'light' == $text_style_list_6 ) {
			$dynamic_css .= '.fw-feat-14 .owl-dots { color: #fff; }';
		}

		/* woocommerce */
		if ( class_exists( 'WooCommerce' ) ) {

			$wc_price_color = pixwell_get_option( 'wc_price_color' );
			$wc_sale_color  = pixwell_get_option( 'wc_sale_color' );

			if ( ! empty( $wc_price_color ) ) {
				$dynamic_css .= '.woocommerce div.product .product-loop-content .price, .woocommerce .product .summary .price ';
				$dynamic_css .= '{ color: ' . $wc_price_color . ';}';
			}

			if ( ! empty( $wc_sale_color ) ) {
				$dynamic_css .= '.woocommerce span.onsale';
				$dynamic_css .= '{ background-color: ' . $wc_sale_color . ';}';
			}
		}

		return $dynamic_css;
	}
}

/** minify css */
if ( ! function_exists( 'pixwell_minify_dynamic_css' ) ) {
	function pixwell_minify_dynamic_css( $css ) {
		return preg_replace( '@({)\s+|(\;)\s+|/\*.+?\*\/|\R@is', '$1$2 ', $css );
	}
}


/** init css file */
function pixwell_writable_css( $css = '', $folder_path, $file_path ) {

	$css_file = pixwell_get_option( 'css_file' );

	if ( empty( $css_file ) ) {
		return false;
	}

	global $wp_filesystem;

	if ( empty( $wp_filesystem ) ) {
		require_once( ABSPATH . '/wp-admin/includes/file.php' );
		WP_Filesystem();
	}


	if ( $wp_filesystem ) {
		$content = "/** Compiled CSS - Do not edit */\n" . $css;
		if ( is_readable( $folder_path ) || ( file_exists( $file_path ) && is_writable( $file_path ) ) ) {
			if ( $wp_filesystem->put_contents( $file_path, $content, FS_CHMOD_FILE ) ) {

				update_option( 'pixwell_dynamic_mode', 'file' );
				update_option( 'pixwell_dynamic_ctime', time() );

				return true;
			}
		}
	}

	return false;
}

/** write css */
if ( ! function_exists( 'pixwell_write_dynamic_css' ) ) {
	function pixwell_write_dynamic_css() {

		global $blog_id;
		$folder_path = get_theme_file_path( 'assets/css' );
		$file_path   = $folder_path . '/dynamic.css';

		if ( is_multisite() ) {
			$file_path = $folder_path . '/dynamic-blog-' . $blog_id . '.css';
		}

		$dynamic_css = pixwell_generate_styles();
		$dynamic_css = pixwell_minify_dynamic_css( $dynamic_css );
		$writable    = pixwell_writable_css( $dynamic_css, $folder_path, $file_path );

		if ( ! $writable ) {
			$cache = addslashes( $dynamic_css );
			update_option( 'pixwell_style_cache', $cache );
			update_option( 'pixwell_dynamic_mode', 'inline' );
		}
	}
}

/** dynamic css */
if ( ! function_exists( 'pixwell_main_dynamic_style' ) ) {
	function pixwell_main_dynamic_style() {
		global $blog_id;

		$mode    = get_option( 'pixwell_dynamic_mode' );
		$version = get_option( 'pixwell_dynamic_ctime' );

		if ( empty( $version ) ) {
			$version = PIXWELL_THEME_VERSION;
		}

		$file_path = get_theme_file_path( 'assets/css/dynamic.css' );
		$file_uri  = get_theme_file_uri( 'assets/css/dynamic.css' );
		if ( is_multisite() ) {
			$file_path = get_theme_file_path( 'assets/css/dynamic-blog-' . $blog_id . '.css' );
			$file_uri  = get_theme_file_uri( 'assets/css/dynamic-blog-' . $blog_id . '.css' );
		}

		if ( 'file' == $mode && file_exists( $file_path ) ) {
			wp_enqueue_style( 'pixwell-dynamic-css', $file_uri, array( 'pixwell-style' ), $version, 'all' );
		} else {
			$cache       = get_option( 'pixwell_style_cache' );
			$dynamic_css = stripslashes( $cache );
			wp_add_inline_style( 'pixwell-style', $dynamic_css );
		}
	}
}