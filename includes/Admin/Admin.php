<?php

namespace WpFreshers\InsertCodes\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Class Admin.
 *
 * @since 1.0.0
 * @package WpFreshers\InsertCodes\Admin
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
			'dashicons-plugins-checked',
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

		wp_register_style( 'insert-codes-admin', INSERT_CODES_URL . 'assets/dist/css/insertcodes-admin.css', array(), '1.0.0' );
		wp_register_script( 'insert-codes-admin', INSERT_CODES_URL . 'assets/dist/js/insertcodes-admin.js', array( 'jquery' ), '1.0.0', true );

		if ( 'toplevel_page_insert-codes' === $hook ) {
			$settings = wp_enqueue_code_editor( array( 'type' => 'text/html' ) );

			// Return if the editor was not enqueued.
			if ( false === $settings ) {
				return;
			}

			wp_enqueue_script( 'insert-codes-admin' );

//			wp_enqueue_code_editor(array('type' => 'text/html'));
//			wp_enqueue_script('wp-theme-plugin-editor');
//			wp_enqueue_style('wp-codemirror');

//			wp_add_inline_script(
//				'code-editor',
//				sprintf(
//					'jQuery( function() { wp.codeEditor.initialize( "insert_codes_headers", %s ); } );',
//					wp_json_encode( $settings )
//				)
//			);
		}

		if ( in_array( $hook, $screens, true ) ) {
			wp_enqueue_style( 'insert-codes-admin' );
//			wp_enqueue_script( 'insert-codes-admin' );
		}
	}
}
