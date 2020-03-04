<?php
/** post review */
add_action( 'comment_post', 'pixwell_add_user_rating', 1 );

/** add users rating */
function pixwell_add_user_rating( $comment_id ) {
	if ( isset( $_POST['rbrating'], $_POST['comment_post_ID'] ) && 'post' === get_post_type( absint( $_POST['comment_post_ID'] ) ) ) {
		if ( ! $_POST['rbrating'] || $_POST['rbrating'] > 5 || $_POST['rbrating'] < 0 ) {
			return;
		}
		add_comment_meta( $comment_id, 'rbrating', intval( $_POST['rbrating'] ), true );
		$post_id = absint( $_POST['comment_post_ID'] );
		if ( ! empty( $post_id ) ) {
			pixwell_calc_average_rating( $post_id );
		}
	}

	return;
}

/** add average rating */
if ( ! function_exists( 'pixwell_calc_average_rating' ) ) {
	function pixwell_calc_average_rating( $post_id ) {
		global $wpdb;

		$data         = array();
		$total_review = array();
		$raw_total    = $wpdb->get_results(
			$wpdb->prepare(
				"
			SELECT meta_value, COUNT( * ) as meta_value_count FROM $wpdb->commentmeta
			LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
			WHERE meta_key = 'rbrating'
			AND comment_post_ID = %d
			AND comment_approved = '1'
			AND meta_value > 0
			GROUP BY meta_value
				",
				$post_id
			)
		);

		foreach ( $raw_total as $count ) {
			$total_review[] = absint( $count->meta_value_count );
		}

		$total_review = array_sum( $total_review );
		$data['total'] = $total_review;

		$ratings = $wpdb->get_var(
			$wpdb->prepare(
				"
				SELECT SUM(meta_value) FROM $wpdb->commentmeta
				LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
				WHERE meta_key = 'rbrating'
				AND comment_post_ID = %d
				AND comment_approved = '1'
				AND meta_value > 0
					",
				$post_id
			)
		);

		if ( ! empty( $total_review ) && ! empty( $ratings ) ) {
			$data['average'] = number_format( $ratings / $total_review, 1, '.', '' );
		}

		update_post_meta( $post_id, 'pixwell_user_rating', $data );
		return;
	}
}


/** render review list */
if ( ! function_exists( 'pixwell_user_review_list' ) ) {
	function pixwell_user_review_list( $comment, $args, $depth ) {
		$commenter = wp_get_current_commenter();
		if ( $commenter['comment_author_email'] ) {
			$moderation_note = esc_html__( 'Your review is awaiting moderation.', 'pixwell' );
		} else {
			$moderation_note = esc_html__( 'Your review is awaiting moderation. This is a preview, your review will be visible after it has been approved.', 'pixwell' );
		}
		$rating_value = get_comment_meta( $comment->comment_ID, 'rbrating', true ); ?>
		<li class="comment_container" id="comment-<?php comment_ID(); ?>">
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					}
					printf( '%s <span class="says">says:</span>', sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ), 'pixwell' ) );
					?>
				</div>
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<em class="comment-awaiting-moderation"><?php echo esc_html( $moderation_note ); ?></em>
				<?php endif; ?>
				<div class="comment-meta comment-metadata commentmetadata">
					<?php if ( ! empty( $rating_value ) ) : ?>
					<span class="review-stars">
						<?php for ( $i = 1; $i <= 5; $i ++ ) {
							if ( $i <= $rating_value ) {
								echo '<i class="rbi rbi-star-full"></i>';
							} else {
								echo '<i class="rbi rbi-star"></i>';
							}
						} ?>
					</span>
					<?php endif;
					edit_comment_link( esc_html__( 'Edit', 'pixwell' ) ); ?>
				</div>
				<div class="comment-content">
					<?php comment_text(); ?>
				</div>
			</article>
		</li>
	<?php
	}
}
