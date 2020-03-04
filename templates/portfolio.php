<?php

/** get portfolio term info */
if ( ! function_exists( 'pixwell_portfolio_terms_data' ) ) :
	function pixwell_portfolio_terms_data( $portfolio_id ) {
		$terms         = array();
		$portfolio_cat = get_the_terms( $portfolio_id, 'portfolio-category' );
		if ( ! empty( $portfolio_cat ) && is_array( $portfolio_cat ) ) {
			foreach ( $portfolio_cat as $cat ) {
				$terms[] = array(
					'link'    => get_term_link( $cat, 'portfolio-category' ),
					'name'    => $cat->name,
					'classes' => 'portfolio-category-' . $cat->slug,
				);
			}
		}

		return $terms;
	}
endif;

/** render portfolio categories info */
if ( ! function_exists( 'pixwell_portfolio_terms' ) ) :
	function pixwell_portfolio_terms( $portfolio_id, $classes = '' ) {

		$class_name = 'p-meta-info';
		if ( ! empty( $classes ) ) {
			$class_name .= ' ' . $classes;
		} else {
			$class_name .= ' pp-terms';
		}
		$terms = pixwell_portfolio_terms_data( $portfolio_id );

		if ( array_filter( $terms ) ) : ?>
			<aside class="<?php echo esc_attr( $class_name ); ?>">
				<?php foreach ( $terms as $category ) : ?>
					<a class="portfolio-info-el" rel="category" href="<?php echo esc_url( $category['link'] ); ?>"><?php echo esc_html( $category['name'] ); ?></a>
				<?php endforeach; ?>
			</aside>
		<?php endif;
	}
endif;


/** render portfolio footer info */
if ( ! function_exists( 'pixwell_portfolio_footer_info' ) ) :
	function pixwell_portfolio_footer_info( $portfolio_id ) {

		$portfolio_project  = rb_get_meta( 'rb_portfolio_project', $portfolio_id );
		$portfolio_client   = rb_get_meta( 'rb_portfolio_client', $portfolio_id );
		$portfolio_service  = rb_get_meta( 'rb_portfolio_service', $portfolio_id );
		$portfolio_location = rb_get_meta( 'rb_portfolio_location', $portfolio_id );

		if ( ! empty( $portfolio_project ) || ! empty( $portfolio_client ) || ! empty( $portfolio_service ) || ! empty( $portfolio_location ) ) : ?>
			<div class="portfolio-info-wrap">
				<?php
				$portfolio_info_header = pixwell_get_option( 'portfolio_info_header' );
				if ( ! empty( $portfolio_info_header ) ) {
					echo '<h3 class="info-header">' . apply_filters( 'the_title', $portfolio_info_header ) . '</h3>';
				}
				if ( ! empty( $portfolio_project ) ) : ?>
					<div class="portfolio-info info-project">
						<i class="rbi rbi-inbox"></i><?php echo do_shortcode( $portfolio_project ); ?>
					</div>
				<?php endif;
				if ( ! empty( $portfolio_client ) ) : ?>
					<div class="portfolio-info info-client">
						<i class="rbi rbi-award"></i><?php echo do_shortcode( $portfolio_client ); ?>
					</div>
				<?php endif;
				if ( ! empty( $portfolio_service ) ) : ?>
					<div class="portfolio-info info-service">
						<i class="rbi rbi-bullhorn"></i><?php echo do_shortcode( $portfolio_service ); ?>
					</div>
				<?php endif;
				if ( ! empty( $portfolio_location ) ) : ?>
					<div class="portfolio-info info-location">
						<i class="rbi rbi-map-pin"></i><?php echo do_shortcode( $portfolio_location ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif;
	}
endif;

/** render portfolio navigation */
if ( ! function_exists( 'pixwell_portfolio_single_nav' ) ) :
	function pixwell_portfolio_single_nav( $portfolio_id ) {

		$portfolio_nav = pixwell_get_option( 'portfolio_nav' );
		if ( empty( $portfolio_nav ) ) {
			return false;
		}

		$category_link       = '';
		$portfolio_grid_link = pixwell_get_option( 'portfolio_grid_link' );
		$portfolio_same_cat  = pixwell_get_option( 'portfolio_same_cat' );

		if ( ! empty( $portfolio_same_cat ) ) {
			$portfolio_same_cat = true;
		} else {
			$portfolio_same_cat = false;
		}

		if ( ! empty( $portfolio_grid_link ) ) {
			$terms = get_the_terms( $portfolio_id, 'portfolio-category' );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				if ( is_object( $terms[0] ) ) {
					$category_link = get_term_link( $terms[0], 'portfolio-category' );
				}
			}
			if ( empty( $category_link ) ) {
				$category_link = get_post_type_archive_link( 'rb-portfolio' );
			}
		} ?>
		<div class="portfolio-nav box-nav">
			<span class="portfolio-nav-prev nav-label"><?php previous_post_link( '%link', '<i class="rbi rbi-arrow-left"></i><span class="nav-label-text">' . pixwell_translate( 'previous_project' ) . '</span>', $portfolio_same_cat, '', 'portfolio-category' ); ?></span>
			<span class="portfolio-nav-next nav-label"><?php next_post_link( '%link', '<span class="nav-label-text">' . pixwell_translate( 'next_project' ) . '</span><i class="rbi rbi-arrow-right"></i>', $portfolio_same_cat, '', 'portfolio-category' ); ?></span>
			<?php if ( ! empty( $category_link ) ): ?>
				<a class="portfolio-grid-link" href="<?php echo esc_url( $category_link ); ?>"><i class="rbi rbi-grid"></i></a>
			<?php endif; ?>
		</div>
	<?php
	}
endif;

/** portfolio pagination */
if ( ! function_exists( 'pixwell_portfolio_pagination_simple' ) ):
	function pixwell_portfolio_pagination_simple( $query_data = null ) {

		if ( empty( $query_data ) || ! is_object( $query_data ) ) {
			global $wp_query;
			$query_data = $wp_query;
		}
		if ( $query_data->max_num_pages < 2 ) {
			return false;
		} ?>
		<nav class="pagination-wrap pp-pagination pagination-simple clearfix">
			<span class="newer"><?php previous_posts_link( '<i class="rbi rbi-arrow-left"></i>', $query_data->max_num_pages ); ?></span>
			<span class="older"><?php next_posts_link( '<i class="rbi rbi-arrow-right"></i>', $query_data->max_num_pages ); ?></span>
		</nav>
	<?php
	}
endif;


/** render portfolio listing */
if ( ! function_exists( 'pixwell_portfolio_masonry_1' ) ) :
	function pixwell_portfolio_masonry_1( $settings = array() ) {
		$post_classes   = array();
		$post_classes[] = 'portfolio-post-type pp-wrap';
		if ( ! empty( $settings['classes'] ) ) {
			$post_classes[] = $settings['classes'];
		}
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h3';
		} ?>
		<div class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="pp-feat p-feat">
				<a class="pp-feat-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
					<?php the_post_thumbnail( 'pixwell_450x0' ); ?>
					<span class="pp-overlay-icon"><i class="rbi rbi-arrow-right"></i></span>
				</a>
			</div>
			<div class="pp-body">
				<?php echo '<' . esc_attr( $settings['h_tag'] ) . ' class="pp-title">'; ?>
				<a class="p-url" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a>
				<?php echo '</' . esc_attr( $settings['h_tag'] ) . '>'; ?>
				<?php pixwell_portfolio_terms( get_the_ID() ); ?>
			</div>
		</div>
	<?php
	}
endif;

/** portfolio 3 columns */
if ( ! function_exists( 'pixwell_portfolio_masonry_c3' ) ):
	function pixwell_portfolio_masonry_c3() {
		?>
		<div class="content-wrap pp-archive-m3 is-masonry">
			<div class="content-inner rb-n20-gutter is-masonry-reload">
				<div class="fw-ms-1"></div>
				<?php while ( have_posts() ) : the_post();
					pixwell_portfolio_masonry_1( array( 'classes' => 'fw-mh-1 rb-p20-gutter' ) );
				endwhile; ?>
			</div>
		</div>
	<?php
	}
endif;

/** portfolio 4 columns */
if ( ! function_exists( 'pixwell_portfolio_masonry_c4' ) ):
	function pixwell_portfolio_masonry_c4() {
		$settings = array(
			'h_tag'   => 'h4',
			'classes' => 'fw-mh-c4 rb-p10-gutter'
		); ?>
		<div class="content-wrap pp-archive-m4 is-masonry">
			<div class="content-inner rb-n10-gutter is-masonry-reload">
				<div class="fw-ms-c4"></div>
				<?php while ( have_posts() ) : the_post();
					pixwell_portfolio_masonry_1( $settings );
				endwhile; ?>
			</div>
		</div>
	<?php
	}
endif;

/**
 * get terms filters
 */
if ( ! function_exists( 'pixwell_portfolio_cat_filter' ) ) {
	function pixwell_portfolio_cat_filter( $query_data ) {
		$term_data = array();
		while ( $query_data->have_posts() ) :
			$query_data->the_post();
			$portfolio_cat = get_the_terms( get_the_ID(), 'portfolio-category' );
			if ( ! empty( $portfolio_cat ) && is_array( $portfolio_cat ) ) {
				foreach ( $portfolio_cat as $cat ) {
					$slug = $cat->slug;
					if ( array_key_exists( $slug, $term_data ) ) {
						$term_data[ $slug ]['count'] ++;
					} else {
						$term_data[ $slug ] = array(
							'link'    => get_term_link( $cat, 'portfolio-category' ),
							'name'    => $cat->name,
							'classes' => '.portfolio-category-' . $cat->slug,
							'count'   => 1,
						);
					}
				}
			}
		endwhile;
		if ( count( $term_data ) > 0 ) : ?>
			<div class="pp-terms-filter">
				<button class="pp-filter-el active pp-filter-el" data-filter="*"><span class="filter-label"><?php echo pixwell_translate( 'all' ) ?></span></button>
				<?php foreach ( $term_data as $term ) : ?>
					<button class="pp-filter-el" data-filter="<?php echo esc_attr( $term['classes'] ); ?>"><span class="filter-label"><?php echo esc_html( $term['name'] ); ?>
							<span class="filter-count"><?php echo esc_attr( $term['count'] ); ?></span></span></button>
				<?php endforeach; ?>
			</div>
		<?php endif;
	}
}