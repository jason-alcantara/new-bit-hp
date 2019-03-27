<?php
/**
 * The base template.
 *
 * @package Grafique_lite
 */
?>
<?php get_header( grafique_lite_template_base() ); ?>

	<?php grafique_lite_site_breadcrumbs(); ?>

	<?php do_action( 'grafique_lite_render_widget_area', 'full-width-header-area' ); ?>

	<div <?php grafique_lite_content_wrap_class(); ?>>

		<?php do_action( 'grafique_lite_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

			<div id="primary" <?php grafique_lite_primary_content_class(); ?>>

				<?php do_action( 'grafique_lite_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include grafique_lite_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'grafique_lite_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->

			<?php grafique_lite_get_sidebar(); ?>

		</div><!-- .row -->

		<?php do_action( 'grafique_lite_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .site-content_wrap -->

	<?php do_action( 'grafique_lite_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( grafique_lite_template_base() ); ?>
