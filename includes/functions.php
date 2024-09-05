<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Allowed HTML for code editor options.
 *
 * @since 1.0.0
 * @return array
 */
function insertcodes_get_allowed_html() {
	return array(
		'script'   => array(
			'type'         => array(),
			'src'          => array(),
			'async'        => array(),
			'defer'        => array(),
			'data-account' => array(),
			'data-user'    => array(),
			'id'           => array(),
		),
		'noscript' => array(
			'type'  => array(),
			'src'   => array(),
			'async' => array(),
			'defer' => array(),
		),
		'iframe'   => array(
			'src'         => array(),
			'width'       => array(),
			'height'      => array(),
			'frameborder' => array(),
			'scrolling'   => array(),
			'style'       => array(),
			'class'       => array(),
			'id'          => array(),
		),
		'meta'     => array(
			'name'       => array(),
			'content'    => array(),
			'charset'    => array(),
			'http-equiv' => array(),
			'property'   => array(),
		),
		'a'        => array(
			'href'   => array(),
			'title'  => array(),
			'rel'    => array(),
			'target' => array(),
			'class'  => array(),
			'id'     => array(),
			'style'  => array(),
		),
		'br'       => array(),
		'em'       => array(),
		'strong'   => array(),
		'p'        => array(),
		'div'      => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'span'     => array(
			'class' => array(),
			'id'    => array(),
			'style' => array(),
		),
		'img'      => array(
			'src'    => array(),
			'alt'    => array(),
			'title'  => array(),
			'width'  => array(),
			'height' => array(),
			'class'  => array(),
			'id'     => array(),
			'style'  => array(),
		),
	);
}

/**
 * Get php allowed html.
 *
 * @since 1.0.0
 * @return array
 */
function insertcodes_get_php_allowed_html() {
	return array(
		'pre'        => array(),
		'code'       => array(),
		'br'         => array(),
		'strong'     => array(),
		'em'         => array(),
		'p'          => array(),
		'div'        => array(),
		'span'       => array(),
		'img'        => array(),
		'ul'         => array(),
		'ol'         => array(),
		'li'         => array(),
		'a'          => array(),
		'iframe'     => array(),
		'blockquote' => array(),
		'h1'         => array(),
		'h2'         => array(),
		'h3'         => array(),
		'h4'         => array(),
		'h5'         => array(),
		'h6'         => array(),
		'table'      => array(),
		'thead'      => array(),
		'tbody'      => array(),
		'tfoot'      => array(),
		'tr'         => array(),
		'th'         => array(),
		'td'         => array(),
		'hr'         => array(),
		'form'       => array(),
		'input'      => array(),
		'select'     => array(),
		'option'     => array(),
		'textarea'   => array(),
		'label'      => array(),
		'button'     => array(),
		'script'     => array(),
		'noscript'   => array(),
		'meta'       => array(),
		'link'       => array(),
		'style'      => array(),
		'abbr'       => array(),
		'acronym'    => array(),
		'address'    => array(),
		'applet'     => array(),
		'area'       => array(),
		'article'    => array(),
		'aside'      => array(),
		'audio'      => array(),
		'b'          => array(),
		'base'       => array(),
		'bdi'        => array(),
		'bdo'        => array(),
		'big'        => array(),
		'body'       => array(),
		'canvas'     => array(),
		'caption'    => array(),
		'center'     => array(),
		'cite'       => array(),
		'col'        => array(),
		'colgroup'   => array(),
		'datalist'   => array(),
		'dd'         => array(),
		'del'        => array(),
		'details'    => array(),
		'dfn'        => array(),
		'dialog'     => array(),
	);
}

/**
 * Sanitize the PHP code snippets.
 *
 * @since 1.0.0
 * @param string $php_code PHP code snippet.
 */
function insertcodes_sanitize_php_snippets( $php_code ) {
	$allowed_tags = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'p'      => array(),
		// Add more allowed HTML tags here.
	);
	$allowed_php_tags = array(
		'php'  => array(),
		'echo' => array(),
		'if'   => array(),
		'else' => array(),
		// Add more allowed PHP constructs if necessary.
	);

	// Combine allowed tags.
	$sanitized_code = wp_kses( $php_code, array_merge( $allowed_tags, $allowed_php_tags ) );

	return $sanitized_code;
}
