<?php
/**
 * Add thing.
 *
 * @since 1.0.0
 * @package InsertCodess
 */

?>
<div class="wrap insertcodes-wrap">
	<div id="icon-users" class="icon32"></div>
	<h1 class="wp-heading-inline">
		<?php esc_html_e( 'Add Thing', 'insert-codes' ); ?>
		<a href="<?php echo esc_attr( admin_url( 'admin.php?page=insert-codes' ) ); ?>" class="page-title-action">
			<?php esc_html_e( 'Go Back', 'insert-codes' ); ?>
		</a>
	</h1>
	<p><?php esc_html_e( 'Bellow are the example fields to add a thing', 'insert-codes' ); ?></p>

	<hr class="wp-header-end">

	<form id="insertcodes-form" method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
		<div class="field-group">
			<div class="field-label">
				<label for="thing_name"><?php esc_html_e( 'Thing name:', 'insert-codes' ); ?></label>
			</div>
			<input type="text" name="thing_name" id="thing_name" placeholder="<?php esc_html_e( 'Enter the thing name', 'insert-codes' ); ?>">
		</div>

		<div class="field-group">
			<div class="field-label">
				<label for="thing_content"><?php esc_html_e( 'Thing content:', 'insert-codes' ); ?></label>
			</div>
			<textarea type="text" name="thing_content" id="thing_content" placeholder="<?php esc_html_e( 'Enter the thing content', 'insert-codes' ); ?>"></textarea>
		</div>

		<div class="field-group">
			<div class="field-label"></div>
			<div class="field-submit-btn">
				<button class="button button-primary"><?php esc_html_e( 'Add thing', 'insert-codes' ); ?></button>
			</div>
		</div>

		<input type="hidden" name="action" value="insertcodes_add_thing">
		<?php wp_nonce_field( 'insertcodes_add_thing' ); ?>
	</form>
</div>
<?php
