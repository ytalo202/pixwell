<nav id="site-navigation" class="main-menu-wrap" aria-label="<?php esc_attr_e( 'main menu', 'pixwell' ); ?>">
	<?php wp_nav_menu( array(
		'theme_location' => 'pixwell_menu_main',
		'menu_id'        => 'main-menu',
		'container'      => '',
		'menu_class'     => 'main-menu rb-menu',
		'walker'         => new pixwell_walker,
		'depth'          => 4,
		'items_wrap'     => '<ul id="%1$s" class="%2$s" itemscope itemtype="' . pixwell_protocol() . '://www.schema.org/SiteNavigationElement">%3$s</ul>',
		'echo'           => true,
		'fallback_cb'    => 'pixwell_navigation_fallback'
	) ); ?>
</nav>