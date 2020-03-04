<?php
/** review template */
$pixwell_total_comment = get_comments_number();
if ( $pixwell_total_comment > 1 ) {
	$text = sprintf( pixwell_translate( 'reviews' ), esc_attr( $pixwell_total_comment ) );
} elseif ( 1 == $pixwell_total_comment ) {
	$text = pixwell_translate( 'review' );
} else {
	$text = pixwell_translate( 'leave_review' );
}; ?>
<aside id="rb-user-reviews-<?php echo esc_attr( get_the_ID() ); ?>" class="comment-box-wrap rb-user-reviews">
	<div class="comment-box-header clearfix">
		<h4 class="h3"><i class="rbi rbi-star-full"></i><?php echo esc_html( $text ); ?></h4>
	</div>
	<?php if (comments_open() || get_comments_number()) : ?>
	<div id="comments" class="comments-area rb-reviews-area">
		<?php if ( have_comments() ) : ?>
			<div class="rb-review-list">
				<ul class="comment-list entry">
					<?php wp_list_comments( array( 'callback' => 'pixwell_user_review_list' ) ); ?>
				</ul>
				<?php the_comments_pagination( array(
						'prev_text' => '<span class="nav-previous">' . pixwell_translate( 'old_review' ) . '</span>',
						'next_text' => '<span class="nav-next">' . pixwell_translate( 'new_review' ) . '</span>',
					)
				); ?>
			</div>
		<?php endif;
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :    ?>
			<p class="no-comments"><?php echo pixwell_translate( 'comment_closed' ); ?></p>
		<?php endif; ?>
		<div class="comment-box-content rb-reviews-form clearfix">
			<?php
			$commenter    = wp_get_current_commenter();
			$comment_form = array(

				'title_reply'    => '',
				'title_reply_to' => pixwell_translate( 'leave_a_reply' ),
				'label_submit'   => pixwell_translate( 'post_review' ),
			);

			$name_email_required    = (bool) get_option( 'require_name_email', 1 );
			$fields                 = array(
				'author' => array(
					'label'    => pixwell_translate( 'your_name' ),
					'type'     => 'text',
					'value'    => $commenter['comment_author'],
					'required' => $name_email_required,
				),
				'email'  => array(
					'label'    => pixwell_translate( 'your_email' ),
					'type'     => 'email',
					'value'    => $commenter['comment_author_email'],
					'required' => $name_email_required,
				),
				'url'    => array(
					'label' => pixwell_translate( 'your_website' ),
					'type'  => 'email',
					'value' => $commenter['comment_author_url']
				),
			);
			$comment_form['fields'] = array();
			foreach ( $fields as $key => $field ) {
				$field_html = '<p class="comment-form-' . esc_attr( $key ) . '">';
				$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );
				if ( ! empty( $field['required'] ) && $field['required'] ) {
					$field_html .= '&nbsp;<span class="required">*</span>';
				}
				$field_html .= '</label><input placeholder="' . esc_attr( $field['label'] ) . '" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( ( ! empty( $field['required'] ) && $field['required'] ) ? 'required' : '' ) . ' /></p>';
				$comment_form['fields'][ $key ] = $field_html;
				$comment_form['comment_field']  = '<div class="rb-form-rating">
							<span class="rating-alert is-hidden">' . pixwell_translate( 'select_rating' ) . '</span>
							<label id="rating-' . get_the_ID() . '">' . pixwell_translate( 'your_rating' ) . '</label>
							<select name="rbrating" id="rating-' . get_the_ID() . '" class="rb-rating-selection">
								<option value="">' . esc_html__( 'Rate&hellip;', 'pixwell' ) . '</option>
								<option value="5">' . esc_html__( 'Perfect', 'pixwell' ) . '</option>
								<option value="4">' . esc_html__( 'Good', 'pixwell' ) . '</option>
								<option value="3">' . esc_html__( 'Average', 'pixwell' ) . '</option>
								<option value="2">' . esc_html__( 'Not that bad', 'pixwell' ) . '</option>
								<option value="1">' . esc_html__( 'Very poor', 'pixwell' ) . '</option>
							</select>
							</div>';
				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . pixwell_translate( 'your_review' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" placeholder="' . pixwell_translate( 'leave_your_review' ) . '" cols="45" rows="8" required></textarea></p>';
			}
			comment_form( $comment_form ); ?>
		</div>
		<?php endif; ?>
</aside>