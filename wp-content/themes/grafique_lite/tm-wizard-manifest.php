<?php
/**
 * TM-Wizard configuration.
 *
 * @var array
 *
 * @package Grafique_lite
 */

$plugins = array(
	'elementor' => array(
		'name'   => esc_html__( 'Elementor Page Builder', 'grafique_lite' ),
		'access' => 'base',
	),
	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'grafique_lite' ),
		'access' => 'skins',
	),
	'cherry-data-importer' => array(
		'name'   => esc_html__( 'Cherry Data Importer', 'grafique_lite' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/CherryFramework/cherry-data-importer/archive/master.zip',
		'access' => 'base',
	),
	'jet-elements' => array(
		'name'   => esc_html__( 'Jet Elements addon For Elementor', 'grafique_lite' ),
		'source' => 'local',
		'path'   => GRAFIQUE_LITE_THEME_DIR . '/assets/includes/plugins/jet-elements.zip',
		'access' => 'base',
	),
);

/**
 * Skins configuration.
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'cherry-data-importer',
		'elementor',
		'jet-elements',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'contact-form-7',
			),
			'lite'  => false,
			'demo'  => 'http://ld-wp2.template-help.com/wptheme/grafique_lite/',
			'thumb' => get_template_directory_uri() . '/assets/demo-content/default-thumb.png',
			'name'  => esc_html__( 'Grafique_lite', 'grafique_lite' ),
		),
	),
);

$texts = array(
	'theme-name' => esc_html__( 'Grafique_lite', 'grafique_lite' ),
);
