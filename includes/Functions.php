<?php

defined( 'ABSPATH' ) || exit;

/**
 * Get master key.
 *
 * @param mixed $data The data.
 *
 * @return WP_Post|false The lead object, or false if not found.
 * @since 1.0.0
 */
function insertcodes_get_thing( $data ) {

	if ( is_numeric( $data ) ) {
		$data = get_post( $data );
	}

	if ( $data instanceof WP_Post && 'insertcodes_thing' === $data->post_type ) {
		return $data;
	}

	return false;
}

/**
 * Get things.
 *
 * @param array $args The args.
 * @param bool  $count Whether to return a count.
 *
 * @return array|int The leads.
 * @since 1.0.0
 */
function insertcodes_get_things( $args = array(), $count = false ) {
	$defaults = array(
		'post_type'      => 'insertcodes_thing',
		'posts_per_page' => - 1,
		'orderby'        => 'date',
		'order'          => 'ASC',
	);

	$args  = wp_parse_args( $args, $defaults );
	$query = new WP_Query( $args );

	if ( $count ) {
		return $query->found_posts;
	}

	return array_map( 'insertcodes_get_thing', $query->posts );
}
