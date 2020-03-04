<?php
add_filter( 'pixwell_translation_data', 'pixwell_theme_translation_default', 10 );

/**
 * @param $data
 *
 * @return array
 * default translation data
 */
if ( ! function_exists( 'pixwell_theme_translation_default' ) ) {
	function pixwell_theme_translation_default( $data = array() ) {
		$default = array(
			'comment'           => esc_html__( '1 Comment', 'pixwell' ),
			'view'              => esc_html__( '1 View', 'pixwell' ),
			'add_comment'       => esc_html__( 'Add Comment', 'pixwell' ),
			'all'               => esc_html__( 'All', 'pixwell' ),
			'ago'               => esc_html__( '%s Ago', 'pixwell' ),
			'by'                => esc_html__( 'by', 'pixwell' ),
			'my_bookmarks'      => esc_html__( 'Bookmarks', 'pixwell' ),
			'comment_closed'    => esc_html__( 'Comments are closed.', 'pixwell' ),
			'comments'          => esc_html__( '%s Comments', 'pixwell' ),
			'end_list'          => esc_html__( 'You’ve reached the end of the list!', 'pixwell' ),
			'your_email'        => esc_html__( 'Email', 'pixwell' ),
			'content_404'       => esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'pixwell' ),
			'share_email_info'  => esc_html__( 'I found this article interesting and thought of sharing it with you. Check it out:', 'pixwell' ),
			'leave_a_reply'     => esc_html__( 'Leave a Reply', 'pixwell' ),
			'leave_review'      => esc_html__( 'Leave a Review', 'pixwell' ),
			'your_comment'      => esc_html__( 'Leave Your Comment', 'pixwell' ),
			'leave_your_review' => esc_html__( 'Leave Your Review', 'pixwell' ),
			'load_more'         => esc_html__( 'Load More', 'pixwell' ),
			'your_name'         => esc_html__( 'Name', 'pixwell' ),
			'next'              => esc_html__( 'Next', 'pixwell' ),
			'next_article'      => esc_html__( 'Next Article', 'pixwell' ),
			'next_project'      => esc_html__( 'Next Project', 'pixwell' ),
			'newer_posts'       => esc_html__( 'Newer Posts', 'pixwell' ),
			'new_comment'       => esc_html__( 'Newer Comments &rarr;', 'pixwell' ),
			'new_review'        => esc_html__( 'Newer Reviews &rarr;', 'pixwell' ),
			'nothing_found'     => esc_html__( 'Nothing Found', 'pixwell' ),
			'title_404'         => esc_html__( 'Oops! That page can&rsquo;t be found.', 'pixwell' ),
			'older_posts'       => esc_html__( 'Older Posts', 'pixwell' ),
			'old_comment'       => esc_html__( '&larr; Older Comments', 'pixwell' ),
			'old_review'        => esc_html__( '&larr; Older Reviews', 'pixwell' ),
			'previous'          => esc_html__( 'Previous', 'pixwell' ),
			'previous_article'  => esc_html__( 'Previous Article', 'pixwell' ),
			'previous_project'  => esc_html__( 'Previous Project', 'pixwell' ),
			'pages'             => esc_html__( 'Pages:', 'pixwell' ),
			'review'            => esc_html__( '1 Review', 'pixwell' ),
			'reviews'           => esc_html__( '%s Reviews', 'pixwell' ),
			'review_overview'   => esc_html__( 'Review Overview', 'pixwell' ),
			'return_home'       => esc_html__( 'Return to Home', 'pixwell' ),
			'remove_bookmark'   => esc_html__( 'Remove All List', 'pixwell' ),
			'search'            => esc_html__( 'Search', 'pixwell' ),
			'share'             => esc_html__( 'Share', 'pixwell' ),
			'shares'            => esc_html__( 'Shares', 'pixwell' ),
			'search_result'     => esc_html__( 'Search Results for: %s', 'pixwell' ),
			'source'            => esc_html__( 'Source:', 'pixwell' ),
			'summary'           => esc_html__( 'Summary', 'pixwell' ),
			'share_facebook'    => esc_html__( 'Share on Facebook', 'pixwell' ),
			'share_twitter'     => esc_html__( 'Share on Twitter', 'pixwell' ),
			'share_pinterest'   => esc_html__( 'Share on Pinterest', 'pixwell' ),
			'share_whatsapp'    => esc_html__( 'Share on WhatsApp', 'pixwell' ),
			'share_linkedin'    => esc_html__( 'Share on Linkedin', 'pixwell' ),
			'share_tumblr'      => esc_html__( 'Share on Tumblr', 'pixwell' ),
			'share_reddit'      => esc_html__( 'Share on Reddit', 'pixwell' ),
			'share_vk'          => esc_html__( 'Share on VKontakte', 'pixwell' ),
			'share_email'       => esc_html__( 'Share on Email', 'pixwell' ),
			'no_search_result'  => esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pixwell' ),
			'sorry'             => esc_html__( 'Sorry!', 'pixwell' ),
			'cons'              => esc_html__( 'The Cons', 'pixwell' ),
			'pros'              => esc_html__( 'The Pros', 'pixwell' ),
			'tags'              => esc_html__( 'Tags:', 'pixwell' ),
			'views'             => esc_html__( '%s Views', 'pixwell' ),
			'view_comment'      => esc_html__( 'View Comments', 'pixwell' ),
			'via'               => esc_html__( 'Via:', 'pixwell' ),
			'all_posts_by'      => esc_html__( 'View More Posts', 'pixwell' ),
			'view_cart'         => esc_html__( 'View Cart', 'pixwell' ),
			'view_gallery'      => esc_html__( 'View Gallery', 'pixwell' ),
			'view_all_results'  => esc_html__( 'VIEW ALL RESULTS', 'pixwell' ),
			'view_bookmark'     => esc_html__( 'View All Your Bookmarks', 'pixwell' ),
			'your_website'      => esc_html__( 'Website', 'pixwell' ),
			'your_review'       => esc_html__( 'Your review', 'pixwell' ),
			'your_rating'       => esc_html__( 'Your rating', 'pixwell' ),
			'post_review'       => esc_html__( 'Post Review', 'pixwell' ),
			'select_rating'     => esc_html__( 'Please select a rating', 'pixwell' ),
			'user_rating'       => esc_html__( 'User Rating', 'pixwell' ),
			'votes'             => esc_html__( 'votes', 'pixwell' ),
			'no_trend'          => esc_html__( 'Will be updated soon!', 'pixwell' )
		);

		$data = array_merge( $data, $default );

		return $data;
	}
}


/**
 * @param null $text
 *
 * @return bool
 * fallback without install plugin

 */
if ( ! function_exists( 'pixwell_translate' ) ) {
	function pixwell_translate( $text = null ) {
		$translation_data = pixwell_theme_translation_default();

		if ( isset( $translation_data[ $text ] ) ) {
			return apply_filters( 'the_title', $translation_data[ $text ] );
		};

		return false;
	}
}