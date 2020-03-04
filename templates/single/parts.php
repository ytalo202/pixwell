<?php
/**
 * @param string $class_name
 * render single title
 */
if ( ! function_exists( 'pixwell_single_title' ) ) :
	function pixwell_single_title( $classes = '' ) {
		$class_name = 'single-title entry-title';
		if ( ! empty( $classes ) ) {
			$class_name .= ' ' . esc_attr( $classes );
		}
		$disable_markup = pixwell_get_schema_markup();
		if ( $disable_markup ) : ?>
			<h1 class="<?php echo trim( $class_name ); ?>"><?php the_title(); ?></h1>
		<?php else : ?>
			<h1 itemprop="headline" class="<?php echo trim( $class_name ); ?>"><?php the_title(); ?></h1>
		<?php endif;
	}
endif;

/**
 * @return string
 * render single post title
 */
if ( ! function_exists( 'pixwell_single_tagline' ) ) :
	function pixwell_single_tagline( $classes = '' ) {
		$tagline = rb_get_meta( 'title_tagline' );
		if ( empty( $tagline ) ) {
			return false;
		}
		$class_name = 'single-tagline';
		if ( ! empty( $classes ) ) {
			$class_name .= ' ' . $classes;
		} ?>
		<div class="<?php echo esc_attr( $class_name ); ?>"><h6 class="h4"><?php echo wp_kses_post( $tagline ); ?></h6>
		</div>
	<?php
	}
endif;


/** pixwell_single_sponsor */
if ( ! function_exists( 'pixwell_single_sponsor' ) ) :
	function pixwell_single_sponsor() {

		$sponsor = pixwell_is_sponsor_post();
		if ( ! $sponsor ) {
			return;
		}

		$label       = pixwell_get_option( 'sponsor_label' );
		$sponsor_url = rb_get_meta( 'sponsor_url' );

		if ( empty( $label ) ) {
			$label = esc_html__( 'SPONSORED BY', 'pixwell' );
		}
		if ( empty( $sponsor_url ) ) {
			$sponsor_url = '#';
		}
		$sponsor_name = rb_get_meta( 'sponsor_name' );
		$sponsor_logo = rb_get_meta( 'sponsor_logo' );
		if ( ! empty( $sponsor_logo ) ) {
			$sponsor_logo = wp_get_attachment_url( $sponsor_logo );
		} ?>
		<aside class="single-sponsor">
			<div class="sponsor-inner">
				<i class="rbi rbi-bell sponsor-icon"></i><span class="sponsor-label"><?php echo esc_html( $label ); ?></span>
				<a class="sponsor-link" href="<?php echo esc_url( $sponsor_url ); ?>" target="_blank" rel="nofollow">
					<?php if ( ! empty( $sponsor_logo ) ) : ?>
						<img class="sponsor-logo" src="<?php echo esc_url( $sponsor_logo ); ?>" alt="<?php esc_attr( $sponsor_name ); ?>"/>
					<?php else : ?>
						<?php echo esc_html( $sponsor_name ); ?>
					<?php endif; ?>
				</a>
			</div>
		</aside>
	<?php
	}
endif;


/**
 * single post content
 */
if ( ! function_exists( 'pixwell_single_entry' ) ) :
	function pixwell_single_entry() {
		$left_section   = pixwell_get_single_left_section();
		$disable_markup = pixwell_get_schema_markup();
		$classes        = 'single-content';
		if ( ! empty( $left_section ) ) {
			$classes = 'single-content has-left-section';
		}
		pixwell_single_section_top(); ?>
		<div class="single-body entry">
		<div class="<?php echo esc_attr( $classes ); ?>">
			<?php if ( ! empty( $left_section ) ):
				pixwell_single_left_section();
			endif;
			if ($disable_markup) : ?>
			<div class="entry-content clearfix">
				<?php else : ?>
				<div class="entry-content clearfix" itemprop="articleBody">
					<?php endif;
					the_content();
					pixwell_single_review();

					wp_link_pages( array(
						'before' => '<aside class="page-links pagination-wrap pagination-number">' . pixwell_translate( 'pages' ),
						'type'   => 'plain',
						'after'  => '</aside>',
					) );
					pixwell_single_like();
					?>
				</div>
			</div>
			<?php
			ob_start();
			pixwell_single_tag();
			pixwell_single_source();
			pixwell_single_via();
			$entry_footer = ob_get_clean();
			if ( ! empty ( $entry_footer ) ) : ?>
				<div class="entry-footer">
					<div class="inner">
						<?php
						pixwell_single_tag();
						pixwell_single_source();
						pixwell_single_via();
						?>
					</div>
				</div>
			<?php endif;
			pixwell_single_shop_bottom();
			pixwell_single_reaction();
			pixwell_single_share_bottom();
			pixwell_single_section_bottom();
			?>
		</div>
		<?php
		if ( function_exists( 'pixwell_schema_article' ) ) {
			pixwell_schema_article();
		}
	}
endif;


/** single reaction box */
if ( ! function_exists( 'pixwell_single_reaction' ) ) :
	function pixwell_single_reaction() {

		if ( ! shortcode_exists( 'rb_show_reaction' ) ) {
			return false;
		}

		$reaction = pixwell_get_option( 'single_post_reaction' );
		if ( empty( $reaction ) ) {
			return false;
		}

		$reaction_title = pixwell_get_option( 'single_post_reaction_title' ); ?>
		<aside class="reaction-section">
			<div class="reaction-section-title">
				<h3><?php echo esc_html( apply_filters( 'the_title', $reaction_title ) ); ?></h3>
			</div>
			<div class="reaction-section-content">
				<?php echo do_shortcode( '[rb_show_reaction]' ); ?>
			</div>
		</aside>
	<?php
	}
endif;


/**
 * single top section
 */
if ( ! function_exists( 'pixwell_single_section_top' ) ):
	function pixwell_single_section_top() {
		$section = rb_get_meta( 'single_top' );
		if ( ! empty( $section ) && '1' == $section && is_active_sidebar( 'pixwell_single_top' ) ) : ?>
			<div class="single-top-section single-widget-section">
				<?php dynamic_sidebar( 'pixwell_single_top' ); ?>
			</div>
		<?php endif;
	}
endif;


/**
 * single bottom section
 */
if ( ! function_exists( 'pixwell_single_section_bottom' ) ):
	function pixwell_single_section_bottom() {
		do_action( 'pixwell_single_bottom' );

		$section = rb_get_meta( 'single_bottom' );
		if ( ! empty( $section ) && '1' == $section && is_active_sidebar( 'pixwell_single_bottom' ) ) : ?>
			<div class="single-bottom-section single-widget-section">
				<?php dynamic_sidebar( 'pixwell_single_bottom' ); ?>
			</div>
		<?php endif;
	}
endif;


/**
 * render tag
 */
if ( ! function_exists( 'pixwell_single_tag' ) ) :
	function pixwell_single_tag() {
		$tag = pixwell_get_option( 'single_post_tag' );
		if ( empty( $tag ) ) {
			return false;
		}
		$tags = get_the_tags();
		if ( ! empty( $tags ) && is_array( $tags ) ) : ?>
			<div class="single-post-tag tags">
				<span class="tag-label"><?php echo pixwell_translate( 'tags' ); ?></span>
				<?php foreach ( $tags as $tags_el ) : ?>
					<a rel="tag" href="<?php echo get_tag_link( $tags_el->term_id ) ?>" title="<?php echo esc_attr( $tags_el->name ) ?>"><?php echo esc_html( $tags_el->name ); ?></a>
				<?php endforeach; ?>
			</div>
		<?php
		endif;
	}
endif;


/**
 * render source
 */
if ( ! function_exists( 'pixwell_single_source' ) ) :
	function pixwell_single_source() {

		$source = pixwell_get_option( 'single_post_source' );
		if ( empty( $source ) ) {
			return false;
		}

		$source_name = rb_get_meta( 'source_name' );
		$source_url  = rb_get_meta( 'source_url' );

		if (! empty( $source_name ) ) : ?>
			<div class="single-post-tag sources">
				<span class="tag-label"><?php echo pixwell_translate( 'source' ); ?></span>
				<?php if ( ! empty( $source_url ) ) : ?>
					<a href="<?php echo esc_url( $source_url ); ?>" title="<?php echo esc_attr( $source_name ); ?>" target="_blank" rel="nofollow"><?php echo esc_html( $source_name ); ?></a>
				<?php else : ?>
					<span class="source"><?php echo esc_html( $source_name ); ?></span>
				<?php endif; ?>
			</div>
		<?php endif;
	}
endif;


/**
 * render post via
 */
if ( ! function_exists( 'pixwell_single_via' ) ) :
	function pixwell_single_via() {

		$via = pixwell_get_option( 'single_post_via' );
		if ( empty( $via ) ) {
			return false;
		}

		$via_name = rb_get_meta( 'via_name' );
		$via_url  = rb_get_meta( 'via_url' );
		if ( ! empty( $via_name ) ) : ?>
			<div class="single-post-tag via">
				<span class="tag-label"><?php echo pixwell_translate( 'via' ); ?></span>
				<?php if ( ! empty( $via_url ) ) : ?>
					<a href="<?php echo esc_url( $via_url ); ?>" title="<?php echo esc_attr( $via_name ); ?>" target="_blank" rel="nofollow"><?php echo esc_html( $via_name ); ?></a>
				<?php else : ?>
					<span class="via-el"><?php echo esc_html( $via_name ); ?></span>
				<?php endif; ?>
			</div>
		<?php endif;
	}
endif;


/**
 * single navigation
 */
if ( ! function_exists( 'pixwell_single_navigation' ) ):
	function pixwell_single_navigation() {

		$navigation = pixwell_get_option( 'single_post_navigation' );
		if ( empty( $navigation ) ) {
			return false;
		}

		$post_previous = get_adjacent_post( false, '', true );
		$post_next     = get_adjacent_post( false, '', false );

		if ( empty( $post_previous ) && empty( $post_next ) ) {
			return false;
		} ?>
		<nav class="single-post-box box-nav rb-n20-gutter">
			<?php if ( ! empty( $post_previous ) ) : ?>
				<div class="nav-el nav-left rb-p20-gutter">
					<a href="<?php echo get_permalink( $post_previous->ID ); ?>" rel="prev">
						<span class="nav-label"><i class="rbi rbi-angle-left"></i><span><?php echo pixwell_translate( 'previous_article' ); ?></span></span>
						<span class="nav-inner h4">
							<?php echo get_the_post_thumbnail( $post_previous->ID, 'thumbnail' ); ?>
							<span class="nav-title p-url"><?php echo get_the_title( $post_previous->ID ); ?></span>
						</span>
					</a>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $post_next ) ) : ?>
				<div class="nav-el nav-right rb-p20-gutter">
					<a href="<?php echo get_permalink( $post_next->ID ); ?>" rel="next">
						<span class="nav-label"><span><?php echo pixwell_translate( 'next_article' ); ?></span><i class="rbi rbi-angle-right"></i></span>
						<span class="nav-inner h4">
							<?php echo get_the_post_thumbnail( $post_next->ID, 'thumbnail' ); ?>
							<span class="nav-title p-url"><?php echo get_the_title( $post_next->ID ); ?></span>
						</span>
					</a>
				</div>
			<?php endif; ?>
		</nav>
	<?php
	}
endif;


/**
 * single open tag
 */
if ( ! function_exists( 'pixwell_single_open_tag' ) ):
function pixwell_single_open_tag( $override = null ) {
	if ( ! isset( $override ) ) {
		$disable_markup = pixwell_get_schema_markup();
	} else {
		$disable_markup = $override;
	}
if ( $disable_markup ) : ?>
<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
<?php else: ?>
<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="<?php echo pixwell_protocol(); ?>://schema.org/Article">
<?php endif;
}
endif;

/**
 * single close tag
 */
if ( ! function_exists( 'pixwell_single_close_tag' ) ):
function pixwell_single_close_tag() {
	?>
</article>
<?php
}
endif;

/**
 * featured credit
 */
if ( ! function_exists( 'pixwell_feat_credit' ) ) :
	function pixwell_feat_credit() {
		$credit_text = rb_get_meta( 'feat_credit' );
		if ( ! empty( $credit_text ) ): ?>
			<span class="image-caption is-overlay is-hide"><?php echo wp_kses_post( $credit_text ); ?></span>
		<?php
		else :
			$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
			$caption      = wp_get_attachment_caption( $thumbnail_id );
			if ( ! empty( $caption ) ) : ?>
				<span class="image-caption is-overlay is-hide"><?php echo wp_kses_post( $caption ); ?></span>
			<?php endif;
		endif;
	}
endif;


/**
 * @param string $layout
 * render featured image
 */
if ( ! function_exists( 'pixwell_single_featured_image' ) ) :
	function pixwell_single_featured_image( $size = '', $classes = 'single-feat' ) {

		if ( ! has_post_thumbnail() ) {
			return false;
		}

		$setting = pixwell_get_single_feat_size();
		if ( 'full' == $setting || empty( $size ) ) {
			$size = 'pixwell_780x0-2x';
		} ?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<div class="p-thumb">
				<?php the_post_thumbnail( $size, array( 'class' => 'wp-post-image rb-no-lazy' ) ); ?>
			</div>
			<?php pixwell_feat_credit(); ?>
		</div>
	<?php
	}
endif;


/**
 * render featured video
 */
if ( ! function_exists( 'pixwell_single_featured_video' ) ) :
	function pixwell_single_featured_video() {
		$class_name = 'single-feat post-video-outer';
		$auto_play  = pixwell_get_video_autoplay();
		if ( ! empty( $auto_play ) ) {
			$class_name .= ' is-autoplay';
		} ?>
		<div class="<?php echo esc_attr( $class_name ); ?>">
			<div class="embed-holder">
				<?php echo pixwell_get_embed_video_url(); ?>
			</div>
		</div>
	<?php
	}
endif;

/** render featured audio */
if ( ! function_exists( 'pixwell_single_featured_audio' ) ) :
	function pixwell_single_featured_audio() {
		?>
		<div class="single-feat post-audio-outer">
			<div class="embed-holder">
				<?php echo pixwell_get_embed_audio_html(); ?>
			</div>
		</div>
	<?php
	}
endif;

/** render featured gallery */
if ( ! function_exists( 'pixwell_single_featured_gallery' ) ) :
	function pixwell_single_featured_gallery( $size = '', $size_thumb = 'pixwell_780x0-thumb' ) {

		$data = rb_get_meta( 'gallery_data' );
		if ( empty( $data ) ) {
			return false;
		}
		$data = explode( ',', $data );
		if ( empty( $size ) ) {
			$size = 'pixwell_780x0-2x';
		}
		$layout = pixwell_get_single_gallery_layout();

		if ( 'list' == $layout ) : ?>
			<div class="post-gallery-outer p-gallery-list">
				<?php pixwell_gallery_list( $data, $size, $size_thumb ); ?>
			</div>
		<?php elseif ( 'grid' == $layout ) : ?>
			<div class="post-gallery-outer post-gallery-grid">
				<?php pixwell_gallery_grid( $data, $size ); ?>
			</div>
		<?php
		else : ?>
			<div class="post-gallery-outer">
				<?php pixwell_gallery_slider( $data, $size ); ?>
			</div>
		<?php endif;
	}
endif;

/** render gallery list */
if ( ! function_exists( 'pixwell_gallery_list' ) ) {
	function pixwell_gallery_list( $data = array(), $size , $thumb_size ) {
		if ( is_array( $data ) ) :
			$index    = 0;
			$lazyload = pixwell_get_option( 'lazy_load' );

			foreach ( $data as $attachment_id ) :
				if ( ! empty( $attachment_id ) ) : ?>
					<a href="#" class="gallery-popup-link gallery-el" data-gallery="#gallery-popup-<?php echo get_the_ID(); ?>" data-index="<?php echo esc_attr( $index ); ?>">
						<?php if ( ! empty( $lazyload ) && function_exists( 'rb_add_lazyload' ) ) {
							echo rb_add_lazyload( wp_get_attachment_image( $attachment_id, $size ), wp_get_attachment_url( $attachment_id, $thumb_size ) );
						} else {
							echo wp_get_attachment_image( $attachment_id, $size );
						}
						$caption = wp_get_attachment_caption( $attachment_id );
						if ( ! empty( $caption ) ) : ?>
							<span class="image-caption is-overlay is-hide"><?php echo wp_kses_post( $caption ); ?></span>
						<?php endif; ?>
					</a>
					<?php $index ++;
				endif;
			endforeach;
			pixwell_gallery_popup( $data );
		endif;
	}
}

/** render gallery slider */
if ( ! function_exists( 'pixwell_gallery_slider' ) ) {
	function pixwell_gallery_slider( $data = array(), $size ) {
		if ( is_array( $data ) ) :
			$index = 0; ?>
			<div class="load-animation"></div>
			<div class="rb-owl p-gallery-slider per-load">
				<?php foreach ( $data as $gallery_el ) : ?>
					<a href="#" class="gallery-popup-link gallery-el" data-gallery="#gallery-popup-<?php echo get_the_ID(); ?>" data-index="<?php echo esc_attr( $index ); ?>">
						<?php echo wp_get_attachment_image( $gallery_el, $size );
						$caption = wp_get_attachment_caption( $gallery_el );
						if ( ! empty( $caption ) ) : ?>
							<span class="image-caption is-overlay is-hide"><?php echo wp_kses_post( $caption ); ?></span>
						<?php endif; ?>
					</a>
					<?php  $index ++;
				endforeach; ?>
			</div>
			<?php
			pixwell_gallery_popup( $data );
		endif;
	}
}

/** render gallery grid */
if ( ! function_exists( 'pixwell_gallery_grid' ) ) {
	function pixwell_gallery_grid( $data = array(), $size ) {

		$layout = pixwell_get_single_layout();
		if ( 1 == $layout || 4 == $layout ) {
			pixwell_single_featured_image( $size );
		}
		if ( is_array( $data ) ) :
			$index = 0; ?>
			<div class="gallery-grid-wrap">
				<span class="gallery-list-label h4"><a href="#" class="gallery-popup-link" data-gallery="#gallery-popup-<?php echo get_the_ID(); ?>" data-index="0"><?php echo pixwell_translate( 'view_gallery' ); ?></a></span>
				<div class="gallery-grid-content">
					<?php foreach ( $data as $attachment_id ) :
						if ( ! empty( $attachment_id ) ) : ?>
							<a href="#" class="gallery-popup-link gallery-el" data-gallery="#gallery-popup-<?php echo get_the_ID(); ?>" data-index="<?php echo esc_attr( $index ); ?>">
								<?php echo wp_get_attachment_image( $attachment_id, 'thumbnail' ); ?>
							</a>
							<?php $index ++;
							if ( $index > 5 ) {
								break;
							}
						endif;
					endforeach; ?>
				</div>
			</div>
			<?php pixwell_gallery_popup( $data );
		endif;
	}
}

/** render gallery popup */
if ( ! function_exists( 'pixwell_gallery_popup' ) ) {
	function pixwell_gallery_popup( $data = array() ) {
		$post_id = get_the_ID(); ?>
		<aside id="gallery-popup-<?php echo esc_attr( $post_id ); ?>" class="mfp-hide">
			<?php foreach ( $data as $attachment_id ) :
				if ( ! empty( $attachment_id ) ) :
					$attachment = get_post( $attachment_id );
					$title      = get_the_title( $attachment_id );
					$caption    = '';
					$desc       = '';
					if ( ! empty( $attachment->post_excerpt ) ) {
						$caption = $attachment->post_excerpt;
					}
					if ( ! empty( $attachment->post_content ) ) {
						$desc = wpautop( $attachment->post_content );
					} ?>
					<div class="gallery-el">
						<?php pixwell_gallery_selection( $data ); ?>
						<div class="gallery-popup-holder">
							<span class="image-title is-hidden"><?php echo esc_html( $title ); ?></span>
							<div class="gallery-popup-image">
								<?php echo wp_get_attachment_image( $attachment_id, 'full' ); ?>
							</div>
							<?php if ( ! empty( $caption ) || ! empty( $desc ) ) : ?>
								<div class="gallery-popup-entry is-light-text">
									<h4 class="image-popup-caption h3"><?php echo wp_kses_post( $caption ); ?></h4>
									<div class="image-popup-description entry"><?php echo wp_kses_post( $desc ); ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif;
			endforeach; ?>
		</aside>
	<?php
	}
}

/**
 * @param array $data
 * gallery selection list
 */
if ( ! function_exists( 'pixwell_gallery_selection' ) ) {
	function pixwell_gallery_selection( $data = array() ) {
		if ( ! empty( $data ) ):
			$index = 0; ?>
			<div class="gallery-popup-selection">
				<?php foreach ( $data as $attachment_id ) :
					echo '<a href="#" class="gallery-popup-select" data-index="' . $index . '">';
					echo wp_get_attachment_image( $attachment_id, 'thumbnail' );
					echo '</a>';
					$index ++;
				endforeach; ?>
			</div>
		<?php endif;
	}
}

/**
 * @return bool
 * render like box
 */
if ( ! function_exists( 'pixwell_single_like' ) ) :
	function pixwell_single_like() {
		$box = pixwell_get_option( 'single_post_like' );
		if ( empty( $box ) || ! function_exists( 'pixwell_render_like' ) ) {
			return false;
		}
		pixwell_render_like();
	}
endif;

/** single review */
if ( ! function_exists( 'pixwell_single_review' ) ):
	function pixwell_single_review() {

		$review = pixwell_is_post_review();
		if ( ! $review ) {
			return false;
		}

		$review_summary = rb_get_meta( 'review_summary' );
		$review_feat    = rb_get_meta( 'review_feat' );
		$review_pros    = rb_get_meta( 'review_pros' );
		$review_cons    = rb_get_meta( 'review_cons' );
		$review_meta    = rb_get_meta( 'review_meta' );
		$review_style   = rb_get_meta( 'review_style' );
		$review_users   = rb_get_meta( 'review_users' );

		$total_stars = get_post_meta( get_the_ID(), 'pixwell_review_stars', true );
		$user_rating = get_post_meta( get_the_ID(), 'pixwell_user_rating', true );

		$classes = 'review-box-wrap clearfix';
		if ( empty( $review_style ) || '1' != $review_style ) {
			$classes .= ' ' . 'is-dark is-light-text';
		}

		if ( empty( $review_feat ) ) {
			$classes .= ' ' . 'no-feat';
		}

		$data = array(
			array(
				'review_label' => rb_get_meta( 'review_label_1' ),
				'review_star'  => rb_get_meta( 'review_star_1' ),
			),
			array(
				'review_label' => rb_get_meta( 'review_label_2' ),
				'review_star'  => rb_get_meta( 'review_star_2' ),
			),
			array(
				'review_label' => rb_get_meta( 'review_label_3' ),
				'review_star'  => rb_get_meta( 'review_star_3' ),
			),
			array(
				'review_label' => rb_get_meta( 'review_label_4' ),
				'review_star'  => rb_get_meta( 'review_star_4' ),
			),
			array(
				'review_label' => rb_get_meta( 'review_label_5' ),
				'review_star'  => rb_get_meta( 'review_star_5' ),
			),
			array(
				'review_label' => rb_get_meta( 'review_label_6' ),
				'review_star'  => rb_get_meta( 'review_star_6' ),
			),
			array(
				'review_label' => rb_get_meta( 'review_label_7' ),
				'review_star'  => rb_get_meta( 'review_star_7' ),
			)
		); ?>
		<aside class="<?php echo esc_attr( $classes ); ?>">
			<div class="inner">
				<div class="review-header">
					<?php if ( ! empty( $review_feat ) ) : ?>
						<div class="review-feat"><?php echo wp_get_attachment_image( $review_feat, 'pixwell_780x0' ) ?></div>
					<?php endif; ?>
					<h4 class="review-heading h2"><?php echo pixwell_translate( 'review_overview' ); ?></h4></div>
				<div class="review-info is-light-text">
					<i class="rbi rbi-star-full"></i>
					<span class="meta-total h2"><?php echo esc_html( $total_stars ); ?></span>
					<?php if ( ! empty( $review_meta ) ) : ?>
						<span class="meta-description h6"><?php echo wp_kses_post( $review_meta ); ?></span>
					<?php endif; ?>
				</div>
				<div class="review-content">
					<?php foreach ( $data as $element ) :
						if ( empty( $element['review_label'] ) || empty( $element['review_star'] ) ) {
							continue;
						}
						$element['review_star'] = absint( $element['review_star'] );
						if ( $element['review_star'] > 5 ) {
							$element['review_star'] = 5;
						} elseif ( $element['review_star'] < 1 ) {
							$element['review_star'] = 1;
						} ?>
						<div class="review-el">
							<span class="review-label h6"><?php echo esc_html( $element['review_label'] ); ?></span>
							<span class="review-stars">
								<?php for ( $i = 1; $i <= 5; $i ++ ) {
									if ( $i <= $element['review_star'] ) {
										echo '<i class="rbi rbi-star-full"></i>';
									} else {
										echo '<i class="rbi rbi-star"></i>';
									}
								} ?>
							</span>
						</div>
					<?php endforeach; ?>
					<div class="review-footer">
						<?php if ( ! empty( $review_pros ) || ! empty( $review_cons ) ) : ?>
							<div class="pros-cons-wrap rb-row">
								<?php if ( ! empty( $review_pros ) ) :
									$review_pros = explode( '/', $review_pros ); ?>
									<div class="review-pros rb-col-m12 rb-col-t6">
										<h6 class="h4">
											<i class="rbi rbi-thumbs-up"></i><?php echo pixwell_translate( 'pros' ); ?>
										</h6>
										<ul>
											<?php foreach ( $review_pros as $content ) : ?>
												<li><?php echo esc_html( $content ); ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
								<?php if ( ! empty( $review_cons ) ) :
									$review_cons = explode( '/', $review_cons ); ?>
									<div class="review-cons rb-col-m12 rb-col-t6">
										<h6 class="h4">
											<i class="rbi rbi-thumbs-down"></i><?php echo pixwell_translate( 'cons' ); ?>
										</h6>
										<ul>
											<?php foreach ( $review_cons as $content ) : ?>
												<li><?php echo esc_html( $content ); ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>
						<?php endif;
						if ( ! empty( $review_summary ) )  : ?>
							<div class="summary-wrap">
								<h6 class="h3"><?php echo pixwell_translate( 'summary' ); ?></h6>
								<div class="summary-content">
									<?php echo wp_kses_post( $review_summary ); ?>
								</div>
							</div>
						<?php endif;
						if ( ! empty( $review_users ) && 1 == $review_users && ! empty( $user_rating['average'] ) ) : ?>
							<div class="user-reviews">
								<div class="user-review-headline">
									<i class="rbi-thumbs-up rbi"></i>
									<h6 class="h4"><?php echo pixwell_translate( 'user_rating' ); ?></h6>
									<?php if ( ! empty( $user_rating['total'] ) ) : ?>
										<span class="total-vote"><?php echo '(' . esc_html( $user_rating['total'] ) . ' ' . pixwell_translate( 'votes' ) . ')'; ?></span>
									<?php endif; ?>
								</div>
								<span class="average-stars"><i class="rbi rbi-star-full"></i><span class="average-score h3"><?php echo esc_html( $user_rating['average'] ); ?></span></span>
							</div>
						<?php endif;
						?>
					</div>
				</div>
			</div>
		</aside>
	<?php
	}
endif;

/**
 * single comment template
 */
if ( ! function_exists( 'pixwell_single_comment' ) ):
	function pixwell_single_comment( $is_page = false ) {

		if ( post_password_required() || ! comments_open() ) {
			return false;
		}

		if ( $is_page ) {
			$button = false;
		} else {
			$button = pixwell_get_option( 'single_post_comment_btn' );

			$review      = pixwell_is_post_review();
			$review_users = rb_get_meta( 'review_users' );

			if ( $review && ! empty( $review_users ) && 1 == $review_users ) {
				comments_template( '/templates/single/reviews.php' );
				return false;
			}
		}

		/** render comment */
		$comment_number = get_comments_number();
		$classes        = 'comment-box-content clearfix';
		if ( $comment_number > 1 ) {
			$text = sprintf( pixwell_translate( 'comments' ), esc_attr( $comment_number ) );
		} elseif ( 1 == $comment_number ) {
			$text = pixwell_translate( 'comment' );
		} else {
			$text = pixwell_translate( 'leave_a_reply' );
			$classes .= ' no-comment';
		}
		if ( ! empty( $button ) ) {
			$classes .= ' is-hidden';
		} ?>
		<aside class="comment-box-wrap">
			<div class="comment-box-header clearfix">
				<h4 class="h3"><i class="rbi rbi-comments"></i><?php echo esc_html( $text ); ?></h4>
				<?php if ( ! empty( $button ) )  : ?>
					<a href="#" class="show-post-comment box-comment-btn h6"><?php echo pixwell_translate( 'view_comment' ); ?></a>
				<?php endif; ?>
			</div>
			<div class="<?php echo esc_attr( $classes ); ?>"><?php comments_template(); ?></div>
		</aside>
	<?php
	}
endif;


/**
 * render single post share top
 */
if ( ! function_exists( 'pixwell_single_share_top' ) ):
	function pixwell_single_share_top() {
		$share_top = pixwell_get_option( 'share_top' );

		if ( empty( $share_top ) || ! function_exists( 'pixwell_render_share_icon' ) ) {
			return false;
		}

		$settings = array(
			'facebook'  => pixwell_get_option( 'share_top_facebook' ),
			'twitter'   => pixwell_get_option( 'share_top_twitter' ),
			'pinterest' => pixwell_get_option( 'share_top_pinterest' ),
			'whatsapp'  => pixwell_get_option( 'share_top_whatsapp' ),
			'linkedin'  => pixwell_get_option( 'share_top_linkedin' ),
			'tumblr'    => pixwell_get_option( 'share_top_tumblr' ),
			'reddit'    => pixwell_get_option( 'share_top_reddit' ),
			'vk'        => pixwell_get_option( 'share_top_vk' ),
			'email'     => pixwell_get_option( 'share_top_email' ),
		);

		if ( ! array_filter( $settings ) ) {
			return false;
		} ?>
		<aside class="single-top-share is-light-share tooltips-n">
			<?php pixwell_render_share_icon( $settings ); ?>
		</aside>
	<?php
	}
endif;


/**
 * single share at bottom
 */
if ( ! function_exists( 'pixwell_single_share_bottom' ) ):
	function pixwell_single_share_bottom() {

		$share_bottom = pixwell_get_option( 'share_bottom' );

		if ( empty( $share_bottom ) || ! function_exists( 'pixwell_render_share_icon' ) ) {
			return false;
		}

		$settings = array(
			'facebook'  => pixwell_get_option( 'share_bottom_facebook' ),
			'twitter'   => pixwell_get_option( 'share_bottom_twitter' ),
			'pinterest' => pixwell_get_option( 'share_bottom_pinterest' ),
			'whatsapp'  => pixwell_get_option( 'share_bottom_whatsapp' ),
			'linkedin'  => pixwell_get_option( 'share_bottom_linkedin' ),
			'tumblr'    => pixwell_get_option( 'share_bottom_tumblr' ),
			'reddit'    => pixwell_get_option( 'share_bottom_reddit' ),
			'vk'        => pixwell_get_option( 'share_bottom_vk' ),
			'email'     => pixwell_get_option( 'share_bottom_email' ),
		);

		if ( ! array_filter( $settings ) ) {
			return false;
		} ?>
		<aside class="single-bottom-share">
			<div class="share-header"><?php pixwell_render_total_shares(); ?></div>
			<div class="share-content is-light-share tooltips-n">
				<?php pixwell_render_share_text( $settings ); ?>
			</div>
		</aside>
	<?php
	}
endif;


/** render total shares */
if ( ! function_exists( 'pixwell_render_total_shares' ) ) {
	function pixwell_render_total_shares() {
		$total_share = pixwell_get_option( 'total_share' );
		if ( empty( $total_share ) || ! function_exists( 'pixwell_get_total_shares' ) ) : ?>
			<span class="share-label"><?php echo pixwell_translate( 'shares' ); ?></span>
		<?php
		else :
			$forgery = rb_get_meta( 'start_share' );
			$total   = pixwell_get_total_shares( $forgery ); ?>
			<span class="share-total h2"><?php echo esc_html( $total ); ?></span>
			<?php if ( 1 == $total ) : ?>
			<span class="share-label"><?php echo pixwell_translate( 'share' ); ?></span>
		<?php else : ?>
			<span class="share-label"><?php echo pixwell_translate( 'shares' ); ?></span>
		<?php
		endif;
		endif;
	}
}


/**
 * single share at left
 */
if ( ! function_exists( 'pixwell_single_share_left' ) ):
	function pixwell_single_share_left() {

		$share_left = pixwell_get_option( 'share_left' );
		if ( empty( $share_left ) || ! function_exists( 'pixwell_render_share_icon' ) ) {
			return false;
		}

		$settings = array(
			'facebook'  => pixwell_get_option( 'share_left_facebook' ),
			'twitter'   => pixwell_get_option( 'share_left_twitter' ),
			'pinterest' => pixwell_get_option( 'share_left_pinterest' ),
			'whatsapp'  => pixwell_get_option( 'share_left_whatsapp' ),
			'linkedin'  => pixwell_get_option( 'share_left_linkedin' ),
			'tumblr'    => pixwell_get_option( 'share_left_tumblr' ),
			'reddit'    => pixwell_get_option( 'share_left_reddit' ),
			'vk'        => pixwell_get_option( 'share_left_vk' ),
			'email'     => pixwell_get_option( 'share_left_email' ),
		);

		if ( ! array_filter( $settings ) ) {
			return false;
		} ?>
		<aside class="single-left-share is-light-share">
			<div class="share-header"><?php pixwell_render_total_shares(); ?></div>
			<div class="share-content">
				<?php pixwell_render_share_icon( $settings ); ?>
			</div>
		</aside>
	<?php
	}
endif;


/**
 * render single post meta tags info
 */
if ( ! function_exists( 'pixwell_single_meta_info' ) ) :
	function pixwell_single_meta_info() {

		$meta_info_manager = pixwell_get_option( 'single_post_entry_meta' );
		unset( $meta_info_manager['enabled']['placebo'] );

		if ( empty( $meta_info_manager['enabled'] ) || ! is_array( $meta_info_manager['enabled'] ) ) {
			return false;
		} ?>
		<div class="single-meta-info p-meta-info">
			<?php
			foreach ( $meta_info_manager['enabled'] as $key => $val ) {
				switch ( $key ) {
					case 'author' :
						pixwell_post_meta_author();
						break;
					case 'date' :
						pixwell_post_meta_date();
						break;
					case 'cat' :
						pixwell_post_meta_cat( false );
						break;
					case 'tag' :
						pixwell_post_meta_tag();
						break;
					case 'comment' :
						pixwell_post_meta_comment();
						break;
					case 'view' :
						pixwell_post_meta_view();
						break;
					case 'custom' :
						pixwell_post_meta_custom();
						break;
				};
			} ?>
		</div>
	<?php
	}
endif;


/**
 * single category icon
 */
if ( ! function_exists( 'pixwell_single_cat_info' ) ) {
	function pixwell_single_cat_info() {
		$settings                = array();
		$settings['cat_info']    = pixwell_get_option( 'single_post_cat_info' );
		$settings['custom_info'] = pixwell_get_option( 'single_post_custom_info' );
		$settings['cat_classes'] = 'is-relative single-cat-info';
		pixwell_post_cat_info( $settings );
	}
}


/**comment-box-header
 * single related
 */
if ( ! function_exists( 'pixwell_single_related' ) ):
	function pixwell_single_related() {

		global $wp_query;
		if ( isset( $wp_query->query_vars['rbsnp'] ) ) {
			$setting = pixwell_get_option( 'ajax_next_related' );
			if ( empty( $setting ) ) {
				return false;
			}
		}

		$box_related = pixwell_get_option( 'single_post_related' );

		if ( empty( $box_related ) ) {
			return false;
		}
		$post_id  = get_the_ID();
		$settings = array();

		$settings['posts_per_page'] = pixwell_get_option( 'single_post_related_total' );
		$settings['layout']         = pixwell_get_option( 'single_post_related_layout' );
		$settings['post_not_in']    = $post_id;

		if ( empty( $settings['layout'] ) ) {
			$settings['layout'] = 'fw_grid_1';
		} ?>
		<aside class="single-related-outer">
			<div class="rbc-container rb-p20-gutter">
				<?php pixwell_fw_related( $settings ); ?>
			</div>
		</aside>
	<?php
	}
endif;


/**
 * single entry meta
 */
if ( ! function_exists( 'pixwell_single_entry_meta' ) ) :
	function pixwell_single_entry_meta() {

		$sponsor = pixwell_is_sponsor_post();
		if ( $sponsor ) {
			return;
		}

		$avatar    = pixwell_get_option( 'single_post_avatar' );
		$share_top = pixwell_get_option( 'share_top' );

		$class_name   = array();
		$class_name[] = 'single-entry-meta';
		if ( ! empty( $avatar ) ) {
			$class_name[] = 'has-avatar';
		}
		if ( empty( $share_top ) ) {
			$class_name[] = 'no-share';
		}
		$class_name = implode( ' ', $class_name ); ?>
		<div class="<?php echo esc_attr( $class_name ); ?>">
			<?php if ( ! empty( $avatar ) ) {
				pixwell_single_avatar();
			} ?>
			<div class="inner">
				<?php
				pixwell_single_meta_info();
				pixwell_single_share_top();
				?>
			</div>
		</div>
	<?php
	}
endif;


/**
 * @return string
 * single custom info
 */
if ( ! function_exists( 'pixwell_single_custom_info' ) ) {
	function pixwell_single_custom_info() {
		$settings                = array();
		$settings['custom_info'] = pixwell_get_option( 'single_post_custom_info' );
		pixwell_post_custom_info( $settings );
	}
}


/**
 * @return string
 * render single post author info thumbnail
 */
if ( ! function_exists( 'pixwell_single_avatar' ) ) :
	function pixwell_single_avatar() {
		?>
		<span class="single-meta-avatar">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 60, '', get_the_author_meta( 'display_name' ) ); ?>
			</a>
		</span>
	<?php
	}
endif;

/** left section */
if ( ! function_exists( 'pixwell_single_left_section' ) ) :
	function pixwell_single_left_section() {
		?>
		<aside class="single-left-section">
			<div class="section-inner">
				<?php
				pixwell_single_share_left();
				pixwell_single_left_article();
				?>
			</div>
		</aside>
	<?php
	}
endif;

/** single left article */
if ( ! function_exists( 'pixwell_single_left_article' ) ) :
	function pixwell_single_left_article() {
		$setting = pixwell_get_single_left_article();
		if ( empty( $setting ) ) {
			return false;
		}
		$header     = pixwell_get_option( 'single_post_left_article_header' );
		$query_data = pixwell_query_related( array(
			'no_found_rows'  => true,
			'posts_per_page' => 1,
			'orderby'        => 'rand',
			'meta_key'       => '_thumbnail_id',
		) );

		if ( ! method_exists( $query_data, 'have_posts' ) || ! $query_data->have_posts() ) {
			return false;
		} ?>
		<div class="single-left-article">
			<span class="left-article-label"><?php echo apply_filters( 'widget_title', $header ) ?></span>
			<?php while ( $query_data->have_posts() ) :
				$query_data->the_post();
				if ( has_post_thumbnail() ) : ?>
					<div class="p-feat">
						<?php pixwell_post_thumb( 'pixwell_280x210', 'p-thumb', false, false ); ?>
					</div>
				<?php
				endif;
				pixwell_post_title( 'h6' ); ?>
			<?php endwhile;
			wp_reset_postdata(); ?>
		</div>
	<?php
	}
endif;


/** related inside article */
if ( ! function_exists( 'pixwell_rbc_related' ) ) :
	function pixwell_rbc_related( $attrs ) {
		$settings = shortcode_atts( array(
			'title' => esc_html__( 'You Might also Enjoy', 'pixwell' ),
			'total' => 2,
			'ids'   => '',
			'style' => 'dark'
		), $attrs );

		if ( empty( $settings['ids'] ) ) {
			$query_data = pixwell_query_related( array(
				'no_found_rows'  => true,
				'posts_per_page' => $settings['total'],
			) );
		} else {
			$query_data = pixwell_query( array(
				'no_found_rows'  => true,
				'posts_per_page' => $settings['total'],
				'post_in'        => esc_attr( $settings['ids'] )
			) );
		}
		if ( empty( $query_data ) || ! method_exists( $query_data, 'have_posts' ) || ! $query_data->have_posts() ) {
			return false;
		}

		$classes = 'rb-related';
		if ( $settings['style'] == 'dark' ) {
			$classes .= ' is-dark-style is-light-text';
		}
		ob_start(); ?>
		<aside class="<?php echo esc_attr( $classes ); ?>">
			<h6 class="rb-related-header h3"><?php echo apply_filters( 'widget_title', $settings['title'] ) ?></h6>

			<div class="rb-related-content rb-row rb-n15-gutter">
				<?php while ( $query_data->have_posts() ) :
					$query_data->the_post(); ?>
					<div class="rb-col-t6 rb-col-m12 rb-p15-gutter">
						<div class="rb-related-el">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="p-feat">
									<?php pixwell_post_thumb( 'pixwell_280x210', 'p-thumb', false, false ); ?>
								</div>
							<?php endif;
							pixwell_post_title( 'h6' ); ?>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</div>
		</aside>
		<?php
		return ob_get_clean();
	}
endif;





/** shop the post top */
if ( ! function_exists( 'pixwell_single_shop_top' ) ) {
	function pixwell_single_shop_top() {
		$shop_post = rb_get_meta( 'shop_post' );
		$position  = rb_get_meta( 'shop_post_position' );
		if ( ! empty( $shop_post ) && '1' == $shop_post && ! empty( $position ) && 'top' == $position ) {
			pixwell_single_shop( 'shop-top' );
		}

		return false;

	}
}

/** shop the post bottom */
if ( ! function_exists( 'pixwell_single_shop_bottom' ) ) {
	function pixwell_single_shop_bottom() {
		$shop_post = rb_get_meta( 'shop_post' );
		$position  = rb_get_meta( 'shop_post_position' );
		if ( ! empty( $shop_post ) && '1' == $shop_post && ! empty( $position ) && 'bottom' == $position ) {
			pixwell_single_shop( 'shop-bottom' );
		}
	}

}

/** shop the post */
if ( ! function_exists( 'pixwell_single_shop' ) ) {
	function pixwell_single_shop( $classes = '' ) {
		$settings = pixwell_get_single_shop();
		if ( ! empty( $settings['embed'] ) ) :
			$class_name = 'shopthepost shopthepost-single embed ' . esc_attr( $classes ); ?>
			<div id="shopthepost" class="<?php echo esc_attr( $class_name ); ?>">
				<?php if ( ! empty( $settings['title'] ) ) : ?>
					<div class="shopthepost-header block-header"><h3 class="block-title"><?php echo esc_html( $settings['title'] ) ?></h3></div>
				<?php endif; ?>
				<div class="shopthepost-inner">
					<?php echo do_shortcode( $settings['embed'] ); ?>
				</div>
			</div>
		<?php
		else :
			if ( ! class_exists( 'WooCommerce' ) ) {
				return false;
			}
			if ( ! empty( $settings['wc'] ) ) :
				$ids      = esc_attr( trim( $settings['wc'] ) );
				if ( empty( $ids ) ) {
					return false;
				}
				$ids = explode( ',', $ids );
				if ( ! is_array( $ids ) ) {
					return false;
				}
				foreach ( $ids as $id => $val ) {
					$ids[ $id ] = intval( $val );
				}
				$ids = implode(',', $ids);

				$class_name = 'shopthepost shopthepost-single wc ' . esc_attr( $classes ); ?>
				<div id="shopthepost" class="<?php echo esc_attr( $class_name ); ?>">
					<?php if ( ! empty( $settings['title'] ) ) : ?>
						<div class="shopthepost-header block-header"><h3 class="block-title"><?php echo esc_html( $settings['title'] ) ?></h3></div>
					<?php endif; ?>
					<div class="shopthepost-inner">
						<?php echo do_shortcode( '[products ids="' . esc_attr( $ids ) . '" columns="4"]' ); ?>
					</div>
				</div>
			<?php endif;
		endif;
	}
}

