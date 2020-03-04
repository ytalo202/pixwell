<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** ajax actions */
add_action( 'wp_ajax_nopriv_pixwell_live_search', 'pixwell_ajax_live_search' );
add_action( 'wp_ajax_pixwell_live_search', 'pixwell_ajax_live_search' );
add_action( 'wp_ajax_nopriv_pixwell_quick_filter', 'pixwell_ajax_quick_filter' );
add_action( 'wp_ajax_pixwell_quick_filter', 'pixwell_ajax_quick_filter' );
add_action( 'wp_ajax_nopriv_pixwell_live_pagination', 'pixwell_ajax_pagination' );
add_action( 'wp_ajax_pixwell_live_pagination', 'pixwell_ajax_pagination' );
add_action( 'template_redirect', 'pixwell_single_load_next_redirect' );

/** live search ajax */
if ( ! function_exists( 'pixwell_ajax_live_search' ) ) {
	function  pixwell_ajax_live_search() {

		if ( empty( $_POST['s'] ) ) {
			wp_send_json( '', null );
		}

		$input = pixwell_validate_variable( $_POST['s'] );

		$params = array(
			's'              => $input,
			'post_type'      => array( 'post' ),
			'post_status'    => 'publish',
			'posts_per_page' => 3
		);

		$query_data = new WP_Query( $params );
		ob_start(); ?>
		<div class="live-search-content">
			<?php if ( $query_data->have_posts() ) : ?>
				<div class="live-search-listing rb-row">
					<?php while ( $query_data->have_posts() ) {
						$query_data->the_post();
						echo '<div class="rb-col-m12">';
						pixwell_post_list_4();
						echo '</div>';
					}
					wp_reset_postdata();
					?>
				</div>
				<?php if ( $query_data->max_num_pages > 1 ): ?>
					<div class="pagination-wrap live-search-more">
						<a href="<?php echo get_search_link( $input ); ?>" class="p-link live-search-submit"><span><?php echo pixwell_translate( 'view_all_results' ); ?></span><i class="rbi rbi-arrow-right"></i></a>
					</div>
				<?php endif;
			else : ?>
				<p class="search-not-found"><?php echo pixwell_translate( 'no_search_result' ); ?></p>
			<?php endif; ?>
		</div>
		<?php
		$response = ob_get_clean();

		wp_send_json( $response, null );
	}
}


/** quick filter ajax */
if ( ! function_exists( 'pixwell_ajax_quick_filter' ) ) {
	function pixwell_ajax_quick_filter() {

		$settings = array();
		$response = array( 'page_max' => '', 'content' => '' );
		if ( ! empty( $_POST['data'] ) ) {
			$settings = pixwell_validate_variable( $_POST['data'] );
		}

		$query_data = pixwell_query( $settings );
		if ( $query_data->have_posts() ) {
			$response['page_max'] = $query_data->max_num_pages;
			$response['content']  = pixwell_ajax_get_content( $settings, $query_data );

			wp_reset_postdata();
		}

		wp_send_json( $response, null );
	}
}


/** ajax pagination */
if ( ! function_exists( 'pixwell_ajax_pagination' ) ) {
	function pixwell_ajax_pagination() {

		$settings            = array();
		$response            = array();
		$response['content'] = '';
		$notice_class        = 'end-list';

		if ( ! empty( $_POST['data'] ) ) {
			$settings = pixwell_validate_variable( $_POST['data'] );
		}
		if ( empty( $settings['page_next'] ) ) {
			$settings['page_next'] = 2;
		}

		if ( 'fw_related' == $settings['name'] ) {
			$query_data = pixwell_query_related( $settings, intval( $settings['page_next'] ) );
		} else {
			$query_data = pixwell_query( $settings, intval( $settings['page_next'] ) );
		}

		if ( ! empty( $settings['name'] ) ) {

			if ( 'ct_masonry_1' == $settings['name'] ) {
				$notice_class .= ' ct-mh-1 ct-mh-1--width2';
			} else if ( 'fw_masonry_1' == $settings['name'] ) {
				$notice_class .= ' fw-mh-1 fw-mh-1--width3';
			}
		}

		if ( $query_data->have_posts() ) {
			$response['page_max'] = $query_data->max_num_pages;

			if ( ! empty( $query_data->paged ) ) {
				$response['page_current'] = $query_data->paged;
			} else {
				$response['page_current'] = $settings['page_next'];
			}
			if ( $response['page_current'] == $response['page_max'] ) {
				$response['notice'] = '<div class="' . $notice_class . '"><span class="end-list-info">' . pixwell_translate( 'end_list' ) . '</span></div>';
			}

			$response['content'] = pixwell_ajax_get_content( $settings, $query_data );

			wp_reset_postdata();
		}

		wp_send_json( $response, null );
	}
}


/**
 * @param $settings
 *
 * @return array|string
 * validate posts
 */
if ( ! function_exists( 'pixwell_validate_variable' ) ) {
	function pixwell_validate_variable( $settings ) {
		if ( is_array( $settings ) ) {
			foreach ( $settings as $key => $val ) {
				$key              = sanitize_text_field( $key );
				$settings[ $key ] = sanitize_text_field( $val );
			}
		} elseif ( is_string( $settings ) ) {
			$settings = sanitize_text_field( $settings );
		} else {
			$settings = '';
		}

		return $settings;
	}
}


/**
 * @param $settings
 * @param $query_data
 *
 * @return string
 * ajax content
 */
if ( ! function_exists( 'pixwell_ajax_get_content' ) ) :
	function pixwell_ajax_get_content( $settings, $query_data ) {

		if ( empty( $settings['name'] ) ) {
			$settings['name'] = 'ct_classic';
		}

		ob_start();
		switch ( $settings['name'] ) {
			case 'fw_grid_1' :
				pixwell_rbc_fw_grid_1_listing( $settings, $query_data );
				break;
			case 'fw_grid_2' :
				pixwell_rbc_fw_grid_2_listing( $settings, $query_data );
				break;
			case 'fw_grid_3' :
				pixwell_rbc_fw_grid_3_listing( $settings, $query_data );
				break;
			case 'fw_grid_4' :
				pixwell_rbc_fw_grid_4_listing( $settings, $query_data );
				break;
			case 'fw_list_1' :
				pixwell_rbc_fw_list_1_listing( $settings, $query_data );
				break;
			case 'fw_list_2' :
				pixwell_rbc_fw_list_2_listing( $settings, $query_data );
				break;
			case 'fw_mix_1' :
				pixwell_rbc_fw_mix_1_listing( $settings, $query_data );
				break;
			case 'fw_mix_2' :
				pixwell_rbc_fw_mix_2_listing( $settings, $query_data );
				break;
			case 'fw_masonry_1' :
				pixwell_rbc_fw_masonry_1_listing( $settings, $query_data );
				break;
			case 'fw_feat_8' :
				pixwell_rbc_fw_feat_8_listing( $settings, $query_data );
				break;
			case 'ct_grid_1' :
				pixwell_rbc_ct_grid_1_listing( $settings, $query_data );
				break;
			case 'ct_grid_2' :
				pixwell_rbc_ct_grid_2_listing( $settings, $query_data );
				break;
			case 'ct_list' :
				pixwell_rbc_ct_list_listing( $settings, $query_data );
				break;
			case 'ct_masonry_1' :
				pixwell_rbc_ct_masonry_1_listing( $settings, $query_data );
				break;
			case 'mega_category' :
				pixwell_mega_menu_listing( $settings, $query_data );
				break;
			case 'fw_related' :
				pixwell_fw_related_listing( $settings, $query_data );
				break;
		}

		return ob_get_clean();
	}
endif;


/** single ajax load next */
if ( ! function_exists( 'pixwell_single_load_next_redirect' ) ) {
	function pixwell_single_load_next_redirect() {

		global $wp_query;
		if ( ! isset( $wp_query->query_vars['rbsnp'] ) || ! is_single() ) {
			return;
		}

		$file     = '/templates/single/ajax-load-next.php';
		$template = locate_template( $file );
		if ( $template ) {
			include( $template );
		}
		exit;
	}
}


