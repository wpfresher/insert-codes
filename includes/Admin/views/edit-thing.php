<?php
/**
 * Edit thing.
 *
 * @since 1.0.0
 * @package InsertCodess
 */

?>
<div class="wrap insertcodes-wrap">
	<div id="icon-users" class="icon32"></div>
	<h1 class="wp-heading-inline">
		<?php esc_html_e( 'Edit Thing', 'insert-codes' ); ?>
		<!-- Add another thing -->
		<a href="<?php echo esc_attr( admin_url( 'admin.php?page=insert-codes&add=1' ) ); ?>" class="page-title-action">
			<?php esc_html_e( 'Add Another', 'insert-codes' ); ?>
		</a>
		<a href="<?php echo esc_attr( admin_url( 'admin.php?page=insert-codes' ) ); ?>" class="page-title-action">
			<?php esc_html_e( 'Go Back', 'insert-codes' ); ?>
		</a>
	</h1>
	<p><?php esc_html_e( 'Here is the example list table updated at March 26, 2024', 'insert-codes' ); ?></p>

	<hr class="wp-header-end">

	<form id="insertcodes-form" method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
		<div class="field-group">
			<div class="field-label">
				<label for="thing_name"><?php esc_html_e( 'Thing name:', 'insert-codes' ); ?></label>
			</div>
			<input type="text" name="thing_name" id="thing_name" value="<?php echo esc_html( $thing->post_title ); ?>">
		</div>

		<div class="field-group">
			<div class="field-label">
				<label for="thing_content"><?php esc_html_e( 'Thing content:', 'insert-codes' ); ?></label>
			</div>
			<textarea type="text" name="thing_content" id="thing_content"><?php echo esc_html( $thing->post_content ); ?></textarea>
		</div>

		<div class="field-group is-last-item">
			<div class="field-label">
			<?php if ( $thing->ID ) : ?>
				<a class="del" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'action', 'delete', admin_url( 'admin.php?page=insert-codes&id=' . $thing->ID ) ), 'bulk-insertcodes_thing' ) ); ?>"><?php esc_html_e( 'Delete', 'insert-codes' ); ?></a>
			<?php endif; ?>
			</div>
			<div class="field-submit-btn">
				<button class="button button-primary"><?php esc_html_e( 'Save thing', 'insert-codes' ); ?></button>
			</div>
		</div>

		<input type="hidden" name="action" value="insertcodes_edit_thing">
		<?php wp_nonce_field( 'insertcodes_edit_thing' ); ?>
		<input type="hidden" name="id" value="<?php echo esc_attr( $thing->ID ); ?>">
	</form>
</div>
<?php
