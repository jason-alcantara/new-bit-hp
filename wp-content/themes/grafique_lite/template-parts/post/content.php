<?php
/**
 * Template part for displaying posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grafique_lite
 */
?>

<?php
	$blog_layout_type    = get_theme_mod( 'blog_layout_type', grafique_lite_theme()->customizer->get_default( 'blog_layout_type' ) );
	$blog_featured_image = get_theme_mod( 'blog_featured_image', grafique_lite_theme()->customizer->get_default( 'blog_featured_image' ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>
	<div class="posts-list">
		<div class="entry-meta head-elemetns">
				<?php get_template_part( 'template-parts/post/post-components/post-sticky' ); ?>
				<?php get_template_part( 'template-parts/post/post-meta/content-meta-comments' ); ?>
		</div>
		<figure class="post-thumbnail"><?php
			get_template_part( 'template-parts/post/post-components/post-image' );
			?>
		</figure><!-- .post-thumbnail -->
		<div class="posts-list__item-content">
			<header class="entry-header entry-meta"><?php
				get_template_part( 'template-parts/post/post-meta/content-meta-date' );
				get_template_part( 'template-parts/post/post-meta/content-meta-author' );
				get_template_part( 'template-parts/post/post-meta/content-meta-categories' );
			?></header><!-- .entry-header -->

			<div class="entry-content"><?php
				get_template_part( 'template-parts/post/post-components/post-title' );
				get_template_part( 'template-parts/post/post-components/post-content' );
			?></div><!-- .entry-content -->

			<footer class="entry-footer">
				<div class="entry-footer-bottom">
					<div class="entry-meta-container"><?php
						get_template_part( 'template-parts/post/post-meta/content-meta-tags' );
					?></div><!-- .entry-meta-container -->
				<?php
					get_template_part( 'template-parts/post/post-components/post-button' );
					get_template_part( 'template-parts/post/post-components/post-share-button' );
				?>
			</div><!-- .entry-footer-bottom -->
			</footer><!-- .entry-footer -->
		</div><!-- .posts-list__item-content -->
	</div>

</article><!-- #post-## -->
