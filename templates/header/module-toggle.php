<?php
$pixwell_toggle = pixwell_get_option( 'offcanvas_toggle' );
if ( ! empty( $pixwell_toggle ) ):
	if ( ! is_active_sidebar( 'pixwell_sidebar_offcanvas' ) && ! has_nav_menu( 'pixwell_menu_offcanvas' ) ) {
		return false;
	} ?>
	<a href="#" class="off-canvas-trigger btn-toggle-wrap"><span class="btn-toggle"><span class="off-canvas-toggle"><span class="icon-toggle"></span></span></span></a>
<?php endif;