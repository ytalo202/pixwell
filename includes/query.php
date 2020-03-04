<?php
/**
 * @param array  $data
 * @param string $paged
 * custom query for this theme
 */
if ( ! function_exists( 'pixwell_query' ) ) {
	function pixwell_query( $data = array(), $paged = null ) {

		$defaults = array(
			'categories'          => '',
			'category'            => '',
			'author'              => '',
			'format'              => '',
			'tags'                => '',
			'tag_in'              => '',
			'posts_per_page'      => '',
			'paged'               => '',
			'no_found_rows'       => false,
			'offset'              => '',
			'order'               => 'date_post',
			'post_type'           => 'post',
			'meta_key'            => '',
			'post_in'             => '',
			'post_not_in'         => '',
			'tax_query'           => array(),
			'ignore_sticky_posts' => 1
		);

		$data = wp_parse_args( $data, $defaults );

		if ( 'popular' == $data['order'] && ! class_exists( 'Post_Views_Counter' ) ) {
			$data['order'] = 'comment_count';
		}

		$params = array();

		$params['post_status']         = 'publish';
		$params['ignore_sticky_posts'] = $data['ignore_sticky_posts'];
		$params['post_type']           = $data['post_type'];
		$params['no_found_rows']       = boolval( $data['no_found_rows'] );
		$params['tax_query']           = array();

		if ( ! empty( $data['posts_per_page'] ) ) {
			$params['posts_per_page'] = intval( $data['posts_per_page'] );
		}

		if ( ! empty( $data['post_in'] ) ) {
			if ( is_string( $data['post_in'] ) ) {
				$params['post__in'] = explode( ',', $data['post_in'] );
			} elseif ( is_array( $data['post_in'] ) ) {
				$params['post__in'] = $data['post_in'];
			}
		} elseif ( ! empty( $data['post_not_in'] ) ) {
			if ( is_string( $data['post_not_in'] ) ) {
				$params['post__not_in'] = explode( ',', $data['post_not_in'] );
			} elseif ( is_array( $data['post_not_in'] ) ) {
				$params['post__not_in'] = $data['post_not_in'];
			}
		}

		if ( ! empty( $data['categories'] ) && 'all' != $data['categories'] ) {
			if ( is_array( $data['categories'] ) ) {
				$params['cat'] = implode( ',', $data['categories'] );
			} elseif ( is_string( $data['categories'] ) ) {
				$params['cat'] = trim( $data['categories'] );
			}
		} elseif ( ! empty( $data['category'] ) && 'all' != $data['category'] ) {
			$params['cat'] = $data['category'];
		}

		if ( ! empty( $data['author'] ) ) {
			$params['author'] = $data['author'];
		}

		if ( ! empty( $data['format'] ) && 'post' == $data['post_type'] ) {
			if ( 'default' != $data['format'] ) {
				$params['tax_query'][] = array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => array( 'post-format-' . trim( $data['format'] ) ),
				);
			} else {
				$params['tax_query'][] = array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => array( 'post-format-gallery', 'post-format-video', 'post-format-audio' ),
					'operator' => 'NOT IN',
				);
			}
		}

		if ( ! empty( $data['tax_query'] ) ) {
			$params['tax_query'][] = $data['tax_query'];
		}

		if ( ! empty( $paged ) ) {
			$params['paged'] = intval( $paged );
		} elseif ( ! empty( $data['paged'] ) ) {
			$params['paged'] = intval( $data['paged'] );
		}

		if ( ! empty( $data['offset'] ) ) {
			if ( $paged > 1 ) {
				$params['offset'] = intval( $data['offset'] ) + intval( ( $paged - 1 ) * intval( $data['posts_per_page'] ) );
			} else {
				$params['offset'] = intval( $data['offset'] );
			}

			unset( $params['paged'] );
		}

		if ( ! empty( $data['tags'] ) ) {
			$data['tags']  = preg_replace( '/\s+/', '', $data['tags'] );
			$params['tag'] = $data['tags'];
		}

		if ( ! empty( $data['tag_in'] ) && is_array( $data['tag_in'] ) ) {
			$params['tag__in'] = $data['tag_in'];
		}

		if ( ! empty( $data['meta_key'] ) ) {
			$params['meta_key'] = $data['meta_key'];
			$params['orderby']  = 'meta_value_num';
		}

		switch ( $data['order'] ) {

			case 'date_post' :
				$params['orderby'] = 'date';
				$params['order']   = 'DESC';
				break;

			case 'comment_count' :
				$params['orderby'] = 'comment_count';
				break;

			case 'post_type' :
				$params['orderby'] = 'type';
				break;

			case 'popular':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				break;

			case 'popular_m':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				$params['date_query']       = array(
					array(
						'after'  => '30 days ago',
						'column' => 'post_date_gmt',
					),
				);
				break;

			case 'popular_w':
				$params['suppress_filters'] = false;
				$params['fields']           = '';
				$params['orderby']          = 'post_views';
				$params['order']            = 'DESC';
				$params['date_query']       = array(
					array(
						'after'  => '7 days ago',
						'column' => 'post_date_gmt',
					),
				);
				break;

			case 'top_review' :
				$params['meta_key'] = 'pixwell_review_stars';
				$params['orderby']  = 'meta_value_num';
				$params['order']    = 'DESC';
				break;

			case 'last_review' :
				$params['meta_key'] = 'pixwell_review_stars';
				$params['orderby']  = 'date';
				$params['order']    = 'DESC';
				break;

			case 'rand':
				$params['orderby'] = 'rand';
				break;

			case 'alphabetical_order_decs':
				$params['orderby'] = 'title';
				$params['order']   = 'DECS';
				break;

			case 'alphabetical_order_asc':
				$params['orderby'] = 'title';
				$params['order']   = 'ASC';
				break;

			default :
				$params['orderby'] = 'date';
				break;
		}

		$query_data = new WP_Query( $params );

		return $query_data;
	}
}


/**
 * @param array $data
 * @param int   $paged
 *
 * @return WP_Query
 * query related posts
 */
if ( ! function_exists( 'pixwell_query_related' ) ) {
	function pixwell_query_related( $data = array(), $paged = 1 ) {

		$defaults = array(
			'posts_per_page' => '',
			'post_not_in'    => get_the_ID(),
			'no_found_rows'  => false,
			'post_format'    => '',
			'orderby'        => 'date',
			'meta_key'       => ''
		);

		$data          = wp_parse_args( $data, $defaults );
		$data['where'] = pixwell_get_option( 'single_post_related_where' );
		$post_id       = get_the_ID();

		if ( empty( $data['where'] ) ) {
			$data['where'] = 'all';
		}

		$params                        = array();
		$params['ignore_sticky_posts'] = 1;
		$params['post_status']         = 'publish';
		$params['post_type']           = 'post';
		$params['orderby']             = $data['orderby'];
		$params['no_found_rows']       = boolval( $data['no_found_rows'] );

		if ( ! empty( $paged ) ) {
			$params['paged'] = $paged;
		}

		if ( ! empty( $data['posts_per_page'] ) ) {
			$params['posts_per_page'] = $data['posts_per_page'];
		} else {
			$params['posts_per_page'] = get_option( 'posts_per_page' );
		}

		if ( ! empty( $data['post_not_in'] ) ) {
			$params['post__not_in'] = explode( ',', $data['post_not_in'] );
			$post_id                = $params['post__not_in'][0];
		}

		if ( empty( $data['categories'] ) ) {
			$data['categories'] = array();
			$categories         = get_the_category( $post_id );
			if ( is_array( $categories ) ) {
				foreach ( $categories as $category ) {
					array_push( $data['categories'], $category->term_id );
				}
			}
		}

		if ( empty( $data['tags'] ) ) {
			$data['tags'] = array();
			$tags         = get_the_tags( $post_id );
			if ( is_array( $tags ) ) {
				foreach ( $tags as $tag ) {
					array_push( $data['tags'], $tag->slug );
				}
			}
		}

		if ( ! empty( $data['meta_key'] ) ) {
			$params['meta_key'] = $data['meta_key'];
		}

		switch ( $data['where'] ) {
			case 'all':
				if ( ! empty( $data['categories'] ) && ! empty( $data['tags'] ) ) {
					if ( empty( $data['format'] ) ) {
						$params['tax_query'] = array(
							'relation' => 'OR',
							array(
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => $data['categories'],
							),
							array(
								'taxonomy' => 'post_tag',
								'field'    => 'slug',
								'terms'    => $data['tags'],
							),
						);
					} else {
						$params['tax_query'] = array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-' . esc_attr( $data['format'] ) ),
							),
							array(
								'relation' => 'OR',
								array(
									'taxonomy' => 'category',
									'field'    => 'term_id',
									'terms'    => $data['categories'],
								),
								array(
									'taxonomy' => 'post_tag',
									'field'    => 'slug',
									'terms'    => $data['tags'],
								),
							)
						);
					}
				} elseif ( empty( $data['categories'] ) && ! empty( $data['tags'] ) ) {
					$params['tag'] = $data['tags'];

					if ( ! empty( $data['format'] ) ) {
						$params['tax_query'] = array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-' . esc_attr( $data['format'] ) ),
							),
						);
					}
				} elseif ( ! empty( $data['categories'] ) && empty( $data['tags'] ) ) {
					$params['cat'] = $data['categories'];
					if ( ! empty( $data['format'] ) ) {
						$params['tax_query'] = array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-' . esc_attr( $data['format'] ) ),
							),
						);
					}
				}
				break;

			case 'cat' :
				if ( ! empty( $data['categories'] ) ) {
					$params['cat'] = $data['categories'];
					if ( ! empty( $data['format'] ) ) {
						$params['tax_query'] = array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-' . esc_attr( $data['format'] ) ),
							),
						);
					}
				}
				break;

			case 'tag' :
				if ( ! empty( $data['tags'] ) ) {
					$params['tag'] = $data['tags'];
					if ( ! empty( $data['format'] ) ) {
						$params['tax_query'] = array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-' . esc_attr( $data['format'] ) ),
							),
						);
					}
				}
				break;
		}
		$query_data = new WP_Query( $params );

		return $query_data;
	}
}

/** query portfolio post type */
if ( ! function_exists( 'pixwell_query_portfolio' ) ) {
	function pixwell_query_portfolio( $data = array() ) {

		$defaults = array(
			'term_slugs'          => '',
			'posts_per_page'      => get_option( 'posts_per_page' ),
			'no_found_rows'       => true,
			'post_in'             => '',
			'post_not_in'         => '',
			'ignore_sticky_posts' => 1
		);

		$data                          = wp_parse_args( $data, $defaults );
		$params                        = array();
		$params['post_type']           = 'rb-portfolio';
		$params['ignore_sticky_posts'] = $data['ignore_sticky_posts'];
		$params['no_found_rows']       = boolval( $data['no_found_rows'] );

		if ( ! empty( $data['posts_per_page'] ) ) {
			$params['posts_per_page'] = intval( $data['posts_per_page'] );
		}

		if ( ! empty( $data['post_in'] ) ) {
			if ( is_string( $data['post_in'] ) ) {
				$params['post__in'] = explode( ',', $data['post_in'] );
			} elseif ( is_array( $data['post_in'] ) ) {
				$params['post__in'] = $data['post_in'];
			}
		} elseif ( ! empty( $data['post_not_in'] ) ) {
			if ( is_string( $data['post_not_in'] ) ) {
				$params['post__not_in'] = explode( ',', $data['post_not_in'] );
			} elseif ( is_array( $data['post_not_in'] ) ) {
				$params['post__not_in'] = $data['post_not_in'];
			}
		}

		if ( ! empty( $data['term_slugs'] ) && is_string( $data['term_slugs'] ) ) {
			$data['term_slugs'] = explode( ',', $data['term_slugs'] );
			if ( is_array( $data['term_slugs'] ) ) {
				$params['tax_query'] = array( 'relation' => 'OR' );
				foreach ( $data['term_slugs'] as $val ) {
					array_push( $params['tax_query'], array(
						'taxonomy' => 'portfolio-category',
						'field'    => 'slug',
						'terms'    => trim( $val )
					) );
				}
			}
		}

		$query_data = new WP_Query( $params );

		return $query_data;
	}
}