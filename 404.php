<?php
/**
 * display template display 404 page
 */
get_header(); ?>
	<div class="site-content not-found">
		<div class="wrap rbc-container rb-p20-gutter">
			<div class="not-found-wrap">
				<div class="not-found-label-wrap">
					<span class="not-found-description"><?php echo pixwell_translate( 'sorry' ) ?></span>
					<span class="not-found-label h1"><?php esc_html_e('404', 'pixwell')  ?></span>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="return-home h5" title="<?php echo esc_attr( pixwell_translate( 'return_home' ) ); ?>"><?php echo pixwell_translate( 'return_home' ); ?></a>
				</div>
				<div class="not-found-inner">
					<header class="page-header">
						<h1 class="page-title"><?php echo pixwell_translate( 'title_404' ) ?></h1>
					</header>
					<div class="page-content entry-content">
						<p><?php echo pixwell_translate( 'content_404' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();