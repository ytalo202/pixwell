<?php
/**
 * The template for displaying archive pages
 */
get_header(); ?>
	<div class="site-content">
		<?php if ( have_posts() ) : ?>
			<header class="page-header archive-header">
					<div class="header-holder">
						<div class="rbc-container rb-p20-gutter">
						<?php pixwell_breadcrumb(); ?>
						<h1 class="page-title archive-title"><?php echo get_the_archive_title(); ?></h1>
						<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
						</div>
					</div>
			</header>
		<?php endif; ?>
		<?php if ( have_posts() ) :
			pixwell_render_blog( pixwell_get_settings_blog('archive') );
		else :
			pixwell_render_section_empty_content();
		endif; ?>
	</div>
<?php get_footer();