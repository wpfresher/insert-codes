<?php
/**
 * Settings.
 *
 * @since 1.0.0
 * @package InsertCodess
 */

?>
<div class="wrap insertcodes-wrap">
	<div id="icon-users" class="icon32"></div>
	<h1 class="wp-heading-inline">
		<?php esc_html_e( 'Settings', 'insert-codes' ); ?>
	</h1>
	<p><?php esc_html_e( 'Bellow are the example fields to add settings', 'insert-codes' ); ?></p>

	<hr class="wp-header-end">

	<form id="insertcodes-form" method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
		<div class="field-group">
			<div class="field-label">
				<label for="option_name"><?php esc_html_e( 'Option name:', 'insert-codes' ); ?></label>
			</div>
			<input type="text" name="option_name" id="option_name" placeholder="<?php esc_html_e( 'Enter the option name', 'insert-codes' ); ?>">
		</div>

		<div class="field-group">
			<div class="field-label">
				<label for="option_content"><?php esc_html_e( 'Option content:', 'insert-codes' ); ?></label>
			</div>
			<textarea type="text" name="option_content" id="option_content" placeholder="<?php esc_html_e( 'Enter the option content', 'insert-codes' ); ?>"></textarea>
		</div>

		<div class="field-group is-last-item">
			<div class="field-label"></div>
			<div class="field-submit-btn">
				<button class="button button-primary"><?php esc_html_e( 'Update Settings', 'insert-codes' ); ?></button>
			</div>
		</div>

		<input type="hidden" name="action" value="insertcodes_update_settings">
		<?php wp_nonce_field( 'insertcodes_update_settings' ); ?>
	</form>
</div>
<?php
