<?php
/** render single 6 */
if ( ! function_exists( 'pixwell_single_layout_5' ) ) :
	function pixwell_single_layout_5() {
		$sidebar_name     = pixwell_get_single_sidebar_name();
		$sidebar_position = pixwell_get_single_sidebar_pos();
		$class_name       = 'site-content single-5 single-1 rbc-content-section clearfix has-sidebar is-sidebar-' . esc_attr( $sidebar_position ); ?>
		<div class="<?php echo esc_attr( $class_name ); ?>">
			<div class="wrap rbc-container rb-p20-gutter">
				<div class="rbc-wrap">
					<main id="main" class="site-main rbc-content" role="main">
						<div class="single-content-wrap">
							<?php pixwell_single_open_tag(); ?>
							<header class="single-header entry-header">
								<?php
								pixwell_breadcrumb('');
								pixwell_single_cat_info();
								pixwell_single_title();
								pixwell_single_sponsor();
								pixwell_single_tagline();
								pixwell_single_entry_meta(); ?>
							</header>
							<?php
							pixwell_single_shop_top();
							pixwell_single_entry(); ?>
							<?php
							pixwell_single_close_tag();
							pixwell_render_author_box();
							pixwell_single_navigation();
							pixwell_single_comment();
							?>
						</div>
					</main>
					<?php pixwell_render_sidebar( $sidebar_name ); ?>
				</div>
			</div>
			<?php pixwell_single_related(); ?>
		</div>
	<?php
	}
endif;

