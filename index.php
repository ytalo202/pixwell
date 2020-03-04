<?php
get_header(); ?>
	<div class="site-content">
		<?php
		$breadcrumb = pixwell_get_option( 'blog_breadcrumb_index' );
		if ( ! empty( $breadcrumb ) && ! is_front_page() ) {
			pixwell_breadcrumb();
		}
		if ( have_posts() ) :
			pixwell_render_blog( pixwell_get_settings_blog( 'index' ) );
		else :
			pixwell_render_section_empty_content();
		endif; ?>
	</div>
<?php get_footer();