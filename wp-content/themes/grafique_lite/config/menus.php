<?php
/**
 * Menus configuration.
 *
 * @package Grafique_lite
 */

add_action( 'after_setup_theme', 'grafique_lite_register_menus', 5 );
/**
 * Register menus.
 */
function grafique_lite_register_menus() {

	register_nav_menus( array(
		'top'          => esc_html__( 'Top', 'grafique_lite' ),
		'main'         => esc_html__( 'Main', 'grafique_lite' ),
		'main_landing' => esc_html__( 'Landing Main', 'grafique_lite' ),
		'footer'       => esc_html__( 'Footer', 'grafique_lite' ),
		'social'       => esc_html__( 'Social', 'grafique_lite' ),
	) );
}
