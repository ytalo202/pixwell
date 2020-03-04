<?php
/**
 * fullwidth mega menu
 */
if ( ! function_exists( 'pixwell_mega_menu' ) ) :
	function pixwell_mega_menu( $settings = array() ) {

		$settings['text_style']      = pixwell_get_option( 'mega_menu_text_style' );
		$settings['no_found_rows']   = false;
		$settings['order']           = 'date_post';
		$settings['name']            = 'mega_category';
		$settings['columns']         = true;
		$settings['content_classes'] = 'mega-content-inner rb-n10-gutter';
		$settings['block_tag']       = 'div';

		$query_data = pixwell_query( $settings );

		if ( $query_data->have_posts() ) {
			pixwell_block_open( $settings, $query_data );
			pixwell_block_header( $settings );
			pixwell_block_content_open( $settings );
			pixwell_mega_menu_listing( $settings, $query_data );
			pixwell_block_content_close();
			pixwell_render_pagination( $settings, $query_data );
			pixwell_block_close( $settings );
			wp_reset_postdata();
		}
	}
endif;


if ( ! function_exists( 'pixwell_mega_menu_listing' ) ) :
	function pixwell_mega_menu_listing( $settings = array(), $query_data ) {
		$settings['h_tag'] = 'h6';
		if ( method_exists( $query_data, 'have_posts' ) ) :
			while ( $query_data->have_posts() ) :
				$query_data->the_post();
				if ( $settings['posts_per_page'] == 5 ) {
					echo '<div class="rb-col-5m rb-p10-gutter">';
				} else {
					echo '<div class="rb-col-m3 rb-p10-gutter">';
				}
				pixwell_post_grid_4( $settings, $query_data );
				echo '</div>';
			endwhile;
		endif;
	}
endif;
