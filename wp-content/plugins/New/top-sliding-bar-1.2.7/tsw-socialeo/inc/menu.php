<?php

function tsw_head_menu()
{
	?>
	<div class="wrap">
		<?php tswUpdateSettings(); ?>
		<?php require_once 'settings.php'; ?>
	</div>
<?php
}

function tswUpdateSettings()
{
	$plugin_id = 'tsw_plugin_';

	if( $_SERVER["REQUEST_METHOD"] == "POST" &&
		$_POST["tswAction"] == 'updateSettings')
	{
		if ( $_POST['flashing_button'] == 1 ) {
			$flashing_button = 1;
		} else {
			$flashing_button = 0;
		}
		if ( $_POST['dev_version'] == 1 ) {
			$dev_version = 1;
		} else {
			$dev_version = 0;
		}

		// plugin options
		update_option($plugin_id.'max_width', $_POST["max_width"]);
		update_option($plugin_id.'col_per_row', $_POST["col_per_row"]);
		update_option($plugin_id.'google_font', str_replace("\\'", "", $_POST["google_font"]));
		update_option($plugin_id.'google_font_url', $_POST["google_font_url"]);
		update_option($plugin_id.'fixed_position', $_POST["fixed_position"]);
		update_option($plugin_id.'transparent_background', $_POST["transparent_background"]);
		update_option($plugin_id.'custom_arrow', $_POST["custom_arrow"]);
		update_option($plugin_id.'flashing_button', $flashing_button);
		update_option($plugin_id.'dev_version', $dev_version);

		// plugin colors
		update_option($plugin_id.'bg_color', $_POST["bg_color"]);
		update_option($plugin_id.'bg_button', $_POST["bg_button"]);
		update_option($plugin_id.'bg_widgets', $_POST["bg_widgets"]);
		update_option($plugin_id.'main_color', $_POST["main_color"]);
		update_option($plugin_id.'extra_color', $_POST["extra_color"]);
		update_option($plugin_id.'text_color', $_POST["text_color"]);
		update_option($plugin_id.'link_color', $_POST["link_color"]);
		update_option($plugin_id.'link_action', $_POST["link_action"]);
		update_option($plugin_id.'custom_css', $_POST["custom_css"]);

		?>

		<div class="updated settings-error" id="setting-error-settings_updated">
			<p><strong>Settings saved.</strong></p>
		</div>

	<?php
		return TRUE;
	} else {
		return NULL;
	}
}

function tsw_create_menu()
{

	$icon_url = plugins_url('../frontend/img/icon.png', __FILE__);
	add_menu_page('Top Sliding Bar', 'Top Sliding Bar', 'manage_options', 'tsw-sub-menu', 'tsw_head_menu', $icon_url, 107);

}
add_action('admin_menu', 'tsw_create_menu');

?>