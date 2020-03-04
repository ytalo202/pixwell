<?php
$pixwell_navbar_search = pixwell_get_option( 'navbar_search' );
if ( empty( $pixwell_navbar_search ) ) {
	return;
};
$pixwell_navbar_search_ajax = pixwell_get_option( 'navbar_search_ajax' );
if ( empty( $pixwell_navbar_search ) && empty( $pixwell_mobile_search ) ) {
	return;
}
$pixwell_class_name   = array();
$pixwell_class_name[] = 'navbar-search';

if ( ! empty( $pixwell_navbar_search_ajax ) ) {
	$pixwell_class_name[] = 'nav-search-live';
}

$pixwell_class_name = implode( ' ', $pixwell_class_name ); ?>
<aside class="<?php echo esc_attr( $pixwell_class_name ); ?>">
	<a href="#" title="<?php echo esc_attr( pixwell_translate( 'search' ) ); ?>" class="nav-search-link search-icon"><i class="rbi rbi-search-light"></i></a>
	<div class="navbar-search-popup header-lightbox">
		<div class="navbar-search-form"><?php get_search_form(); ?></div>
		<div class="load-animation live-search-animation"></div>
		<?php if ( ! empty( $pixwell_navbar_search_ajax ) ) : ?>
			<div class="navbar-search-response"></div>
		<?php endif; ?>
	</div>
</aside>
