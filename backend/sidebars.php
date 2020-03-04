<?php
/** multi sidebars action */
add_action( 'widgets_init', 'pixwell_register_all_sidebars' );

if ( ! function_exists( 'pixwell_register_all_sidebars' ) ) {
	function pixwell_register_all_sidebars() {

		$theme_options = get_option( 'pixwell_theme_options' );
		if ( ! empty( $theme_options['pixwell_multi_sidebar'] ) && is_array( $theme_options['pixwell_multi_sidebar'] ) ) {
			$data_sidebar = array();
			foreach ( $theme_options['pixwell_multi_sidebar'] as $sidebar ) {
				if ( ! empty( $sidebar ) ) {
					array_push( $data_sidebar, array(
						'id'   => 'pixwell_sidebar_multi_' . pixwell_convert_to_id( trim( $sidebar ) ),
						'name' => strip_tags( $sidebar ),
					) );
				}
			}

			foreach ( $data_sidebar as $sidebar ) {
				if ( ! empty( $sidebar['id'] ) && ! empty( $sidebar['name'] ) ) {
					register_sidebar( array(
						'id'            => $sidebar['id'],
						'name'          => $sidebar['name'],
						'description'   => esc_html__( 'A sidebar section of your site.', 'pixwell' ),
						'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title h4">',
						'after_title'   => '</h2>'
					) );
				}
			};
		}

		register_sidebar( array(
			'id'            => 'pixwell_sidebar_default',
			'name'          => esc_html__( 'Default Sidebar', 'pixwell' ),
			'description'   => esc_html__( 'The default sidebar of the this theme.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_sidebar_topsite',
			'name'          => esc_html__( 'Top Website - FullWidth Section', 'pixwell' ),
			'description'   => esc_html__( 'FullWidth section at the top of your site. This section usually uses to display advert or HTML raw notice board.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget topsite-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_sidebar_below_nav',
			'name'          => esc_html__( 'Header - Below Menu Bar Section', 'pixwell' ),
			'description'   => esc_html__( 'FullWidth section below the navigation bar. To display popular posts widget.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget topsite-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_header_ad',
			'name'          => esc_html__( 'Header - Advert Section', 'pixwell' ),
			'description'   => esc_html__( 'Display advert in the site Header. The position of this section will depend on the header style setting in your Theme Panel.', 'pixwell' ),
			'before_widget' => '<aside id="%1$s" class="header-advert-section %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_sidebar_fw_footer',
			'name'          => esc_html__( 'Top Footer - FullWidth Section', 'pixwell' ),
			'description'   => esc_html__( 'The FullWidth section at the top of the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_sidebar_footer_1',
			'name'          => esc_html__( 'Footer - Column 1', 'pixwell' ),
			'description'   => esc_html__( 'one of the columns of the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_sidebar_footer_2',
			'name'          => esc_html__( 'Footer - Column 2', 'pixwell' ),
			'description'   => esc_html__( 'one of the columns of the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_sidebar_footer_3',
			'name'          => esc_html__( 'Footer - Column 3', 'pixwell' ),
			'description'   => esc_html__( 'one of the columns of the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_sidebar_footer_4',
			'name'          => esc_html__( 'Footer - Column 4', 'pixwell' ),
			'description'   => esc_html__( 'one of the columns of the footer area.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_sidebar_offcanvas',
			'name'          => esc_html__( 'Left Side (Mobile Menu) Section', 'pixwell' ),
			'description'   => esc_html__( 'The hidden section at the left of your site. This section contains mobile menu and widgets for displaying mobile devices.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar w-footer %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_single_top',
			'name'          => esc_html__( 'Single Content - Top Advert Section', 'pixwell' ),
			'description'   => esc_html__( 'The section at the top of the single post content. This section usually can use to display advert or a subscribe form.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
		register_sidebar( array(
			'id'            => 'pixwell_single_bottom',
			'name'          => esc_html__( 'Single Content - Bottom Advert Section', 'pixwell' ),
			'description'   => esc_html__( 'The section at the bottom of the single post content. This section usually can use to display advert or a subscribe form.', 'pixwell' ),
			'before_widget' => '<div id="%1$s" class="widget w-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title h4">',
			'after_title'   => '</h2>'
		) );
	}
}