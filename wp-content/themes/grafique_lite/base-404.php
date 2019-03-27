<?php
/**
 * The base template for displaying 404 pages (not found).
 *
 * @package Grafique_lite
 */
?>
<?php get_header( grafique_lite_template_base() ); ?>

	<?php grafique_lite_site_breadcrumbs(); ?>

	<div <?php grafique_lite_content_wrap_class(); ?>>

		<div class="row">

			<div id="primary" <?php grafique_lite_primary_content_class(); ?>>

				<main id="main" class="site-main" role="main">

					<?php include grafique_lite_template_path(); ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php get_sidebar(); // Loads the sidebar.php. ?>

		</div><!-- .row -->

	</div><!-- .site-content_wrap -->

<?php get_footer( grafique_lite_template_base() ); ?>
