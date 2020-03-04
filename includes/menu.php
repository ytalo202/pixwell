<?php
/** mega menu */
add_filter( 'wp_setup_nav_menu_item', 'pixwell_mega_walker_loader' );
add_filter( 'wp_edit_nav_menu_walker', 'pixwell_megamenu_walker' );
add_action( 'wp_update_nav_menu_item', 'pixwell_mega_walker_save', 10, 2 );
add_filter( 'nav_menu_item_title', 'pixwell_add_span_sub_menu', 10, 4 );

/** backend mega menu */
class pixwell_walker_backend extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $_wp_nav_menu_max_depth;

		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		ob_start();
		$item_id = esc_attr( $item->ID );

		if ( empty( $item->pixwell_mega_cat ) ) {
			$pixwell_item_mega_cat = null;
		} else {
			$pixwell_item_mega_cat = esc_attr( $item->pixwell_mega_cat[0] );
		}
		if ( empty( $item->pixwell_mega_cat_ajax ) ) {
			$pixwell_item_mega_cat_ajax = null;
		} else {
			$pixwell_item_mega_cat_ajax = esc_attr( $item->pixwell_mega_cat_ajax[0] );
		}
		if ( empty( $item->pixwell_mega_col ) ) {
			$pixwell_item_mega_col = null;
		} else {
			$pixwell_item_mega_col = esc_attr( $item->pixwell_mega_col );
		}

		if ( empty( $item->pixwell_mega_col_bg ) ) {
			$pixwell_item_mega_col_bg = null;
		} else {
			$pixwell_item_mega_col_bg = esc_attr( $item->pixwell_mega_col_bg );
		}

		if ( empty( $item->pixwell_sub_image ) ) {
			$pixwell_item_mega_sub_image = null;
		} else {
			$pixwell_item_mega_sub_image = esc_attr( $item->pixwell_sub_image );
		}

		$removed_args = array( 'action', 'customlink-tab', 'edit-menu-item', 'menu-item', 'page-tab', '_wpnonce', );
		$original_title = '';

		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) ) {
				$original_title = false;
			}
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title  = $original_object->post_title;
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive' ),
		);

		$title = $item->title;

		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			$title     = sprintf( esc_html__( '%s (Invalid)', 'pixwell' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			$title     = sprintf( esc_html__( '%s (Pending)', 'pixwell' ), $item->title );
		}

		$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

		$submenu_text = '';
		if ( 0 == $depth ) {
			$submenu_text = 'style="display: none;"';
		} ?>
	<li id="menu-item-<?php echo esc_attr( $item_id ); ?>" class="<?php echo implode( ' ', $classes ); ?>">
		<dl class="menu-item-bar">
			<dt class="menu-item-handle">
				<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo esc_attr( $submenu_text ); ?>><?php esc_html_e( 'sub item', 'pixwell' ); ?></span></span>
                    <span class="item-controls">
                        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                        <span class="item-order hide-if-js">
                            <a href="<?php echo wp_nonce_url( add_query_arg(array( 'action'    => 'move-up-menu-item','menu-item' => $item_id), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ))),'move-menu_item');?>" class="item-move-up"><abbr title="<?php esc_attr_e( 'Move up', 'pixwell' ); ?>">&#8593;</abbr></a>|
                            <a href="<?php echo wp_nonce_url( add_query_arg( array( 'action'    => 'move-down-menu-item', 'menu-item' => $item_id), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ))), 'move-menu_item');?>" class="item-move-down"><abbr title="<?php esc_attr_e( 'Move down', 'pixwell' ); ?>">&#8595;</abbr></a>
                        </span>
                        <a class="item-edit" id="edit-<?php echo esc_attr( $item_id ); ?>" title="<?php echo esc_attr( 'Edit Menu Item' ); ?>" href="<?php echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : esc_url( add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) ) ); ?>"><?php esc_html_e( 'Edit Menu Item', 'pixwell' ); ?></a>
                    </span>
			</dt>
		</dl>
		<div class="menu-item-settings clearfix" id="menu-item-settings-<?php echo esc_attr( $item_id ); ?>">
			<?php if ( 'custom' == $item->type ) : ?>
				<p class="field-url description description-wide">
					<label for="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>">
						<?php esc_html_e( 'URL', 'pixwell' ); ?><br/>
						<input type="text" id="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_url( $item->url ); ?>"/>
					</label>
				</p>
			<?php endif; ?>

			<p class="description description-thin">
				<label for="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'Navigation Label', 'pixwell' ); ?><br/>
					<input type="text" id="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->title ); ?>"/>
				</label>
			</p>
			<p class="description description-thin">
				<label for="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'Title Attribute', 'pixwell' ); ?><br/>
					<input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>"/>
				</label>
			</p>
			<p class="field-link-target description">
				<label for="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>">
					<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $item->target, '_blank' ); ?> />
					<?php esc_html_e( 'Open link in a new window/tab', 'pixwell' ); ?>
				</label>
			</p>

			<p class="field-css-classes description description-thin">
				<label for="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'CSS Classes (optional)', 'pixwell' ); ?><br/>
					<input type="text" id="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( implode( ' ', $item->classes ) ); ?>"/>
				</label>
			</p>

			<p class="field-xfn description description-thin">
				<label for="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'Link Relationship (XFN)', 'pixwell' ); ?><br/>
					<input type="text" id="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>"/>
				</label>
			</p>

			<!-- category mega menu -->
			<?php if ( 0 == $depth && ( ( $item->object == 'category' ) ) ) :?>
				<p class="field-ruby-mega description">
					<label class="rb-meta-menu-label" for="edit-menu-item-pixwell-cat-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Category Mega Menu: ', 'pixwell' ); ?></label>
					<input type="checkbox" id="edit-menu-item-pixwell-cat-<?php echo esc_attr( $item_id ); ?>" name="menu-item-pixwell-cat[<?php echo esc_attr( $item_id ); ?>]" value="1" <?php checked( $pixwell_item_mega_cat, 1 ); ?> />
					<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php esc_html_e( 'Display the latest posts of this category', 'pixwell' ); ?></span>
				</p>


				<p class="field-ruby-mega description">
					<label class="rb-meta-menu-label" for="edit-menu-item-pixwell-cat-ajax-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Ajax pagination: ', 'pixwell' ); ?></label>
					<input type="checkbox" id="edit-menu-item-pixwell-cat-ajax-<?php echo esc_attr( $item_id ); ?>" name="menu-item-pixwell-cat-ajax[<?php echo esc_attr( $item_id ); ?>]" value="1" <?php checked( $pixwell_item_mega_cat_ajax, 1 ); ?> />
					<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php esc_html_e( 'Enable ajax pagination for blog listing of this mega item', 'pixwell' ); ?></span>
				</p>
			<?php endif; ?>
			<!-- column mega menu -->
			<?php if ( $depth == 0 && ( $item->object == 'custom' ) ) { ?>
				<p class="field-ruby-mega description description-wide">
					<label class="rb-meta-menu-label" for="edit-menu-item-pixwell-col-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Columns Mega Menu', 'pixwell' ); ?></label>
					<select id="edit-menu-item-pixwell-col-<?php echo esc_attr( $item_id ); ?>" name="menu-item-pixwell-col[<?php echo esc_attr( $item_id ); ?>]">
						<option value="0" <?php echo ( empty($pixwell_item_mega_col) ) ? 'selected' : ''; ?>><?php esc_html_e('--Disabled--', 'pixwell') ?></option>
						<option value="1" <?php echo ( ! empty( $pixwell_item_mega_col ) ) ? 'selected' : ''; ?>><?php esc_html_e('Enable', 'pixwell') ?></option>
					</select>
					<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php esc_html_e( 'Enable Mega Column for this item. This option only applies if you assign this menu to "Main Menu" location.', 'pixwell' ); ?></span>
				</p>
				<p class="field-ruby-mega description description-wide">
					<label class="rb-meta-menu-label" for="edit-menu-item-pixwell-col-bg-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Background Attachment: ', 'pixwell' ); ?></label>
					<input type="text" id="edit-menu-item-pixwell-col-bg-<?php echo esc_attr( $item_id ); ?>"  name="menu-item-pixwell-col-bg[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_url( $pixwell_item_mega_col_bg ); ?>"/>
					<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php esc_html_e( 'Add or input (optional) the attachment background image (.jpg, .png or .gif format).', 'pixwell' ); ?></span>
				</p>
			<?php } ?>
			<?php if ( $depth == 1 && ( $item->object == 'custom' ) ) { ?>
				<p class="field-ruby-mega description description-wide">
					<label class="rb-meta-menu-label" for="edit-menu-item-pixwell-col-image-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Sub Menu Image (Attachment):', 'pixwell' ); ?></label>
					<input type="text" id="edit-menu-item-pixwell-col-image-<?php echo esc_attr( $item_id ); ?>"  name="menu-item-pixwell-sub-image[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_url( $pixwell_item_mega_sub_image); ?>"/>
					<span style="display: block; font-size: 12px; font-style: italic; margin-top: 5px; color: #aaa"><?php esc_html_e( 'Sub-menu image type. when you add it as a sub menu of columns mega menu (.jpg, .png or .gif format).', 'pixwell' ); ?></span>
				</p>
			<?php } ?>
			<p class="field-description description description-wide">
				<label for="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>">
					<?php esc_html_e( 'Description', 'pixwell' ); ?><br/>
					<textarea id="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr( $item_id ); ?>]">
						<?php echo esc_html( $item->description ); ?></textarea>
					<span class="description"><?php esc_html_e( 'The description will be displayed in the menu if the current theme supports it.', 'pixwell' ); ?></span>
				</label>
			</p>
			<?php if ( $depth == 0 && ( $item->object == 'custom' ) ) : ?>
				<p class="field-ruby-mega-info"><?php esc_html_e( 'Save the menu and reload the page to see the "sub image menu type" feature.', 'pixwell' ); ?></p>
			<?php endif; ?>
			<p class="field-move hide-if-no-js description description-wide">
				<label>
					<span><?php esc_html_e( 'Move', 'pixwell' ); ?></span>
					<a href="#" class="menus-move-up"><?php esc_html_e( 'Up one', 'pixwell' ); ?></a>
					<a href="#" class="menus-move-down"><?php esc_html_e( 'Down one', 'pixwell' ); ?></a>
					<a href="#" class="menus-move-left"></a>
					<a href="#" class="menus-move-right"></a>
					<a href="#" class="menus-move-top"><?php esc_html_e( 'To the top', 'pixwell' ); ?></a>
				</label>
			</p>
			<div class="menu-item-actions description-wide submitbox">
				<?php if ( 'custom' != $item->type && $original_title !== false ) : ?>
					<p class="link-to-original">
						<?php printf( esc_html__( 'Original: %s', 'pixwell' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
					</p>
				<?php endif; ?>
				<a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $item_id ); ?>" href="<?php echo wp_nonce_url(add_query_arg( array('action'=> 'delete-menu-item','menu-item' => $item_id), admin_url( 'nav-menus.php' )),'delete-menu_item_' . $item_id); ?>"><?php esc_html_e( 'Remove', 'pixwell' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span>
				<a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr( $item_id ); ?>"href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel'=> time()), admin_url( 'nav-menus.php' ) ) );?>#menu-item-settings-<?php echo esc_attr( $item_id ); ?>"><?php esc_html_e( 'Cancel', 'pixwell' ); ?></a>
			</div>

			<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item_id ); ?>"/>
			<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>"/>
			<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object ); ?>"/>
			<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>"/>
			<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>"/>
			<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr( $item_id ); ?>]"  value="<?php echo esc_attr( $item->type ); ?>"/>
		</div>
		<!-- .menu-item-settings-->
		<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}
}

/** override default */
if ( ! function_exists( 'pixwell_megamenu_walker' ) ) {
	function pixwell_megamenu_walker( $walker ) {
		if ( $walker === 'Walker_Nav_Menu_Edit' ) {
			$walker = 'pixwell_walker_backend';
		}

		return $walker;
	}
}

/** save custom menu settings */
if ( ! function_exists( 'pixwell_mega_walker_save' ) ) {
	function pixwell_mega_walker_save( $menu_id, $menu_item_db_id ) {

		if ( isset( $_POST['menu-item-pixwell-cat'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_pixwell_mega_cat', esc_attr( $_POST['menu-item-pixwell-cat'][ $menu_item_db_id ] ) );
		} else {
			update_post_meta( $menu_item_db_id, '_pixwell_mega_cat', '0' );
		}
		if ( isset( $_POST['menu-item-pixwell-cat-ajax'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_pixwell_mega_cat_ajax', esc_attr( $_POST['menu-item-pixwell-cat-ajax'][ $menu_item_db_id ] ) );
		} else {
			update_post_meta( $menu_item_db_id, '_pixwell_mega_cat_ajax', '0' );
		}
		if ( isset( $_POST['menu-item-pixwell-col'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_pixwell_mega_col', esc_attr( $_POST['menu-item-pixwell-col'][ $menu_item_db_id ] ) );
		} else {
			update_post_meta( $menu_item_db_id, '_pixwell_mega_col', '0' );
		}
		if ( isset( $_POST['menu-item-pixwell-col-bg'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_pixwell_mega_col_bg', esc_attr( $_POST['menu-item-pixwell-col-bg'][ $menu_item_db_id ] ) );
		} else {
			update_post_meta( $menu_item_db_id, '_pixwell_mega_col_bg', '0' );
		}

		if ( isset( $_POST['menu-item-pixwell-sub-image'][ $menu_item_db_id ] ) ) {
			update_post_meta( $menu_item_db_id, '_pixwell_sub_image', esc_attr( $_POST['menu-item-pixwell-sub-image'][ $menu_item_db_id ] ) );
		} else {
			update_post_meta( $menu_item_db_id, '_pixwell_sub_image', '0' );
		}
	}
}

/** load data */
if ( ! function_exists( 'pixwell_mega_walker_loader' ) ) {
	function pixwell_mega_walker_loader( $item ) {
		$item->pixwell_mega_cat      = get_post_meta( $item->ID, '_pixwell_mega_cat', true );
		$item->pixwell_mega_cat_ajax = get_post_meta( $item->ID, '_pixwell_mega_cat_ajax', true );
		$item->pixwell_mega_col      = get_post_meta( $item->ID, '_pixwell_mega_col', true );
		$item->pixwell_mega_col_bg   = get_post_meta( $item->ID, '_pixwell_mega_col_bg', true );
		$item->pixwell_sub_image     = get_post_meta( $item->ID, '_pixwell_sub_image', true );


		return $item;
	}
}

/** front-end mega menu */
if ( ! class_exists( 'pixwell_walker' ) ) {
	class pixwell_walker extends Walker_Nav_Menu {

		public function start_el( &$item_output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$indent      = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[]   = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

			$enable_mega_cat = $item->pixwell_mega_cat;
			$enable_mega_col = $item->pixwell_mega_col;
			$mega_col_bg     = $item->pixwell_mega_col_bg;
			$sub_image       = $item->pixwell_sub_image;

			$data_ajax_filter = '';

			if ( 1 == $depth && ( 'category' == $item->object ) ) {
				if ( ! empty( $item->menu_item_parent ) ) {
					$parent_id              = $item->menu_item_parent;
					$enable_mega_cat_parent = get_post_meta( $parent_id, '_pixwell_mega_cat', true );
					if ( ! empty( $enable_mega_cat_parent ) ) {
						$data_ajax_filter = ' ' . 'data-mega_sub_filter=' . '"' . esc_attr( $item->object_id ) . '"' . ' ';
					}
				};
			}

			if ( ( 1 == $enable_mega_cat ) && ( 0 == $item->menu_item_parent ) ) {
				$class_names .= ' is-mega-menu type-category';
			} elseif ( ( 1 == $enable_mega_col ) && ( 0 == $item->menu_item_parent ) ) {
				$class_names .= ' is-mega-menu type-column';
			}

			if ( ( 'custom' == $item->object ) && ( 1 == $depth ) && ! empty( $sub_image ) ) {
				$class_names .= ' is-menu-image';
			}

			$args        = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$atts                 = array();
			$atts['title']        = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target']       = ! empty( $item->target ) ? $item->target : '';
			$atts['rel']          = ! empty( $item->xfn ) ? $item->xfn : '';
			$atts['href']         = ! empty( $item->url ) ? $item->url : '';
			$atts['aria-current'] = $item->current ? 'page' : '';

			if ( empty( $item->url ) ) {
				$item_output .= $indent . '<li' . $id . $class_names . $data_ajax_filter . '>';
			} else {
				if ( $args->menu_id == 'main-menu' ) {
					$item_output .= $indent . '<li' . $id . $class_names . $data_ajax_filter . ' itemprop="name">';
					$atts['itemprop'] = 'url';
				} else {
					$item_output .= $indent . '<li' . $id . $class_names . $data_ajax_filter . '>';
				}
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			/** This filter is documented in wp-includes/post-template.php */
			$title = apply_filters( 'the_title', $item->title, $item->ID );
			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

			if ( ! empty( $args->before ) ) {
				$item_output = $args->before;
			}

			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			if ( ( 'category' == $item->object ) && ( 1 == $enable_mega_cat ) && ( 0 == $item->menu_item_parent ) ) {
				$item_output .= '<div class="mega-category sub-mega sub-menu">';
				$item_output .= '<div class="rbc-container">';
				$item_output .= '<div class="mega-holder">';
			} elseif ( ( 'custom' == $item->object ) && ! empty( $enable_mega_col ) && ( 0 == $item->menu_item_parent ) ) {
				if ( empty( $enable_mega_col_bg ) ) {
					$item_output .= '<div class="mega-col sub-mega sub-menu">';
				} else {
					$item_output .= '<div class="mega-col sub-mega sub-menu is-mega-bg" style="background-image: url(' . esc_url( $mega_col_bg ) . ')">';
				}
			}
			if ( ( 'custom' == $item->object ) && ( 1 == $depth ) && ! empty( $sub_image ) ) {
				$item_output .= '<div class="sub-menu-image"><img src="' . esc_url( $sub_image ) . '" alt="' . wp_strip_all_tags($title). '"/></div>';
			}
		}

		/**
		 * @param string $item_output
		 * @param object $item
		 * @param int $depth
		 * @param array $args
		 * end el
		 */
		public function end_el( &$item_output, $item, $depth = 0, $args = array() ) {

			$enable_mega_cat = $item->pixwell_mega_cat;
			$enable_mega_col = $item->pixwell_mega_col;
			$mega_ajax       = $item->pixwell_mega_cat_ajax;
			$current_classes = $item->classes;

			$item_has_children = false;

			if ( is_array( $current_classes ) ) {
				if ( in_array( 'menu-item-has-children', $current_classes ) ) {
					$item_has_children = true;
				}
			}
			if ( ( 'category' == $item->object ) && ( 1 == $enable_mega_cat ) && ( 0 == $item->menu_item_parent ) ) {
				$settings              = array();
				$settings ['category'] = $item->object_id;
				$settings['uuid'] = 'block-mega-' . rand( 1, 999 ) . '-' . esc_attr( $item->ID );
				if ( ! empty( $mega_ajax ) ) {
					$settings['pagination'] = 'next_prev';
				}
				if ( false === $item_has_children ) {
					$settings['posts_per_page'] = 5;
					$settings['classes']     = 'fw-block fw-mega-cat';
				} else {
					$settings['posts_per_page'] = 4;
					$settings['classes']     = 'fw-block fw-mega-cat has-menu-children';
				}
				ob_start();
				pixwell_mega_menu( $settings );
				$item_output .= ob_get_clean();
			};

			if ( 0 == $item->menu_item_parent ) {
				if ( ( 1 == $enable_mega_cat ) ) {
					$item_output .= '</div></div></div>';
				} elseif ( 1 == $enable_mega_col ) {
					$item_output .= '</div>';
				}
			}

			$item_output .= '</li>';
		}


		/**
		 * @param string $item_output
		 * @param int $depth
		 * @param array $args
		 * start lvl
		 */
		function start_lvl( &$output, $depth = 0, $args = array()  ) {

			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = str_repeat( $t, $depth );

			$classes = array( 'sub-menu' );

			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$output .= "{$n}{$indent}<ul$class_names>{$n}";

		}

		/**
		 * @param string $item_output
		 * @param int $depth
		 * @param array $args
		 * end lvl
		 */
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent  = str_repeat( $t, $depth );
			$output .= "$indent</ul>{$n}";
		}
	}
}

/** add span tag to item */
if ( ! function_exists( 'pixwell_add_span_sub_menu' ) ) {
	function pixwell_add_span_sub_menu( $title, $item, $args, $depth ) {
		return '<span>' . $title . '</span>';
	}
}

/** fallback menu */
if ( ! function_exists( 'pixwell_navigation_fallback' ) ) {
	function pixwell_navigation_fallback() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		} ?>
		<div class="rb-error">
			<p><?php esc_html_e( 'Please assign a menu to the "Main Menu" location under ', 'pixwell' ); ?><a href="<?php echo get_admin_url( get_current_blog_id(), 'nav-menus.php?action=locations' ); ?>"><?php esc_html_e( 'Manage Locations', 'pixwell' ); ?></a></p>
		</div>
	<?php
	}
}

/** off-canvas fallback menu */
if ( ! function_exists( 'pixwell_nav_ls_fallback' ) ) {
	function pixwell_nav_ls_fallback() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		} ?>
		<div class="rb-error">
			<p><?php esc_html_e( 'Please assign a menu to the Left Aside Menu (Mobile Menu) location under ', 'pixwell' ); ?>
				<a href="<?php echo get_admin_url( get_current_blog_id(), 'nav-menus.php?action=locations' ); ?>"><?php esc_html_e( 'Manage Locations', 'pixwell' ); ?></a>
			</p>
		</div>
	<?php
	}
}

