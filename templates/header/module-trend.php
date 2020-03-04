<?php
$pixwell_header_trend = pixwell_get_option( 'header_trend' );
if ( empty( $pixwell_header_trend ) ) {
	return;
}
$pixwell_trend_title  = pixwell_get_option( 'trend_title' );
$pixwell_trend_filter = pixwell_get_option( 'trend_filter' );
$pixwell_order        = 'popular';
if ( ! empty( $pixwell_trend_filter ) ) {
	$pixwell_order = $pixwell_trend_filter;
} ?>
<aside class="trending-section is-hover">
	<span class="trend-icon"><i class="rbi rbi-zap"></i></span>
	<div class="trend-lightbox header-lightbox">
		<h6 class="trend-header h4"><?php echo esc_html( $pixwell_trend_title ); ?></h6>
		<div class="trend-content">
			<?php
			$params = array(
				'order'               => $pixwell_order,
				'post_type'           => 'post',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => 4,
				'no_found_rows'       => true,
			);
			$query_data = pixwell_query( $params );
			if ( $query_data->have_posts() ) :
				while ( $query_data->have_posts() ) :
					$query_data->the_post();
					pixwell_post_list_4();
				endwhile;
				wp_reset_postdata();
			else: ?>
			<span class="no-trend"><?php echo pixwell_translate('no_trend'); ?></span>
			<?php endif; ?>
		</div>
	</div>
</aside>