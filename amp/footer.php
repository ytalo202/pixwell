<?php
$pixwell_copyright_text = pixwell_get_option( 'amp_copyright_text' );
$pixwell_back_top       = pixwell_get_option( 'amp_back_top' );
$pixwell_footer_menu    = pixwell_get_option( 'amp_footer_menu' ); ?>
<footer class="amp-wp-footer">
	<div>
		<h2 class="footer-logo"><?php echo esc_html( $this->get( 'blog_name' ) ); ?></h2>
		<?php if ( ! empty( $pixwell_footer_menu ) ) {
			wp_nav_menu( array(
				'container'       => 'aside',
				'container_class' => 'footer-link',
				'menu'            => $pixwell_footer_menu,
				'echo'            => true,
				'depth'           => 1,
			) );
		}
		if ( ! empty( $pixwell_copyright_text ) ): ?>
			<p class="footer-copyright"><?php echo wp_kses_post( $pixwell_copyright_text ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $pixwell_back_top ) ) : ?>
			<a href="#top" class="back-to-top">&uarr;</a>
		<?php endif; ?>
	</div>
</footer>
