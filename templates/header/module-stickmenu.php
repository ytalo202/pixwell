<aside class="main-menu-wrap">
	<?php wp_nav_menu( array(
		'theme_location' => 'pixwell_menu_main',
		'menu_id'        => 'sticky-menu',
		'container'      => '',
		'menu_class'     => 'main-menu rb-menu',
		'walker'         => new pixwell_walker,
		'depth'          => 4,
		'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'echo'           => true,
		'fallback_cb'    => 'pixwell_navigation_fallback'
	) ); ?>
</aside>