<?php
/**
 * Template part for default header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grafique_lite
 */

$search_visible                  = get_theme_mod( 'header_search', grafique_lite_theme()->customizer->get_default( 'header_search' ) );
$visibility_in_header = get_theme_mod( 'header_social_links', grafique_lite_theme()->customizer->get_default( 'header_social_links' ) );
?>
<?php grafique_lite_header_search( '<div class="header-search">%s<span class="search-form__close"></span></div>' ); ?>
<div class="header-container_wrap container">
	<div class="header-container__flex-wrap">
		<div class="header-container__flex">
			<div class="site-branding">
				<?php grafique_lite_header_logo() ?>
				<?php grafique_lite_site_description(); ?>
			</div>
			<div class="header-nav-wrapper">
				<?php grafique_lite_main_menu(); ?>

				<?php if ( $search_visible ) : ?>
					<div class="header-components header-components__search-cart"><?php
						grafique_lite_header_search_toggle();

					?></div>
				<?php endif; ?>
				<?php if ( $visibility_in_header ) : ?>
				<?php grafique_lite_social_list( 'header' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
