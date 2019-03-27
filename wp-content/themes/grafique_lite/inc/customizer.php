<?php
/**
 * Theme Customizer.
 *
 * @package Grafique_lite
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function grafique_lite_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'grafique_lite_get_customizer_options' , array(
		'prefix'     => 'grafique_lite',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Identity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'grafique_lite' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'    => esc_html__( 'Show ToTop button', 'grafique_lite' ),
				'section'  => 'title_tagline',
				'priority' => 61,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'grafique_lite' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			/** `General Site settings` panel */
			'general_settings' => array(
				'title'    => esc_html__( 'General Site settings', 'grafique_lite' ),
				'priority' => 40,
				'type'     => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'    => esc_html__( 'Logo &amp; Favicon', 'grafique_lite' ),
				'priority' => 25,
				'panel'    => 'general_settings',
				'type'     => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'grafique_lite' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'grafique_lite' ),
					'text'  => esc_html__( 'Text', 'grafique_lite' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'grafique_lite' ),
				'description'     => esc_html__( 'Upload logo image', 'grafique_lite' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_header_logo_image',
			),
			'invert_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Logo Upload', 'grafique_lite' ),
				'description'     => esc_html__( 'Upload logo image', 'grafique_lite' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/invert-logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'grafique_lite' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'grafique_lite' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_header_logo_image',
			),
			'invert_retina_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Retina Logo Upload', 'grafique_lite' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'grafique_lite' ),
				'section'         => 'logo_favicon',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'grafique_lite' ),
				'section'         => 'logo_favicon',
				'default'         => 'Montserrat, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'grafique_lite' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => grafique_lite_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section'         => 'logo_favicon',
				'default'         => '600',
				'field'           => 'select',
				'choices'         => grafique_lite_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'         => 'logo_favicon',
				'default'         => '24',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'grafique_lite' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => grafique_lite_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'grafique_lite' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'grafique_lite' ),
					'minified' => esc_html__( 'Minified', 'grafique_lite' ),
				),
				'type'    => 'control',
			),
			'breadcrumbs_bg_color' => array(
				'title'   => esc_html__( 'Breadcrumbs background color', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'default' => '#f6f6f6',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'breadcrumbs_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'field'   => 'image',
				'default' => '%s/assets/images/texture.png',
				'type'    => 'control',
			),
			'breadcrumbs_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'default' => 'repeat',
				'field'   => 'select',
				'choices' => grafique_lite_get_bg_repeat(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'default' => 'center',
				'field'   => 'select',
				'choices' => grafique_lite_get_bg_position(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'default' => 'auto',
				'field'   => 'select',
				'choices' => grafique_lite_get_bg_size(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'grafique_lite' ),
				'section' => 'breadcrumbs',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => grafique_lite_get_bg_attachment(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_image_opacity' => array(
				'title'       => esc_html__( 'Background image opacity', 'grafique_lite' ),
				'section'     => 'breadcrumbs',
				'default'     => 1,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'grafique_lite' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'grafique_lite' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'grafique_lite' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'grafique_lite' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'grafique_lite' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'grafique_lite' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header type', 'grafique_lite' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'grafique_lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'grafique_lite' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'grafique_lite' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'grafique_lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'grafique_lite' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'grafique_lite' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'grafique_lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'grafique_lite' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'grafique_lite' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'grafique_lite' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'grafique_lite' ),
				'description' => esc_html__( 'Configure Color Scheme', 'grafique_lite' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'grafique_lite' ),
				'priority'    => 10,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#27bfe7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#bebebf',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#f6f6f6',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#8d8d8d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#27bfe7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#515151',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#515151',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#515151',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#515151',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#515151',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#27bfe7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'grafique_lite' ),
				'section' => 'regular_scheme',
				'default' => '#8d8d8d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'grafique_lite' ),
				'priority'    => 20,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#27bfe7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'grafique_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Greyscale colors` section */
			'grey_scheme' => array(
				'title'       => esc_html__( 'Greyscale colors', 'grafique_lite' ),
				'priority'    => 30,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),

			'grey_color_1' => array(
				'title'   => esc_html__( 'Grey color (1)', 'grafique_lite' ),
				'section' => 'grey_scheme',
				'default' => '#e8e8e8',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'grey_color_2' => array(
				'title'   => esc_html__( 'Grey color (2)', 'grafique_lite' ),
				'section' => 'grey_scheme',
				'default' => '#e8e8e8',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'grey_color_3' => array(
				'title'   => esc_html__( 'Grey color (3)', 'grafique_lite' ),
				'section' => 'grey_scheme',
				'default' => '#f6f6f6',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'grafique_lite' ),
				'description' => esc_html__( 'Configure typography settings', 'grafique_lite' ),
				'priority'    => 50,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'grafique_lite' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'body_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'body_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'body_typography',
				'default'     => '1.643',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'grafique_lite' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => grafique_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'    => esc_html__( 'H1 Heading', 'grafique_lite' ),
				'priority' => 10,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'h1_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'h1_typography',
				'default' => '200',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'h1_typography',
				'default'     => '50',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'h1_typography',
				'default'     => '1.19',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'grafique_lite' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => grafique_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'    => esc_html__( 'H2 Heading', 'grafique_lite' ),
				'priority' => 15,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'h2_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'h2_typography',
				'default' => '800',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'h2_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'h2_typography',
				'default'     => '1.434',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'grafique_lite' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => grafique_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'    => esc_html__( 'H3 Heading', 'grafique_lite' ),
				'priority' => 20,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'h3_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'h3_typography',
				'default' => '800',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'h3_typography',
				'default'     => '24',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'h3_typography',
				'default'     => '1.375',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'grafique_lite' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => grafique_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'    => esc_html__( 'H4 Heading', 'grafique_lite' ),
				'priority' => 25,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'h4_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'h4_typography',
				'default' => '800',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'h4_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'h4_typography',
				'default'     => '1.45',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'grafique_lite' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => grafique_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'    => esc_html__( 'H5 Heading', 'grafique_lite' ),
				'priority' => 30,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'h5_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'h5_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'h5_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'h5_typography',
				'default'     => '1.44',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'grafique_lite' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => grafique_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'    => esc_html__( 'H6 Heading', 'grafique_lite' ),
				'priority' => 35,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'h6_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'h6_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'h6_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'h6_typography',
				'default'     => '1.44',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'grafique_lite' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => grafique_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'grafique_lite' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.75',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Meta', 'grafique_lite' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'meta_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'meta_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'meta_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'meta_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'meta_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'meta_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'meta_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'meta_typography',
				'default'     => '1.75',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'meta_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),

			/** `Main menu` section */
			'main_menu_typography' => array(
				'title'       => esc_html__( 'Main menu', 'grafique_lite' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'main_menu_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'main_menu_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'main_menu_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'grafique_lite' ),
				'section' => 'main_menu_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_styles(),
				'type'    => 'control',
			),
			'main_menu_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'main_menu_typography',
				'default' => '600',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'main_menu_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'grafique_lite' ),
				'section'     => 'main_menu_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'main_menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'grafique_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'grafique_lite' ),
				'section'     => 'main_menu_typography',
				'default'     => '1.643',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'main_menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'grafique_lite' ),
				'section'     => 'main_menu_typography',
				'default'     => '0.04',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'main_menu_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'grafique_lite' ),
				'section' => 'main_menu_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => grafique_lite_get_character_sets(),
				'type'    => 'control',
			),

			/** `Typography misc` section */
			'misc_styles' => array(
				'title'    => esc_html__( 'Misc', 'grafique_lite' ),
				'priority' => 60,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'word_wrap' => array(
				'title'   => esc_html__( 'Enable Word Wrap', 'grafique_lite' ),
				'section' => 'misc_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'light_font_weight_family' => array(
				'title'   => esc_html__( 'Font Family', 'grafique_lite' ),
				'section' => 'misc_styles',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'light_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'grafique_lite' ),
				'section' => 'misc_styles',
				'default' => '300',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),
			'bold_font_weight_family' => array(
				'title'   => esc_html__( 'Bold Font Family', 'grafique_lite' ),
				'section' => 'misc_styles',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'bold_font_weight' => array(
				'title'   => esc_html__( 'Bold Font Weight', 'grafique_lite' ),
				'section' => 'misc_styles',
				'default' => '700',
				'field'   => 'select',
				'choices' => grafique_lite_get_font_weight(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'    => esc_html__( 'Header', 'grafique_lite' ),
				'priority' => 60,
				'type'     => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'    => esc_html__( 'Styles', 'grafique_lite' ),
				'priority' => 5,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'grafique_lite' ),
				'section' => 'header_styles',
				'default' => 'style-1',
				'field'   => 'select',
				'choices' => grafique_lite_get_header_layout_options(),
				'type'    => 'control',
			),
			'header_transparent_layout' => array(
				'title'   => esc_html__( 'Header overlay', 'grafique_lite' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_invert_color_scheme' => array(
				'title'   => esc_html__( 'Enable invert color scheme', 'grafique_lite' ),
				'section' => 'header_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'grafique_lite' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#19191a',
				'type'    => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'grafique_lite' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'grafique_lite' ),
				'section' => 'header_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => grafique_lite_get_bg_repeat(),
				'type'    => 'control',
			),
			'header_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'grafique_lite' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => grafique_lite_get_bg_position(),
				'type'    => 'control',
			),
			'header_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'grafique_lite' ),
				'section' => 'header_styles',
				'default' => 'cover',
				'field'   => 'select',
				'choices' => grafique_lite_get_bg_size(),
				'type'    => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'grafique_lite' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => grafique_lite_get_bg_attachment(),
				'type'    => 'control',
			),

			/** `Header elements` section */
			'header_elements' => array(
				'title'       => esc_html__( 'Header Elements', 'grafique_lite' ),
				'priority'    => 15,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_search' => array(
				'title'   => esc_html__( 'Show search', 'grafique_lite' ),
				'section' => 'header_elements',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'    => esc_html__( 'Top Panel', 'grafique_lite' ),
				'priority' => 20,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'top_panel_visibility' => array(
				'title'   => esc_html__( 'Enable top panel', 'grafique_lite' ),
				'section' => 'header_top_panel',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_text' => array(
				'title'           => esc_html__( 'Disclaimer Text', 'grafique_lite' ),
				'description'     => esc_html__( 'HTML formatting support', 'grafique_lite' ),
				'section'         => 'header_top_panel',
				'default'         => esc_html__( 'Lorem ipsum dolor sit', 'grafique_lite' ),
				'field'           => 'textarea',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_top_panel_enable',
			),
			'top_panel_bg'        => array(
				'title'           => esc_html__( 'Background color', 'grafique_lite' ),
				'section'         => 'header_top_panel',
				'default'         => '#19191a',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_top_panel_enable',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'    => esc_html__( 'Main Menu', 'grafique_lite' ),
				'priority' => 30,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'grafique_lite' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable description', 'grafique_lite' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_style' => array(
				'title'   => esc_html__( 'Menu style', 'grafique_lite' ),
				'section' => 'header_main_menu',
				'default' => 'style-1',
				'field'   => 'radio',
				'choices' => array(
					'style-1' => esc_html__( 'Style 1', 'grafique_lite' ),
				),
				'type'    => 'control',
			),
			'more_button_type' => array(
				'title'   => esc_html__( 'More Menu Button Type', 'grafique_lite' ),
				'section' => 'header_main_menu',
				'default' => 'text',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'grafique_lite' ),
					'icon'  => esc_html__( 'Icon', 'grafique_lite' ),
					'text'  => esc_html__( 'Text', 'grafique_lite' ),
				),
				'type'    => 'control',
			),
			'more_button_text' => array(
				'title'           => esc_html__( 'More Menu Button Text', 'grafique_lite' ),
				'section'         => 'header_main_menu',
				'default'         => esc_html__( 'More', 'grafique_lite' ),
				'field'           => 'input',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_more_button_type_text',
			),
			'more_button_icon' => array(
				'title'           => esc_html__( 'More Menu Button Icon', 'grafique_lite' ),
				'section'         => 'header_main_menu',
				'field'           => 'iconpicker',
				'type'            => 'control',
				'default'         => 'arrows-1_minimal-down',
				'active_callback' => 'grafique_lite_is_more_button_type_icon',
				'icon_data'       => grafique_lite_get_nc_mini_icons_data(),
			),
			'more_button_image_url' => array(
				'title'           => esc_html__( 'More Button Image Upload', 'grafique_lite' ),
				'description'     => esc_html__( 'Upload More Button image', 'grafique_lite' ),
				'section'         => 'header_main_menu',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_more_button_type_image',
			),
			'retina_more_button_image_url' => array(
				'title'           => esc_html__( 'Retina More Button Image Upload', 'grafique_lite' ),
				'description'     => esc_html__( 'Upload More Button image for retina-ready devices', 'grafique_lite' ),
				'section'         => 'header_main_menu',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_more_button_type_image',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'grafique_lite' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'grafique_lite' ),
				'section' => 'sidebar_settings',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'grafique_lite' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'grafique_lite' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'grafique_lite' ),
				),
				'type' => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'grafique_lite' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'grafique_lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'grafique_lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'grafique_lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'grafique_lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'grafique_lite' ),
				'priority' => 110,
				'type'     => 'panel',
			),

			/** `Footer styles` section */
			'footer_styles' => array(
				'title'    => esc_html__( 'Footer Styles', 'grafique_lite' ),
				'priority' => 5,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_logo_visibility' => array(
				'title'   => esc_html__( 'Show Footer Logo', 'grafique_lite' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_logo_url' => array(
				'title'           => esc_html__( 'Logo upload', 'grafique_lite' ),
				'section'         => 'footer_styles',
				'field'           => 'image',
				'default'         => '%s/assets/images/footer-logo.png',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_footer_logo_enable',
			),
			'invert_footer_logo_url' => array(
				'title'           => esc_html__( 'Invert Logo Upload', 'grafique_lite' ),
				'description'     => esc_html__( 'Upload logo image', 'grafique_lite' ),
				'section'         => 'footer_styles',
				'default'         => '%s/assets/images/footer-logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_footer_logo_enable',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'grafique_lite' ),
				'section' => 'footer_styles',
				'default' => grafique_lite_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'grafique_lite' ),
				'section' => 'footer_styles',
				'default' => 'style-1',
				'field'   => 'select',
				'choices' => grafique_lite_get_footer_layout_options(),
				'type' => 'control',
			),
			'footer_bg_first' => array(
				'title'           => esc_html__( 'Footer Background first row color', 'grafique_lite' ),
				'section'         => 'footer_styles',
				'default'         => '#19191a',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_footer_style_1_enable',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'grafique_lite' ),
				'section' => 'footer_styles',
				'default' => '#19191a',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widget_area_visibility' => array(
				'title'   => esc_html__( 'Show Footer Widgets Area', 'grafique_lite' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'           => esc_html__( 'Widget Area Columns', 'grafique_lite' ),
				'section'         => 'footer_styles',
				'default'         => '4',
				'field'           => 'select',
				'choices'         => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_footer_area_enable',
			),
			'footer_widgets_bg' => array(
				'title'           => esc_html__( 'Footer Widgets Area Background color', 'grafique_lite' ),
				'section'         => 'footer_styles',
				'default'         => '#f6f6f6',
				'field'           => 'hex_color',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_footer_area_enable',
			),
			'footer_menu_visibility' => array(
				'title'   => esc_html__( 'Show Footer Menu', 'grafique_lite' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'    => esc_html__( 'Blog Settings', 'grafique_lite' ),
				'priority' => 115,
				'type'     => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'grafique_lite' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'grafique_lite' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'grafique_lite' ),
				),
				'type' => 'control',
			),
			'blog_sticky_type' => array(
				'title'   => esc_html__( 'Sticky label type', 'grafique_lite' ),
				'section' => 'blog',
				'default' => 'icon',
				'field'   => 'select',
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'grafique_lite' ),
					'icon'  => esc_html__( 'Font Icon', 'grafique_lite' ),
					'both'  => esc_html__( 'Text with Icon', 'grafique_lite' ),
				),
				'type' => 'control',
			),
			'blog_sticky_icon' => array(
				'title'           => esc_html__( 'Icon for sticky post', 'grafique_lite' ),
				'section'         => 'blog',
				'field'           => 'iconpicker',
				'default'         => 'ui-2_favourite-31',
				'icon_data'       => grafique_lite_get_nc_mini_icons_data(),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_sticky_icon',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'grafique_lite' ),
				'description'     => esc_html__( 'Label for sticky post', 'grafique_lite' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Featured', 'grafique_lite' ),
				'field'           => 'text',
				'active_callback' => 'grafique_lite_is_sticky_text',
				'type'            => 'control',
			),
			'blog_featured_image' => array(
				'title'           => esc_html__( 'Featured image', 'grafique_lite' ),
				'section'         => 'blog',
				'default'         => 'fullwidth',
				'field'           => 'select',
				'choices'         => array(
					'small'     => esc_html__( 'Small', 'grafique_lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'grafique_lite' ),
				),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_blog_featured_image',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'grafique_lite' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'grafique_lite' ),
					'full'    => esc_html__( 'Full content', 'grafique_lite' ),
					'none'    => esc_html__( 'Hide', 'grafique_lite' ),
				),
				'type' => 'control',
			),
			'blog_posts_content_length' => array(
				'title'           => esc_html__( 'Number of words in the excerpt', 'grafique_lite' ),
				'section'         => 'blog',
				'default'         => '27',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_blog_posts_content_type_excerpt',
			),
			'blog_read_more_btn' => array(
				'title'   => esc_html__( 'Show Read More button', 'grafique_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_read_more_text' => array(
				'title'           => esc_html__( 'Read More button text', 'grafique_lite' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Learn more', 'grafique_lite' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_blog_read_more_btn_enable',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'grafique_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'grafique_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'grafique_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'grafique_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'grafique_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'grafique_lite' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'grafique_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'grafique_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'grafique_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'grafique_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'grafique_lite' ),
				'section' => 'blog_post',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'grafique_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'grafique_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'grafique_lite' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'grafique_lite' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'           => esc_html__( 'Related posts block title', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => esc_html__( 'Recent posts', 'grafique_lite' ),
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_count' => array(
				'title'           => esc_html__( 'Number of post', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_grid' => array(
				'title'           => esc_html__( 'Layout', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => '2',
				'field'           => 'select',
				'choices'         => array(
					'2' => esc_html__( '2 columns', 'grafique_lite' ),
					'3' => esc_html__( '3 columns', 'grafique_lite' ),
					'4' => esc_html__( '4 columns', 'grafique_lite' ),
				),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_title' => array(
				'title'           => esc_html__( 'Show post title', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_title_length' => array(
				'title'           => esc_html__( 'Number of words in the title', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => '10',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_image' => array(
				'title'           => esc_html__( 'Show post image', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_content' => array(
				'title'           => esc_html__( 'Display content', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => 'hide',
				'field'           => 'select',
				'choices'         => array(
					'hide'         => esc_html__( 'Hide', 'grafique_lite' ),
					'post_excerpt' => esc_html__( 'Excerpt', 'grafique_lite' ),
					'post_content' => esc_html__( 'Content', 'grafique_lite' ),
				),
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_content_length' => array(
				'title'           => esc_html__( 'Number of words in the content', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => '10',
				'field'           => 'text',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_categories' => array(
				'title'           => esc_html__( 'Show post categories', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_tags' => array(
				'title'           => esc_html__( 'Show post tags', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_author' => array(
				'title'           => esc_html__( 'Show post author', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_publish_date' => array(
				'title'           => esc_html__( 'Show post publish date', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),
			'related_posts_comment_count' => array(
				'title'           => esc_html__( 'Show post comment count', 'grafique_lite' ),
				'section'         => 'related_posts',
				'default'         => true,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'grafique_lite_is_related_posts_enable',
			),

			/** `404` panel */
			'page_404_options' => array(
				'title'    => esc_html__( '404 Page Style', 'grafique_lite' ),
				'priority' => 130,
				'type'     => 'section',
			),
			'page_404_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'grafique_lite' ),
				'section' => 'page_404_options',
				'field'   => 'hex_color',
				'default' => '#ffffff',
				'type'    => 'control',
			),
			'page_404_image' => array(
				'title'   => esc_html__( '404 Image', 'grafique_lite' ),
				'section' => 'page_404_options',
				'field'   => 'image',
				'default' => '%s/assets/images/404.png',
				'type'    => 'control',
			),
			'page_404_text_color' => array(
				'title'       => esc_html__( 'Text Color', 'grafique_lite' ),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'grafique_lite' ),
				'section'     => 'page_404_options',
				'default'     => 'dark',
				'field'       => 'select',
				'choices'     => grafique_lite_get_text_color(),
				'type'        => 'control',
			),
			'page_404_btn_style_preset' => array(
				'title'   => esc_html__( 'Button Style Preset', 'grafique_lite' ),
				'section' => 'page_404_options',
				'default' => 'accent-1',
				'field'   => 'select',
				'choices' => grafique_lite_get_btn_style_presets(),
				'type'    => 'control',
			),
		),
	) );
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function grafique_lite_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function grafique_lite_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_header_logo_image( $control ) {
	return grafique_lite_is_setting( $control, 'header_logo_type', 'image' );
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_header_logo_text( $control ) {
	return grafique_lite_is_setting( $control, 'header_logo_type', 'text' );
}

/**
 * Return blog-featured-image true if blog layout type is default. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_blog_featured_image( $control ) {
	return grafique_lite_is_setting( $control, 'blog_layout_type', 'default' );
}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_sticky_text( $control ) {
	return grafique_lite_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_sticky_icon( $control ) {
	return grafique_lite_is_not_setting( $control, 'blog_sticky_type', 'label' );
}

/**
 * Return true if More button (in the main menu) has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_more_button_type_image( $control ) {
	return grafique_lite_is_setting( $control, 'more_button_type', 'image' );
}

/**
 * Return true if More button (in the main menu) has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_more_button_type_text( $control ) {
	return grafique_lite_is_setting( $control, 'more_button_type', 'text' );
}

/**
 * Return true if More button (in the main menu) has icon type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_more_button_type_icon( $control ) {
	return grafique_lite_is_setting( $control, 'more_button_type', 'icon' );
}

/**
 * Return true if option Show Related Posts Block is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_related_posts_enable( $control ) {
	return grafique_lite_is_setting( $control, 'related_posts_visible', true );
}

/**
 * Return true if option Enable Top Panel is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_top_panel_enable( $control ) {
	return grafique_lite_is_setting( $control, 'top_panel_visibility', true );
}

/**
 * Return true if option Show Footer Logo is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_footer_logo_enable( $control ) {
	return grafique_lite_is_setting( $control, 'footer_logo_visibility', true );
}

/**
 * Return true if option Show Footer Widgets Area is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_footer_area_enable( $control ) {
	return grafique_lite_is_setting( $control, 'footer_widget_area_visibility', true );
}

/**
 * Return true if option Footer style is layout-1. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_footer_style_1_enable( $control ) {
	return grafique_lite_is_setting( $control, 'footer_layout_type', 'style-1' );
}

/**
 * Return true if option Blog posts content is excerpt. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_blog_posts_content_type_excerpt( $control ) {
	return grafique_lite_is_setting( $control, 'blog_posts_content', 'excerpt' );
}

/**
 * Return true if option Show Read More button is enable. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_blog_read_more_btn_enable( $control ) {
	return grafique_lite_is_setting( $control, 'blog_read_more_btn', true );
}

/**
 * Return true if option Header Layout type is style-5. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function grafique_lite_is_header_layout_style_5( $control ) {
	return grafique_lite_is_setting( $control, 'header_layout_type', 'style-5' );
}

/**
 * Get default header layouts.
 *
 * @since  1.0.0
 * @return array
 */
function grafique_lite_get_header_layout_options() {
	return apply_filters( 'grafique_lite_header_layout_options', array(
		'style-1' => esc_html__( 'Style 1', 'grafique_lite' ),
	) );
}

/**
 * Get default footer layouts.
 *
 * @since  1.0.0
 * @return array
 */
function grafique_lite_get_footer_layout_options() {
	return apply_filters( 'grafique_lite_footer_layout_options', array(
		'style-1' => esc_html__( 'Style 1', 'grafique_lite' ),
	) );
}

/**
 * Get default header layouts options for Post Meta boxes
 *
 * @return array
 */
function grafique_lite_get_header_layout_pm_options() {
	$inherit_option = array(
		'inherit' => array(
			'label' => esc_html__( 'Inherit', 'grafique_lite' ),
		),
	);

	$header_layouts = grafique_lite_get_header_layout_options();
	$options        = array();

	foreach ( $header_layouts as $layout => $label ) {
		$options[ $layout ] = array(
			'label' => $label,
			'slave' => 'header_layout_type_' . str_replace( '-', '_', $layout ),
		);
	}

	return array_merge( $inherit_option, $options );
}

/**
 * Get default footer layouts options for Post Meta boxes
 *
 * @return array
 */
function grafique_lite_get_footer_layout_pm_options() {
	$inherit_option = array(
		'inherit' => esc_html__( 'Inherit', 'grafique_lite' ),
	);

	$options = grafique_lite_get_footer_layout_options();

	return array_merge( $inherit_option, $options );
}

// Change native customizer control (based on WordPress core).
add_action( 'customize_register', 'grafique_lite_customizer_change_core_controls', 20 );

// Bind JS handlers to instantly live-preview changes.
add_action( 'customize_preview_init', 'grafique_lite_customize_preview_js' );

/**
 * Change native customize control (based on WordPress core).
 *
 * @since 1.0.0
 * @param  object $wp_customize Object wp_customize.
 * @return void
 */
function grafique_lite_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section         = 'grafique_lite_logo_favicon';
	$wp_customize->get_section( 'background_image' )->priority = 45;
	$wp_customize->get_control( 'background_color' )->label    = esc_html__( 'Body Background Color', 'grafique_lite' );

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function grafique_lite_customize_preview_js() {
	wp_enqueue_script( 'grafique_lite-customize-preview', GRAFIQUE_LITE_THEME_JS . '/customize-preview.js', array( 'customize-preview' ), '1.0', true );
}

// Typography utility function
/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function grafique_lite_get_font_styles() {
	return apply_filters( 'grafique_lite_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'grafique_lite' ),
		'italic'  => esc_html__( 'Italic', 'grafique_lite' ),
		'oblique' => esc_html__( 'Oblique', 'grafique_lite' ),
		'inherit' => esc_html__( 'Inherit', 'grafique_lite' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function grafique_lite_get_character_sets() {
	return apply_filters( 'grafique_lite_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'grafique_lite' ),
		'greek'        => esc_html__( 'Greek', 'grafique_lite' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'grafique_lite' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'grafique_lite' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'grafique_lite' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'grafique_lite' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'grafique_lite' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function grafique_lite_get_text_aligns() {
	return apply_filters( 'grafique_lite_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'grafique_lite' ),
		'center'  => esc_html__( 'Center', 'grafique_lite' ),
		'justify' => esc_html__( 'Justify', 'grafique_lite' ),
		'left'    => esc_html__( 'Left', 'grafique_lite' ),
		'right'   => esc_html__( 'Right', 'grafique_lite' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function grafique_lite_get_font_weight() {
	return apply_filters( 'grafique_lite_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

// Background utility function
/**
 * Get background position
 *
 * @since 1.0.0
 * @return array
 */
function grafique_lite_get_bg_position() {
	return apply_filters( 'grafique_lite_get_bg_position', array(
		'top-left'      => esc_html__( 'Top Left', 'grafique_lite' ),
		'top-center'    => esc_html__( 'Top Center', 'grafique_lite' ),
		'top-right'     => esc_html__( 'Top Right', 'grafique_lite' ),
		'center-left'   => esc_html__( 'Middle Left', 'grafique_lite' ),
		'center'        => esc_html__( 'Middle Center', 'grafique_lite' ),
		'center-right'  => esc_html__( 'Middle Right', 'grafique_lite' ),
		'bottom-left'   => esc_html__( 'Bottom Left', 'grafique_lite' ),
		'bottom-center' => esc_html__( 'Bottom Center', 'grafique_lite' ),
		'bottom-right'  => esc_html__( 'Bottom Right', 'grafique_lite' ),
	) );
}

/**
 * Get background size
 *
 * @since 1.0.0
 * @return array
 */
function grafique_lite_get_bg_size() {
	return apply_filters( 'grafique_lite_get_bg_size', array(
		'auto'    => esc_html__( 'Auto', 'grafique_lite' ),
		'cover'   => esc_html__( 'Cover', 'grafique_lite' ),
		'contain' => esc_html__( 'Contain', 'grafique_lite' ),
	) );
}

/**
 * Get background repeat
 *
 * @since 1.0.0
 * @return array
 */
function grafique_lite_get_bg_repeat() {
	return apply_filters( 'grafique_lite_get_bg_repeat', array(
		'no-repeat' => esc_html__( 'No Repeat', 'grafique_lite' ),
		'repeat'    => esc_html__( 'Tile', 'grafique_lite' ),
		'repeat-x'  => esc_html__( 'Tile Horizontally', 'grafique_lite' ),
		'repeat-y'  => esc_html__( 'Tile Vertically', 'grafique_lite' ),
	) );
}

/**
 * Get background attachment
 *
 * @since 1.0.0
 * @return array
 */
function grafique_lite_get_bg_attachment() {
	return apply_filters( 'grafique_lite_get_bg_attachment', array(
		'scroll' => esc_html__( 'Scroll', 'grafique_lite' ),
		'fixed'  => esc_html__( 'Fixed', 'grafique_lite' ),
	) );
}

/**
 * Get text color
 *
 * @since 1.0.0
 * @return array
 */
function grafique_lite_get_text_color() {
	return apply_filters( 'grafique_lite_get_text_color', array(
		'light' => esc_html__( 'Light', 'grafique_lite' ),
		'dark'  => esc_html__( 'Dark', 'grafique_lite' ),
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function grafique_lite_get_dynamic_css_options() {
	return apply_filters( 'grafique_lite_get_dynamic_css_options', array(
		'prefix'        => 'grafique_lite',
		'type'          => 'theme_mod',
		'parent_handle' => 'grafique_lite-theme-style',
		'single'        => true,
		'css_files'     => array(
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic.css',

			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/header.css',
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/forms.css' ,
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/social.css',
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/post.css',
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/site/buttons.css',

			GRAFIQUE_LITE_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_bg_color',
			'breadcrumbs_bg_repeat',
			'breadcrumbs_bg_position',
			'breadcrumbs_bg_attachment',
			'breadcrumbs_bg_size',
			'breadcrumbs_bg_image_opacity',

			'meta_font_style',
			'meta_font_weight',
			'meta_font_size',
			'meta_line_height',
			'meta_font_family',
			'meta_letter_spacing',

			'main_menu_font_style',
			'main_menu_font_weight',
			'main_menu_font_size',
			'main_menu_line_height',
			'main_menu_font_family',
			'main_menu_letter_spacing',
			'light_font_weight',
			'light_font_weight_family',
			'bold_font_weight',
			'bold_font_weight_family',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'grey_color_1',
			'grey_color_2',
			'grey_color_3',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position',
			'header_bg_attachment',
			'header_bg_size',

			'page_404_bg_color',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg_first',
			'footer_bg',

			'onsale_badge_bg',
			'featured_badge_bg',
			'new_badge_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function grafique_lite_get_fonts_options() {
	return apply_filters( 'grafique_lite_get_fonts_options', array(
		'prefix'  => 'grafique_lite',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'meta' => array(
				'family'  => 'meta_font_family',
				'style'   => 'meta_font_style',
				'weight'  => 'meta_font_weight',
				'charset' => 'meta_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
			'misc' => array(
				'family'  => 'bold_font_weight_family',
				'weight'  => 'bold_font_weight',
			),
		),
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function grafique_lite_get_default_footer_copyright() {
	return esc_html__( '%%site-name%% Copyrirht &copy; %%year%% <a target="_blank" href="https://jetimpex.com/">Jetimpex</a>', 'grafique_lite' );
}

/**
 * Get default contact information.
 *
 * @since  1.0.0
 * @return string
 */
function grafique_lite_get_default_contact_information( $value ) {
	$contact_information = array(
		'work-time' => sprintf( '%1$s<br>%2$s', esc_html__( 'Mon – Fri: 10AM – 7PM;', 'grafique_lite' ), esc_html__( 'Sat – Sun: 10AM – 3PM', 'grafique_lite' ) ),
		'phones'    => sprintf( '<a href="tel:#">%1$s</a>', esc_html__( '(719) 445-2808', 'grafique_lite' ) ),
		'info'      => esc_html__( '24/7 Emergency Service', 'grafique_lite' ),
		'address'   => sprintf( '%1$s<br>%2$s', esc_html__( '4578 Marmora Road,', 'grafique_lite' ), esc_html__( 'Glasgow', 'grafique_lite' ) ),
	);

	return $contact_information[ $value ];
}

/**
 * Get FontAwesome icons set
 *
 * @return array
 */
function grafique_lite_get_icons_set() {

	static $font_icons;

	if ( ! $font_icons ) {

		ob_start();

		include GRAFIQUE_LITE_THEME_DIR . '/assets/js/icons.json';
		$json = ob_get_clean();

		$font_icons = array();
		$icons      = json_decode( $json, true );

		foreach ( $icons['icons'] as $icon ) {
			$font_icons[] = $icon['id'];
		}
	}

	return $font_icons;
}

/**
 * Get nc-outline icons set.
 *
 * @return array
 */
function grafique_lite_get_nc_outline_icons_set() {

	static $nc_outline_icons;

	if ( ! $nc_outline_icons ) {
		ob_start();

		include GRAFIQUE_LITE_THEME_DIR . '/assets/css/nucleo-outline.css';

		$result = ob_get_clean();

		preg_match_all( '/\.([-_a-zA-Z0-9]+):before[, {]/', $result, $matches );

		if ( ! is_array( $matches ) || empty( $matches[1] ) ) {
			return;
		}

		$nc_outline_icons = $matches[1];
	}

	return $nc_outline_icons;
}

/**
 * Get nc-mini icons set.
 *
 * @return array
 */
function grafique_lite_get_nc_mini_icons_set() {

	static $nc_mini_icons;

	if ( ! $nc_mini_icons ) {
		ob_start();

		include GRAFIQUE_LITE_THEME_DIR . '/assets/css/nucleo-mini.css';

		$result = ob_get_clean();

		preg_match_all( '/\.([-_a-zA-Z0-9]+):before[, {]/', $result, $matches );

		if ( ! is_array( $matches ) || empty( $matches[1] ) ) {
			return;
		}

		$nc_mini_icons = $matches[1];
	}

	return $nc_mini_icons;
}

/**
 * Get nc-outline icons data for iconpicker control.
 *
 * @return array
 */
function grafique_lite_get_nc_outline_icons_data() {
	return apply_filters( 'grafique_lite_nc_outline_icons_data', array(
		'icon_set'    => 'grafique_liteNucleoOutlineIcons',
		'icon_css'    => GRAFIQUE_LITE_THEME_URI . '/assets/css/nucleo-outline.css',
		'icon_base'   => 'nc-icon-outline',
		'icon_prefix' => '',
		'icons'       => grafique_lite_get_nc_outline_icons_set(),
	) );
}

/**
 * Get nc-mini icons data for iconpicker control.
 *
 * @return array
 */
function grafique_lite_get_nc_mini_icons_data() {
	return apply_filters( 'grafique_lite_nc_mini_icons_data', array(
		'icon_set'    => 'grafique_liteNucleoMiniIcons',
		'icon_css'    => GRAFIQUE_LITE_THEME_URI . '/assets/css/nucleo-mini.css',
		'icon_base'   => 'nc-icon-mini',
		'icon_prefix' => '',
		'icons'       => grafique_lite_get_nc_mini_icons_set(),
	) );
}

/**
 * Get header button style presets.
 *
 * @return array
 */
function grafique_lite_get_btn_style_presets() {
	return apply_filters( 'grafique_lite_get_btn_style_presets', array(
		'accent-1' => esc_html__( 'Accent button 1', 'grafique_lite' ),
		'accent-2' => esc_html__( 'Accent button 2', 'grafique_lite' ),
	) );
}