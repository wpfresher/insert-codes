<?php
/**
 * Insert Codes - Header, after opening Body tag & Footer.
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
				<?php esc_html_e( 'Insert Codes', 'insert-codes' ); ?>
			</h1>
			<p><?php esc_html_e( 'Bellow are the code editor fields for inserting codes inside the header, body & footer.', 'insert-codes' ); ?></p>
		</div>
		<hr class="wp-header-end">
		<div class="insert-codes__body">
			<div class="insert-codes__content">
				<form id="insert-codes-form" method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
					<div class="field-group filed-section">
						<h3><?php esc_html_e( 'Insert Header, Body & Footer Scripts', 'insert-codes' ); ?></h3>
					</div>

					<div class="field-group field-editor">
						<div class="field-label">
							<label for="insert_codes_header"><strong><?php esc_html_e( 'Insert Scripts in Header:', 'insert-codes' ); ?></strong></label>
						</div>
						<div class="field">
							<textarea type="text" name="insert_codes_header" id="insert_codes_header"><?php wp_kses_post( get_option( 'insert_codes_header' ) ); ?></textarea>
							<p class="description"><?php printf( /* translators: HTML head tag as string. */ esc_html__( 'These scripts will be printed in the %s section.', 'insert-codes' ), esc_html( htmlspecialchars( '<head>' ) ) ); ?></p>
						</div>
					</div>

					<div class="field-group field-editor">
						<div class="field-label">
							<label for="insert_codes_body"><strong><?php esc_html_e( 'Insert Scripts in Body:', 'insert-codes' ); ?></strong></label>
						</div>
						<div class="field">
							<textarea type="text" name="insert_codes_body" id="insert_codes_body"><?php wp_kses_post( get_option( 'insert_codes_body' ) ); ?></textarea>
							<p class="description"><?php printf( /* translators: HTML head tag as string. */ esc_html__( 'These scripts will be printed bellow the %s section.', 'insert-codes' ), esc_html( htmlspecialchars( '<body>' ) ) ); ?></p>
						</div>
					</div>

					<div class="field-group field-editor">
						<div class="field-label">
							<label for="insert_codes_footer"><strong><?php esc_html_e( 'Insert Scripts in Footer:', 'insert-codes' ); ?></strong></label>
						</div>
						<div class="field">
							<textarea type="text" name="insert_codes_footer" id="insert_codes_footer"><?php wp_kses_post( get_option( 'insert_codes_footer' ) ); ?></textarea>
							<p class="description"><?php printf( /* translators: HTML head tag as string. */ esc_html__( 'These scripts will be printed bellow the %s section.', 'insert-codes' ), esc_html( htmlspecialchars( '<footer>' ) ) ); ?></p>
						</div>
					</div>

					<div class="field-group is-last-item">
						<input type="hidden" name="action" value="insert_codes_hbf_scripts">
						<?php wp_nonce_field( 'insert_codes_hbf_scripts' ); ?>
						<div class="field-submit-btn">
							<?php submit_button(); ?>
						</div>
					</div>
				</form>
			</div>
			<div class="insert-codes__aside aside__items">
				<div class="aside__item">
					<div class="aside__item__header">
						<h4>This is aside header.</h4>
					</div>
					<div class="aside__item__body">
						<ul>
							<li>Item 1</li>
							<li>Item 2</li>
							<li>Item 3</li>
							<li>Item 4</li>
						</ul>
					</div>
				</div>
				<div class="aside__item">
					<div class="aside__item__header">
						<h4>This is aside header.</h4>
					</div>
					<div class="aside__item__body">
						<ul>
							<li>Item 1</li>
							<li>Item 2</li>
							<li>Item 3</li>
							<li>Item 4</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
