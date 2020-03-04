<header id="site-header" class="header-wrap header-6">
	<div class="navbar-outer">
		<div class="banner-wrap is-light-text">
			<div class="rbc-container">
				<div class="rb-m20-gutter">
					<div class="banner-inner rb-row">
						<div class="rb-col-m4 banner-left">
							<?php get_template_part( 'templates/header/module', 'subscribe' ); ?>
						</div>
						<div class="rb-col-m4 banner-centered">
							<?php get_template_part( 'templates/header/module', 'logo' ); ?>
						</div>
						<div class="rb-col-m4 banner-right">
							<?php get_template_part( 'templates/header/module', 'social' ); ?>
							<?php get_template_part( 'templates/header/module', 'bookmark' ); ?>
							<?php get_template_part( 'templates/header/module', 'cart' ); ?>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar-wrap">
			<?php get_template_part( 'templates/header/module', 'mnav' ); ?>
			<div class="rbc-container navbar-holder">
				<div class="navbar-border-holder rb-m20-gutter is-main-nav">
					<div class="navbar-inner rb-row">
						<div class="rb-col-d1 navbar-left">
							<?php get_template_part( 'templates/header/module', 'toggle' ); ?>
						</div>
						<div class="rb-col-d10 navbar-centered">
							<?php get_template_part( 'templates/header/module', 'menu' ); ?>
						</div>
						<div class="rb-col-d1 navbar-right">
							<?php get_template_part( 'templates/header/module', 'trend' ); ?>
							<?php get_template_part( 'templates/header/module', 'search' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	get_template_part( 'templates/header/module', 'sticky' );
	if ( is_active_sidebar( 'pixwell_header_ad' ) ) {
		dynamic_sidebar( 'pixwell_header_ad' );
	} ?>
</header>