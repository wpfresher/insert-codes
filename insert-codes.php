<?php
/**
 * Plugin Name: Insert Codes - Headers And Footers Code Snippet
 * Description: The "Insert Codes - Headers And Footers Code Snippet" plugin allows you to easily add custom code to the header, body, and footer sections of your WordPress website.
 * Version:     1.0.0
 * Plugin URI:  http://wpfreshers.com/plugins/insert-codes/
 * Author:      WpFreshers
 * Author URI:  http://wpfreshers.com
 * Textdomain:  insert-codes
 * Domain Path: /languages/
 * License:     GPL-2.0-or-later
 * Requires PHP: 5.6
 * Tested up to: 6.5
 *
 * @package InsertCodes
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
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
