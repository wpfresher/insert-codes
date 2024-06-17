<?php
/**
 * Plugin Name: Insert Codes - Headers And Footers Code Snippet
 * Description: Insert headers, body and footers code snippet.
 * Plugin URI:  http://wpfreshers.com
 * Author:      WpFreshers
 * Author URI:  http://wpfreshers.com
 * Version:     1.0.0
 * Textdomain:  insert-codes
 * License:     GPL2
 *
 * @package InsertCodes
 */

use InsertCodes\Plugin;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

// Autoload function.
spl_autoload_register(
	function ( $class_name ) {
		$prefix = 'InsertCodes\\';
		$len    = strlen( $prefix );

		// Bail out if the class name doesn't start with our prefix.
		if ( strncmp( $prefix, $class_name, $len ) !== 0 ) {
			return;
		}

		// Remove the prefix from the class name.
		$relative_class = substr( $class_name, $len );
		// Replace the namespace separator with the directory separator.
		$file = str_replace( '\\', DIRECTORY_SEPARATOR, $relative_class ) . '.php';

		// Look for the file in the src and lib directories.
		$file_paths = array(
			__DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . $file,
		);

		foreach ( $file_paths as $file_path ) {
			if ( file_exists( $file_path ) ) {
				require_once $file_path;
				break;
			}
		}
	}
);

/**
 * Get the plugin instance.
 *
 * @since 1.0.0
 * @return Plugin
 */
function insert_codes() {
	return Plugin::create( __FILE__ );
}

// Initialize the plugin.
insert_codes();
