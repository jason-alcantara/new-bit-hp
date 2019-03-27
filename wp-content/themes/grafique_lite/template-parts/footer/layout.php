<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Grafique_lite
 */

$footer_logo_visibility    = get_theme_mod( 'footer_logo_visibility', grafique_lite_theme()->customizer->get_default( 'footer_logo_visibility' ) );
$footer_menu_visibility    = get_theme_mod( 'footer_menu_visibility', grafique_lite_theme()->customizer->get_default( 'footer_menu_visibility' ) );
?>

<div <?php grafique_lite_footer_container_class(); ?>>

	<?php if ( $footer_logo_visibility || $footer_menu_visibility ) { ?>
		<div class="site-info container site-info-first-row">
			<div class="site-info-wrap">
				<div class="site-info-block"><div class="footer-logo--with-slogan"><?php
					grafique_lite_footer_logo();
					grafique_lite_site_description();
				?></div></div>
				<?php grafique_lite_footer_menu(); ?>
			</div>
		</div><!-- .site-info-first-row -->
	<?php } ?>

	<div class="site-info container site-info-second-row">
		<div class="site-info-wrap">
			<div class="site-info-block"><?php
				grafique_lite_footer_copyright();
			?></div>
			<?php grafique_lite_social_list( 'footer' ); ?>
		</div>
	</div><!-- .site-info-second-row -->

</div><!-- .container -->
