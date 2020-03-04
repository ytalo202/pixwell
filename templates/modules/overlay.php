<?php
/**
 * @param array $settings
 * loop overlay 1
 */
if ( ! function_exists( 'pixwell_post_overlay_1' ) ) :
	function pixwell_post_overlay_1( $settings = array() ) {
		$settings['cat_classes'] = 'is-relative';
		$settings                = pixwell_get_meta_setting( $settings, 'overlay_1' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h2';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-overlay p-overlay-1';
		if ( empty( pixwell_post_meta_info( $settings ) ) && empty( $settings['readmore'] ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="p-feat-holder">
				<?php pixwell_post_review_info( $settings ); ?>
				<div class="p-feat">
					<?php pixwell_post_thumb( 'pixwell_370x250-3x' ); ?>
					<div class="content-overlay is-light-text">
						<div class="overlay-holder">
							<?php pixwell_post_cat_info( $settings ); ?>
							<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'], 'h1' ); ?></div>
							<?php pixwell_post_summary( $settings ); ?>
							<div class="p-footer">
								<?php echo pixwell_post_meta_info( $settings );
								pixwell_post_readmore( $settings );
								if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
									pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php
	}
endif;


/**
 * @param array $settings
 * loop overlay 2
 */
if ( ! function_exists( 'pixwell_post_overlay_2' ) ) :
	function pixwell_post_overlay_2( $settings = array() ) {
		$settings['cat_classes'] = 'is-relative';
		$settings                = pixwell_get_meta_setting( $settings, 'overlay_2' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h3';
		}

		$post_classes   = array();
		$size           = 'pixwell_370x250';
		$post_classes[] = 'p-wrap p-overlay p-overlay-2';
		if ( empty( pixwell_post_meta_info( $settings ) ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		}
		if ( ! empty( $settings['feat_size'] ) ) {
			$size = $settings['feat_size'];
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="p-feat">
				<?php pixwell_post_thumb( $size ); ?>
				<div class="content-overlay is-light-text">
					<div class="overlay-holder">
						<?php pixwell_post_cat_info( $settings ); ?>
						<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'] ); ?></div>
						<div class="p-footer">
							<?php echo pixwell_post_meta_info( $settings );
							if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
								pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
							} ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php
	}
endif;


/**
 * @param array $settings
 * loop overlay 3
 */
if ( ! function_exists( 'pixwell_post_overlay_3' ) ) :
	function pixwell_post_overlay_3( $settings = array() ) {
		$settings['cat_classes'] = 'is-relative';
		$settings                = pixwell_get_meta_setting( $settings, 'overlay_3' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h3';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-overlay p-overlay-3';
		if ( empty( pixwell_post_meta_info( $settings ) ) && empty( $settings['readmore'] ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="p-feat">
				<?php pixwell_post_thumb( 'pixwell_400x450' ); ?>
				<div class="content-overlay is-light-text">
					<div class="overlay-holder">
						<?php pixwell_post_cat_info( $settings ); ?>
						<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'] ); ?></div>
						<div class="p-footer">
							<?php echo pixwell_post_meta_info( $settings );
							pixwell_post_readmore( $settings );
							if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
								pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
							} ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php
	}
endif;


/**
 * @param array $settings
 * loop overlay 4
 */
if ( ! function_exists( 'pixwell_post_overlay_4' ) ) :
	function pixwell_post_overlay_4( $settings = array() ) {
		$settings['cat_classes'] = 'is-relative';
		$settings                = pixwell_get_meta_setting( $settings, 'overlay_4' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h2';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-overlay p-overlay-4 f-gradient';
		if ( empty( pixwell_post_meta_info( $settings ) ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="p-feat">
				<?php pixwell_post_thumb( 'pixwell_780x0-2x', 'p-thumb is-image', false ); ?>
				<div class="content-overlay is-light-text">
					<div class="rbc-container rb-p20-gutter">
						<div class="overlay-holder">
							<?php pixwell_post_cat_info( $settings ); ?>
							<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'], 'h1' ); ?></div>
							<?php pixwell_post_summary( $settings ); ?>
							<div class="p-footer">
								<?php echo pixwell_post_meta_info( $settings );
								if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
									pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php
	}
endif;

/**
 * @param array $settings
 * loop overlay 5
 */
if ( ! function_exists( 'pixwell_post_overlay_5' ) ) :
	function pixwell_post_overlay_5( $settings = array() ) {
		$settings['cat_classes'] = 'is-relative';
		$settings                = pixwell_get_meta_setting( $settings, 'overlay_5' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h3';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-overlay p-overlay-5';
		if ( empty( pixwell_post_meta_info( $settings ) ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="p-feat">
				<?php pixwell_post_thumb( 'pixwell_280x210-2x' ); ?>
				<div class="content-overlay is-light-text">
					<div class="overlay-holder">
						<?php pixwell_post_cat_info( $settings ); ?>
						<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'] ); ?></div>
						<div class="p-footer">
							<?php echo pixwell_post_meta_info( $settings );
							if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
								pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
							} ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php
	}
endif;

/**
 * @param array $settings
 * loop overlay 6
 */
if ( ! function_exists( 'pixwell_post_overlay_6' ) ) :
	function pixwell_post_overlay_6( $settings = array() ) {
		$settings['cat_classes'] = 'is-relative';
		$settings                = pixwell_get_meta_setting( $settings, 'overlay_6' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h3';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-overlay p-overlay-6';
		if ( empty( pixwell_post_meta_info( $settings ) ) && empty( $settings['readmore'] ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="p-feat">
				<?php pixwell_post_thumb( 'pixwell_400x450', null, false ); ?>
				<div class="content-overlay is-light-text">
					<div class="overlay-holder">
						<?php pixwell_post_cat_info( $settings ); ?>
						<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'] ); ?></div>
						<div class="p-footer">
							<?php echo pixwell_post_meta_info( $settings );
							if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
								pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
							} ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php
	}
endif;


/**
 * @param array $settings
 * loop overlay 7
 */
if ( ! function_exists( 'pixwell_post_overlay_7' ) ) :
	function pixwell_post_overlay_7( $settings = array() ) {
		$settings['cat_classes'] = 'is-relative';
		$settings                = pixwell_get_meta_setting( $settings, 'overlay_7' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h2';
		}
		$post_classes   = array();
		$post_classes[] = 'p-wrap p-overlay p-overlay-7';
		if ( empty( pixwell_post_meta_info( $settings ) ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="p-feat">
				<?php pixwell_post_thumb( 'pixwell_780x0-2x', 'p-thumb is-image', false ); ?>
				<div class="content-overlay is-light-text">
					<div class="overlay-holder">
						<?php pixwell_post_cat_info( $settings ); ?>
						<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'], 'h1' ); ?></div>
						<?php pixwell_post_summary( $settings ); ?>
						<div class="p-footer">
							<?php echo pixwell_post_meta_info( $settings );
							if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
								pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
							} ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php
	}
endif;

/**
 * @param array $settings
 * loop overlay 8
 */
if ( ! function_exists( 'pixwell_post_overlay_8' ) ) :
	function pixwell_post_overlay_8( $settings = array() ) {
		$settings['cat_classes'] = 'is-relative';
		$settings                = pixwell_get_meta_setting( $settings, 'overlay_8' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h2';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-overlay p-overlay-8';
		if ( empty( pixwell_post_meta_info( $settings ) ) && empty( $settings['readmore'] ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>">
			<div class="p-feat">
				<?php pixwell_post_thumb( 'pixwell_400x600' ); ?>
				<div class="content-overlay is-light-text">
					<div class="overlay-holder">
						<?php pixwell_post_cat_info( $settings ); ?>
						<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'] ); ?></div>
						<div class="p-footer">
							<?php echo pixwell_post_meta_info( $settings );
							if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
								pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
							} ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php
	}
endif;


/**
 * @param array $settings
 * loop overlay 9
 */
if ( ! function_exists( 'pixwell_post_overlay_9' ) ) :
	function pixwell_post_overlay_9( $settings = array() ) {
		$settings['cat_classes'] = 'is-relative';
		$settings                = pixwell_get_meta_setting( $settings, 'overlay_9' );
		if ( empty( $settings['h_tag'] ) ) {
			$settings['h_tag'] = 'h2';
		}

		$post_classes   = array();
		$post_classes[] = 'p-wrap p-overlay p-overlay-9 f-gradient';
		if ( empty( pixwell_post_meta_info( $settings ) ) ) {
			$post_classes[] = 'rb-hf';
		}
		if ( empty( pixwell_get_option( 'meta_author_icon' ) ) || ! isset( $settings['entry_meta']['enabled']['author'] ) ) {
			$post_classes[] = 'no-avatar';
		} ?>
		<article class="<?php echo join( ' ', get_post_class( $post_classes ) ); ?>" data-dot="ct-nav">
			<div class="p-feat">
				<?php pixwell_post_thumb( 'pixwell_780x0-2x', 'p-thumb is-image', false ); ?>
				<div class="content-overlay is-light-text">
					<div class="rbc-container rb-p20-gutter">
						<div class="overlay-holder">
							<?php pixwell_post_cat_info( $settings ); ?>
							<div class="p-header"><?php pixwell_post_title( $settings['h_tag'], $settings['bookmark'], 'h1' ); ?></div>
							<?php pixwell_post_summary( $settings ); ?>
							<div class="p-footer">
								<?php echo pixwell_post_meta_info( $settings );
								if ( isset( $settings['entry_meta']['enabled'] ) && empty( $settings['remove_markup'] ) ) {
									pixwell_post_meta_hidden( $settings['entry_meta']['enabled'] );
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ct-nav">
				<div class="ct-nav-holder is-light-text">
					<span class="nav-image"><?php the_post_thumbnail( 'pixwell_370x250', array( 'class' => 'rb-no-lazy' ) ); ?></span>
					<p class="nav-title h4"><?php the_title(); ?></p>
					<?php pixwell_post_cat_dot(); ?>
				</div>
			</div>
		</article>
	<?php
	}
endif;

