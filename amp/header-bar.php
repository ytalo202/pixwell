<?php
/** "AMP top header */
$pixwell_amp_top_menu = pixwell_get_option( 'amp_top_menu' ); ?>
<header id="#top" class="amp-wp-header">
	<div>
		<?php
		if ( ! empty( $pixwell_amp_top_menu ) ) : ?>
			<span on="tap:sidebar-left.toggle">
				<span class="btn-toggle-wrap"><span class="btn-toggle"><span class="off-canvas-toggle"><span class="icon-toggle"></span></span></span></span>
			</span>
		<?php endif; ?>
		<a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>"><?php echo esc_html( $this->get( 'blog_name' ) ); ?></a>
	</div>
</header>