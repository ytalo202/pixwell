<?php
/** mobile navigation */
$mobile_logo_pos = pixwell_get_option( 'mobile_logo_pos' );
$navbar_sticky   = pixwell_get_option( 'navbar_sticky' ); ?>
	<aside id="mobile-navbar" class="mobile-navbar">
		<div class="mobile-nav-inner rb-p20-gutter">
			<?php if ( ! empty( $mobile_logo_pos ) && $mobile_logo_pos == 'left' ) : ?>
				<div class="m-nav-centered">
					<?php get_template_part( 'templates/header/module', 'mlogo' ); ?>
				</div>
				<div class="m-nav-right">
					<?php get_template_part( 'templates/header/module', 'mbookmark' ); ?>
					<?php get_template_part( 'templates/header/module', 'mcart' ); ?>
					<?php get_template_part( 'templates/header/module', 'msearch' ); ?>
					<?php if ( is_active_sidebar( 'pixwell_sidebar_offcanvas' ) || has_nav_menu( 'pixwell_menu_offcanvas' ) ) : ?>
						<a href="#" class="off-canvas-trigger btn-toggle-wrap"><span class="btn-toggle"><span class="off-canvas-toggle"><span class="icon-toggle"></span></span></span></a>
					<?php endif ?>
				</div>
			<?php else : ?>
				<div class="m-nav-left">
					<a href="#" class="off-canvas-trigger btn-toggle-wrap"><span class="btn-toggle"><span class="off-canvas-toggle"><span class="icon-toggle"></span></span></span></a>
				</div>
				<div class="m-nav-centered">
					<?php get_template_part( 'templates/header/module', 'mlogo' ); ?>
				</div>
				<div class="m-nav-right">
					<?php get_template_part( 'templates/header/module', 'mbookmark' ); ?>
					<?php get_template_part( 'templates/header/module', 'mcart' ); ?>
					<?php get_template_part( 'templates/header/module', 'msearch' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</aside>
<?php if ( ! empty( $navbar_sticky ) ) : ?>
	<aside id="mobile-sticky-nav" class="mobile-sticky-nav">
		<div class="mobile-navbar mobile-sticky-inner">
			<div class="mobile-nav-inner rb-p20-gutter">
				<?php if ( ! empty( $mobile_logo_pos ) && $mobile_logo_pos == 'left' ) : ?>
					<div class="m-nav-centered">
						<?php get_template_part( 'templates/header/module', 'mlogo' ); ?>
					</div>
					<div class="m-nav-right">
						<?php get_template_part( 'templates/header/module', 'mbookmark' ); ?>
						<?php get_template_part( 'templates/header/module', 'mcart' ); ?>
						<?php get_template_part( 'templates/header/module', 'msearch' ); ?>
						<?php if ( is_active_sidebar( 'pixwell_sidebar_offcanvas' ) || has_nav_menu( 'pixwell_menu_offcanvas' ) ) : ?>
							<a href="#" class="off-canvas-trigger btn-toggle-wrap"><span class="btn-toggle"><span class="off-canvas-toggle"><span class="icon-toggle"></span></span></span></a>
						<?php endif ?>
					</div>
				<?php else : ?>
					<div class="m-nav-left">
						<a href="#" class="off-canvas-trigger btn-toggle-wrap"><span class="btn-toggle"><span class="off-canvas-toggle"><span class="icon-toggle"></span></span></span></a>
					</div>
					<div class="m-nav-centered">
						<?php get_template_part( 'templates/header/module', 'mlogo' ); ?>
					</div>
					<div class="m-nav-right">
						<?php get_template_part( 'templates/header/module', 'mbookmark' ); ?>
						<?php get_template_part( 'templates/header/module', 'mcart' ); ?>
						<?php get_template_part( 'templates/header/module', 'msearch' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</aside>
<?php endif; ?>