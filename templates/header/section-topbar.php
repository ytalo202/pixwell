<?php
/** Render Topbar */
$pixwell_topbar        = pixwell_get_option( 'topbar' );
$pixwell_topbar_width  = pixwell_get_option( 'topbar_width' );
$pixwell_topbar_social = pixwell_get_option( 'topbar_social' );
$pixwell_topbar_email  = pixwell_get_option( 'topbar_email' );
$pixwell_topbar_phone  = pixwell_get_option( 'topbar_phone' );

if ( empty( $pixwell_topbar ) && ! has_nav_menu( 'pixwell_menu_top' ) ) {
	return false;
}

$pixwell_classes = 'topbar-wrap';
if ( ! empty( $pixwell_topbar_width ) ) {
	$pixwell_classes = 'topbar-wrap is-fullwidth';
} ?>
<div class="<?php echo esc_attr($pixwell_classes); ?>">
	<div class="rbc-container">
		<div class="topbar-inner rb-m20-gutter">
			<div class="topbar-left">
				<?php
				$pixwell_topbar_email       = pixwell_get_option( 'topbar_email' );
				$pixwell_topbar_phone       = pixwell_get_option( 'topbar_phone' );
				$pixwell_topbar_link_action = pixwell_get_option( 'topbar_link_action' ); ?>
				<aside class="topbar-info">
				<?php if ( ! empty( $pixwell_topbar_phone ) ) : ?>
					<?php if ( ! empty( $pixwell_topbar_link_action ) ) : ?>
						<a class="info-phone" href="tel:<?php echo esc_html( $pixwell_topbar_phone ); ?>"><i class="rbi rbi-phone"></i><?php echo esc_html( $pixwell_topbar_phone ); ?></a>
					<?php else : ?>
						<span class="info-phone"><i class="rbi rbi-phone"></i><?php echo esc_html( $pixwell_topbar_phone ); ?></span>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ( ! empty( $pixwell_topbar_email ) ) : ?>
					<?php if ( ! empty( $pixwell_topbar_link_action ) ) : ?>
						<a class="info-email" href="mailto:<?php echo esc_html( $pixwell_topbar_email ); ?>"><i class="rbi rbi-envelope"></i><?php echo esc_html( $pixwell_topbar_email ); ?></a>
					<?php else : ?>
						<span class="info-email"><i class="rbi rbi-envelope"></i><?php echo esc_html( $pixwell_topbar_email ); ?></span>
					<?php endif; ?>
				<?php endif; ?>
				</aside>
				<?php
				if ( has_nav_menu( 'pixwell_menu_top' ) ) : ?>
					<nav id="topbar-navigation" class="topbar-menu-wrap">
						<?php wp_nav_menu(
							array(
								'theme_location' => 'pixwell_menu_top',
								'menu_id'        => 'topbar-menu',
								'menu_class'     => 'topbar-menu rb-menu',
								'depth'          => 3,
								'echo'           => true
							)
						); ?>
					</nav>
				<?php endif; ?>
			</div>
			<div class="topbar-right">
				<?php $pixwell_social_profile = pixwell_get_web_socials();
				if ( ! empty( $pixwell_topbar_social ) && ! empty( $pixwell_social_profile ) ) : ?>
					<div class="topbar-social tooltips-n">
						<?php echo pixwell_render_social_icons( $pixwell_social_profile, true ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>