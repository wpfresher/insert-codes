<?php

namespace InsertCodes\Controllers;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

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
		add_action( 'admin_post_insertcodes_hbf_scripts', array( __CLASS__, 'handle_hbf_scripts' ) );
		add_action( 'admin_post_insertcodes_snippets', array( __CLASS__, 'handle_snippets' ) );
		add_action( 'admin_post_insertcodes_settings', array( __CLASS__, 'handle_settings' ) );
	}

	/**
	 * Updating settings.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function handle_hbf_scripts() {
		check_admin_referer( 'insertcodes_hbf_scripts' );

		$header_scripts = isset( $_POST['insertcodes_header'] ) ? wp_kses( wp_unslash( $_POST['insertcodes_header'] ), insertcodes_get_allowed_html() ) : '';
		$body_scripts   = isset( $_POST['insertcodes_body'] ) ? wp_kses( wp_unslash( $_POST['insertcodes_body'] ), insertcodes_get_allowed_html() ) : '';
		$footer_scripts = isset( $_POST['insertcodes_footer'] ) ? wp_kses( wp_unslash( $_POST['insertcodes_footer'] ), insertcodes_get_allowed_html() ) : '';

		// Updating options.
		update_option( 'insertcodes_header', $header_scripts );
		update_option( 'insertcodes_body', $body_scripts );
		update_option( 'insertcodes_footer', $footer_scripts );

		insertcodes()->add_flash_notice( __( 'Codes saved successfully.', 'insert-codes' ) );
		wp_safe_redirect( wp_get_referer() );
		exit();
	}

	/**
	 * Updating settings.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function handle_snippets() {
		check_admin_referer( 'insertcodes_snippets' );

		$php_snippets = isset( $_POST['insertcodes_php'] ) ? sanitize_textarea_field( wp_unslash( $_POST['insertcodes_php'] ) ) : '';

		// Decode html entity.
		$php_snippets = html_entity_decode( $php_snippets, ENT_QUOTES, 'UTF-8' );

		// Updating options.
		update_option( 'insertcodes_php', $php_snippets );

		insertcodes()->add_flash_notice( __( 'PHP code snippets saved successfully.', 'insert-codes' ) );
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
		check_admin_referer( 'insertcodes_settings' );

		$headers_priority = isset( $_POST['insertcodes_header_priority'] ) ? intval( wp_unslash( $_POST['insertcodes_header_priority'] ) ) : intval( '10' );
		$body_priority    = isset( $_POST['insertcodes_body_priority'] ) ? intval( wp_unslash( $_POST['insertcodes_body_priority'] ) ) : intval( '10' );
		$footers_priority = isset( $_POST['insertcodes_footer_priority'] ) ? intval( wp_unslash( $_POST['insertcodes_footer_priority'] ) ) : intval( '10' );
		$is_delete_data   = isset( $_POST['insertcodes_delete_data'] ) ? sanitize_key( wp_unslash( $_POST['insertcodes_delete_data'] ) ) : '';

		// Updating options.
		update_option( 'insertcodes_header_priority', $headers_priority );
		update_option( 'insertcodes_body_priority', $body_priority );
		update_option( 'insertcodes_footer_priority', $footers_priority );
		update_option( 'insertcodes_delete_data', $is_delete_data );

		insertcodes()->add_flash_notice( __( 'Settings saved successfully.', 'insert-codes' ) );
		wp_safe_redirect( wp_get_referer() );
		exit();
	}
}
