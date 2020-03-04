<?php
/*
Template Name: Read it Later
*/
get_header(); ?>
	<div class="site-content page-bookmark">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="page-header archive-header is-header-solid is-header-center">
					<div class="header-holder">
						<div class="rbc-container rb-p20-gutter">
							<?php pixwell_breadcrumb(); ?>
							<h1 class="page-title"><?php the_title(); ?></h1>
						</div>
					</div>
				</header>
				<div class="wrap rbc-container rb-p20-gutter">
					<main id="main" class="site-main rbc-content">
						<div class="content-wrap">
							<aside class="bookmark-list-header">
								<span class="bookmark-label"><i class="rbi rbi-bookmark"></i><?php echo pixwell_translate( 'view_bookmark' ); ?></span>
								<div class="p-link remove-bookmark-btn">
									<i class="rbi rbi-move"></i>
									<a id="remove-bookmark-list" href="#"><span><?php echo pixwell_translate( 'remove_bookmark' ); ?></span></a>
								</div>
							</aside>
							<div id="bookmarks-list" class="content-inner bookmark-list">
								<div class="bookmark-perload">
									<span class="loadmore-animation"></span>
								</div>
							</div>
						</div>
					</main>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
<?php get_footer();