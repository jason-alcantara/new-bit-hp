<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grafique_lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php grafique_lite_ads_post_before_content() ?>


	<div class="primary-wrap">
		<header class="entry-header">
			<div class="entry-meta"><?php
				get_template_part( 'template-parts/post/post-meta/content-meta-date' );
				get_template_part( 'template-parts/post/post-meta/content-meta-author' );
				get_template_part( 'template-parts/post/post-meta/content-meta-categories' );
			?></div>
		<?php
			get_template_part( 'template-parts/post/post-components/post-title' );
		?></header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links__title">' . esc_html__( 'Pages:', 'grafique_lite' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span class="page-links__item">',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'grafique_lite' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<div class="entry-meta-container">
				<div class="entry-meta entry-meta--left"><?php
					get_template_part( 'template-parts/post/post-meta/content-meta-tags' );
					grafique_lite_share_buttons( 'single' );
				?></div>
			</div>
		</footer><!-- .entry-footer -->

	</div><!-- .post__right-col -->

</article><!-- #post-## -->
