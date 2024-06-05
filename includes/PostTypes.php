<?php

namespace WpFreshers\InsertCodes;

defined( 'ABSPATH' ) || exit;

/**
 * Class PostTypes.
 *
 * Responsible for registering custom post types.
 *
 * @since 1.0.0
 */
class PostTypes {

	/**
	 * CPT constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_cpt' ) );
	}

	/**
	 * Register custom post types.
	 *
	 * @since 1.0.0
	 */
	public function register_cpt() {
		$labels = array(
			'name'               => _x( 'Things', 'post type general name', 'insert-codes' ),
			'singular_name'      => _x( 'Thing', 'post type singular name', 'insert-codes' ),
			'menu_name'          => _x( 'Things', 'admin menu', 'insert-codes' ),
			'name_admin_bar'     => _x( 'Thing', 'add new on admin bar', 'insert-codes' ),
			'add_new'            => _x( 'Add New', 'ticket', 'insert-codes' ),
			'add_new_item'       => __( 'Add New Thing', 'insert-codes' ),
			'new_item'           => __( 'New Thing', 'insert-codes' ),
			'edit_item'          => __( 'Edit Thing', 'insert-codes' ),
			'view_item'          => __( 'View Thing', 'insert-codes' ),
			'all_items'          => __( 'All Things', 'insert-codes' ),
			'search_items'       => __( 'Search Things', 'insert-codes' ),
			'parent_item_colon'  => __( 'Parent Things:', 'insert-codes' ),
			'not_found'          => __( 'No master keys found.', 'insert-codes' ),
			'not_found_in_trash' => __( 'No master keys found in Trash.', 'insert-codes' ),
		);

		$args = array(
			'labels'              => apply_filters( 'insertcodes_thing_post_type_labels', $labels ),
			'public'              => false,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'show_ui'             => false,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'query_var'           => false,
			'can_export'          => false,
			'rewrite'             => false,
			'capability_type'     => 'post',
			'has_archive'         => false,
			'hierarchical'        => false,
			'menu_position'       => null,
			'supports'            => array(),
		);

		register_post_type( 'insertcodes_thing', apply_filters( 'insertcodes_thing_post_type_args', $args ) );
	}
}
