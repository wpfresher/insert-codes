<?php

namespace WpFreshers\InsertCodes;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * The main plugin class.
 *
 * @since 1.0.0
 * @package WpFreshers\InsertCodes
 */
class Plugin {

	/**
	 * Plugin file path.
	 *
	 * @var string
	 */
	protected $file;

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	protected $version = '1.0.0';

	/**
	 * The single instance of the class.
	 *
	 * @since 1.0.0
	 * @var self
	 */
	public static $instance;

	/**
	 * Gets the single instance of the class.
	 * This method is used to create a new instance of the class.
	 *
	 * @param string $file The plugin file path.
	 * @param string $version The plugin version.
	 *
	 * @since 1.0.0
	 * @return static
	 */
	final public static function create( $file, $version = '1.0.0' ) {
		if ( null === self::$instance ) {
			self::$instance = new static( $file, $version );
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @param string $file The plugin file path.
	 * @param string $version The plugin version.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $file, $version ) {
		$this->file    = $file;
		$this->version = $version;
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Define plugin constants.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function define_constants() {
		define( 'INSERT_CODES_VERSION', $this->version );
		define( 'INSERT_CODES_FILE', $this->file );
		define( 'INSERT_CODES_PATH', plugin_dir_path( $this->file ) );
		define( 'INSERT_CODES_URL', plugin_dir_url( $this->file ) );
		define( 'INSERT_CODES_ASSETS_URL', INSERT_CODES_URL . 'assets/' );
	}

	/**
	 * Include required files.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function includes() {
		require_once __DIR__ . '/functions.php';
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function init_hooks() {
		register_activation_hook( INSERT_CODES_FILE, array( $this, 'activate' ) );
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_action( 'admin_notices', array( $this, 'display_flash_notices' ), 12 );
		add_action( 'init', array( $this, 'init' ), 0 );
	}

	/**
	 * Plugin activation hook.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function activate() {
		update_option( 'insert_codes_version', INSERT_CODES_VERSION );
		update_option( 'insert_codes_header_priority', 10 );
		update_option( 'insert_codes_body_priority', 10 );
		update_option( 'insert_codes_footer_priority', 10 );
	}

	/**
	 * Load plugin textdomain.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'insert-codes', false, dirname( plugin_basename( INSERT_CODES_FILE ) ) . '/languages/' );
	}

	/**
	 * Check if the plugin is active.
	 *
	 * @param string $plugin The plugin slug or basename.
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	public function is_plugin_active( $plugin ) {
		// Check if the $plugin is a basename or a slug. If it's a slug, convert it to a basename.
		if ( false === strpos( $plugin, '/' ) ) {
			$plugin = $plugin . '/' . $plugin . '.php';
		}

		$active_plugins = (array) get_option( 'active_plugins', array() );
		if ( is_multisite() ) {
			$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
		}

		return in_array( $plugin, $active_plugins, true ) || array_key_exists( $plugin, $active_plugins );
	}

	/**
	 * Add a flash notice.
	 *
	 * @param string  $notice Notice message.
	 * @param string  $type This can be "info", "warning", "error" or "success", "success" as default.
	 * @param boolean $dismissible Whether the notice is-dismissible or not.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function add_flash_notice( $notice = '', $type = 'success', $dismissible = true ) {
		$notices          = get_option( 'insert_codes_flash_notices', array() );
		$dismissible_text = ( $dismissible ) ? 'is-dismissible' : '';

		// Add new notice.
		array_push(
			$notices,
			array(
				'notice'      => $notice,
				'type'        => $type,
				'dismissible' => $dismissible_text,
			)
		);

		// Update the notices array.
		update_option( 'insert_codes_flash_notices', $notices );
	}

	/**
	 * Display flash notices after that, remove the option to prevent notices being displayed forever.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function display_flash_notices() {
		$notices = get_option( 'insert_codes_flash_notices', array() );

		foreach ( $notices as $notice ) {
			printf(
				'<div class="notice notice-%1$s %2$s"><p>%3$s</p></div>',
				esc_attr( $notice['type'] ),
				esc_attr( $notice['dismissible'] ),
				esc_html( $notice['notice'] ),
			);
		}

		// Reset options to prevent notices being displayed forever.
		if ( ! empty( $notices ) ) {
			delete_option( 'insert_codes_flash_notices', array() );
		}
	}

	/**
	 * Initialize the plugin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		new Admin\Admin();
		new Controllers\Actions();
		new Frontend\Frontend();
	}
}
