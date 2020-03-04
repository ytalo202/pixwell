<?php
/** render header */
if ( ! function_exists( 'pixwell_render_header' ) ) :
	function pixwell_render_header() {

		get_template_part( 'templates/header/section', 'topline' );
		get_template_part( 'templates/header/section', 'topsite' );
		get_template_part( 'templates/header/section', 'topbar' );

		if ( is_page_template( 'rbc-frontend.php' ) ) {
			$header_float = rb_get_meta( 'header_float' );

			if ( ! empty( $header_float ) && 1 == $header_float ) {
				$get_paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$get_page  = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
				if ( $get_paged > $get_page ) {
					$paged = $get_paged;
				} else {
					$paged = $get_page;
				}
				if ( $paged < 2 ) {
					get_template_part( 'templates/header/style-transparent' );

					return;
				}
			}
		}

		$header_style = pixwell_get_option( 'header_style' );
		if ( ! in_array( $header_style, array( 1, 2, 3, 4, 5, '6', '7' ) ) ) {
			$header_style = 1;
		}
		get_template_part( 'templates/header/style', intval( $header_style ) );
	}
endif;

/**
 * @param      $settings
 * @param null $query_data
 *
 * @return bool
 * render pagination
 */
if ( ! function_exists( 'pixwell_render_pagination' ) ) :
	function pixwell_render_pagination( $settings, $query_data = null ) {

		if ( empty( $settings['pagination'] ) ) {
			return false;
		}

		switch ( $settings['pagination'] ) {
			case 'loadmore' :
				pixwell_render_pagination_loadmore( $query_data );
				break;
			case 'next_prev' :
				pixwell_render_pagination_nextprev( $query_data );
				break;
			case 'infinite_scroll' :
				pixwell_render_pagination_infinite( $query_data );
				break;
			case 'simple' :
				pixwell_render_pagination_simple( $query_data );
				break;
			case 'number' :
				pixwell_render_pagination_number( $query_data );
				break;
			default:
				return false;
		}
	}
endif;


/**
 * @param null $query_data
 * loadmore pagination
 */
if ( ! function_exists( 'pixwell_render_pagination_loadmore' ) ) :
	function pixwell_render_pagination_loadmore( $query_data = null ) {

		if ( empty( $query_data ) || ! is_object( $query_data ) ) {
			global $wp_query;
			$query_data = $wp_query;
		}

		if ( $query_data->max_num_pages < 2 ) {
			return false;
		} ?>
		<div class="pagination-wrap pagination-loadmore clearfix">
			<a href="#" class="loadmore-link"><span><?php echo pixwell_translate( 'load_more' ); ?></span></a>
			<span class="loadmore-animation"></span>
		</div>
	<?php
	}
endif;

/**
 * @param null $query_data
 *
 * @return bool
 * next prev pagination
 */
if ( ! function_exists( 'pixwell_render_pagination_nextprev' ) ):
	function pixwell_render_pagination_nextprev( $query_data = null ) {

		if ( empty( $query_data ) || ! is_object( $query_data ) ) {
			global $wp_query;
			$query_data = $wp_query;
		}
		if ( $query_data->max_num_pages < 2 ) {
			return false;
		} ?>
		<div class="pagination-wrap pagination-nextprev clearfix">
			<a href="#" class="pagination-link ajax-link ajax-prev is-disable" data-type="prev"><i class="rbi rbi-arrow-left"></i><span><?php echo pixwell_translate( 'previous' ); ?></span></a>
			<a href="#" class="pagination-link ajax-link ajax-next" data-type="next"><span><?php echo pixwell_translate( 'next' ); ?></span><i class="rbi rbi-arrow-right"></i></a>
		</div>
	<?php
	}
endif;


/**
 * @param null $query_data
 *
 * @return bool
 * pagination infinite
 */
if ( ! function_exists( 'pixwell_render_pagination_infinite' ) ):
	function pixwell_render_pagination_infinite( $query_data = null ) {

		if ( empty( $query_data ) || ! is_object( $query_data ) ) {
			global $wp_query;
			$query_data = $wp_query;
		}
		if ( $query_data->max_num_pages < 2 ) {
			return false;
		} ?>
		<div class="pagination-wrap pagination-infinite clearfix">
			<span class="loadmore-animation"></span>
		</div>
	<?php
	}
endif;

/**
 * @param null $query_data
 * simple navigation
 */
if ( ! function_exists( 'pixwell_render_pagination_simple' ) ):
	function pixwell_render_pagination_simple( $query_data = null ) {

		if ( empty( $query_data ) || ! is_object( $query_data ) ) {
			global $wp_query;
			$query_data = $wp_query;
		}

		if ( $query_data->max_num_pages < 2 ) {
			return false;
		} ?>
		<nav class="pagination-wrap pagination-simple clearfix">
			<span class="newer"><?php previous_posts_link( '<i class="rbi rbi-arrow-left"></i>' . pixwell_translate( 'newer_posts' ), $query_data->max_num_pages ); ?></span>
			<span class="older"><?php next_posts_link( pixwell_translate( 'older_posts' ) . '<i class="rbi rbi-arrow-right"></i>', $query_data->max_num_pages ); ?></span>
		</nav>
	<?php
	}
endif;

/**
 * @param null $query_data
 * @param int  $offset
 * pagination number
 */
if ( ! function_exists( 'pixwell_render_pagination_number' ) ):
	function pixwell_render_pagination_number( $query_data = null, $offset = 0 ) {

		if ( empty( $query_data ) || ! is_object( $query_data ) ) {
			global $wp_query;
			$query_data = $wp_query;
		}

		if ( $query_data->max_num_pages < 2 ) {
			return false;
		}

		$current = 1;
		$total   = $query_data->max_num_pages;
		if ( $query_data->query_vars['paged'] > 1 ) {
			$current = $query_data->query_vars['paged'];
		}

		if ( ! empty( $offset ) ) {
			$post_per_page = $query_data->query_vars['posts_per_page'];
			$total         = $query_data->max_num_pages - floor( $offset / $post_per_page );
			$found_posts   = $query_data->found_posts;
			if ( $found_posts < ( $total * $post_per_page ) ) {
				$total = $total - 1;
			}
		}

		$params = array(
			'total'     => $total,
			'current'   => $current,
			'end_size'  => 1,
			'mid_size'  => 1,
			'prev_text' => '<i class="rbi rbi-angle-left"></i>',
			'next_text' => '<i class="rbi rbi-angle-right"></i>',
			'type'      => 'plain'
		);

		if ( ! empty( $query_data->query_vars['s'] ) ) {
			$params['add_args'] = array( 's' => urlencode( get_query_var( 's' ) ) );
		} ?>
		<nav class="pagination-wrap pagination-number clearfix">
			<?php echo paginate_links( $params ); ?>
		</nav>
	<?php
	}
endif;


/** render off canvas section */
if ( ! function_exists( 'pixwell_render_off_canvas' ) ) :
	function pixwell_render_off_canvas() {

		if ( has_nav_menu( 'pixwell_menu_offcanvas' ) ) {
			$pixwell_offcanvas_menu = 'pixwell_menu_offcanvas';
		} else {
			$pixwell_offcanvas_menu = 'pixwell_menu_main';
		}

		if ( ! is_active_sidebar( 'pixwell_sidebar_offcanvas' ) && ! $pixwell_offcanvas_menu ) {
			return false;
		}

		$style     = pixwell_get_option( 'off_canvas_style' );
		$social    = pixwell_get_option( 'off_canvas_social' );
		$subscribe = pixwell_get_option( 'off_canvas_subscribe' );
		$logo      = pixwell_get_option( 'off_canvas_header_logo' );
		$cart      = pixwell_get_option( 'off_canvas_cart' );
		$bookmark  = pixwell_get_option( 'off_canvas_bookmark' );

		$class_name = 'off-canvas-wrap dark-style is-light-text is-hidden';
		if ( ! empty( $style ) && 'light' == $style ) {
			$class_name = 'off-canvas-wrap light-style is-hidden';
		} ?>
		<aside id="off-canvas-section" class="<?php echo esc_attr( $class_name ); ?>">
			<div class="close-panel-wrap tooltips-n">
				<a href="#" id="off-canvas-close-btn" title="<?php esc_html_e( 'Close Panel', 'pixwell' ); ?>"><i class="btn-close"></i></a>
			</div>
			<div class="off-canvas-holder">
				<?php if ( ! empty( $subscribe ) || ! empty( $logo['url'] ) ) : ?>
					<div class="off-canvas-header is-light-text">
						<div class="header-inner">
							<?php if ( ! empty( $logo['url'] ) ): ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="off-canvas-logo">
									<img src="<?php echo esc_url( $logo['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>">
								</a>
							<?php endif;
							if ( ! empty( $subscribe ) ) :
								$subscribe_url  = pixwell_get_option( 'off_canvas_subscribe_url' );
								$subscribe_text = pixwell_get_option( 'off_canvas_subscribe_text' ); ?>
								<div class="off-canvas-subscribe btn-wrap">
									<a href="<?php echo esc_url( $subscribe_url ); ?>" rel="nofollow" class="subscribe-link" title="<?php echo esc_attr( $subscribe_text ); ?>"><i class="rbi rbi-paperplane"></i><span><?php echo esc_html( $subscribe_text ); ?></span></a>
								</div>
							<?php endif; ?>
							<aside class="inner-bottom">
								<?php if ( ! empty( $social ) ) : ?>
									<div class="off-canvas-social">
										<?php echo pixwell_render_social_icons( pixwell_get_web_socials(), true ); ?>
									</div>
								<?php endif;
								if ( ! empty( $cart ) || ! empty( $bookmark ) ) : ?>
									<div class="inner-bottom-right">
										<?php get_template_part( 'templates/header/module', 'leftbookmark' );
										get_template_part( 'templates/header/module', 'leftcart' );
										?>
									</div>
								<?php endif; ?>
							</aside>
						</div>
					</div>
				<?php endif; ?>
				<div class="off-canvas-inner">
					<nav id="off-canvas-nav" class="off-canvas-nav">
						<?php
						wp_nav_menu( array(
							'theme_location' => $pixwell_offcanvas_menu,
							'menu_id'        => 'off-canvas-menu',
							'menu_class'     => 'off-canvas-menu rb-menu is-clicked',
							'container'      => false,
							'depth'          => 4,
							'echo'           => true,
							'fallback_cb'    => 'pixwell_nav_ls_fallback'
						) ); ?>
					</nav>
					<?php if ( is_active_sidebar( 'pixwell_sidebar_offcanvas' ) ) : ?>
						<aside class="widget-section-wrap">
							<?php dynamic_sidebar( 'pixwell_sidebar_offcanvas' ); ?>
						</aside>
					<?php endif; ?>
				</div>
			</div>
		</aside>
	<?php
	}
endif;

/**
 * @param      $name
 * @param null $sticky
 * render sidebar
 */
if ( ! function_exists( 'pixwell_render_sidebar' ) ) :
	function pixwell_render_sidebar( $name, $sticky = null ) {

		global $wp_query;
		if ( empty( $name ) ) {
			return false;
		}
		if ( ! isset( $sticky ) ) {
			$sticky = pixwell_get_option( 'sidebar_sticky' );
		};

		$class_name = 'rbc-sidebar widget-area';

		if ( isset( $wp_query->query_vars['rbsnp'] ) && is_single() ) {
			$class_name .= ' sb-infinite';
		}
		if ( ! empty ( $sticky ) ) {
			$class_name .= ' sidebar-sticky';
		}; ?>
		<aside class="<?php echo esc_attr( $class_name ); ?>">
			<div class="sidebar-inner"><?php dynamic_sidebar( $name ); ?></div>
		</aside>
	<?php
	}
endif;

/** render author box */
if ( ! function_exists( 'pixwell_render_author_box' ) ) :
	function pixwell_render_author_box() {

		$author_box = pixwell_get_option( 'single_post_author' );
		if ( empty( $author_box ) ) {
			return false;
		}

		$author_id   = get_the_author_meta( 'ID' );
		$data        = pixwell_get_author_socials( $author_id );
		$job         = get_the_author_meta( 'job' );
		$name        = get_the_author_meta( 'display_name' );
		$description = get_the_author_meta( 'description' );
		if ( empty( $description ) ) {
			return false;
		} ?>
		<div class="author-box">
			<div class="author-avatar">
				<?php if ( ! is_author() ) : ?>
					<a href="<?php echo get_author_posts_url( $author_id ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 100, '', $name ); ?></a>
				<?php else : ?>
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), 100, '', $name ); ?>
				<?php endif; ?>
			</div>
			<div class="author-content">
				<div class="author-header">
					<div class="author-title">
						<a class="h5" href="<?php echo get_author_posts_url( $author_id ); ?>"><?php echo esc_html( $name ); ?></a>
					</div>
					<?php if ( ! is_author() ): ?>
						<span class="author-more block-view-more"><a href="<?php echo get_author_posts_url( $author_id ); ?>"><?php echo pixwell_translate( 'all_posts_by' ); ?>
								<i class="rbi rbi-arrow-right"></i></a></span>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $description ) ) : ?>
					<div class="author-description"><?php echo wp_kses_post( $description ); ?></div>
				<?php endif; ?>
				<div class="author-footer">
					<?php if ( ! empty( $job ) ) : ?>
						<div class="author-job"><span><?php echo wp_kses_post( $job ); ?></span></div>
					<?php endif; ?>
					<div class="author-social tooltips-n"><?php echo pixwell_render_social_icons( $data, true, false ); ?></div>
				</div>
			</div>
		</div>
	<?php
	}
endif;

/** render site footer */
if ( ! function_exists( 'pixwell_render_footer' ) ):
	function pixwell_render_footer() {

		$footer_bg = pixwell_get_option( 'footer_background' );
		$text      = pixwell_get_option( 'footer_text_style' );

		$class_name     = 'footer-wrap';
		$top_class_name = 'top-footer-wrap fw-widget-section';

		if ( ! empty( $text ) && 'light' == $text ) {
			$class_name .= ' ' . 'is-light-text';
		}

		if ( ! empty( $footer_bg['background-color'] ) || ! empty( $footer_bg['background-attachment'] ) ) {
			$class_name .= ' ' . 'is-bg';
			$top_class_name .= ' ' . 'is-footer-bg';
		}

		/** render top footer */
		if ( is_active_sidebar( 'pixwell_sidebar_fw_footer' ) )  : ?>
			<aside class="<?php echo esc_attr($top_class_name); ?>">
				<div class="inner">
					<?php dynamic_sidebar( 'pixwell_sidebar_fw_footer' ); ?>
				</div>
			</aside>
		<?php endif; ?>
		<footer class="<?php echo esc_attr( $class_name ); ?>">
			<?php
			get_template_part( 'templates/footer/module', 'widgets' );
			get_template_part( 'templates/footer/module', 'logo' );
			get_template_part( 'templates/footer/module', 'copyright' );
			?>
		</footer>
	<?php
	}
endif;

/** ruby newsletter popup */
add_action( 'wp_footer', 'pixwell_newsletter_form_popup' );
if ( ! function_exists( 'pixwell_newsletter_form_popup' ) ) {
	function pixwell_newsletter_form_popup() {
		$newsletter_popup = pixwell_get_option( 'newsletter_popup' );
		if ( empty( $newsletter_popup ) ) {
			return;
		}

		$settings                  = array();
		$settings['title']         = pixwell_get_option( 'newsletter_popup_title' );
		$settings['description']   = pixwell_get_option( 'newsletter_popup_description' );
		$settings['privacy']       = pixwell_get_option( 'newsletter_popup_privacy' );
		$settings['placeholder']   = pixwell_get_option( 'newsletter_placeholder' );
		$settings['submit']        = pixwell_get_option( 'newsletter_popup_submit' );
		$settings['privacy_error'] = pixwell_get_option( 'newsletter_privacy_error' );
		$settings['email_error']   = pixwell_get_option( 'newsletter_email_error' );
		$settings['email_exists']  = pixwell_get_option( 'newsletter_email_exists' );
		$settings['success']       = pixwell_get_option( 'newsletter_success' );
		$cover_attachment          = pixwell_get_option( 'newsletter_popup_cover' );
		$expired                   = pixwell_get_option( 'newsletter_popup_expired' );

		$class_name = 'rb-newsletter-popup mfp-animation mfp-hide';

		if ( ! empty( $cover_attachment['url'] ) ) {
			$settings['cover'] = $cover_attachment['url'];
			$class_name .= ' is-cover';
		} ?>
		<aside id="rb-newsletter-popup" class="<?php echo esc_attr( $class_name ) ?>" data-expired="<?php echo intval( $expired ); ?>">
			<?php echo rb_render_newsletter( $settings ); ?>
		</aside>
	<?php
	}
}


/** author header */
if ( ! function_exists( 'pixwell_render_author_header' ) ) {
	function pixwell_render_author_header() {

		$author_id   = get_queried_object_id();
		$data        = pixwell_get_author_socials( $author_id );
		$social_html = pixwell_render_social_icons( $data, true, false );
		$job         = get_the_author_meta( 'job', $author_id );
		$name        = get_the_author_meta( 'display_name', $author_id );
		$description = get_the_author_meta( 'description', $author_id );
		$feat        = get_the_author_meta( 'feat', $author_id );

		if ( empty( $description ) && empty( $social_html ) && empty( $job ) && empty( $feat ) ) {
			return false;
		} ?>
		<div class="header-author-box is-light-text">
			<div class="box-feat">
				<?php if ( ! empty( $feat ) ) : ?>
					<img src="<?php echo esc_url( $feat ); ?>" alt="<?php echo esc_attr( $name ); ?>"/>
				<?php endif; ?>
			</div>
			<div class="box-inner">
				<div class="box-avatar">
					<?php echo get_avatar( $author_id , 100, '', $name ); ?>
				</div>
				<div class="box-content">
					<div class="box-header">
						<div class="box-title"><h3><?php echo esc_html( $name ); ?></h3></div>
						<?php if ( ! empty( $job ) ) : ?>
							<span class="box-job"><?php echo wp_kses_post( $job ); ?></span>
						<?php endif; ?>
					</div>
					<?php if ( ! empty( $description ) ) : ?>
						<div class="box-description"><?php echo wp_kses_post( $description ); ?></div>
					<?php endif; ?>
					<div class="box-footer">
						<div class="box-social tooltips-n"><?php echo wp_kses_post( $social_html ); ?></div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}