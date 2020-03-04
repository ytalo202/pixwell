<?php
/**
 * @param array $settings
 * widget post
 */
if ( ! function_exists( 'pixwell_widget_post' ) ) :
	function pixwell_widget_post( $settings = array() ) {

		if ( empty( $settings['style'] ) ) {
			$settings['style'] = 1;
		}

		$class_name                = 'rb-row widget-post-' . esc_attr( $settings['style'] );
		$settings['no_found_rows'] = true;
		$query_data                = pixwell_query( $settings );
		if ( $query_data->have_posts() ) {
			echo '<div class="' . esc_attr( $class_name ) . '">';
			switch ( $settings['style'] ) {
				case 1:
					pixwell_widget_post_listing_1( $settings, $query_data );
					break;
				case 2:
					pixwell_widget_post_listing_2( $settings, $query_data );
					break;
				case 3:
					pixwell_widget_post_listing_3( $settings, $query_data );
					break;
			}
			echo '</div>';
			wp_reset_postdata();
		}
	}
endif;


/** post widget style 1 */
if ( ! function_exists( 'pixwell_widget_post_listing_1' ) ) :
	function pixwell_widget_post_listing_1( $settings = array(), $query_data ) {
		if ( method_exists( $query_data, 'have_posts' ) && $query_data->have_posts() ) :
			while ( $query_data->have_posts() ) :
				$query_data->the_post(); ?>
				<div class="rb-col-m12">
					<?php pixwell_post_list_4( $settings ); ?>
				</div>
			<?php endwhile;
		endif;
	}
endif;


/** post widget style 2 */
if ( ! function_exists( 'pixwell_widget_post_listing_2' ) ) :
	function pixwell_widget_post_listing_2( $settings = array(), $query_data ) {
		if ( method_exists( $query_data, 'have_posts' ) && $query_data->have_posts() ) :
			while ( $query_data->have_posts() ) :
				$query_data->the_post(); ?>
				<div class="rb-col-m6">
					<?php pixwell_post_grid_w1( $settings ); ?>
				</div>
			<?php endwhile;
		endif;
	}
endif;


/** post widget style 3 */
if ( ! function_exists( 'pixwell_widget_post_listing_3' ) ) :
	function pixwell_widget_post_listing_3( $settings = array(), $query_data ) {
		if ( method_exists( $query_data, 'have_posts' ) && $query_data->have_posts() ) :
			while ( $query_data->have_posts() ) :
				$query_data->the_post();    ?>
				<div class="rb-col-m12">
					<?php pixwell_post_list_5( $settings ); ?>
				</div>
			<?php endwhile;
		endif;
	}
endif;
