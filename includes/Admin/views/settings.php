<?php
/**
 * Settings.
 *
 * @since 1.0.0
 * @package InsertCodess
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

?>
<div class="insert-codes-container">
	<div class="wrap insert-codes-wrap">
		<div class="insert-codes__header">
			<h1 class="wp-heading-inline">
				<?php esc_html_e( 'Settings', 'insert-codes' ); ?>
			</h1>
			<p><?php esc_html_e( 'Bellow are the settings fields of the plugin.', 'insert-codes' ); ?></p>
		</div>
		<hr class="wp-header-end">
		<div class="insert-codes__body">
			<div class="insert-codes__content">
				<form id="insert-codes-form" method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
					<div class="field-group filed-section">
						<h3><?php esc_html_e( 'General Settings', 'insert-codes' ); ?></h3>
						<p><?php esc_html_e( 'The following options are the general settings of the plugin. These will determine how the plugin will work.', 'insert-codes' ); ?></p>
					</div>

					<div class="field-group">
						<div class="field-label">
							<label for="insert_codes_header_priority"><strong><?php esc_html_e( 'Insert Header\'s Priority:', 'insert-codes' ); ?></strong></label>
						</div>
						<div class="field">
							<input type="number" name="insert_codes_header_priority" id="insert_codes_header_priority" placeholder="<?php esc_attr_e( '10', 'insert-codes' ); ?>" value="<?php echo esc_attr( get_option( 'insert_codes_header_priority', 10 ) ); ?>">
							<p class="description"><?php printf( /* translators: HTML head tag as string. */ esc_html__( 'Enter the scripts execution priority for %s sections. Default action priority is 10', 'insert-codes' ), esc_html( htmlspecialchars( '<head>' ) ) ); ?></p>
						</div>
					</div>

					<div class="field-group">
						<div class="field-label">
							<label for="insert_codes_body_priority"><strong><?php esc_html_e( 'Insert Body\'s Priority:', 'insert-codes' ); ?></strong></label>
						</div>
						<div class="field">
							<input type="number" name="insert_codes_body_priority" id="insert_codes_body_priority" placeholder="<?php esc_attr_e( '10', 'insert-codes' ); ?>" value="<?php echo esc_attr( get_option( 'insert_codes_body_priority', 10 ) ); ?>">
							<p class="description"><?php printf( /* translators: HTML head tag as string. */ esc_html__( 'Enter the scripts execution priority for %s sections. Default action priority is 10', 'insert-codes' ), esc_html( htmlspecialchars( '<body>' ) ) ); ?></p>
						</div>
					</div>

					<div class="field-group">
						<div class="field-label">
							<label for="insert_codes_footer_priority"><strong><?php esc_html_e( 'Insert Footer\'s Priority:', 'insert-codes' ); ?></strong></label>
						</div>
						<div class="field">
							<input type="number" name="insert_codes_footer_priority" id="insert_codes_footer_priority" placeholder="<?php esc_attr_e( '10', 'insert-codes' ); ?>" value="<?php echo esc_attr( get_option( 'insert_codes_footer_priority', 10 ) ); ?>">
							<p class="description"><?php printf( /* translators: HTML footer tag as string. */ esc_html__( 'Enter the scripts execution priority for %s sections. Default action priority is 10', 'insert-codes' ), esc_html( htmlspecialchars( '<footer>' ) ) ); ?></p>
						</div>
					</div>

					<div class="field-group filed-section">
						<h3><?php esc_html_e( 'Advanced Settings', 'insert-codes' ); ?></h3>
						<p><?php esc_html_e( 'The following options are the advanced settings of the plugin.', 'insert-codes' ); ?></p>
					</div>

					<div class="field-group">
						<div class="field-label">
							<strong><?php esc_html_e( 'Delete Data:', 'insert-codes' ); ?></strong>
						</div>
						<div class="field">
							<label for="insert_codes_delete_data">
								<input name="insert_codes_delete_data" id="insert_codes_delete_data" type="checkbox" value="yes" <?php checked( get_option( 'insert_codes_delete_data' ), 'yes' ); ?>>
								<?php esc_html_e( 'Delete plugin data', 'insert-codes' ); ?>
							</label>
							<p class="description"><?php esc_html_e( 'Enabling this will delete all the data while uninstalling the plugin.', 'insert-codes' ); ?></p>
						</div>
					</div>

					<div class="field-group is-last-item">
						<input type="hidden" name="action" value="insert_codes_settings">
						<?php wp_nonce_field( 'insert_codes_settings' ); ?>
						<div class="field-submit-btn">
							<?php submit_button(); ?>
						</div>
					</div>
				</form>
			</div>
			<div class="insert-codes__aside aside__items">
				<div class="aside__item">
					<div class="aside__item__header">
						<h4><?php esc_html_e( 'Recommended Plugins', 'insert-codes' ); ?></h4>
					</div>
					<div class="aside__item__body">
						<ul>
							<li><a href="https://wordpress.org/plugins/autocomplete-orders-for-woocommerce/" target="_blank"><?php esc_html_e( 'Autocomplete Orders for WooCommerce', 'insert-codes' ); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
