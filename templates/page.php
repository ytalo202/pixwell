<?php
/** render single page */
if ( ! function_exists( 'pixwell_single_page' ) ):
	function pixwell_single_page() {
		while ( have_posts() ) : the_post();
			$settings  = pixwell_get_page_settings();
			$classes   = array();
			$classes[] = 'site-content rbc-container rb-p20-gutter';
			if ( ! empty( $settings['layout'] ) && '1' == $settings['layout'] ) {
				$classes[] = 'rbc-content-section has-sidebar is-sidebar-' . $settings['sidebar_pos'];
			} else {
				$classes[] = 'rbc-fw-section';
			};
			$classes = implode( ' ', $classes ); ?>
			<div class="wrap">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="<?php echo pixwell_protocol(); ?>://schema.org/WebPage">
					<?php if ( empty( $settings['title'] ) || '1' != $settings['title'] ) : ?>
						<header class="single-page-header entry-header">
							<div class="rbc-container rb-p20-gutter">
								<?php
								if ( ! is_front_page() ) {
									pixwell_breadcrumb();
								}
								the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								<?php if ( has_post_thumbnail() ): ?>
									<div class="page-featured">
										<?php pixwell_post_thumb( 'pixwell_780x0' ); ?>
									</div>
								<?php endif; ?>
							</div>
						</header>
					<?php endif; ?>
					<div class="<?php echo esc_attr( $classes ); ?>">
						<div class="rbc-wrap">
							<main id="main" class="site-main rbc-content" role="main">
								<div class="single-content-wrap">
									<div class="entry-content clearfix">
										<?php the_content(); ?>
										<div class="clearfix"></div>
										<?php
										wp_link_pages( array(
											'before' => '<aside class="page-links pagination-wrap pagination-number">' . pixwell_translate( 'pages' ),
											'type'   => 'plain',
											'after'  => '</aside>',
										) );
										?>
									</div>
									<?php pixwell_single_comment( true ); ?>
								</div>
							</main>
							<?php if ( ! empty( $settings['layout'] ) && '1' == $settings['layout'] ) :
								pixwell_render_sidebar( $settings['sidebar_name'] );
							endif; ?>
						</div>
					</div>
				</article>
			</div>
		<?php endwhile;
	}
endif;