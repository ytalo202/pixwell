<?php
/** The template for displaying single gallery */
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$pixwell_gallery_style   = rb_get_meta( 'gallery_style' );
		$pixwell_gallery_columns = rb_get_meta( 'gallery_columns' );
		$pixwell_gallery_wrap    = rb_get_meta( 'gallery_wrap' );
		$pixwell_share           = rb_get_meta( 'gallery_share_bottom' );
		if ( empty( $pixwell_share ) ) {
			$pixwell_share = pixwell_get_option( 'gallery_share' );
		}

		$pixwell_shortcode       = '[rb_gallery id="' . get_the_ID() . '" size="pixwell_780x0-2x" columns="' . $pixwell_gallery_columns . '" wrap="' . $pixwell_gallery_wrap . '" share="' . $pixwell_share . '"]';
		$pixwell_classes         = 'site-content rbc-fw-section clearfix';
		if ( 'dark' == $pixwell_gallery_style ) {
			$pixwell_classes .= ' is-light-text is-dark-style';
		} ?>
		<div class="<?php echo esc_attr( $pixwell_classes ); ?>">
			<div class="wrap">
				<div class="rbc-wrap">
					<main id="main" class="site-main rbc-content" role="main">
						<div class="single-content-wrap">
							<div class="rbc-container rb-p20-gutter">
								<header class="gallery-header entry-header">
									<?php
									pixwell_breadcrumb( '' );
									pixwell_single_title(); ?>
								</header>
							</div>
							<div class="gallery-content">
								<div class="rbc-container rb-p20-gutter">
									<div class="entry-content clearfix">
										<?php the_content(); ?>
									</div>
								</div>
								<?php echo do_shortcode( $pixwell_shortcode ); ?>
							</div>
						</div>
					</main>
				</div>
			</div>
		</div>
	<?php endwhile;
endif;

/** footer */
get_footer();
