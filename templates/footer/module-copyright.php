<?php
$pixwell_copyright = pixwell_get_option( 'footer_copyright' );
if ( ! empty( $pixwell_copyright ) ) : ?>
	<div class="footer-copyright footer-section">
		<div class="rbc-container">
			<div class="copyright-inner rb-p20-gutter">
				<?php if ( ! empty( $pixwell_copyright ) ) : ?>
					<?php echo wp_kses_post( wpautop( $pixwell_copyright ) ) ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif;