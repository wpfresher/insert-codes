<?php

namespace InsertCodes\Admin;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Class Admin.
 *
 * @since 1.0.0
 * @package InsertCodes\Admin
 */
class Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_menu', array( $this, 'settings_menu' ), 100 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Add menu page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function add_menu() {
		add_menu_page(
			__( 'Insert Codes', 'insert-codes' ),
			__( 'Insert Codes', 'insert-codes' ),
			'manage_options',
			'insert-codes',
			null,
			'dashicons-editor-code',
			'80',
		);

		add_submenu_page(
			'insert-codes',
			__( 'Codes', 'insert-codes' ),
			__( 'Codes', 'insert-codes' ),
			'manage_options',
			'insert-codes',
			array( $this, 'render_page' ),
			1
		);
	}

	/**
	 * Add settings submenu.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function settings_menu() {
		add_submenu_page(
			'insert-codes',
			__( 'Settings', 'insert-codes' ),
			__( 'Settings', 'insert-codes' ),
			'manage_options',
			'insert-codes-settings',
			array( $this, 'settings_page' ),
		);
	}

	/**
	 * Render settings page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function settings_page() {
		include __DIR__ . '/views/settings.php';
	}

	/**
	 * Render menu page content.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function render_page() {
		include __DIR__ . '/views/codes.php';
	}

	/**
	 * Enqueue admin scripts.
	 *
	 * @param string $hook Hook name.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts( $hook ) {
		$screens = array(
			'toplevel_page_insert-codes',
			'insert-codes_page_insert-codes-settings',
		);

		wp_register_style( 'insertcodes-admin', INSERTCODES_URL . 'assets/css/insertcodes-admin.css', array(), INSERTCODES_VERSION );
		wp_register_script( 'insertcodes-admin', INSERTCODES_URL . 'assets/js/insertcodes-admin.js', array( 'jquery' ), INSERTCODES_VERSION, true );

		if ( 'toplevel_page_insert-codes' === $hook ) {
			$settings = wp_enqueue_code_editor( array( 'type' => 'text/html' ) );

			// Return if the editor was not enqueued.
			if ( false === $settings ) {
				return;
			}

			wp_enqueue_script( 'insertcodes-admin' );
		}

		if ( in_array( $hook, $screens, true ) ) {
			wp_enqueue_style( 'insertcodes-admin' );
		}
	}
}
