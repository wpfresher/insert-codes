<?php

namespace WpFreshers\InsertCodes\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Class Admin.
 */
class Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_menu', array( $this, 'settings_menu' ), 100 );
		add_filter( 'set-screen-option', array( __CLASS__, 'set_screen' ), 10, 3 );
		// Example hook format 'manage_' . screen -> base . '_columns'.
		add_filter(
			'manage_toplevel_page_insert-codes_columns',
			array( 'WpFreshers\InsertCodes\Admin\ListTables\ThingsListTable', 'define_columns' ),
			10,
			0
		);
	}

	/**
	 * Add menu page.
	 */
	public function add_menu() {
		add_menu_page(
			__( 'WP Placeholder', 'insert-codes' ),
			__( 'WP Placeholder', 'insert-codes' ),
			'manage_options',
			'insert-codes',
			null,
			'dashicons-plugins-checked',
			'55.9',
		);

		$load = add_submenu_page(
			'insert-codes',
			__( 'Things', 'insert-codes' ),
			__( 'Things', 'insert-codes' ),
			'manage_options',
			'insert-codes',
			array( $this, 'render_page' ),
			1
		);

		// Load screen options.
		add_action( 'load-' . $load, array( __CLASS__, 'load_things_page' ) );
	}

	/**
	 * Add settings submenu.
	 */
	public function settings_menu() {
		add_submenu_page(
			'insert-codes',
			__( 'Settings', 'insert-codes' ),
			__( 'Settings', 'insert-codes' ),
			'manage_options',
			'insertcodes-settings',
			array( $this, 'settings_page' ),
		);
	}

	/**
	 * Render settings page.
	 */
	public function settings_page() {
		include __DIR__ . '/views/settings.php';
	}

	/**
	 * Load master keys page & set screen options.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function load_things_page() {
		$screen = get_current_screen();
		if ( 'toplevel_page_insert-codes' === $screen->id ) {
			add_screen_option(
				'per_page',
				array(
					'label'   => __( 'Things per page', 'insert-codes' ),
					'default' => 20,
					'option'  => 'insertcodes_things_per_page',
				)
			);
		}
	}

	/**
	 * Set screen options.
	 *
	 * @param bool       $screen_option Whether it is true or false.
	 * @param string     $option Option id.
	 * @param string|int $value The option value.
	 *
	 * @since 1.0.0
	 * @return mixed|int
	 */
	public static function set_screen( $screen_option, $option, $value ) {
		return $value;
	}

	/**
	 * Render menu page content.
	 */
	public function render_page() {
		wp_verify_nonce( '_nonce' );
		$add  = isset( $_GET['add'] ) ? true : false;
		$edit = isset( $_GET['edit'] ) ? absint( $_GET['edit'] ) : 0;

		if ( $edit ) {
			$thing = insertcodes_get_thing( $edit );

			if ( ! $thing instanceof \WP_Post ) {
				wp_safe_redirect( remove_query_arg( 'edit' ) );
				exit();
			}
		}

		if ( $add ) {
			include __DIR__ . '/views/add-thing.php';
		} elseif ( $edit ) {
			include __DIR__ . '/views/edit-thing.php';
		} else {
			include __DIR__ . '/views/things.php';
		}
	}
}
