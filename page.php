<?php
/** The template for displaying single page */
get_header();

if ( have_posts() ) :
	pixwell_single_page();
endif;

/** get footer */
get_footer();