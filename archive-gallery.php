<?php
/**
 * The template for displaying archive pages (gallery post type)
 */
$pixwell_post_classes   = array();
$pixwell_post_classes[] = 'gallery-post-type';

/** get header */
get_header(); ?>
	<div class="site-content">
		<?php if ( have_posts() ) : ?>
			<header class="page-header archive-header">
				<div class="header-holder">
					<div class="rbc-container rb-p20-gutter">
						<?php pixwell_breadcrumb( '' ); ?>
						<h1 class="page-title archive-title"><?php if ( is_post_type_archive() ) {
								post_type_archive_title( '', true );
							} else {
								single_term_title( '', true );
							} ?></h1>
						<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
					</div>
				</div>
			</header>
		<?php endif;
		if ( have_posts() ) : ?>
			<div class="page-content archive-content rbc-fw-section clearfix">
				<div class="wrap rbc-wrap rbc-container rb-p20-gutter">
					<main id="main" class="site-main rbc-content">
						<div class="content-wrap">
							<div class="content-inner rb-row">
								<?php while ( have_posts() ) : the_post(); ?>
									<div class="rb-col-d4 rb-col-m12">
										<div class="<?php echo join( ' ', get_post_class( $pixwell_post_classes ) ); ?>">
											<div class="gallery-feat-holder">
												<div class="gallery-feat">
													<?php the_post_thumbnail( 'pixwell_400x450' ); ?>
												</div>
												<h3 class="gallery-title">
													<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a>
												</h3>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					</main>
				</div>
			</div>
		<?php
		else :
			pixwell_render_section_empty_content();
		endif; ?>
	</div>
<?php get_footer();