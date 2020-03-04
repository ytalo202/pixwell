<?php
$pixwell_subscribe_url   = pixwell_get_option( 'header_subscribe_url' );
$pixwell_subscribe_text  = pixwell_get_option( 'header_subscribe_text' );
$pixwell_subscribe_desc  = pixwell_get_option( 'header_subscribe_desc' );
$pixwell_subscribe_image = pixwell_get_option( 'header_subscribe_image' );

if ( ! empty( $pixwell_subscribe_text ) && ! empty( $pixwell_subscribe_url ) ) : ?>
	<aside class="header-subscribe btn-wrap">
		<a href="<?php echo esc_url( $pixwell_subscribe_url ); ?>" rel="nofollow" class="subscribe-link">
			<?php if ( ! empty( $pixwell_subscribe_image['url'] ) ) : ?>
				<img src="<?php echo esc_url( $pixwell_subscribe_image['url'] ); ?>" alt="<?php echo esc_attr( $pixwell_subscribe_text ); ?>"/>
			<?php endif; ?>
			<div class="subscribe-content">
				<i class="rbi rbi-paperplane"></i>
				<span class="desc"><?php echo esc_html( $pixwell_subscribe_desc ); ?></span>
				<span class="action-text h5"><?php echo esc_html( $pixwell_subscribe_text ); ?></span>
			</div>
		</a>
	</aside>
<?php endif;
