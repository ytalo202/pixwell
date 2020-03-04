<?php
/**
 * @param array $settings
 * @param null  $query_data
 * loop list 1
 */
if ( ! function_exists( 'pixwell_post_list_1' ) ) :
	function pixwell_post_list_1( $settings = array() ) {

		$settings = pixwell_get_meta_setting( $settings, 'list_1' );
		$border   = pixwell_get_option( 'border_list_1' );

		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h2';
		}
		$settings['cat_classes'] = 'is-absolute';

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-list p-list-1 rb-row';
		if ( ! pixwell_is_featured_image( 'pixwell_370x250-2x' ) ) {
			$post_classes[] = 'no-feat';
		}
		if ( ! empty( $border ) ) {
			$post_classes[] = 'is-border';
		}
		if ( empty( pixwell_post_meta_info( $settings ) ) && empty( $settings['readmore'] ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<?php if ( pixwell_is_featured_image( 'pixwell_370x250-2x' ) ) : ?>
				<div class="rb-col-m12 rb-col-t6 col-left">
					<div class="p-feat-holder">
						<div class="p-feat">
							<?php
							pixwell_post_thumb( 'pixwell_370x250-2x' );
							pixwell_post_cat_info( $settings );
							?>
						</div>
						<?php pixwell_post_review_info( $settings ); ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="rb-col-m12 rb-col-t6 col-right">
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


/**
 * @param array $settings
 * @param null  $query_data
 * loop list 2
 */
if ( ! function_exists( 'pixwell_post_list_2' ) ) :
	function pixwell_post_list_2( $settings = array() ) {
		$settings = pixwell_get_meta_setting( $settings, 'list_2' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h3';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-list p-list-2';
		if ( ! pixwell_is_featured_image( 'pixwell_280x210' ) ) {
			$post_classes[] = 'no-feat';
		}
		if ( empty( pixwell_post_meta_info( $settings ) ) && empty( $settings['readmore'] ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<?php if ( pixwell_is_featured_image( 'pixwell_280x210' ) ) : ?>
				<div class="col-left">
					<div class="p-feat-holder">
						<div class="p-feat">
							<?php
							pixwell_post_thumb( 'pixwell_280x210' );
							pixwell_post_cat_info( $settings );
							?>
						</div>
						<?php pixwell_post_review_info( $settings ); ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-right">
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


/**
 * @param array $settings
 * @param null  $query_data
 * loop list 3
 */
if ( ! function_exists( 'pixwell_post_list_3' ) ) :
	function pixwell_post_list_3( $settings = array() ) {
		$settings = pixwell_get_meta_setting( $settings, 'list_3' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h2';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-list p-list-3';
		if ( ! pixwell_is_featured_image( 'pixwell_280x210' ) ) {
			$post_classes[] = 'no-feat';
		}
		if ( empty( pixwell_post_meta_info( $settings ) ) && empty( $settings['readmore'] ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<?php if ( pixwell_is_featured_image( 'pixwell_280x210' ) ) : ?>
				<div class="col-left">
					<div class="p-feat-holder">
						<div class="p-feat">
							<?php
							pixwell_post_thumb( 'pixwell_280x210' );
							pixwell_post_cat_info( $settings );
							?>
						</div>
						<?php pixwell_post_review_info( $settings ); ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-right">
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

/**
 * @param array $settings
 * @param null  $query_data
 * loop list 4
 */
if ( ! function_exists( 'pixwell_post_list_4' ) ) :
	function pixwell_post_list_4( $settings = array() ) {
		$settings = pixwell_get_meta_setting( $settings, 'list_4' );

		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h4';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-list p-list-4';
		if ( ! pixwell_is_featured_image( 'pixwell_280x210-small' ) ) {
			$post_classes[] = 'no-feat';
		}
		if ( empty( pixwell_post_meta_info( $settings ) ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<?php if ( pixwell_is_featured_image( 'pixwell_280x210-small' ) ) : ?>
				<div class="col-left">
					<div class="p-feat">
						<?php pixwell_post_thumb( 'pixwell_280x210-small' ); ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-right">
				<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'], 'h6' ); ?></div>
				<div class="p-footer">
					<?php echo pixwell_post_meta_info( $settings );
					if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
						pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
					} ?>
				</div>
			</div>
		</article>
	<?php
	}
endif;


/**
 * @param array $settings
 * @param null  $query_data
 * loop list 5
 */
if ( ! function_exists( 'pixwell_post_list_5' ) ) :
	function pixwell_post_list_5( $settings = array() ) {
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h3';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-list p-list-5';
		if ( empty( $settings['entry_meta']['enabled'] ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = ' no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="p-header">
				<?php pixwell_post_cat_dot(); ?>
				<?php pixwell_post_title( $settings['h_tag'], false, 'h6' ); ?>
			</div>
			<div class="p-footer">
				<?php echo pixwell_post_meta_info( $settings );
				if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
					pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
				} ?>
			</div>
		</article>
	<?php
	}
endif;

/**
 * @param array $settings
 * loop list 6
 */
if ( ! function_exists( 'pixwell_post_list_6' ) ) :
	function pixwell_post_list_6( $settings = array() ) {
		$settings   = pixwell_get_meta_setting( $settings, 'list_6' );
		$text_style = pixwell_get_option( 'text_style_list_6' );

		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h2';
		}
		$settings['cat_classes'] = 'is-absolute';

		$post_classes   = array();
		$post_classes[] = 'p-wrap rb-row p-list p-list-6';
		if ( empty( pixwell_post_meta_info( $settings ) ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( ! empty( $text_style ) && 'light' == $text_style ) {
			$post_classes[] = 'is-light-text';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="rb-col-m12 rb-col-t6 col-left">
				<div class="p-feat-holder">
					<div class="p-feat">
						<?php
						pixwell_post_thumb( 'pixwell_370x250-2x' );
						pixwell_post_cat_info( $settings );
						?>
					</div>
					<?php pixwell_post_review_info( $settings ); ?>
				</div>
			</div>
			<div class="rb-col-m12 rb-col-t6 col-right">
				<div class="p-content-wrap">
					<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'] ); ?></div>
					<?php pixwell_post_summary( $settings ); ?>
					<div class="p-footer">
						<?php
						echo pixwell_post_meta_info( $settings );
						pixwell_post_readmore( $settings );
						if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
							pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
						} ?>
					</div>
				</div>
			</div>
		</article>
	<?php
	}
endif;