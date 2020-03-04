<?php
/**
 * The template for displaying author pages
 */
get_header();
$pixwell_header_style = pixwell_get_option( 'author_header_style' ); ?>
	<div class="site-content">
		<?php if ( ! empty( $pixwell_header_style ) ) : ?>
			<header class="page-header archive-header clearfix">
				<div class="header-holder">
					<div class="rbc-container">
						<?php pixwell_breadcrumb(); ?>
						<h1 class="page-title author-page-title h2"><?php echo get_the_archive_title(); ?></h1>
					</div>
				</div>
			</header>
		<?php else : ?>
		<header class="page-header archive-header clearfix">
			<div class="rbc-container rb-p20-gutter">
				<?php pixwell_render_author_header(); ?>
			</div>
		</header>
		<?php endif;
		if ( have_posts() ) :
			pixwell_render_blog( pixwell_get_settings_blog( 'author' ) );
		else :
			pixwell_render_section_empty_content();
		endif; ?>
	</div>
<?php get_footer();