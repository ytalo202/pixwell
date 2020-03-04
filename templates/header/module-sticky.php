<?php
$navbar_sticky = pixwell_get_option( 'navbar_sticky' );
if ( empty( $navbar_sticky ) ) {
	return;
} ?>
<aside id="sticky-nav" class="section-sticky-holder">
	<div class="section-sticky">
		<div class="navbar-wrap">
			<div class="rbc-container navbar-holder">
				<div class="navbar-inner rb-m20-gutter">
					<div class="navbar-left">
						<?php get_template_part( 'templates/header/module', 'toggle' ); ?>
						<?php get_template_part( 'templates/header/module', 'sticklogo' ); ?>
						<?php get_template_part( 'templates/header/module', 'stickmenu' ); ?>
					</div>
					<div class="navbar-right">
						<?php get_template_part( 'templates/header/module', 'social' ); ?>
						<?php get_template_part( 'templates/header/module', 'trend' ); ?>
						<?php get_template_part( 'templates/header/module', 'bookmark' ); ?>
						<?php get_template_part( 'templates/header/module', 'cart' ); ?>
						<?php get_template_part( 'templates/header/module', 'search' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</aside>