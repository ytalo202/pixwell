<?php
/**
 * blog layout
 */
if ( ! function_exists( 'pixwell_render_blog' ) ) :
	function pixwell_render_blog( $settings = array(), $query_data = null ) {

		if ( empty( $query_data ) ) {
			global $wp_query;
			$query_data = $wp_query;
		}

		$active_sidebar = false;
		if ( ! empty( $settings['sidebar_name'] ) && is_active_sidebar( $settings['sidebar_name'] ) ) {
			$active_sidebar = true;
		}

		$classes       = array();
		$classes[]     = 'page-content archive-content';
		$inner_classes = 'content-inner rb-row';

		if ( ! empty( $settings['classname'] ) ) {
			$classes[] = esc_attr( $settings['classes'] );
		}
		if ( empty( $settings['layout'] ) ) {
			$settings['layout'] = 'classic';
		}
		if ( empty( $settings['sidebar_pos'] ) ) {
			$classes[] = 'rbc-fw-section clearfix';
		} else {
			$classes[] = 'rbc-content-section is-sidebar-' . trim( $settings['sidebar_pos'] );
		}
		if ( ! empty( $settings['classes'] ) ) {
			$classes[] = $settings['classes'];
		}
		if ( $active_sidebar ) {
			$classes[] = 'active-sidebar';
		} else {
			$classes[] = 'no-active-sidebar';
		}

		switch ( $settings['layout'] ) {
			case 'ct_grid_1' :
				$classes[] = 'layout-ct-grid-1';
				$inner_classes .= ' rb-n20-gutter';
				break;
			case 'ct_grid_2' :
				$classes[] = 'layout-ct-grid-2';
				$inner_classes .= ' rb-n15-gutter';
				break;
			case 'fw_grid_1' :
				$classes[] = 'layout-fw-grid-1';
				$inner_classes .= ' rb-n20-gutter';
				break;
			case 'fw_grid_2' :
				$classes[] = 'layout-fw-grid-2';
				$inner_classes .= ' rb-n15-gutter';
				break;
			case 'fw_grid_3' :
				$classes[] = 'layout-fw-grid-3';
				$inner_classes .= ' rb-n20-gutter';
				break;
			case 'fw_list_1' :
				$classes[] = 'layout-fw-list-1';
				break;
			case 'fw_list_2' :
				$classes[] = 'layout-fw-list-2';
				$inner_classes .= ' rb-n20-gutter';
				break;
			case 'classic' :
				$classes[] = 'layout-classic';
				break;
			case 'ct_list' :
				$classes[] = 'layout-ct-list';
				break;
		}

		$classes = join( ' ', $classes ); ?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<div class="wrap rbc-wrap rbc-container rb-p20-gutter">
				<?php if ( ! empty( $settings['title'] )) : ?>
				<div class="site-main rbc-content">
					<header class="block-header">
						<h2 class="block-title h3"><?php echo esc_html( $settings['title'] ); ?></h2>
					</header>
					<?php else : ?>
					<main id="main" class="site-main rbc-content">
						<?php endif; ?>
						<div class="content-wrap">
							<div class="<?php echo esc_attr( $inner_classes ); ?>">
								<?php pixwell_render_blog_listing( $settings, $query_data );
								wp_reset_postdata(); ?>
							</div>
						</div>
						<?php pixwell_render_pagination( $settings, $query_data ); ?>
						<?php if ( ! empty( $settings['title'] )) : ?>
				</div>
			<?php else : ?>
				</main>
			<?php
			endif;
			if ( ! empty( $settings['sidebar_pos'] ) && ! empty( $settings['sidebar_name'] ) ):
				if ( $active_sidebar ) {
					pixwell_render_sidebar( $settings['sidebar_name'] );
				}
			endif; ?>
			</div>
		</div>
	<?php
	}
endif;


/**
 * @param $settings
 * @param $query_data
 * blog listing layout
 */
if ( ! function_exists( 'pixwell_render_blog_listing' ) ):
	function pixwell_render_blog_listing( $settings, $query_data ) {
		switch ( $settings['layout'] ) {
			case 'classic' :
				pixwell_rbc_ct_classic_listing( $settings, $query_data );
				break;
			case 'ct_list' :
				pixwell_rbc_ct_list_listing( $settings, $query_data );
				break;
			case 'ct_grid_1' :
				pixwell_rbc_ct_grid_1_listing( $settings, $query_data );
				break;
			case 'ct_grid_2' :
				pixwell_rbc_ct_grid_2_listing( $settings, $query_data );
				break;
			case 'fw_grid_1' :
				pixwell_rbc_fw_grid_1_listing( $settings, $query_data );
				break;
			case 'fw_grid_2' :
				pixwell_rbc_fw_grid_2_listing( $settings, $query_data );
				break;
			case 'fw_grid_3' :
				pixwell_rbc_fw_grid_3_listing( $settings, $query_data );
				break;
			case 'fw_list_1' :
				pixwell_rbc_fw_list_1_listing( $settings, $query_data );
				break;
			default :
				pixwell_rbc_fw_list_2_listing( $settings, $query_data );
		}
	}
endif;

/** not found content */
if ( ! function_exists( 'pixwell_render_section_empty_content' ) ) :
	function pixwell_render_section_empty_content() {
		?>
		<div class="section-not-found not-found">
			<div class="wrap rbc-container rb-p20-gutter">
				<div class="not-found-inner">
					<header class="page-header">
						<h1 class="page-title"><?php echo pixwell_translate( 'nothing_found' ) ?></h1>
					</header>
					<div class="page-content entry-content">
						<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
							<?php printf( '<p>' . html_entity_decode( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pixwell' ) ) . '</p>', esc_url( admin_url( 'post-new.php' ) ) ); ?>
						<?php else: ?>
							<p><?php echo pixwell_translate( 'content_404' ); ?></p>
							<?php get_search_form(); ?>
							<?php if ( ! is_front_page() ) : ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="return-home h6" title="<?php echo esc_attr( pixwell_translate( 'return_home' ) ); ?>"><?php echo pixwell_translate( 'return_home' ); ?></a>
							<?php endif;
						endif;?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
endif;


