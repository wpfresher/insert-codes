<?php
/**
 * Insert Code Snippets.
 *
 * @since 1.2.0
 * @package InsertCodess
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

?>
	<div class="insertcodes-container">
		<div class="wrap insertcodes-wrap">
			<div class="insertcodes__header">
				<h1 class="wp-heading-inline">
					<?php esc_html_e( 'Insert Code Snippets', 'insert-codes' ); ?>
				</h1>
				<p><?php esc_html_e( 'Bellow are the code editor fields for inserting code snippets inside the functions.php file.', 'insert-codes' ); ?></p>
			</div>
			<hr class="wp-header-end">
			<div class="insertcodes__body">
				<div class="insertcodes__content">
					<form id="insertcodes-form" method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
						<div class="field-group filed-section">
							<h3><?php esc_html_e( 'PHP Code Snippets', 'insert-codes' ); ?></h3>
						</div>

						<div class="field-group field-editor">
							<div class="field-label">
								<label for="insertcodes_php"><strong><?php esc_html_e( 'PHP Code Snippets:', 'insert-codes' ); ?></strong></label>
							</div>
							<div class="field">
								<textarea type="text" name="insertcodes_php" id="insertcodes_php"><?php echo esc_textarea( get_option( 'insertcodes_php' ) ); ?></textarea>
								<p class="description"><?php esc_html_e( 'These scripts will be executed in the PHP context.', 'insert-codes' ); ?></p>
							</div>
						</div>

						<div class="field-group is-last-item">
							<input type="hidden" name="action" value="insertcodes_snippets">
							<?php wp_nonce_field( 'insertcodes_snippets' ); ?>
							<div class="field-submit-btn">
								<?php submit_button(); ?>
							</div>
						</div>
					</form>
				</div>
				<div class="insertcodes__aside aside__items">
					<div class="aside__item">
						<div class="aside__item__header">
							<h4><?php esc_html_e( 'Support & Rating', 'insert-codes' ); ?></h4>
						</div>
						<div class="aside__item__body">
							<ul>
								<li>
									<p>
										<?php esc_html_e( 'If you need help, please visit the support forum.', 'insert-codes' ); ?>
										<a href="https://wordpress.org/support/plugin/insert-codes/" target="_blank"><?php esc_html_e( 'Get Support', 'insert-codes' ); ?></a>
									</p>
								</li>
								<li>
									<p>
										<?php esc_html_e( 'If you like the plugin, please rate it on WordPress.org.', 'insert-codes' ); ?>
										<a href="https://wordpress.org/plugins/insert-codes/" target="_blank"><?php esc_html_e( 'Give a Rating', 'insert-codes' ); ?></a>
									</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
