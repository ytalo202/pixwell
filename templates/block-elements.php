<?php

/**
 * @param array $settings
 * @param null  $query_data
 * block open
 */
if ( ! function_exists( 'pixwell_block_open' ) ) :
	function pixwell_block_open( $settings = array(), $query_data = null ) {

		$block_tag    = 'div';
		$class_name   = array();
		$class_name[] = 'block-wrap';

		if ( ! empty( $settings['block_tag'] ) ) {
			$block_tag = $settings['block_tag'];
		}

		if ( ! empty( $settings['classes'] ) ) {
			$class_name[] = $settings['classes'];
		}

		if ( ! empty( $settings['text_style'] ) ) {
			if ( 'light' == $settings['text_style'] ) {
				$class_name[] = 'is-light-text';
			} elseif ( 'dark' == $settings['text_style'] ) {
				$class_name[] = 'is-dark-text';
			}
		}
		$class_name = implode( ' ', $class_name ); ?>
		<<?php echo esc_attr( $block_tag ) ?> id="<?php echo esc_attr( $settings['uuid'] ); ?>" class="<?php echo esc_attr( $class_name ); ?>" <?php pixwell_get_ajax_attributes( $settings, $query_data ); ?>>
	<?php
	}
endif;


/**
 * close block
 */
if ( ! function_exists( 'pixwell_block_close' ) ) :
	function pixwell_block_close( $settings = array() ) {
		$block_tag = 'div';
		if ( ! empty( $settings['block_tag'] ) ) {
			$block_tag = $settings['block_tag'];
		}
		echo '</' . esc_attr( $block_tag ) . '>';
	}
endif;


/**
 * @param array $settings
 * render block header
 */
if ( ! function_exists( 'pixwell_block_header' ) ) :
	function pixwell_block_header( $settings = array() ) {
		if ( empty( $settings['title'] ) ) {
			return;
		} ?>
		<header class="block-header">
			<?php if ( empty( $settings['viewmore_link'] ) ) : ?>
				<h2 class="block-title h3"><?php echo esc_html( $settings['title'] ); ?></h2>
			<?php else : ?>
				<h2 class="block-title h3 is-link">
					<a href="<?php echo esc_url( $settings['viewmore_link'] ); ?>" title="<?php echo esc_attr( $settings['title'] ); ?>"><?php echo esc_html( $settings['title'] ); ?></a>
				</h2>
			<?php endif; ?>
			<?php
			pixwell_block_quick_filter( $settings );
			pixwell_block_more( $settings );
			?>
		</header>
	<?php
	}
endif;

/**
 * @param array $settings
 * open block content
 */
if ( ! function_exists( 'pixwell_block_content_open' ) ) :
	function pixwell_block_content_open( $settings = array() ) {
		$class_name = 'content-inner';
		if ( ! empty( $settings['columns'] ) ) {
			$class_name .= ' rb-row';
		}
		if ( ! empty( $settings['content_classes'] ) ) {
			$class_name .= ' ' . $settings['content_classes'];
		} ?>
		<div class="content-wrap"><div class="<?php echo esc_attr( $class_name ); ?>">
	<?php
	}
endif;


/**
 * close block content
 */
if ( ! function_exists( 'pixwell_block_content_close' ) ) :
	function pixwell_block_content_close() {
		?>
		</div>
		</div>
	<?php
	}
endif;


/**
 * @param $settings
 * render quick filter
 */
if ( ! function_exists( 'pixwell_block_quick_filter' ) ) :
	function pixwell_block_quick_filter( $settings ) {

		if ( empty( $settings['quick_filter'] ) || empty( $settings['uuid'] ) ) {
			return;
		}
		if ( empty( $settings['quick_filter_ids'] ) ) {
			$settings['quick_filter_ids'] = '';
		}

		if ( empty( $settings['quick_filter_label'] ) ) {
			$settings['quick_filter_label'] = pixwell_translate( 'all' );
		}
		$data = pixwell_add_settings_quick_filters( $settings['quick_filter'], $settings['quick_filter_ids'] );

		if ( empty( $data ) || ! is_array( $data ) ) {
			return;
		} ?>
		<aside id="<?php echo 'ajax_filter_' . $settings['uuid']; ?>" class="ajax-quick-filter">
			<div class="ajax-quick-filter-inner">
				<span class="filter-el"><a href="#" class="ajax-link quick-filter-link is-active" data-ajax_filter_val="0"><?php echo esc_html( $settings['quick_filter_label'] ); ?></a></span>
				<?php foreach ( $data as $item ) : ?>
					<span class="filter-el"><a href="#" class="ajax-link quick-filter-link" data-ajax_filter_val="<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['name'] ); ?></a></span>
				<?php endforeach; ?>
			</div>
		</aside>
	<?php
	}
endif;

/**
 * @param array $settings
 * @param null  $query_data
 * ajax attribute
 */
if ( ! function_exists( 'pixwell_get_ajax_attributes' ) ) :
	function pixwell_get_ajax_attributes( $settings = array(), $query_data = null ) {

		if ( null == $query_data ) {
			return;
		}

		if ( empty( $settings['uuid'] ) || ( empty( $settings['pagination'] ) && empty( $settings['quick_filter'] ) ) ) {
			return;
		}

		if ( ! empty( $query_data->max_num_pages ) && ! isset( $settings['page_max'] ) ) {
			$settings['page_max'] = $query_data->max_num_pages;
		}

		$settings['page_current'] = 1;

		$defaults = array(
			'uuid'             => '',
			'name'             => '',
			'quick_filter'     => '',
			'quick_filter_ids' => '',
			'page_max'         => '',
			'page_current'     => '',
			'category'         => '',
			'categories'       => '',
			'tags'             => '',
			'format'           => '',
			'author'           => '',
			'post_not_in'      => '',
			'post_in'          => '',
			'order'            => '',
			'posts_per_page'   => '',
			'offset'           => '',
			'text_style'       => '',
			'post_columns'     => '',
			'layout'           => ''
		);

		foreach ( $defaults as $key => $val ) {
			if ( ! empty( $settings[ $key ] ) ) {
				echo 'data-' . $key . '="' . esc_attr( $settings[ $key ] ) . '" ';
			}
		}
	}
endif;


/**
 * @param $settings
 * view more link
 */
if ( ! function_exists( 'pixwell_block_more' ) ) :
	function pixwell_block_more( $settings ) {
		if ( empty( $settings['viewmore_title'] ) ) {
			return;
		} ?>
		<aside class="block-view-more">
			<?php if ( ! empty( $settings['viewmore_link'] ) ) : ?>
				<a href="<?php echo esc_url( $settings['viewmore_link'] ); ?>" title="<?php echo esc_attr( $settings['viewmore_title'] ); ?>"><?php echo esc_html( $settings['viewmore_title'] ); ?>
					<i class="rbi rbi-arrow-right"></i></a>
			<?php else: ?>
				<span class="view-more-desc"><?php echo esc_html( $settings['viewmore_title'] ); ?></span>
			<?php endif; ?>
		</aside>
	<?php
	}
endif;


/**
 * category page - header
 */
if ( ! function_exists( 'pixwell_block_header_cat' ) ) :
	function pixwell_block_header_cat( $settings ) {
		if ( empty( $settings['title'] ) ) {
			return;
		} ?>
		<header class="block-header">
			<?php if ( empty( $settings['title_url'] ) ) : ?>
				<h2 class="block-title h3"><?php echo esc_html( $settings['title'] ); ?></h2>
			<?php else : ?>
				<h2 class="block-title h3 is-link">
					<a href="<?php echo esc_url( $settings['title_url'] ); ?>" title="<?php echo esc_attr( $settings['title'] ); ?>"><?php echo esc_html( $settings['title'] ); ?></a>
				</h2>
			<?php endif;
			if ( ! empty( $settings['tagline'] ) ) : ?>
				<h6 class="block-tagline"><?php echo esc_html( $settings['tagline'] ); ?></h6>
			<?php endif; ?>
		</header>
	<?php
	}
endif;

/** not enough notice */
if ( ! function_exists( 'pixwell_not_enough' ) ) {
	function pixwell_not_enough( $total = 3 ) {
		if ( current_user_can( 'edit_pages' ) ) : ?>
			<p class="rb-error"><?php echo sprintf( esc_html__( 'Not enough posts to show. This block requests at least %s posts, please add more posts or change query filters in the block settings panel: ', 'pixwell' ), $total ); ?>
				<?php edit_post_link( esc_html__( 'Edit Page', 'pixwell' ), null, null, null, 'page-edit-link' ); ?>
			</p>
		<?php
		endif;
	}
}

/** no posts */
if ( ! function_exists( 'pixwell_no_post' ) ) {
	function pixwell_no_post() {
		if ( current_user_can( 'edit_pages' ) ) : ?>
			<p class="rb-error"><?php esc_html_e( 'No found posts, Please change query filters in the block settings panel: ', 'pixwell' ); ?>
				<?php edit_post_link( esc_html__( 'Edit Page', 'pixwell' ), null, null, null, 'page-edit-link' ); ?>
			</p>
		<?php
		endif;
	}
}