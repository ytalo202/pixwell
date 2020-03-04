<?php
/** render single 1 */
if ( ! function_exists( 'pixwell_single_layout_1' ) ) :
	function pixwell_single_layout_1() {
		$sidebar_name     = pixwell_get_single_sidebar_name();
		$sidebar_position = pixwell_get_single_sidebar_pos();
		$format           = pixwell_get_post_format();
		$class_name       = 'site-content single-1 rbc-content-section clearfix has-sidebar is-sidebar-' . esc_attr( $sidebar_position );
		if ( empty( $sidebar_name ) || ! is_active_sidebar( $sidebar_name ) ) {
			$class_name .= ' no-active-sidebar';
		} else {
			$class_name .= ' active-sidebar';
		} ?>
		<div class="<?php echo esc_attr( $class_name ); ?>">
			<div class="wrap rbc-container rb-p20-gutter">
				<div class="rbc-wrap">
					<main id="main" class="site-main rbc-content" role="main">
						<div class="single-content-wrap">
							<?php pixwell_single_open_tag(); ?>
							<header class="single-header entry-header">
								<?php
								pixwell_breadcrumb( '' );
								pixwell_single_cat_info();
								pixwell_single_title();
								pixwell_single_sponsor();
								pixwell_single_tagline();
								pixwell_single_entry_meta();
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
									default:
										if ( 'none' == $sidebar_position ) {
											pixwell_single_featured_image( 'pixwell_780x0-2x' );
										} else {
											pixwell_single_featured_image( 'pixwell_780x0' );
										}
										break;
								} ?>
							</header>
							<?php pixwell_single_shop_top(); ?>
							<?php pixwell_single_entry();
							pixwell_single_close_tag(); ?>
							<div class="single-box clearfix">
								<?php pixwell_render_author_box();
								pixwell_single_navigation();
								pixwell_single_comment();
								?>
							</div>

						</div>
					</main>
					<?php
					if ( is_active_sidebar( $sidebar_name ) ) {
						pixwell_render_sidebar( $sidebar_name );
					} ?>
				</div>
			</div>
			<?php pixwell_single_related(); ?>
		</div>
	<?php
	}
endif;

