<?php
/**
 * Theme hooks.
 *
 * @package Grafique_lite
 */

// Menu description.
add_filter( 'walker_nav_menu_start_el', 'grafique_lite_nav_menu_description', 10, 4 );

// Sidebars classes.
add_filter( 'grafique_lite_widget_area_classes', 'grafique_lite_set_sidebar_classes', 10, 2 );

// Set footer columns.
add_filter( 'dynamic_sidebar_params', 'grafique_lite_get_footer_widget_layout' );

// Adapt default image post format classes to current theme.
add_filter( 'cherry_post_formats_image_css_model', 'grafique_lite_add_image_format_classes', 10, 2 );

// Enqueue misc js script.
add_filter( 'grafique_lite_theme_script_depends', 'grafique_lite_enqueue_misc' );

// Add to toTop and stickUp properties if required.
add_filter( 'grafique_lite_theme_script_variables', 'grafique_lite_js_vars' );

// Add has/no thumbnail classes for posts.
add_filter( 'post_class', 'grafique_lite_post_thumb_classes' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'grafique_lite_modify_comment_form' );

// Additional body classes.
add_filter( 'body_class', 'grafique_lite_extra_body_classes' );

// Render macros in text widgets.
add_filter( 'widget_text', 'grafique_lite_render_widget_macros' );

// Adds the meta viewport to the header.
add_action( 'wp_head', 'grafique_lite_meta_viewport', 0 );

// Customization for `Tag Cloud` widget.
add_filter( 'widget_tag_cloud_args', 'grafique_lite_customize_tag_cloud' );

// Changed excerpt more string.
add_filter( 'excerpt_more', 'grafique_lite_excerpt_more' );

// Creating wrappers for audio shortcode.
add_filter( 'wp_audio_shortcode', 'grafique_lite_audio_shortcode', 10, 5 );
add_filter( 'cherry_get_the_post_audio', 'grafique_lite_cherry_get_the_post_audio' );

// Set specific content classes.
add_filter( 'grafique_lite_content_classes', 'grafique_lite_set_specific_content_classes' );

// Set specific customizer settings.
add_filter( 'theme_mod_sidebar_position', 'grafique_lite_specific_sidebar_position' ); // temp

// Landing main menu location.
add_filter( 'grafique_lite_main_menu_args', 'grafique_lite_landing_main_menu_location' );

// Change gallery image size into single post and non-sidebar layout.
add_filter( 'cherry_get_the_post_gallery_defaults', 'grafique_lite_post_gallery_img_size', 10, 3 );

// Add invert classes if breadcrumbs sections is darken.
add_filter( 'cherry_breadcrumbs_wrapper_classes', 'grafique_lite_cherry_breadcrumbs_wrapper_classes' );

// Add dynamic css function.
add_filter( 'cherry_css_func_list', 'grafique_lite_add_dynamic_css_function' );

// Check for theme updates.
add_filter( 'http_request_args', 'grafique_lite_disable_wporg_request', 5, 2 );

// Add dynamic css plugins files.
add_filter( 'grafique_lite_get_dynamic_css_options', 'grafique_lite_add_dynamic_css_plugins_files' );

// Get custom background
add_filter( 'cherry_css_func_list', 'grafique_lite_get_custom_background_dynamic_func' );

/**
 * Append description into nav items
 *
 * @param  string $item_output The menu item output.
 * @param  WP_Post $item Menu item object.
 * @param  int $depth Depth of the menu.
 * @param  array $args wp_nav_menu() arguments.
 *
 * @return string
 */
function grafique_lite_nav_menu_description( $item_output, $item, $depth, $args ) {

	if ( 'main' !== $args->theme_location || ! $item->description ) {
		return $item_output;
	}

	$descr_enabled = get_theme_mod(
		'header_menu_attributes',
		grafique_lite_theme()->customizer->get_default( 'header_menu_attributes' )
	);

	if ( ! $descr_enabled ) {
		return $item_output;
	}

	$current     = $args->link_after . '</a>';
	$description = '<div class="menu-item__desc">' . $item->description . '</div>';
	$item_output = str_replace( $current, $description . $current, $item_output );

	return $item_output;
}

/**
 * Set layout classes for sidebars.
 *
 * @since  1.0.0
 * @uses   grafique_lite_get_layout_classes.
 *
 * @param  array $classes Additional classes.
 * @param  string $area_id Sidebar ID.
 *
 * @return array
 */
function grafique_lite_set_sidebar_classes( $classes, $area_id ) {

	if ( in_array( $area_id, array( 'sidebar' ) ) ) {
		if ( $area_id === 'shop-sidebar' ) {
			$classes[] .= 'sidebar';
		}

		return grafique_lite_get_layout_classes( 'sidebar', $classes );
	}

	if ( 'footer-area' == $area_id ) {
		$columns = get_theme_mod( 'footer_widget_columns', grafique_lite_theme()->customizer->get_default( 'footer_widget_columns' ) );

		if ( '1' !== $columns ) {
			$classes[] = sprintf( 'footer-area--%s-cols', $columns );
		} else {
			$classes[] = 'footer-area--fullwidth';
		}

		$classes[] = 'row';
	}

	return $classes;
}

/**
 * Get footer widgets layout class
 *
 * @since  1.0.0
 *
 * @param  string $params Existing widget classes.
 *
 * @return string
 */
function grafique_lite_get_footer_widget_layout( $params ) {

	if ( is_admin() ) {
		return $params;
	}

	if ( empty( $params[0]['id'] ) || 'footer-area' !== $params[0]['id'] ) {
		return $params;
	}

	if ( empty( $params[0]['before_widget'] ) ) {
		return $params;
	}

	$columns = get_theme_mod(
		'footer_widget_columns',
		grafique_lite_theme()->customizer->get_default( 'footer_widget_columns' )
	);

	$columns = intval( $columns );
	$classes = 'class="col-xs-12 col-sm-%3$s col-md-%2$s col-lg-%1$s %4$s ';

	switch ( $columns ) {
		case 4:
			$lg_col = 3;
			$md_col = 6;
			$sm_col = 12;
			$extra  = '';
			break;

		case 3:
			$lg_col = 4;
			$md_col = 4;
			$sm_col = 12;
			$extra  = '';
			break;

		case 2:
			$lg_col = 6;
			$md_col = 6;
			$sm_col = 12;
			$extra  = '';
			break;

		default:
			$lg_col = 12;
			$md_col = 12;
			$sm_col = 12;
			$extra  = '';
			break;
	}

	$params[0]['before_widget'] = str_replace(
		'class="',
		sprintf( $classes, $lg_col, $md_col, $sm_col, $extra ),
		$params[0]['before_widget']
	);

	return $params;
}

/**
 * Filter image CSS model
 *
 * @param  array $css_model Default CSS model.
 * @param  array $args Post formats module arguments.
 *
 * @return array
 */
function grafique_lite_add_image_format_classes( $css_model, $args ) {
	$blog_featured_image = get_theme_mod( 'blog_featured_image', grafique_lite_theme()->customizer->get_default( 'blog_featured_image' ) );
	$blog_layout         = get_theme_mod( 'blog_layout_type', grafique_lite_theme()->customizer->get_default( 'blog_layout_type' ) );
	$suffix              = ( 'default' !== $blog_layout ) ? 'fullwidth' : $blog_featured_image;

	$css_model['link'] .= ' post-thumbnail--' . $suffix;

	return $css_model;
}

/**
 * Enqueue misc js script.
 *
 * @param  array $depends Default dependencies.
 *
 * @return array
 */
function grafique_lite_enqueue_misc( $depends ) {
	global $is_IE;

	if ( $is_IE ) {
		$depends[] = 'object-fit-images';
	}

	return $depends;
}

/**
 * Add to toTop and stickUp properties if required.
 *
 * @param  array $vars Default variables.
 *
 * @return array
 */
function grafique_lite_js_vars( $vars ) {
	$header_menu_sticky = get_theme_mod( 'header_menu_sticky', grafique_lite_theme()->customizer->get_default( 'header_menu_sticky' ) );

	if ( $header_menu_sticky && ! wp_is_mobile() ) {
		$vars['stickUp'] = true;
	}

	$totop_visibility = get_theme_mod( 'totop_visibility', grafique_lite_theme()->customizer->get_default( 'totop_visibility' ) );

	if ( $totop_visibility ) {
		$vars['toTop'] = true;
	}

	return $vars;
}

/**
 * Add has/no thumbnail classes for posts
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function grafique_lite_post_thumb_classes( $classes ) {
	$thumb = 'no-thumb';

	if ( has_post_thumbnail() ) {
		$thumb = 'has-thumb';
	}

	$classes[] = $thumb;

	return $classes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Arguments for comment form.
 *
 * @return array
 */
function grafique_lite_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['fields']['author'] = '<p class="comment-form-author"><span class="label-text">' . esc_html__( 'Your name:', 'grafique_lite' ) . '</span><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_html__( 'Enter please your name', 'grafique_lite' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><span class="label-text">' . esc_html__( 'Your email:', 'grafique_lite' ) . '</span><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_html__( 'Enter please your email', 'grafique_lite' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['url'] = false;

	$args['comment_field'] = '<p class="comment-form-comment"><span class="label-text">' . esc_html__( 'Your comment:', 'grafique_lite' ) . '</span><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_html__( 'Enter please your comment', 'grafique_lite' ) . '" cols="45" rows="8" aria-required="true" required="required"></textarea></p>';

	$args['title_reply_before'] = '<h5 id="reply-title" class="comment-reply-title title-decoration">';

	$args['title_reply_after'] = '</h5>';

	$args['title_reply'] = esc_html__( 'Leave a reply', 'grafique_lite' );

	$args['label_submit'] = esc_html__( 'Submit', 'grafique_lite' );

	$args['class_submit'] = esc_attr( 'submit btn btn-accent-1' );

	return $args;
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function grafique_lite_extra_body_classes( $classes ) {
	global $is_IE;

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of ie to browsers IE.
	if ( $is_IE ) {
		$classes[] = 'ie';
	}

	// Adds a options-based classes.
	$header_layout  = get_theme_mod( 'header_container_type', grafique_lite_theme()->customizer->get_default( 'header_container_type' ) );
	$content_layout = get_theme_mod( 'content_container_type', grafique_lite_theme()->customizer->get_default( 'content_container_type' ) );
	$footer_layout  = get_theme_mod( 'footer_container_type', grafique_lite_theme()->customizer->get_default( 'footer_container_type' ) );
	$blog_layout    = get_theme_mod( 'blog_layout_type', grafique_lite_theme()->customizer->get_default( 'blog_layout_type' ) );
	$sb_position    = get_theme_mod( 'sidebar_position', grafique_lite_theme()->customizer->get_default( 'sidebar_position' ) );
	$sidebar        = get_theme_mod( 'sidebar_width', grafique_lite_theme()->customizer->get_default( 'sidebar_width' ) );
	$header_type    = get_theme_mod( 'header_layout_type', grafique_lite_theme()->customizer->get_default( 'header_layout_type' ) );
	$footer_type    = get_theme_mod( 'footer_layout_type', grafique_lite_theme()->customizer->get_default( 'footer_layout_type' ) );
	$word_wrap      = ( get_theme_mod( 'word_wrap', grafique_lite_theme()->customizer->get_default( 'word_wrap' ) ) ) ? 'wordwrap' : '';

	return array_merge( $classes, array(
		'header-layout-' . $header_layout,
		'content-layout-' . $content_layout,
		'footer-layout-' . $footer_layout,
		'blog-' . $blog_layout,
		'position-' . $sb_position,
		'sidebar-' . str_replace( '/', '-', $sidebar ),
		'header-' . $header_type,
		'footer-' . $footer_type,
		$word_wrap,
	) );
}

/**
 * Replace macroses in text widget.
 *
 * @param  string $text Default text.
 *
 * @return string
 */
function grafique_lite_render_widget_macros( $text ) {
	$uploads = wp_upload_dir();

	$data = array(
		'/%%uploads_url%%/' => $uploads['baseurl'],
		'/%%home_url%%/'    => esc_url( home_url( '/' ) ),
		'/%%theme_url%%/'   => get_template_directory_uri(),
	);

	return preg_replace( array_keys( $data ), array_values( $data ), $text );
}

/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.1
 */
function grafique_lite_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />' . "\n";
}

/**
 * Customization for `Tag Cloud` widget.
 *
 * @since  1.0.1
 *
 * @param  array $args Widget arguments.
 *
 * @return array
 */
function grafique_lite_customize_tag_cloud( $args ) {
	$args['smallest'] = 14;
	$args['largest']  = 14;
	$args['unit']     = 'px';

	return $args;
}

/**
 * Replaces `[...]` (appended to automatically generated excerpts) with `...`.
 *
 * @since  1.0.1
 *
 * @param  string $more The string shown within the more link.
 *
 * @return string
 */
function grafique_lite_excerpt_more( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	return esc_html__( ' &hellip;', 'grafique_lite' );
}

/**
 * Creating wrappers for audio shortcode.
 */
function grafique_lite_audio_shortcode( $html, $atts, $audio, $post_id, $library ) {

	$html = sprintf( '<div class="mejs-container-wrapper">%s</div>', $html );

	return $html;
}

/**
 * Creating wrappers for audio post featured content.
 */
function grafique_lite_cherry_get_the_post_audio( $result ) {

	$result = sprintf( '<div class="post-format-audio">%s</div>', $result );

	return $result;
}

/**
 * Set specific content classes for blog listing
 */
function grafique_lite_set_specific_content_classes( $layout_classes ) {
	$sidebar_position = get_theme_mod( 'sidebar_position' );

	$white_list_post_type = array(
		'post',
	);

	if ( ( 'fullwidth' === $sidebar_position && is_singular( $white_list_post_type ) ) ) {
		$layout_classes = array( 'col-xs-12', 'col-lg-8', 'col-lg-push-2' );
	}

	return $layout_classes;
}

/**
 * Disable sidebar to 404 page.
 */
function grafique_lite_specific_sidebar_position( $value ) {

	if ( is_404() ) {
		return 'fullwidth';
	}

	return $value;
}

/**
 * Landing main menu location.
 */
function grafique_lite_landing_main_menu_location( $args ) {

	if ( 'page-templates/landing.php' === get_page_template_slug() ) {
		$args['theme_location'] = 'main_landing';
	}

	return $args;
}

/**
 * Change gallery image size into single post and non-sidebar layout.
 *
 * @param $args
 * @param $post_id
 * @param $post_type
 *
 * @return mixed
 */
function grafique_lite_post_gallery_img_size( $args, $post_id, $post_type ) {
	$sidebar_position = get_theme_mod( 'sidebar_position', grafique_lite_theme()->customizer->get_default( 'sidebar_position' ) );

	if ( 'fullwidth' == $sidebar_position && is_singular( 'post' ) ) {
		$args['size'] = 'grafique_lite-thumb-l';
	}

	return $args;
}

/**
 *  Add invert classes if breadcrumbs sections is darken.
 *
 * @param array $wrapper_classes Classes array.
 *
 * @return array
 */
function grafique_lite_cherry_breadcrumbs_wrapper_classes( $wrapper_classes = array() ) {
	$breadcrumbs_bg = get_theme_mod( 'breadcrumbs_bg_color', grafique_lite_theme()->customizer->get_default( 'breadcrumbs_bg_color' ) );

	if ( 'dark' === grafique_lite_hex_color_is_light_or_dark( $breadcrumbs_bg ) ) {
		$wrapper_classes[] = 'invert';
	}

	return $wrapper_classes;
}

/**
 * Add dynamic css function.
 *
 * @param array $func_list Function list.
 *
 * @return array
 */
function grafique_lite_add_dynamic_css_function( $func_list = array() ) {

	$func_list['background_position'] = 'grafique_lite_dynamic_css_background_position';

	return $func_list;
}

/**
 * Callback function for dynamic css function `background_position`.
 *
 * @param string $position Background position.
 *
 * @return bool|string
 */
function grafique_lite_dynamic_css_background_position( $position ) {
	if ( ! $position ) {
		return false;
	}

	$format = 'background-position: %s';
	$result = sprintf( $format, str_replace( '-', ' ', $position ) );

	return $result;
}

/**
 * Disable requests to wp.org repository for this theme.
 *
 * @link  https://wptheming.com/2014/06/disable-theme-update-checks/
 * @since 1.0.0
 *
 * @param  array $r An array of HTTP request arguments.
 * @param  string $url The request URL.
 *
 * @return array
 */
function grafique_lite_disable_wporg_request( $r, $url ) {

	// If it's not a theme update request, bail.
	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
		return $r;
	}

	// Decode the JSON response.
	$themes = json_decode( $r['body']['themes'] );

	// Remove the active parent and child themes from the check.
	$parent = get_option( 'template' );
	$child  = get_option( 'stylesheet' );

	unset( $themes->themes->$parent );
	unset( $themes->themes->$child );

	// Encode the updated JSON response.
	$r['body']['themes'] = json_encode( $themes );

	return $r;
}

/**
 * Add dynamic css plugins files.
 *
 * @param array $args Dynamic css arguments.
 *
 * @return array
 */
function grafique_lite_add_dynamic_css_plugins_files( $args = array() ) {

	$plugins_config = array(
		array(
			'class'            => 'Polylang',
			'dynamic_css_path' => 'assets/css/dynamic/plugins/polylang.css',
		),
	);

	foreach ( $plugins_config as $plugin ) {

		if ( class_exists( $plugin['class'] ) ) {
			$args['css_files'][] = GRAFIQUE_LITE_THEME_DIR . '/'  . $plugin['dynamic_css_path'];
		}

	}

	return $args;
}

/**
 * Get custom background.
 *
 * @param array $func_list Func list.
 *
 * @return array
 */
function grafique_lite_get_custom_background_dynamic_func( $func_list ) {
	$func_list['custom_background'] = 'grafique_lite_get_custom_background';

	return $func_list;
}

function grafique_lite_get_custom_background( $option = '' ) {
	$background_color = get_background_color();

	if ( ! empty( $background_color ) ) {
		if ( 'color' == $option ) {
			return sprintf( '#%s', $background_color );
		}

		return sprintf( 'background-color:#%s;', $background_color );
	}
}

// Modify `Muli` google font to revolution-slider.
add_filter( 'revslider_operations_getArrFontFamilys', 'grafique_lite_modify_muli_google_font_to_revslider' );

/**
 * Modify `Muli` google font to revolution-slider.
 *
 * @param array $fonts Fonts.
 *
 * @return array
 */
function grafique_lite_modify_muli_google_font_to_revslider( $fonts = array() ) {

	$prepare_fonts = array();

	foreach ( $fonts as $key => $value ) {
		$prepare_fonts[ $value['label'] ] = $value;
	}

	$prepare_fonts['Montserrat']['variants'] = array(
		'200',
		'200italic',
		'300',
		'300italic',
		'400',
		'italic',
		'500',
		'500italic',
		'600',
		'600italic',
		'700',
		'700italic',
		'800',
		'800italic',
		'900',
		'900italic',
	);

	$prepare_fonts['Montserrat']['subsets'] = array(
		'latin',
		'latin-ext',
	);

	$fonts = array_values( $prepare_fonts );

	return $fonts;
}
