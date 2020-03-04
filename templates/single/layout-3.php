<?php
/** render single 3 */
if ( ! function_exists( 'pixwell_single_layout_3' ) ) :
	function pixwell_single_layout_3() {
		$sidebar_name     = pixwell_get_single_sidebar_name();
		$sidebar_position = pixwell_get_single_sidebar_pos();
		$format           = pixwell_get_post_format();
		$class_name       = 'site-content single-3 rbc-content-section clearfix has-sidebar is-sidebar-' . $sidebar_position;
		?>
		<div class="<?php echo esc_attr( $class_name ); ?>">
			<?php pixwell_single_open_tag(); ?>
			<header class="single-header entry-header">
				<?php pixwell_single_featured_image( 'full', 'parallax-thumb is-fullscreen' ); ?>
				<div class="single-header-holder">
					<div class="breadcrumb-overlay is-light-text">
						<?php pixwell_breadcrumb(); ?>
					</div>
					<div class="single-header-overlay is-light-text header-centred">
						<div class="rbc-container rb-p20-gutter">
							<?php
							pixwell_single_cat_info();
							pixwell_single_title();
							pixwell_single_sponsor();
							pixwell_single_tagline();
							pixwell_single_entry_meta(); ?>
						</div>
					</div>
				</div>
			</header>
			<div class="wrap rbc-container rb-p20-gutter">
				<div class="rbc-wrap">
					<main id="main" class="site-main rbc-content" role="main">
						<div class="single-content-wrap">
							<?php
							switch ( $format ) {
								case 'video' :
									pixwell_single_featured_video();
									break;
								case 'audio' :
									pixwell_single_featured_audio();
									break;
								case 'gallery' :
									if ( 'none' == $sidebar_position ) {
										pixwell_single_featured_gallery( 'pixwell_780x0-2x' );
									} else {
										pixwell_single_featured_gallery( 'pixwell_780x0' );
									}
									break;
							}
							pixwell_single_shop_top();
							pixwell_single_entry(); ?>
							<div class="single-box clearfix">
								<?php
								pixwell_render_author_box();
								pixwell_single_navigation();
								pixwell_single_comment(); ?>
							</div>
						</div>
					</main>
					<?php pixwell_render_sidebar( $sidebar_name ); ?>
				</div>
			</div>

			<?php
			pixwell_single_close_tag();
			pixwell_single_related();
			?>
		</div>
	<?php
	}
endif;
