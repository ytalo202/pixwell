<?php
/** theme plugins */
add_action( 'tgmpa_register', 'pixwell_register_required_plugins' );

if ( ! function_exists( 'pixwell_register_required_plugins' ) ) {
	function pixwell_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => esc_html__( 'Pixwell Core', 'pixwell' ),
				'slug'               => 'pixwell-core',
				'source'             => get_theme_file_path( 'plugins/pixwell-core.zip' ),
				'required'           => true,
				'version'            => '2.3',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
			array(
				'name'               => esc_html__( 'Pixwell Importer', 'pixwell' ),
				'slug'               => 'pixwell-importer',
				'source'             => get_theme_file_path( 'plugins/pixwell-importer.zip' ),
				'required'           => true,
				'version'            => '2.3',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
			array(
				'name'               => 'Envato Market',
				'slug'               => 'envato-market',
				'source'             => get_theme_file_path( 'plugins/envato-market.zip' ),
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
			),
			array(
				'name'     => esc_html__( 'Breadcrumb NavXT', 'pixwell' ),
				'slug'     => 'breadcrumb-navxt',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Post Views Counter', 'pixwell' ),
				'slug'     => 'post-views-counter',
				'required' => false,
			),
			array(
				'name'               => esc_html__( 'Pixwell Deal', 'pixwell' ),
				'slug'               => 'pixwell-deal',
				'source'             => get_theme_file_path( 'plugins/pixwell-deal.zip' ),
				'required'           => false,
				'version'            => '1.0',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
		);

		$pixwell_config = array(
			'id'           => 'pixwell',
			'default_path' => '',
			'menu'         => 'pixwell-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'pixwell' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'pixwell' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'pixwell' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'pixwell' ),
				'notice_can_install_required'     => _n_noop( 'Pixwell the following plugin: %1$s.', 'Pixwell requires the following plugins: %1$s.', 'pixwell' ),
				'notice_can_install_recommended'  => _n_noop( 'Pixwell recommends the following plugin: %1$s.', 'Pixwell recommends the following plugins: %1$s.', 'pixwell' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'pixwell' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'pixwell' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'pixwell' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'pixwell' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with Pixwell: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with Pixwell: %1$s.', 'pixwell' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'pixwell' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'pixwell' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'pixwell' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'pixwell' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'pixwell' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'pixwell' ),
				'nag_type'                        => 'updated'
			)
		);

		tgmpa( $plugins, $pixwell_config );
	}
}