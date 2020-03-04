<?php
/**
 * The template for displaying category pages
 */
get_header();
$pixwell_settings = pixwell_get_settings_category_page(); ?>
	<div class="site-content">
		<?php if ( have_posts() ) :
			$pixwell_classes   = array();
			$pixwell_classes[] = 'page-header category-header';
			if ( ! empty( $pixwell_settings['header_image_bg'][0] ) ) {
				$pixwell_url       = wp_get_attachment_image_url( $pixwell_settings['header_image_bg'][0], 'full' );
				$pixwell_classes[] = 'is-header-bg';
			} elseif ( ! empty( $pixwell_settings['global_header_image_bg']['url'] ) ) {
				$pixwell_classes[] = 'is-header-bg';
				$pixwell_url       = $pixwell_settings['global_header_image_bg']['url'];
			} else {
				$pixwell_classes[] = 'is-header-solid';
			}
			if ( ! empty( $pixwell_settings['header_text_style'] ) && 'light' == $pixwell_settings['header_text_style'] ) {
				$pixwell_classes[] = 'is-light-text';
			}
			if ( ! empty( $pixwell_settings['header_style'] ) ) {
				$pixwell_classes[] = 'is-header-' . esc_attr( $pixwell_settings['header_style'] );
			} else {
				$pixwell_classes[] = 'is-header-center';
			}
			$pixwell_classes = join( ' ', $pixwell_classes ); ?>
			<header class="<?php echo esc_attr( $pixwell_classes ); ?>">
				<?php if ( empty( $pixwell_settings['header_style'] ) || 'center' == $pixwell_settings['header_style'] ) : ?>
					<div class="header-holder">
						<?php if ( ! empty( $pixwell_url ) ) : ?>
							<div id="category-header-bg" data-background="<?php echo esc_url( $pixwell_url ); ?>"></div>
						<?php endif; ?>
						<div class="rbc-container rb-p20-gutter">
							<div class="header-content">
								<?php pixwell_breadcrumb( '' ); ?>
								<h1 class="archive-title category-title"><?php single_cat_title( '', true ); ?></h1>
								<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
							</div>
						</div>
					</div>
				<?php elseif('left' == $pixwell_settings['header_style']) : ?>
					<div class="header-holder">
						<?php if ( ! empty( $pixwell_url ) ) : ?>
							<div id="category-header-bg" data-background="<?php echo esc_url( $pixwell_url ); ?>"></div>
						<?php endif; ?>
						<div class="header-left-holder">
							<div class="header-content">
								<?php pixwell_breadcrumb( '' ); ?>
								<h1 class="archive-title category-title"><?php single_cat_title( '', true ); ?></h1>
								<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
							</div>
						</div>
					</div>
				<?php else: ?>
					<div class="rbc-container rb-p20-gutter">
						<div class="header-holder">
							<?php if ( ! empty( $pixwell_url ) ) : ?>
								<div id="category-header-bg" data-background="<?php echo esc_url( $pixwell_url ); ?>"></div>
							<?php endif; ?>
							<div class="header-boxed-holder">
								<div class="header-content">
									<?php pixwell_breadcrumb( '' ); ?>
									<h1 class="archive-title category-title"><?php single_cat_title( '', true ); ?></h1>
									<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</header>
		<?php endif; ?>
		<?php if ( have_posts() ) :
			pixwell_render_blog( $pixwell_settings );
		else :
			pixwell_render_section_empty_content();
		endif; ?>
	</div>
<?php get_footer();