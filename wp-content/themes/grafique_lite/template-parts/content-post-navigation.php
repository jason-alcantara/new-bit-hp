<?php
/**
 * Template part for single post navigation.
 *
 * @package Grafique_lite
 */

if ( ! get_theme_mod( 'single_post_navigation', grafique_lite_theme()->customizer->get_default( 'single_post_navigation' ) ) ) {
	return;
}

the_post_navigation( array(
	'prev_text' => esc_html__( 'Prev Post', 'grafique_lite' ),
	'next_text' => esc_html__( 'Next Post', 'grafique_lite' ),
) );
