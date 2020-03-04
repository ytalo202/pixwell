<?php
/* single custom post type layout */
if ( ! function_exists( 'pixwell_single_layout_cpt' ) ) :
	function pixwell_single_layout_cpt() {
		?>
		<div class="site-content single-wrap single-4 single-cpt clearfix none-sidebar">
			<div class="wrap rbc-container rb-p20-gutter clearfix">
				<main id="main" class="site-main single-inner" role="main">
					<?php pixwell_single_open_tag( false ); ?>
					<header class="single-header entry-header">
						<div class="header-centred">
							<?php
							pixwell_breadcrumb();
							pixwell_single_cat_info();
							pixwell_single_title();
							pixwell_single_tagline();
							pixwell_single_entry_meta();
							?>
						</div>
						<?php pixwell_single_featured_image( 'pixwell_780x0-2x' ); ?>
					</header>
					<div class="single-body entry">
						<div class="single-content">
							<div class="entry-content clearfix">
								<?php the_content();
								echo '<div class="clearfix"></div>';
								wp_link_pages( array(
									'before' => '<aside class="page-links pagination-wrap pagination-number">' . pixwell_translate( 'pages' ),
									'type'   => 'plain',
									'after'  => '</aside>',
								) );
								pixwell_single_like();
								?>
							</div>
						</div>
					</div>
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
		</div>
	<?php
	}
endif;

