<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grafique_lite
 */

// Don't show top panel if all elements are disabled.
if ( ! grafique_lite_is_top_panel_visible() ) {
	return;
}
?>

<div <?php echo grafique_lite_get_html_attr_class( array( 'top-panel' ), 'top_panel_bg' ); ?>>
	<div class="container">
		<div class="top-panel__container">
			<?php grafique_lite_top_message( '<div class="top-panel__message">%s</div>' ); ?>

			<div class="top-panel__wrap-items">
				<div class="top-panel__menus">
					<?php grafique_lite_top_menu(); ?>
					<?php grafique_lite_login_link(); ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- .top-panel -->
