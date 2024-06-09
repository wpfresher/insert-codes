<?php

defined( 'ABSPATH' ) || exit;

/**
 * Allowed HTML for code editor options.
 *
 * @since 1.0.0
 * @return array
 */
function insert_codes_get_allowed_html() {
	return array(
		'script' => array(
			'type'  => array(),
			'src'   => array(),
			'async' => array(),
			'defer' => array(),
		),
		'meta'   => array(
			'name'       => array(),
			'content'    => array(),
			'charset'    => array(),
			'http-equiv' => array(),
		),
		'a'      => array(
			'href'  => array(),
			'title' => array(),
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'p'      => array(),
		'div'    => array(
			'class' => array(),
			'id'    => array(),
		),
		'span'   => array(
			'class' => array(),
			'id'    => array(),
		),
	);
}
