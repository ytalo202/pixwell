<header id="site-header" class="header-wrap header-1">
	<div class="navbar-outer">
		<div class="navbar-wrap">
			<?php get_template_part( 'templates/header/module', 'mnav' ); ?>
			<div class="rbc-container navbar-holder is-main-nav">
				<div class="navbar-inner rb-m20-gutter">
					<div class="navbar-left">
						<?php get_template_part( 'templates/header/module', 'toggle' ); ?>
						<?php get_template_part( 'templates/header/module', 'logo' ); ?>
						<?php get_template_part( 'templates/header/module', 'menu' ); ?>
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
	<?php get_template_part( 'templates/header/module', 'sticky' );
	if ( is_active_sidebar( 'pixwell_header_ad' ) ) {
		dynamic_sidebar( 'pixwell_header_ad' );
	} ?>
</header>