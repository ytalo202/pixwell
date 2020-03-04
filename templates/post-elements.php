<?php
/**
 * @param string $h_tag
 * @param string $classes
 * render post title
 */
if ( ! function_exists( 'pixwell_post_title' ) ) {
	function pixwell_post_title( $h_tag = 'h2', $bookmark = false, $classes = '' ) {

		echo '<' . esc_attr( $h_tag ) . ' class="' . trim( 'entry-title ' . esc_attr( $classes ) ) . '">'; ?>
		<a class="p-url" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"><?php
			if ( ! empty( get_the_title() ) ) {
				the_title();
			} else {
				echo get_the_date();
			} ?></a>
		<?php if ( ! empty( $bookmark ) && function_exists( 'pixwell_bookmark' ) ) : pixwell_bookmark(); endif; ?>
		<?php echo '</' . esc_attr( $h_tag ) . '>';
	}
}


/**
 * @param string $classes
 * render readmore btn
 */
if ( ! function_exists( 'pixwell_post_readmore' ) ) {
	function pixwell_post_readmore( $settings = array() ) {
		if ( empty( $settings['readmore'] ) ) {
			return;
		} ?>
		<a class="btn p-link" href="<?php echo get_permalink(); ?>"><span><?php echo esc_html( $settings['readmore'] ); ?></span><i class="rbi rbi-arrow-right"></i></a>
	<?php
	}
}

/**
 * @return bool
 * render icon gallery
 */
if ( ! function_exists( 'pixwell_render_format_icon' ) ) {
	function pixwell_render_format_icon() {
		switch ( get_post_format() ) {
			case 'video' :
				$icon = pixwell_get_option( 'post_icon_video' );
				if ( empty( $icon ) ) {
					return;
				}
				echo '<aside class="p-format format-video"><i class="rbi rbi-play-button"></i></aside>';
				break;
			case 'gallery' :
				$icon = pixwell_get_option( 'post_icon_gallery' );
				if ( empty( $icon ) ) {
					return;
				}
				echo '<aside class="p-format format-gallery"><i class="rbi rbi-gallery-light"></i></aside>';
				break;
			case 'audio' :
				$icon = pixwell_get_option( 'post_icon_audio' );
				if ( empty( $icon ) ) {
					return;
				}
				echo '<aside class="p-format format-radio"><i class="rbi rbi-vinyl"></i></aside>';
				break;
		}
	}
}


/**
 * @param string $classes
 * @param int    $length
 * post excerpt
 */
if ( ! function_exists( 'pixwell_post_summary' ) ) :
	function pixwell_post_summary( $settings = array() ) {
		if ( ! empty( $settings['summary'] ) && 'moretag' == $settings['summary'] ) : ?>
			<p class="entry-content clearfix"><?php the_content( '' ); ?></p>
		<?php
		else :
			if ( ! empty( $settings['excerpt'] ) && '-1' == $settings['excerpt'] ) {
				return;
			}
			if ( ! empty( $settings['summary'] ) && 'tagline' == $settings['summary'] ) :
				pixwell_post_tagline( $settings );
			else :
				$last_dot = false;
				$text = get_post_field('post_excerpt', get_the_ID());

				if ( ! empty( $text ) && ! empty( $settings['excerpt'] ) ) {
					$text     = wp_trim_words( $text, intval( $settings['excerpt'] ), '' );
					$last_dot = true;
				}
				if ( empty( $text ) && ! empty( $settings['excerpt'] ) ) {
					$text     = get_the_content( '' );
					$text     = strip_shortcodes( $text );
					$text     = str_replace( ']]>', ']]&gt;', $text );
					$text     = wp_trim_words( $text, intval( $settings['excerpt'] ), '' );
					$text     = wp_strip_all_tags( trim( $text ) );
					$last_dot = true;
				}
				if ( empty( $text ) ) {
					return;
				} ?>
				<p class="entry-summary"><?php echo esc_html( $text );
					if ( $last_dot == true ): ?>
						<span class="summary-dot"><?php esc_html_e( '...', 'pixwell' ) ?></span><?php endif; ?></p>
			<?php endif;
		endif;
	}
endif;


/**
 * @return string
 * render single post title
 */
if ( ! function_exists( 'pixwell_post_tagline' ) ) :
	function pixwell_post_tagline( $settings ) {
		$tagline = rb_get_meta( 'title_tagline' );
		if ( ! empty( $tagline ) ) :
			if ( ! empty( $settings['excerpt'] ) ) : $tagline = wp_trim_words( $tagline, intval( $settings['excerpt'] ), '' ); ?>
				<p class="entry-summary"><?php echo wp_kses_post( $tagline ); ?>
					<span class="summary-dot"><?php esc_html_e( '...', 'pixwell' ) ?></span></p>
			<?php else : ?>
				<p class="entry-summary"><?php echo wp_kses_post( $tagline ); ?></p>
			<?php endif;
		endif;
	}
endif;


/**
 * @param array $override
 * meta info
 */
if ( ! function_exists( 'pixwell_post_meta_info' ) ) {
	function pixwell_post_meta_info( $settings = array() ) {

		/** check advert post */
		$sponsor = pixwell_is_sponsor_post();
		if ( $sponsor ) {
			return pixwell_post_meta_sponsor();
		}
		if ( ! empty( $settings['entry_meta']['enabled'] ) && is_array( $settings['entry_meta']['enabled'] ) ) :

			/** check shop post */
			$shop_post = pixwell_is_shop_post();
			if ( $shop_post ) {
				return pixwell_post_meta_shop_post();
			}

			$post_id = get_the_ID();
			ob_start();
			foreach ( $settings['entry_meta']['enabled'] as $key => $val ) {
				switch ( $key ) {
					case 'date' :
						pixwell_post_meta_date( $post_id );
						break;
					case 'author' :
						pixwell_post_meta_author( $post_id );
						break;
					case 'cat' :
						pixwell_post_meta_cat();
						break;
					case 'tag' :
						pixwell_post_meta_tag( $post_id );
						break;
					case 'comment' :
						pixwell_post_meta_comment();
						break;
					case 'view' :
						pixwell_post_meta_view( $post_id );
						break;
					case 'custom' :
						pixwell_post_meta_custom( $post_id );
						break;
				};
			}

			if ( ! empty( $settings['bookmark'] ) && function_exists( 'pixwell_bookmark' ) ) :
				echo '<span class="meta-info-el mobile-bookmark">';
				pixwell_bookmark();
				echo '</span>';
			endif;

			$meta_html = ob_get_clean();

			if ( ! empty( $meta_html ) ) {
				return '<aside class="p-meta-info">' . $meta_html . '</aside>';
			} else {
				return false;
			}

		endif;

		return false;
	}
}


/**
 * meta info date
 */
if ( ! function_exists( 'pixwell_post_meta_date' ) ) {
	function pixwell_post_meta_date( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$human_time = pixwell_get_option( 'human_time' );
		if ( ! empty( $human_time ) ) {
			$timestamp = get_the_time( 'U', $post_id, current_time( 'timestamp' ) );
		}
		$meta_date_icon = pixwell_get_option( 'meta_date_icon' ); ?>
		<span class="meta-info-el meta-info-date">
			<?php if ( ! empty( $meta_date_icon ) ) : ?><i class="rbi rbi-clock"></i><?php endif; ?>
			<?php if ( ! empty( $timestamp ) ) : ?>
			<abbr class="date published" title="<?php echo get_the_date( DATE_W3C, $post_id ); ?>"><?php echo sprintf( pixwell_translate( 'ago' ), human_time_diff( $timestamp, current_time( 'timestamp' ) ) ); ?></abbr>
			<?php else : ?>
			<abbr class="date published" title="<?php echo get_the_date( DATE_W3C, $post_id ); ?>"><?php echo get_the_date( '', $post_id ); ?></abbr>
			<?php endif; ?>
			<abbr class="updated" title="<?php echo get_the_modified_date( DATE_W3C, $post_id ); ?>"><?php echo get_the_modified_date( '', $post_id ); ?></abbr>
		</span>
	<?php
	}
}

/**
 * meta info author
 */
if ( ! function_exists( 'pixwell_post_meta_author' ) ) {
	function pixwell_post_meta_author( $post_id = '' ) {
		if ( empty( $post_id ) ) {
			$author_id = get_post_field( 'post_author', get_the_ID() );
		} else {
			$author_id = get_post_field( 'post_author', $post_id );
		} ?>
		<span class="meta-info-el meta-info-author author vcard">
			<span class="screen-reader-text"><?php esc_html_e( 'Posted by', 'pixwell' ); ?></span>
			<?php $author_avatar = pixwell_get_option( 'meta_author_icon' );
			if ( ! empty( $author_avatar ) && ! is_single() ) : ?>
				<span class="meta-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email', $author_id ), 22, '', get_the_author_meta( 'display_name', $author_id ) ); ?></span>
				<a class="url fn" rel="author" href="<?php echo get_author_posts_url( $author_id ) ?>"><?php the_author_meta( 'display_name', $author_id ); ?></a>
			<?php
			else :
				$meta_author_text = pixwell_get_option( 'meta_author_text' );
				if ( ! empty( $meta_author_text ) && ! is_single() ) : ?>
					<em class="meta-label"><?php echo esc_html( $meta_author_text ) . ' '; ?></em>
				<?php endif; ?>
				<a class="url fn" rel="author" href="<?php echo get_author_posts_url( $author_id ) ?>"><?php the_author_meta( 'display_name', $author_id ); ?></a>
			<?php endif; ?>
		</span>
	<?php
	}
}


/**
 * @param bool $primary
 * meta info category
 */
if ( ! function_exists( 'pixwell_post_meta_cat' ) ) {
	function pixwell_post_meta_cat( $primary = true ) {
		$categories = get_the_category();

		if ( empty( $categories ) ) {
			return;
		}

		$primary_category = rb_get_meta( 'primary_cat' );
		if ( empty( $primary_category ) || false === $primary ) :
			if ( array( $categories ) ) : ?>
				<span class="meta-info-el meta-info-cat">
					<?php foreach ( $categories as $category ) : ?>
						<a class="cat-<?php echo esc_attr( $category->term_id ); ?>" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
					<?php endforeach; ?>
				</span>
			<?php endif;
		else :
			$primary_category_name = get_cat_name( $primary_category ); ?>
			<span class="meta-info-el meta-info-cat">
				<a class="cat-<?php echo esc_attr( $primary_category ); ?>" href="<?php echo esc_url( get_category_link( $primary_category ) ); ?>"><?php echo esc_html( $primary_category_name ); ?></a>
			</span>
		<?php endif;
	}
}

/**
 * meta info tag
 */
if ( ! function_exists( 'pixwell_post_meta_tag' ) ) {
	function pixwell_post_meta_tag( $post_id = '' ) {
		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}
		$all_tags = get_the_tags();
		if ( is_array( $all_tags ) ) : ?>
			<span class="meta-info-el meta-info-tag">
			<em class="meta-label"><?php echo pixwell_translate( 'tags' ) . ' '; ?></em>
				<?php foreach ( $all_tags as $tag ) : ?>
					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" rel="tag"><?php echo esc_attr( $tag->name ); ?></a>
				<?php endforeach; ?>
			</span>
		<?php endif;
	}
}

/**
 * meta info comment
 */
if ( ! function_exists( 'pixwell_post_meta_comment' ) ) {
	function pixwell_post_meta_comment() {

		if ( ! comments_open() ) {
			return;
		}

		$meta_comment_icon = pixwell_get_option( 'meta_comment_icon' );
		$total_comments    = get_comments_number(); ?>
		<span class="meta-info-el meta-info-comment">
			<a href="<?php echo get_comments_link() ?>">
				<?php if ( ! empty( $meta_comment_icon ) ) : ?>
					<i class="rbi rbi-comments"></i><span><?php
						if ( 0 == $total_comments ) {
							echo pixwell_translate( 'add_comment' );
						} elseif ( 1 == $total_comments ) {
							echo pixwell_translate( 'comment' );
						} else {
							echo sprintf( pixwell_translate( 'comments' ), $total_comments );
						} ?></span>
				<?php
				else :
					if ( 0 == $total_comments ) {
						echo pixwell_translate( 'add_comment' );
					} elseif ( 1 == $total_comments ) {
						echo pixwell_translate( 'comment' );
					} else {
						echo sprintf( pixwell_translate( 'comments' ), $total_comments );
					};
				endif; ?>
			</a>
	</span>
	<?php
	}
}


/**
 * meta info view
 */
if ( ! function_exists( 'pixwell_post_meta_view' ) ) {
	function pixwell_post_meta_view( $post_id = '' ) {

		if ( ! function_exists( 'pvc_get_post_views' ) ) {
			return;
		}

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$total_view = pvc_get_post_views( $post_id );
		$fake_view  = rb_get_meta( 'start_view', $post_id );
		if ( ! empty( $fake_view ) ) {
			$total_view = intval( $total_view ) + intval( $fake_view );
		}
		if ( empty( $total_view ) ) {
			return;
		}

		$meta_view_icon = pixwell_get_option( 'meta_view_icon' ); ?>
		<span class="meta-info-el meta-info-view">
			<a href="<?php echo get_permalink() ?>" title="<?php esc_attr( get_the_title() ); ?>">
				<?php if ( ! empty( $meta_view_icon ) ) : ?>
					<i class="rbi rbi-trend"></i><span><?php
						if ( 1 == $total_view ) {
							echo pixwell_translate( 'view' );
						} else {
							echo sprintf( pixwell_translate( 'views' ), $total_view );
						} ?></span>
				<?php
				else :
					if ( 1 == $total_view ) {
						echo pixwell_translate( 'view' );
					} else {
						echo sprintf( pixwell_translate( 'views' ), $total_view );
					}
				endif; ?>
			</a>
		</span>
	<?php
	}
}

/**
 * meta info view
 */
if ( ! function_exists( 'pixwell_post_meta_custom' ) ) {
	function pixwell_post_meta_custom( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$meta_custom = pixwell_get_option( 'meta_custom' );
		if ( empty( $meta_custom ) ) {
			return;
		}

		$custom_info = rb_get_meta( 'meta_custom', $post_id );
		if ( empty( $custom_info ) ) {
			return;
		}

		$meta_custom_icon = pixwell_get_option( 'meta_custom_icon' );
		$meta_custom_text = pixwell_get_option( 'meta_custom_text' );  ?>
		<span class="meta-info-el meta-info-custom">
			<?php if ( ! empty( $meta_custom_icon ) ) : ?>
				<i class="rbi <?php echo esc_attr( $meta_custom_icon ); ?>"></i>
				<span><?php echo esc_html( $custom_info . ' ' . $meta_custom_text ); ?></span>
			<?php
			else :
				echo esc_html( $custom_info . ' ' . $meta_custom_text );
			endif; ?>
		</span>
	<?php
	}
}

/**
 * @param string $size
 * @param string $classes
 * featured image
 */
if ( ! function_exists( 'pixwell_post_thumb' ) ) {
	function pixwell_post_thumb( $size = 'full', $override_classes = '', $format = true, $edit_link = true ) {

		$class_name = 'p-thumb is-image';
		if ( ! empty( $override_classes ) ) {
			$class_name = $override_classes;
		} ?>
		<figure class="<?php echo esc_attr( $class_name ); ?>">
			<a href="<?php echo get_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"><?php the_post_thumbnail( $size ); ?></a>
		</figure>
		<?php if ( $edit_link && current_user_can( 'edit_posts' ) ) : ?>
			<?php edit_post_link( esc_html__( 'edit', 'pixwell' ) ); ?>
		<?php endif;

		if ( ! empty( $format ) ) {
			pixwell_render_format_icon();
		}
	}
}


/**
 * @param string $classes
 *
 * @return string
 * render post category info
 */
if ( ! function_exists( 'pixwell_post_cat_info' ) ) {
	function pixwell_post_cat_info( $settings ) {

		if ( empty( $settings['cat_info'] ) && empty( $settings['custom_info'] ) ) {
			return;
		}

		$categories       = get_the_category();
		$primary_category = rb_get_meta( 'primary_cat' );

		$class_name   = array();
		$class_name[] = 'p-cat-info';
		if ( ! empty( $settings['cat_classes'] ) ) {
			$class_name[] = $settings['cat_classes'];
		} else {
			$class_name[] = 'is-absolute';
		}
		$class_name = implode( ' ', $class_name ); ?>
		<aside class="<?php echo esc_attr( $class_name ); ?>">
			<?php if ( ! empty( $settings['cat_info'] ) ) : ?>
				<?php if ( ( ! empty( $settings['cat_primary'] ) && 'none' == $settings['cat_primary'] ) || empty( $primary_category ) ) :
					if ( ! empty( $categories ) && is_array( $categories ) ) :
						foreach ( $categories as $category ) :
							echo '<a class="cat-info-el cat-info-id-' . esc_attr( $category->term_id ) . '" href="' . get_category_link( $category->term_id ) . '" rel="category">';
							echo esc_html( $category->name );
							echo '</a>';
						endforeach;
					endif;
				else :
					$primary_category_name = get_cat_name( $primary_category );
					echo '<a class="cat-info-el cat-info-id-' . esc_attr( $primary_category ) . '" href="' . get_category_link( $primary_category ) . '" rel="category">';
					echo esc_html( $primary_category_name );
					echo '</a>';
				endif; ?>
			<?php endif; ?>
			<?php pixwell_post_custom_info( $settings ); ?>
		</aside>
	<?php
	}
}


/**
 * @param array $override
 * meta info
 */
if ( ! function_exists( 'pixwell_post_custom_info' ) ) {
	function pixwell_post_custom_info( $settings = array() ) {

		if ( empty( $settings['custom_info'] ) ) {
			return;
		}

		$meta_custom = pixwell_get_option( 'meta_custom' );
		if ( empty( $meta_custom ) ) {
			return;
		}

		$custom_info = rb_get_meta( 'meta_custom' );
		if ( empty( $custom_info ) ) {
			return;
		}

		$meta_custom_icon = pixwell_get_option( 'meta_custom_icon' );
		$meta_custom_text = pixwell_get_option( 'meta_custom_text' );  ?>
		<span class="additional-meta">
			<?php if ( ! empty( $meta_custom_icon ) ) : ?>
				<i class="rbi <?php echo esc_attr( $meta_custom_icon ); ?>"></i>
			<?php endif; ?>
			<span><?php echo esc_html( $custom_info . ' ' . $meta_custom_text ); ?></span>
		</span>
	<?php
	}
}


/**
 * review info
 */
if ( ! function_exists( 'pixwell_post_review_info' ) ) {
	function pixwell_post_review_info( $settings ) {

		if ( empty( $settings['review'] ) ) {
			return;
		}
		$review = pixwell_is_post_review();
		if ( empty( $review ) ) {
			return;
		}

		$total_score = get_post_meta( get_the_ID(), 'pixwell_review_stars', true );
		$review_meta = rb_get_meta( 'review_meta' ); ?>
		<aside class="p-review-info is-light-text">
			<i class="rbi rbi-star-full"></i>
			<span class="meta-total h4"><?php echo esc_html( $total_score ); ?></span>
			<?php if ( ! empty( $review_meta ) ) : ?>
				<span class="meta-description h6"><?php echo esc_html( $review_meta ); ?></span><?php endif; ?>
		</aside>
	<?php
	}
}


/**
 * @param string $classes
 *
 * @return string
 * render post category dot for small list
 */
if ( ! function_exists( 'pixwell_post_cat_dot' ) ) {
	function pixwell_post_cat_dot() {
		$categories       = get_the_category();
		$primary_category = rb_get_meta( 'primary_cat' ); ?>
		<span class="p-cat-dot">
			<?php if ( empty( $primary_category ) ) :
				if ( ! empty( $categories ) && is_array( $categories ) ) :
					foreach ( $categories as $category ) : ?>
						<i class="cat-dot-el cat-info-id-<?php echo esc_attr( $category->term_id ); ?>"></i>
						<?php break;
					endforeach;
				endif;
			else : ?>
				<i class="cat-dot-el cat-info-id-<?php echo esc_attr( $primary_category ); ?>"></i>
			<?php endif; ?>
		</span>
	<?php
	}
}


/**
 * microdatas for posts
 */
if ( ! function_exists( 'pixwell_post_meta_hidden' ) ) :
	function pixwell_post_meta_hidden( $meta_info ) {
		?>
		<aside class="hidden-meta is-hidden">
			<?php if ( empty( $meta_info['author'] ) ) : ?>
				<span class="author vcard is-hidden">
				<a class="url fn" rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), 22, '', get_the_author_meta( 'display_name' ) ); ?>
					<?php the_author_meta( 'display_name' ); ?>
				</a>
				</span>
			<?php endif;
			if ( empty( $meta_info['date'] ) ) : ?>
				<span class="post-date is-hidden">
					<abbr class="date published" title="<?php echo get_the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></abbr>
					<abbr class="updated" title="<?php echo get_the_modified_date( DATE_W3C ); ?>"><?php echo get_the_modified_date(); ?></abbr>
				</span>
			<?php endif;
			if ( empty( $meta_info['tag'] ) ) :
				$all_tags = get_the_tags();
				if ( is_array( $all_tags ) ) : ?>
					<span class="p-tags is-hidden">
					<?php foreach ( $all_tags as $tag ) : ?>
						<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" rel="tag"><?php echo esc_attr( $tag->name ); ?></a>
					<?php endforeach; ?>
					</span>
				<?php endif;
			endif; ?>
		</aside>
	<?php
	}
endif;


/** pixwell_post_meta_sponsor */
if ( ! function_exists( 'pixwell_post_meta_sponsor' ) ) :
	function pixwell_post_meta_sponsor() {

		$label       = pixwell_get_option( 'sponsor_label' );
		$sponsor_url = rb_get_meta( 'sponsor_url' );

		if ( empty( $label ) ) {
			$label = esc_html__( 'Sponsored by', 'pixwell' );
		}
		if ( empty( $sponsor_url ) ) {
			$sponsor_url = '#';
		}
		$sponsor_name = rb_get_meta( 'sponsor_name' );
		ob_start(); ?>
		<aside class="p-meta-sponsor">
			<div class="sponsor-inner">
				<i class="rbi rbi-bell sponsor-icon"></i><span class="sponsor-label"><?php echo apply_filters( 'the_title', $label ); ?></span>
				<a class="sponsor-link" href="<?php echo esc_url( $sponsor_url ); ?>" target="_blank" rel="nofollow"><?php echo esc_html( $sponsor_name ); ?></a>
			</div>
		</aside>
		<?php
		return ob_get_clean();
	}
endif;


/** shop post */
if ( ! function_exists( 'pixwell_post_meta_shop_post' ) ) :
	function pixwell_post_meta_shop_post() {
		$label = pixwell_get_option( 'meta_shop_post_text' );
		ob_start(); ?>
		<aside class="p-meta-info">
			<span class="meta-info-el meta-shop-post">
				<a class="shop-post-link" href="<?php echo get_permalink() . '#shopthepost'; ?>"><i class="rbi rbi-shop-bag shop-post-icon"></i><span class="shop-post-label"><?php echo apply_filters( 'the_title', $label ); ?></span></a>
			</span>
		</aside>
		<?php
		return ob_get_clean();
	}
endif;


