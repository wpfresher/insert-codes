<?php

namespace WpFreshers\InsertCodes\Frontend;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Class Frontend.
 *
 * @since 1.0.0
 * @package WpFreshers\InsertCodes\Frontend
 */
class Frontend {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ), 1 );
	}

	/**
	 * Frontend init.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		$header_priority = intval( get_option( 'insert_codes_header_priority' ) );
		$body_priority   = intval( get_option( 'insert_codes_body_priority' ) );
		$footer_priority = intval( get_option( 'insert_codes_footer_priority' ) );

		add_action( 'wp_head', array( $this, 'insert_codes_into_head' ), $header_priority );
		add_action( 'wp_body_open', array( $this, 'insert_codes_into_body' ), $body_priority );
		add_action( 'wp_footer', array( $this, 'insert_codes_into_footer' ), $footer_priority );
	}

	/**
	 * Insert codes into head.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function insert_codes_into_head() {
		echo wp_kses( get_option( 'insert_codes_header' ), insert_codes_get_allowed_html() );
	}

	/**
	 * Insert codes into body.
	 * Codes will be printed just after opening the body.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function insert_codes_into_body() {
		echo wp_kses( get_option( 'insert_codes_body' ), insert_codes_get_allowed_html() );
	}

	/**
	 * Insert codes into footer.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function insert_codes_into_footer() {
		echo wp_kses( get_option( 'insert_codes_footer' ), insert_codes_get_allowed_html() );
	}
}
