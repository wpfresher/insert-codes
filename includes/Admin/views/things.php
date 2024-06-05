<?php
/**
 * Things list table.
 *
 * @since 1.0.0
 * @package InsertCodess
 */

$list_table = new WpFreshers\InsertCodes\Admin\ListTables\ThingsListTable();
$list_table->prepare_items();
?>
<div class="wrap">
	<div id="icon-users" class="icon32"></div>
	<h1 class="wp-heading-inline">
		<?php esc_html_e( 'Things List Table', 'insert-codes' ); ?>
		<!-- Add new thing -->
		<a href="<?php echo esc_attr( admin_url( 'admin.php?page=insert-codes&add=1' ) ); ?>" class="page-title-action">
			<?php esc_html_e( 'Add new thing', 'insert-codes' ); ?>
		</a>
	</h1>
	<p>Here is the example list table updated at March 26, 2024</p>

	<hr class="wp-header-end">

	<form id="insertcodes_thing_list_table" method="get">
		<?php
		$list_table->views();
		$list_table->search_box( __( 'Search', 'insert-codes' ), 'search_thing' );
		$list_table->display();
		?>
		<input type="hidden" name="page" value="insert-codes">
	</form>
</div>
<?php
