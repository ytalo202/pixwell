<?php
/**
 * @param array $settings
 * @param null  $query_data
 * loop masonry 1
 */
if ( ! function_exists( 'pixwell_post_masonry_1' ) ) :
	function pixwell_post_masonry_1( $settings = array() ) {
		$settings = pixwell_get_meta_setting( $settings, 'masonry_1' );

		$settings['cat_classes'] = 'is-relative';
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h3';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-grid p-masonry p-masonry-1';
		if ( ! pixwell_is_featured_image( 'pixwell_450x0' ) ) {
			$post_classes[] = 'no-feat';
		}
		if ( empty( pixwell_post_meta_info( $settings ) ) && empty( $settings['readmore'] ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<?php if ( pixwell_is_featured_image( 'pixwell_450x0' ) ) : ?>
				<div class="p-feat">
					<?php
					pixwell_post_thumb( 'pixwell_450x0' );
					pixwell_post_review_info( $settings );
					?>
				</div>
			<?php endif; ?>
			<div class="p-content-wrap">
				<?php pixwell_post_cat_info( $settings ); ?>
				<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'] ); ?></div>
				<?php pixwell_post_summary( $settings ); ?>
				<div class="p-footer">
					<?php echo pixwell_post_meta_info( $settings );
					pixwell_post_readmore( $settings );
					if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
						pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
					} ?>
				</div>
			</div>
		</article>
	<?php
	}
endif;
