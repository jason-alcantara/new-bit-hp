<?php
/**
 * Template part for mobile panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grafique_lite
 */
?>
<div class="mobile-panel invert">
	<div class="mobile-panel__inner">
		<?php grafique_lite_menu_toggle( 'main-menu' ); ?>
		<div class="header-components">
			<?php grafique_lite_header_search_toggle(); ?>
		</div>
	</div>
	<?php grafique_lite_header_search( '<div class="header-search">%s<span class="search-form__close"></span></div>' ); ?>
</div>
