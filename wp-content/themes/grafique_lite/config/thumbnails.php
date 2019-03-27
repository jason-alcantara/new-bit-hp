<?php
/**
 * Thumbnails configuration.
 *
 * @package Grafique_lite
 */

add_action( 'after_setup_theme', 'grafique_lite_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function grafique_lite_register_image_sizes() {
	set_post_thumbnail_size( 370, 213, true );

	// Registers a new image sizes.
	add_image_size( 'grafique_lite-thumb-s-2', 120, 84, true );
	add_image_size( 'grafique_lite-thumb-s', 150, 150, true );
	add_image_size( 'grafique_lite-thumb-m', 460, 460, true );
	add_image_size( 'grafique_lite-thumb-l', 770, 443, true );
	add_image_size( 'grafique_lite-thumb-l-2', 766, 203, true );
	add_image_size( 'grafique_lite-thumb-xl', 1160, 508, true );

	add_image_size( 'grafique_lite-thumb-justify-5', 470, 270, true );
	add_image_size( 'grafique_lite-thumb-justify-7', 668, 270, true );
	add_image_size( 'grafique_lite-thumb-masonry', 560, 9999 );

	add_image_size( 'grafique_lite-slider-thumb', 150, 86, true );

	add_image_size( 'grafique_lite-thumb-260-147', 260, 147, true );
	add_image_size( 'grafique_lite-thumb-480-271', 480, 271, true );
	add_image_size( 'grafique_lite-thumb-560-315', 560, 315, true );
	add_image_size( 'grafique_lite-thumb-760-571', 760, 571, true );
}
