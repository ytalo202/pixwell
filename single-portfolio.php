<?php
/** The template for displaying single portfolio */
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		$pixwell_portfolio_id         = get_the_ID();
		$pixwell_portfolio_breadcrumb = pixwell_get_option( 'portfolio_breadcrumb' );
		$pixwell_size                 = 'pixwell_780x0';
		$pixwell_thumbnail_size       = 'pixwell_780x0-holder';
		$pixwell_lazyload             = pixwell_get_option( 'lazy_load' );
		$pixwell_portfolio_gallery    = rb_get_meta( 'rb_portfolio_gallery', $pixwell_portfolio_id );
		if ( empty( $pixwell_portfolio_gallery ) ) {
			$pixwell_portfolio_gallery = get_post_thumbnail_id();
		}
		$pixwell_portfolio_gallery = explode( ',', $pixwell_portfolio_gallery );
		?>
		<div class="site-content rbc-fw-section clearfix">
			<div class="wrap">
				<div class="rbc-wrap">
					<main id="main" class="site-main rbc-content" role="main">
						<div class="single-content-wrap">
							<article id="post-<?php echo esc_attr( $pixwell_portfolio_id ); ?>" <?php post_class( 'portfolio-item' ); ?>>
								<div class="rbc-container rb-p20-gutter">
									<div class="single-portfolio-holder">
										<div class="single-portfolio-feat">
											<?php if ( is_array( $pixwell_portfolio_gallery ) ) :
												$index = 0;
												foreach ( $pixwell_portfolio_gallery as $attachment_id ) :
													if ( ! empty( $attachment_id ) ) : ?>
														<a href="#" class="gallery-popup-link gallery-el" data-gallery="#gallery-popup-<?php echo esc_attr($pixwell_portfolio_id); ?>" data-index="<?php echo esc_attr( $index ); ?>">
															<?php if ( ! empty( $pixwell_lazyload ) && function_exists( 'rb_add_lazyload' ) ) {
																echo rb_add_lazyload( wp_get_attachment_image( $attachment_id, $pixwell_size ), wp_get_attachment_image_url( $attachment_id, $pixwell_thumbnail_size ) );
															} else {
																echo wp_get_attachment_image( $attachment_id, $pixwell_size );
															}
															$caption = wp_get_attachment_caption( $attachment_id );
															if ( ! empty( $caption ) ) : ?>
																<span class="image-caption is-overlay is-hide"><?php echo wp_kses_post( $caption ); ?></span>
															<?php endif; ?>
														</a>
														<?php $index ++;
													endif;
												endforeach;
												pixwell_gallery_popup( $pixwell_portfolio_gallery );
											endif; ?>
										</div>
										<div class="single-portfolio-content">
											<div class="single-portfolio-inner">
												<header class="portfolio-header entry-header">
													<?php if ( ! empty( $pixwell_portfolio_breadcrumb ) ) : pixwell_breadcrumb( '' ); endif; ?>
													<h1 class="entry-title"><?php the_title(); ?></h1>
													<?php pixwell_portfolio_terms( $pixwell_portfolio_id, 'pp-single-terms'); ?>
												</header>
												<div class="portfolio-description entry-content clearfix">
													<?php the_content(); ?>
												</div>
												<?php pixwell_portfolio_footer_info( $pixwell_portfolio_id ); ?>
											</div>
										</div>
									</div>
									<?php pixwell_portfolio_single_nav( $pixwell_portfolio_id ); ?>
								</div>
							</article>
						</div>
					</main>
				</div>
			</div>
		</div>
	<?php endwhile;
endif;

/** footer */
get_footer();

