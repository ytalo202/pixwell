<?php
/**
 * module category
 */
if ( ! function_exists( 'pixwell_module_category' ) ):
	function pixwell_module_category( $cat_id, $attachment_size = '', $title_size = 'h4' ) {

		if ( empty( $cat_id ) ) {
			return false;
		}
		$cat_id   = intval( $cat_id );
		$cat_name = get_cat_name( $cat_id );

		/** get random category */
		if ( empty( $cat_name ) ) {
			$categories   = get_categories( array( 'hide_empty' => true ) );
			$category_ids = array();
			foreach ( $categories as $category ) {
				$category_ids[] = $category->term_id;
			}
			$rand = array_rand( $category_ids, 1 );
			$cat_id   = $category_ids[ $rand ];
			$cat_name = get_cat_name( $cat_id );
		}

		$cat_featured = '';
		if ( empty( $attachment_size ) ) {
			$attachment_size = 'pixwell_280x210';
		}
		$category_options = get_option( 'pixwell_meta_categories', array() );
		if ( array_key_exists( $cat_id, $category_options ) ) {
			$category_options = $category_options[ $cat_id ];
		}
		if ( ! empty( $category_options['cat_featured'][0] ) ) {
			$cat_featured = wp_get_attachment_image_url( $category_options['cat_featured'][0], $attachment_size );
			if ( empty( $cat_featured ) ) {
				$cat_featured = esc_url( $category_options['cat_featured'][0] );
			}
		};
		$class_name = 'cat-list-item cat-id-' . esc_attr( $cat_id ); ?>
		<div class="<?php echo esc_attr( $class_name ) ?>">
			<a href="<?php echo get_category_link( $cat_id ); ?>" rel="category" title="<?php echo esc_html( $cat_name ); ?>"></a>

			<div class="cat-list-feat">
				<?php if ( ! empty( $cat_featured ) ) : ?>
					<img src="<?php echo esc_url( $cat_featured ); ?>" alt="<?php echo esc_html( $cat_name ); ?>">
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $cat_name ) ) : ?>
				<h6 class="cat-list-name <?php echo esc_attr( $title_size ) ?>"><?php echo esc_html( $cat_name ); ?></h6>
			<?php endif; ?>
		</div>
	<?php
	}
endif;


