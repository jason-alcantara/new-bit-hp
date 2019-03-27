<?php
/**
 * The template for displaying footer widget area.
 *
 * @package Grafique_lite
 */
// Check footer-area visibility.
if ( ! get_theme_mod( 'footer_widget_area_visibility', grafique_lite_theme()->customizer->get_default( 'footer_widget_area_visibility' ) ) || ! is_active_sidebar( 'footer-area' ) ) {
	return;
} ?>

<div <?php echo grafique_lite_get_html_attr_class( array( 'footer-area-wrap' ), 'footer_widgets_bg' ); ?>>
	<div class="container">
		<?php do_action( 'grafique_lite_render_widget_area', 'footer-area' ); ?>
	</div>
</div>
