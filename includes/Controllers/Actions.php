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
		add_action( 'admin_post_insertcodes_add_thing', array( __CLASS__, 'handle_add_thing' ) );
		add_action( 'admin_post_insertcodes_edit_thing', array( __CLASS__, 'handle_edit_thing' ) );
		add_action( 'admin_post_insertcodes_update_settings', array( __CLASS__, 'handle_settings' ) );
	}

	/**
	 * Add thing.
	 */
	public static function handle_add_thing() {
		wp_verify_nonce( '_nonce' );
		$thing_name    = isset( $_POST['thing_name'] ) ? sanitize_text_field( wp_unslash( $_POST['thing_name'] ) ) : '';
		$thing_content = isset( $_POST['thing_content'] ) ? sanitize_textarea_field( wp_unslash( $_POST['thing_content'] ) ) : '';

		// Thing args.
		$args = array(
			'post_type'    => 'insertcodes_thing',
			'post_title'   => $thing_name,
			'post_content' => $thing_content,
		);

		// Update thing.
		$thing = wp_insert_post( $args );

		if ( ! is_wp_error( $thing ) ) {
			insert_codes()->add_flash_notice( __( 'Thing added successfully.', 'insert-codes' ) );
			wp_safe_redirect( admin_url( 'admin.php?page=insert-codes&edit=' . intval( $thing ) ) );
			exit;
		} else {
			insert_codes()->add_flash_notice( __( 'There has been an issue while creating a thing.', 'insert-codes' ) );
			wp_safe_redirect( wp_get_referer() );
			exit;
		}
	}

	/**
	 * Edit thing.
	 */
	public static function handle_edit_thing() {
		wp_verify_nonce( '_nonce' );
		$thing_id      = isset( $_POST['id'] ) ? intval( wp_unslash( $_POST['id'] ) ) : '';
		$thing_name    = isset( $_POST['thing_name'] ) ? sanitize_text_field( wp_unslash( $_POST['thing_name'] ) ) : '';
		$thing_content = isset( $_POST['thing_content'] ) ? sanitize_textarea_field( wp_unslash( $_POST['thing_content'] ) ) : '';

		if ( ! $thing_id ) {
			wp_safe_redirect( wp_get_referer() );
			exit;
		}

		// Thing args.
		$args = array(
			'ID'           => $thing_id,
			'post_type'    => 'insertcodes_thing',
			'post_title'   => $thing_name,
			'post_content' => $thing_content,
		);

		// Update thing.
		$thing = wp_update_post( $args );

		if ( ! is_wp_error( $thing ) ) {
			insert_codes()->add_flash_notice( __( 'Thing updated successfully.', 'insert-codes' ) );
		} else {
			insert_codes()->add_flash_notice( __( 'There has been an issue while updating the thing.', 'insert-codes' ) );
		}

		$redirect_to = admin_url( 'admin.php?page=insert-codes&edit=' . intval( $thing ) );
		wp_safe_redirect( $redirect_to );
		exit;
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
