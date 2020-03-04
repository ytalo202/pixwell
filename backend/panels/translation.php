<?php
/** quick translation */
if ( ! function_exists( 'pixwell_register_options_translation' ) ) {
	function pixwell_register_options_translation() {
		return array(
			'id'     => 'pixwell_ruby_config_section_translation',
			'title'  => esc_html__( 'Theme Translation', 'pixwell' ),
			'desc'   => esc_html__( 'quickly translate the site to your language.', 'pixwell' ),
			'icon'   => 'el el-filter',
			'class'  => 'section-translation',
			'fields' => array(
				array(
					'id'     => 'section_start_changeable_string',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Custom Text', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'       => 'meta_author_text',
					'title'    => esc_html__( 'Author Meta Label', 'pixwell' ),
					'subtitle' => esc_html__( 'Show a label before the author entry meta. Leave blank if you would like to remove this label. This text will appear if you disable the avatar.', 'pixwell' ),
					'type'     => 'text',
					'default'  => esc_html__( 'by', 'pixwell' ),
				),
				array(
					'id'       => 'readmore_text',
					'title'    => esc_html__( 'Read More Text', 'pixwell' ),
					'subtitle' => esc_html__( 'Input the "Read More" text button. Leave blank if you would like to disable this button on the blog listing. Support multi-language input type.', 'pixwell' ),
					'type'     => 'text',
					'default'  => esc_html__( 'READ MORE', 'pixwell' ),
				),
				array(
					'id'       => 'meta_shop_post_text',
					'title'    => esc_html__( 'Shop this Post Label', 'pixwell' ),
					'subtitle' => esc_html__( 'Input the label for shop this post. Support multi-language input type', 'pixwell' ),
					'type'     => 'text',
					'default'  => esc_html__( 'Shop This Post', 'pixwell' ),
				),
				array(
					'id'       => 'sponsor_label',
					'type'     => 'text',
					'title'    => esc_html__( 'Sponsor Label', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a label for the sponsor bar of sponsored posts.', 'pixwell' ),
					'default'  => esc_html__( 'Sponsored by', 'pixwell' ),
				),
				array(
					'id'       => 'single_post_left_article_header',
					'title'    => esc_html__( 'Recommended Article Header', 'pixwell' ),
					'subtitle' => esc_html__( 'Input the heading for this section.', 'pixwell' ),
					'type'     => 'text',
					'default'  => esc_html__( 'READ NEXT', 'pixwell' )
				),
				array(
					'id'       => 'single_post_related_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Related Box Header', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a title for the related section.', 'pixwell' ),
					'default'  => esc_html__( 'You Might Also Enjoy', 'pixwell' ),
				),
				array(
					'id'       => 'single_post_reaction_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Reaction Header', 'pixwell' ),
					'subtitle' => esc_html__( 'Input a title for the reaction section.', 'pixwell' ),
					'default'  => esc_html__( 'What\'s your reaction?', 'pixwell' ),
				),
				array(
					'id'       => 'slider_next',
					'title'    => esc_html__( 'Slider Next Label', 'pixwell' ),
					'subtitle' => esc_html__( 'Input the text to show when hovering on the next slide navigation button.', 'pixwell' ),
					'type'     => 'text',
					'default'  => 'NEXT',
				),
				array(
					'id'       => 'slider_prev',
					'title'    => esc_html__( 'Slider Previous Label', 'pixwell' ),
					'subtitle' => esc_html__( 'Input the text to show when hovering on the previous slide navigation button.', 'pixwell' ),
					'type'     => 'text',
					'default'  => 'PREV',
				),
				array(
					'id'     => 'section_end_changeable_string',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_quick_translation',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Quick Translation', 'pixwell' ),
					'indent' => true
				),
				array(
					'id'      => 't_comment',
					'type'    => 'text',
					'title'   => '1 Comment',
					'default' => ''
				),
				array(
					'id'      => 't_view',
					'type'    => 'text',
					'title'   => '1 View',
					'default' => ''
				),
				array(
					'id'      => 't_add_comment',
					'type'    => 'text',
					'title'   => 'Add Comment',
					'default' => ''
				),
				array(
					'id'      => 't_all',
					'type'    => 'text',
					'title'   => 'All',
					'default' => ''
				),
				array(
					'id'      => 't_ago',
					'type'    => 'text',
					'title'   => '%s Ago',
					'default' => ''
				),
				array(
					'id'      => 't_angry',
					'type'    => 'text',
					'title'   => 'Angry',
					'default' => ''
				),
				array(
					'id'      => 't_by',
					'type'    => 'text',
					'title'   => 'by',
					'default' => ''
				),
				array(
					'id'      => 't_my_bookmarks',
					'type'    => 'text',
					'title'   => 'Bookmarks',
					'default' => ''
				),
				array(
					'id'      => 't_comment_closed',
					'type'    => 'text',
					'title'   => 'Comments are closed.',
					'default' => ''
				),
				array(
					'id'      => 't_comments',
					'type'    => 'text',
					'title'   => '%s Comments',
					'default' => ''
				),
				array(
					'id'      => 't_dead',
					'type'    => 'text',
					'title'   => 'Dead',
					'default' => ''
				),
				array(
					'id'      => 't_your_email',
					'type'    => 'text',
					'title'   => 'Email',
					'default' => ''
				),
				array(
					'id'      => 't_facebook',
					'type'    => 'text',
					'title'   => 'Facebook',
					'default' => ''
				),
				array(
					'id'      => 't_fans',
					'type'    => 'text',
					'title'   => 'fans',
					'default' => ''
				),
				array(
					'id'      => 't_followers',
					'type'    => 'text',
					'title'   => 'followers',
					'default' => ''
				),
				array(
					'id'      => 't_follow',
					'type'    => 'text',
					'title'   => 'follow',
					'default' => ''
				),
				array(
					'id'      => 't_happy',
					'type'    => 'text',
					'title'   => 'Happy',
					'default' => ''
				),
				array(
					'id'      => 't_content_404',
					'type'    => 'text',
					'title'   => 'It looks like nothing was found at this location. Maybe try a search?',
					'default' => ''
				),
				array(
					'id'      => 't_share_email_info',
					'type'    => 'text',
					'title'   => 'I found this article interesting and thought of sharing it with you. Check it out:',
					'default' => ''
				),
				array(
					'id'      => 't_end_list',
					'type'    => 'text',
					'title'   => 'You’ve reached the end of the list!',
					'default' => ''
				),
				array(
					'id'      => 't_like',
					'type'    => 'text',
					'title'   => 'like',
					'default' => ''
				),
				array(
					'id'      => 't_leave_review',
					'type'    => 'text',
					'title'   => 'Leave a Review',
					'default' => ''
				),
				array(
					'id'      => 't_leave_a_reply',
					'type'    => 'text',
					'title'   => 'Leave a Reply',
					'default' => ''
				),
				array(
					'id'      => 't_your_comment',
					'type'    => 'text',
					'title'   => 'Leave Your Comment',
					'default' => ''
				),
				array(
					'id'      => 't_leave_your_review',
					'type'    => 'text',
					'title'   => 'Leave Your Review',
					'default' => ''
				),
				array(
					'id'      => 't_load_more',
					'type'    => 'text',
					'title'   => 'Load More',
					'default' => ''
				),
				array(
					'id'      => 't_love',
					'type'    => 'text',
					'title'   => 'Love',
					'default' => ''
				),
				array(
					'id'      => 't_your_name',
					'type'    => 'text',
					'title'   => 'Name',
					'default' => ''
				),
				array(
					'id'      => 't_next',
					'type'    => 'text',
					'title'   => 'Next',
					'default' => ''
				),
				array(
					'id'      => 't_next_article',
					'type'    => 'text',
					'title'   => 'Next Article',
					'default' => ''
				),
				array(
					'id'      => 't_next_project',
					'type'    => 'text',
					'title'   => 'Next Project',
					'default' => ''
				),
				array(
					'id'      => 't_newer_posts',
					'type'    => 'text',
					'title'   => 'Newer Posts',
					'default' => ''
				),
				array(
					'id'      => 't_new_comment',
					'type'    => 'text',
					'title'   => 'Newer Comments &rarr;',
					'default' => ''
				),
				array(
					'id'      => 't_new_review',
					'type'    => 'text',
					'title'   => 'Newer Reviews &rarr;',
					'default' => ''
				),
				array(
					'id'      => 't_nothing_found',
					'type'    => 'text',
					'title'   => 'Nothing Found',
					'default' => ''
				),
				array(
					'id'      => 't_title_404',
					'type'    => 'text',
					'title'   => 'Oops! That page can&rsquo;t be found.',
					'default' => ''
				),
				array(
					'id'      => 't_older_posts',
					'type'    => 'text',
					'title'   => 'Older Posts',
					'default' => ''
				),
				array(
					'id'      => 't_old_comment',
					'type'    => 'text',
					'title'   => '&larr; Older Comments',
					'default' => ''
				),
				array(
					'id'      => 't_old_review',
					'type'    => 'text',
					'title'   => '&larr; Older Reviews',
					'default' => ''
				),
				array(
					'id'      => 't_previous',
					'type'    => 'text',
					'title'   => 'Previous',
					'default' => ''
				),
				array(
					'id'      => 't_previous_article',
					'type'    => 'text',
					'title'   => 'Previous Article',
					'default' => ''
				),
				array(
					'id'      => 't_previous_project',
					'type'    => 'text',
					'title'   => 'Previous Project',
					'default' => ''
				),
				array(
					'id'      => 't_pages',
					'type'    => 'text',
					'title'   => 'Pages:',
					'default' => ''
				),
				array(
					'id'      => 't_bookmark_empty',
					'type'    => 'text',
					'title'   => 'Please add some posts to see your added bookmarks.',
					'default' => ''
				),
				array(
					'id'      => 't_bookmark_empty',
					'type'    => 'text',
					'title'   => 'Please add some posts to see your added bookmarks.',
					'default' => ''
				),
				array(
					'id'      => 't_pinterest',
					'type'    => 'text',
					'title'   => 'Pinterest',
					'default' => ''
				),
				array(
					'id'      => 't_post_review',
					'type'    => 'text',
					'title'   => 'Post Review',
					'default' => ''
				),
				array(
					'id'      => 't_select_rating',
					'type'    => 'text',
					'title'   => 'Please select a rating',
					'default' => ''
				),
				array(
					'id'      => 't_pin',
					'type'    => 'text',
					'title'   => 'pin',
					'default' => ''
				),
				array(
					'id'      => 't_review',
					'type'    => 'text',
					'title'   => '1 Review',
					'default' => ''
				),
				array(
					'id'      => 't_reviews',
					'type'    => 'text',
					'title'   => '%s Reviews',
					'default' => ''
				),
				array(
					'id'      => 't_review_overview',
					'type'    => 'text',
					'title'   => 'Review Overview',
					'default' => ''
				),
				array(
					'id'      => 't_return_home',
					'type'    => 'text',
					'title'   => 'Return to Home',
					'default' => ''
				),
				array(
					'id'      => 't_read_later',
					'type'    => 'text',
					'title'   => 'Read it Later',
					'default' => ''
				),
				array(
					'id'      => 't_remove_bookmark',
					'type'    => 'text',
					'title'   => 'Remove All List',
					'default' => ''
				),
				array(
					'id'      => 't_search',
					'type'    => 'text',
					'title'   => 'Search',
					'default' => ''
				),
				array(
					'id'      => 't_search_result',
					'type'    => 'text',
					'title'   => 'Search Results for: %s',
					'default' => ''
				),
				array(
					'id'      => 't_share',
					'type'    => 'text',
					'title'   => 'Share',
					'default' => ''
				),
				array(
					'id'      => 't_shares',
					'type'    => 'text',
					'title'   => 'Shares',
					'default' => ''
				),
				array(
					'id'      => 't_source',
					'type'    => 'text',
					'title'   => 'Source:',
					'default' => ''
				),
				array(
					'id'      => 't_summary',
					'type'    => 'text',
					'title'   => 'Summary',
					'default' => ''
				),
				array(
					'id'      => 't_share_facebook',
					'type'    => 'text',
					'title'   => 'Share on Facebook',
					'default' => ''
				),
				array(
					'id'      => 't_share_twitter',
					'type'    => 'text',
					'title'   => 'Share on Twitter',
					'default' => ''
				),
				array(
					'id'      => 't_share_pinterest',
					'type'    => 'text',
					'title'   => 'Share on Pinterest',
					'default' => ''
				),
				array(
					'id'      => 't_share_whatsapp',
					'type'    => 'text',
					'title'   => 'Share on WhatsApp',
					'default' => ''
				),
				array(
					'id'      => 't_share_linkedin',
					'type'    => 'text',
					'title'   => 'Share on Linkedin',
					'default' => ''
				),
				array(
					'id'      => 't_share_tumblr',
					'type'    => 'text',
					'title'   => 'Share on Tumblr',
					'default' => ''
				),
				array(
					'id'      => 't_share_reddit',
					'type'    => 'text',
					'title'   => 'Share on Reddit',
					'default' => ''
				),
				array(
					'id'      => 't_share_vk',
					'type'    => 'text',
					'title'   => 'Share on VKontakte',
					'default' => ''
				),
				array(
					'id'      => 't_share_email',
					'type'    => 'text',
					'title'   => 'Share on Email',
					'default' => ''
				),
				array(
					'id'      => 't_no_search_result',
					'type'    => 'text',
					'title'   => 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
					'default' => ''
				),
				array(
					'id'      => 't_sorry',
					'type'    => 'text',
					'title'   => 'Sorry!',
					'default' => ''
				),
				array(
					'id'      => 't_sad',
					'type'    => 'text',
					'title'   => 'Sad',
					'default' => ''
				),
				array(
					'id'      => 't_sleepy',
					'type'    => 'text',
					'title'   => 'Sleepy',
					'default' => ''
				),
				array(
					'id'      => 't_cons',
					'type'    => 'text',
					'title'   => 'The Cons',
					'default' => ''
				),
				array(
					'id'      => 't_pros',
					'type'    => 'text',
					'title'   => 'The Pros',
					'default' => ''
				),
				array(
					'id'      => 't_twitter',
					'type'    => 'text',
					'title'   => 'Twitter',
					'default' => ''
				),
				array(
					'id'      => 't_tags',
					'type'    => 'text',
					'title'   => 'Tags',
					'default' => ''
				),
				array(
					'id'      => 't_user_rating',
					'type'    => 'text',
					'title'   => 'User Rating',
					'default' => ''
				),
				array(
					'id'      => 't_views',
					'type'    => 'text',
					'title'   => '%s Views',
					'default' => ''
				),
				array(
					'id'      => 't_votes',
					'type'    => 'text',
					'title'   => 'Votes',
					'default' => ''
				),
				array(
					'id'      => 't_view_comment',
					'type'    => 'text',
					'title'   => 'View Comments',
					'default' => ''
				),
				array(
					'id'      => 't_via',
					'type'    => 'text',
					'title'   => 'Via:',
					'default' => ''
				),
				array(
					'id'      => 't_all_posts_by',
					'type'    => 'text',
					'title'   => 'View More Posts',
					'default' => ''
				),
				array(
					'id'      => 't_view_cart',
					'type'    => 'text',
					'title'   => 'View Cart',
					'default' => ''
				),
				array(
					'id'      => 't_view_gallery',
					'type'    => 'text',
					'title'   => 'View Gallery',
					'default' => ''
				),
				array(
					'id'      => 't_view_gallery',
					'type'    => 'text',
					'title'   => 'View Gallery',
					'default' => ''
				),
				array(
					'id'      => 't_view_all_results',
					'type'    => 'text',
					'title'   => 'VIEW ALL RESULTS',
					'default' => ''
				),
				array(
					'id'      => 't_view_bookmark',
					'type'    => 'text',
					'title'   => 'View All Your Bookmarks',
					'default' => ''
				),
				array(
					'id'      => 't_your_review',
					'type'    => 'text',
					'title'   => 'Your review',
					'default' => ''
				),
				array(
					'id'      => 't_your_rating',
					'type'    => 'text',
					'title'   => 'Your rating',
					'default' => ''
				),
				array(
					'id'      => 't_your_website',
					'type'    => 'text',
					'title'   => 'Website',
					'default' => ''
				),
				array(
					'id'      => 't_wind',
					'type'    => 'text',
					'title'   => 'Wink',
					'default' => ''
				),
				array(
					'id'      => 't_no_trend',
					'type'    => 'text',
					'title'   => 'Will be updated soon!',
					'default' => ''
				),
				array(
					'id'     => 'section_end_quick_translation',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

