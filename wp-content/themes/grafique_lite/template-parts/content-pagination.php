<?php
/**
 * Template part for posts pagination.
 *
 * @package Grafique_lite
 */

the_posts_pagination(
	array(
		'prev_text' => sprintf( '%s %s', '<i class="nc-icon-mini arrows-1_minimal-left"></i>', esc_html__( 'PREV', 'grafique_lite' ) ),
		'next_text' => sprintf( '%s %s', esc_html__( 'NEXT', 'grafique_lite' ), '<i class="nc-icon-mini arrows-1_minimal-right"></i>' ),
	)
);
