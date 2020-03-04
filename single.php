<?php
/** The template for displaying single posts */
get_header();

if ( have_posts() ) :
	while ( have_posts() ) {
		the_post();
		pixwell_single();
	}
endif;

/** get footer */
get_footer();
