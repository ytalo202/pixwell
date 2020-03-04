<?php
/* single layout 4 */
if ( ! function_exists( 'pixwell_single_layout_4' ) ) :
	function pixwell_single_layout_4() {
		$format = pixwell_get_post_format(); ?>
		<div class="site-content single-wrap single-4 clearfix none-sidebar">
			<div class="wrap rbc-container rb-p20-gutter clearfix">
				<main id="main" class="site-main single-inner" role="main">
					<?php pixwell_single_open_tag(); ?>
					<header class="single-header entry-header">
						<div class="header-centred">
							<?php
							pixwell_breadcrumb();
							pixwell_single_cat_info();
							pixwell_single_title();
							pixwell_single_sponsor();
							pixwell_single_tagline();
							pixwell_single_entry_meta();
							?>
						</div>
						<?php
						switch ( $format ) {
							case 'video' :
								pixwell_single_featured_video();
								break;
							case 'audio' :
								pixwell_single_featured_audio();
								break;
							case 'gallery' :
								pixwell_single_featured_gallery( 'pixwell_780x0-2x' );
								break;
							default:
								pixwell_single_featured_image( 'pixwell_780x0-2x' );
								break;
						} ?>
					</header>
					<?php
					pixwell_single_shop_top();
					pixwell_single_entry(); ?>
					<?php pixwell_single_close_tag(); ?>
					<div class="single-box clearfix">
						<?php
						pixwell_render_author_box();
						pixwell_single_navigation();
						pixwell_single_comment();
						?>
					</div>
				</main>
			</div>
			<?php pixwell_single_related(); ?>
		</div>
	<?php
	}
endif;

