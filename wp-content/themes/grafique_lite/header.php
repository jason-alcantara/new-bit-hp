<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Grafique_lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119353339-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119353339-1');
</script>
<?php grafique_lite_get_page_preloader(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'grafique_lite' ); ?></a>
	<header id="masthead" <?php grafique_lite_header_class(); ?> role="banner">
		<?php grafique_lite_ads_header() ?>
		<?php get_template_part( 'template-parts/header/mobile-panel' ); ?>
		<?php get_template_part( 'template-parts/header/top-panel', get_theme_mod( 'header_layout_type', grafique_lite_theme()->customizer->get_default( 'header_layout_type' ) ) ); ?>

		<div <?php grafique_lite_header_container_class(); ?>>
			<?php get_template_part( 'template-parts/header/layout', get_theme_mod( 'header_layout_type', grafique_lite_theme()->customizer->get_default( 'header_layout_type' ) ) ); ?>
		</div><!-- .header-container -->
	</header><!-- #masthead -->

	<div id="content" <?php grafique_lite_content_class(); ?>>
