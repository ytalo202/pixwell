<?php
/**
 * The template for displaying archive pages (portfolio)
 */
get_header(); ?>
	<div class="site-content">
		<?php if ( have_posts() ) : ?>
			<header class="page-header archive-header">
				<div class="rbc-container rb-p20-gutter">
					<div class="portfolio-header-holder">
						<?php pixwell_breadcrumb( '' ); ?>
						<h1 class="page-title archive-title"><?php if ( is_post_type_archive() ) {
								post_type_archive_title( '', true );
							} else {
								single_term_title( '', true );
							} ?></h1>
						<?php the_archive_description( '<div class="portfolio-category-desc entry-content">', '</div>' ); ?>
					</div>
				</div>
			</header>
			<div class="page-content archive-content rbc-fw-section clearfix">
				<div class="wrap rbc-wrap rbc-container rb-p20-gutter">
					<main id="main" class="site-main rbc-content">
						<?php
						$layout = pixwell_get_option( 'portfolio_archive_layout' );
						switch ( $layout ) {
							case 'masonry_4' :
								pixwell_portfolio_masonry_c4();
								break;
							default :
								pixwell_portfolio_masonry_c3();
								break;
						};
						pixwell_portfolio_pagination_simple(); ?>
					</main>
				</div>
			</div>
		<?php
		else :
			pixwell_render_section_empty_content();
		endif; ?>
	</div>
<?php get_footer();