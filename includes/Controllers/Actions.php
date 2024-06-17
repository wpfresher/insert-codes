<?php

namespace InsertCodes\Controllers;

defined( 'ABSPATH' ) || exit;

/**
 * Actions class.
 *
 * @since 1.0.0
 * @package InsertCodes\Controllers
 */
class Actions {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_post_insert_codes_hbf_scripts', array( __CLASS__, 'handle_hbf_scripts' ) );
		add_action( 'admin_post_insert_codes_settings', array( __CLASS__, 'handle_settings' ) );
	}

	/**
	 * Updating settings.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function handle_hbf_scripts() {
		wp_verify_nonce( '_nonce' );

		$header_scripts = isset( $_POST['insert_codes_header'] ) ? wp_kses( wp_unslash( $_POST['insert_codes_header'] ), insert_codes_get_allowed_html() ) : '';
		$body_scripts   = isset( $_POST['insert_codes_body'] ) ? wp_kses( wp_unslash( $_POST['insert_codes_body'] ), insert_codes_get_allowed_html() ) : '';
		$footer_scripts = isset( $_POST['insert_codes_footer'] ) ? wp_kses( wp_unslash( $_POST['insert_codes_footer'] ), insert_codes_get_allowed_html() ) : '';

		// Updating options.
		update_option( 'insert_codes_header', $header_scripts );
		update_option( 'insert_codes_body', $body_scripts );
		update_option( 'insert_codes_footer', $footer_scripts );

		insert_codes()->add_flash_notice( __( 'Codes saved successfully.', 'insert-codes' ) );
		wp_safe_redirect( wp_get_referer() );
		exit();
	}

	/**
	 * Updating settings.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function handle_settings() {
		wp_verify_nonce( '_nonce' );
		$headers_priority = isset( $_POST['insert_codes_header_priority'] ) ? intval( wp_unslash( $_POST['insert_codes_header_priority'] ) ) : intval( '10' );
		$body_priority    = isset( $_POST['insert_codes_body_priority'] ) ? intval( wp_unslash( $_POST['insert_codes_body_priority'] ) ) : intval( '10' );
		$footers_priority = isset( $_POST['insert_codes_footer_priority'] ) ? intval( wp_unslash( $_POST['insert_codes_footer_priority'] ) ) : intval( '10' );
		$is_delete_data   = isset( $_POST['insert_codes_delete_data'] ) ? sanitize_key( wp_unslash( $_POST['insert_codes_delete_data'] ) ) : '';

		// Updating options.
		update_option( 'insert_codes_header_priority', $headers_priority );
		update_option( 'insert_codes_body_priority', $body_priority );
		update_option( 'insert_codes_footer_priority', $footers_priority );
		update_option( 'insert_codes_delete_data', $is_delete_data );

		insert_codes()->add_flash_notice( __( 'Settings saved successfully.', 'insert-codes' ) );
		wp_safe_redirect( wp_get_referer() );
		exit();
	}
}
