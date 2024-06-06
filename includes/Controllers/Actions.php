<?php

namespace WpFreshers\InsertCodes\Controllers;

defined( 'ABSPATH' ) || exit;

/**
 * Actions Class
 */
class Actions {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_post_insert_codes_update_settings', array( __CLASS__, 'handle_settings' ) );
	}

	/**
	 * Updating settings.
	 */
	public static function handle_settings() {
		wp_verify_nonce( '_nonce' );

		// TODO: Do something.

		insert_codes()->add_flash_notice( __( 'Settings saved successfully.', 'insert-codes' ) );
		wp_safe_redirect( wp_get_referer() );
		exit();
	}
}
