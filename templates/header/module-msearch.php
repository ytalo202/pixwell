<?php
$pixwell_mobile_search = pixwell_get_option( 'mobile_search' );
if ( empty( $pixwell_mobile_search ) ) {
	return;
}; ?>
<div class="mobile-search">
	<a href="#" title="<?php echo esc_attr( pixwell_translate( 'search' ) ); ?>" class="search-icon nav-search-link"><i class="rbi rbi-search-light"></i></a>
	<div class="navbar-search-popup header-lightbox">
		<div class="navbar-search-form"><?php get_search_form(); ?></div>
	</div>
</div>
