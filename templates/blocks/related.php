<?php
/**
 * related box
 */
if ( ! function_exists( 'pixwell_fw_related' ) ) :
	function pixwell_fw_related( $settings = array() ) {

		if ( empty( $settings['post_not_in'] ) ) {
			return false;
		}
		$settings['uuid']       = 'single-related-' . $settings['post_not_in'];
		$settings['name']       = 'fw_related';
		$settings['columns']    = true;
		$settings['title']      = apply_filters( 'the_title', pixwell_get_option( 'single_post_related_title' ) );
		$settings['classes']    = 'single-post-related layout-' . esc_attr( $settings['layout'] );
		$settings['pagination'] = pixwell_get_option( 'single_post_related_pagination' );

		$query_data = pixwell_query_related( $settings );
		if ( ! method_exists( $query_data, 'have_posts' ) || ! $query_data->have_posts() ) {
			return false;
		}

		switch ( $settings['layout'] ) {
			case 'fw_grid_1' :
			case 'fw_list_2' :
				$settings['content_classes'] = 'rb-n20-gutter';
				break;
			case 'fw_grid_2' :
				$settings['content_classes'] = 'rb-n15-gutter';
				break;
		}


		if ( $query_data->have_posts() ) {
			pixwell_block_open( $settings, $query_data );
			pixwell_block_header( $settings );
			pixwell_block_content_open( $settings );
			pixwell_fw_related_listing( $settings, $query_data );
			pixwell_block_content_close();
			pixwell_render_pagination( $settings, $query_data );
			pixwell_block_close();
			wp_reset_postdata();
		}
	}
endif;


/**
 * related listing
 */
if ( ! function_exists( 'pixwell_fw_related_listing' ) ) :
	function pixwell_fw_related_listing( $settings = array(), $query_data ) {

		switch ( $settings['layout'] ) {
			case 'fw_grid_1' :
				pixwell_rbc_fw_grid_1_listing( $settings, $query_data );
				break;
			case 'fw_list_1' :
				pixwell_rbc_fw_list_1_listing( $settings, $query_data );
				break;
			case 'fw_list_2' :
				pixwell_rbc_fw_list_2_listing( $settings, $query_data );
				break;
			default :
				pixwell_rbc_fw_grid_2_listing( $settings, $query_data );
		}
	}
endif;
