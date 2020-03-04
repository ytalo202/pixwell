<?php
/**
 * The template for displaying search results pages
 */
get_header(); ?>
	<div class="site-content">
		<?php if ( have_posts() ) : ?>
			<header class="page-header search-header is-centered clearfix">
				<div class="header-holder">
					<div class="rbc-container rb-p20-gutter">
						<?php pixwell_breadcrumb(); ?>
						<h1 class="page-title search-page-title h2"><?php printf( pixwell_translate( 'search_result' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
						<div class="clearfix"></div>
						<?php $pixwell_search_form = pixwell_get_option( 'search_header_form' );
						if ( ! empty( $pixwell_search_form ) ): ?>
							<div class="header-search-form">
								<?php get_search_form(); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</header>
		<?php endif; ?>
		<?php if ( have_posts() ) :
			pixwell_render_blog( pixwell_get_settings_blog( 'search' ) );
		else :
			pixwell_render_section_empty_content();
		endif; ?>
	</div>
<?php get_footer();
