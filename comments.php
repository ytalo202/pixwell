<?php
/** comment template */
if ( post_password_required() ) {
	return false;
}

if ( comments_open() || get_comments_number() ) : ?>
	<div id="comments" class="comments-area">
		<?php if ( have_comments() ) : ?>
			<ul class="comment-list entry">
				<?php wp_list_comments( array(
						'avatar_size' => 100,
						'style'       => 'ul',
						'short_ping'  => true,
					)
				); ?>
			</ul>
			<?php the_comments_pagination( array(
					'prev_text' => '<span class="nav-previous">' . pixwell_translate( 'old_comment' ) . '</span>',
					'next_text' => '<span class="nav-next">' . pixwell_translate( 'new_comment' ) . '</span>',
				)
			);
		endif;
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :    ?>
			<p class="no-comments"><?php echo pixwell_translate( 'comment_closed' ); ?></p>
		<?php endif;
		comment_form( array(
			'class_submit' => 'btn-wrap'
		) ); ?>
	</div>
<?php endif;