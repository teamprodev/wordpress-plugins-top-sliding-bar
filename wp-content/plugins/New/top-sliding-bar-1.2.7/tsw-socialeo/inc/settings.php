<?php

$plugin_id = 'tsw_plugin_';

function selectedOpt($optName, $optValue)
{
	if(get_option('tsw_plugin_'.$optName) != '' && get_option('tsw_plugin_'.$optName) == $optValue) {
		echo 'selected="selected"';
	}
}

function validValue($variableName)
{
	if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST[$variableName] != '') {
		echo $_POST[$variableName];
	} else {
		echo get_option('tsw_plugin_'.$variableName);
	}
}

?>
	<h2><i class="dashicons-before dashicons-admin-settings"></i> Top Sliding Bar Settings</h2>
	<form action="" method="post">
		<input type="hidden" value="updateSettings" name="tswAction">
		<table class="tswAdminTable form-table">
			<tbody class="tswTbody">
				<tr>
					<th colspan="2">
						<h3><span class="dashicons dashicons-tagcloud"></span> Layout settings</h3>
					</th>
				</tr>

				<tr>
					<th scope="row"><label for="max_width">Maximum width</label></th>
					<td>
						<input type="text" id="max_width" name="max_width" class="regular-text ltr" value="<?php echo get_option($plugin_id.'max_width') ?>"> <abbr title="Width without px">px</abbr>
						<p class="description">Example: 1200</p>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="col_per_row">Number of columns per row</label></th>
					<td>
						<select id="col_per_row" name="col_per_row">
							<option value="1" <?php selectedOpt('col_per_row', 1); ?>>1 column (1 column = 100% width)</option>
							<option value="2" <?php selectedOpt('col_per_row', 2); ?>>2 columns (1 column = 50% width)</option>
							<option value="3" <?php selectedOpt('col_per_row', 3); ?>>3 columns (1 column = 33.333% width)</option>
							<option value="4" <?php selectedOpt('col_per_row', 4); ?>>4 columns (1 column = 25% width)</option>
						</select>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="google_font">Google Font</label></th>
					<td>
						<input type="text" id="google_font" name="google_font" class="regular-text ltr" value="<?php echo get_option($plugin_id.'google_font') ?>">
						<p class="description">
							Example: <strong>font-family: 'Open Sans', sans-serif;</strong><br>
							Choose from 650+ fonts available here <a href="https://www.google.com/fonts" target="_blank">https://www.google.com/fonts</a>
						</p>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="google_font_url">Google Font URL</label></th>
					<td>
						<input type="text" id="google_font_url" name="google_font_url" class="regular-text ltr" value="<?php echo get_option($plugin_id.'google_font_url') ?>">
						<p class="description">Example: <strong>http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700</strong></p>
					</td>
				</tr>

				<tr>
					<th scope="row">Fixed position</th>
					<td>
						<fieldset>
							<label title="Fixed position"><input type="radio" <?php if(get_option('tsw_plugin_fixed_position') != 1) { echo 'checked="checked"'; } ?> value="0" name="fixed_position"> no</label><br>
							<label title="Fixed position"><input type="radio" <?php if(get_option('tsw_plugin_fixed_position') == 1) { echo 'checked="checked"'; } ?>value="1" name="fixed_position"> yes</label>
						</fieldset>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="transparent_background">Transparent background</label></th>
					<td>
						<input type="text" id="transparent_background" name="transparent_background" class="regular-text ltr" value="<?php echo get_option($plugin_id.'transparent_background') ?>">
						<p class="description">Example: 0.7 - (70% transparency)</p>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="custom_arrow">Custom arrow</label></th>
					<td>
						<input type="text" id="custom_arrow" name="custom_arrow" class="regular-text ltr" value="<?php echo get_option($plugin_id.'custom_arrow') ?>">
						<p class="description">Paste here full url to change arrow! Recommended size: 16x16px.</p>
					</td>
				</tr>

				<tr>
					<th scope="row">Flashing opening button</th>
					<td>
						<fieldset>
							<label title="Flashing open button"><input type="radio" <?php if(get_option('tsw_plugin_flashing_button') != 1) { echo 'checked="checked"'; } ?> value="0" name="flashing_button"> no </label><br>
							<label title="Flashing open button"><input type="radio" <?php if(get_option('tsw_plugin_flashing_button') == 1) { echo 'checked="checked"'; } ?>value="1" name="flashing_button"> yes </label>
						</fieldset>
					</td>
				</tr>

				<tr>
					<th scope="row">Developer version</th>
					<td>
						<fieldset>
							<label title="Developer version"><input type="radio" <?php if(get_option('tsw_plugin_dev_version') != 1) { echo 'checked="checked"'; } ?> value="0" name="dev_version"> disabled </label><br>
							<label title="Developer version"><input type="radio" <?php if(get_option('tsw_plugin_dev_version') == 1) { echo 'checked="checked"'; } ?>value="1" name="dev_version"> enabled (visible only for admins)</label>
						</fieldset>
						<p class="description">
							If enabled, you will can check the <strong> permalink </strong> for any page. <br>
							Set the <strong> permalink </strong> in the widget option to <strong> show / hide </strong> widget on specific pages.
						</p>
					</td>
				</tr>


<!--				Custom colors -->
				<tr>
					<th colspan="2">
						<h3><span class="dashicons dashicons-admin-appearance"></span> Custom colors</h3>
					</th>
				</tr>

				<tr>
					<th scope="row"><label for="bg_color">Background color</label></th>
					<td>
						<input id="bg_color"
							   name="bg_color"
							   value="<?php echo get_option('tsw_plugin_'.'bg_color') ?>"
							   data-default-color="<?php echo get_option('tsw_plugin_'.'bg_color') ?>" type="text" class="tswColorPicker">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="bg_button">Background button</label></th>
					<td>
						<input id="bg_button"
							   name="bg_button"
							   value="<?php echo get_option('tsw_plugin_'.'bg_button') ?>"
							   data-default-color="<?php echo get_option('tsw_plugin_'.'bg_button') ?>" type="text" class="tswColorPicker">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="bg_widgets">Background widgets</label></th>
					<td>
						<input id="bg_widgets"
							   name="bg_widgets"
							   value="<?php echo get_option('tsw_plugin_'.'bg_widgets') ?>"
							   data-default-color="<?php echo get_option('tsw_plugin_'.'bg_widgets') ?>" type="text" class="tswColorPicker">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="main_color">Main color</label></th>
					<td>
						<input id="main_color"
							   name="main_color"
							   value="<?php echo get_option('tsw_plugin_'.'main_color') ?>"
							   data-default-color="<?php echo get_option('tsw_plugin_'.'main_color') ?>" type="text" class="tswColorPicker">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="extra_color">Extra color</label></th>
					<td>
						<input id="extra_color"
							   name="extra_color"
							   value="<?php echo get_option('tsw_plugin_'.'extra_color') ?>"
							   data-default-color="<?php echo get_option('tsw_plugin_'.'extra_color') ?>" type="text" class="tswColorPicker">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="text_color">Text color</label></th>
					<td>
						<input id="text_color"
							   name="text_color"
							   value="<?php echo get_option('tsw_plugin_'.'text_color') ?>"
							   data-default-color="<?php echo get_option('tsw_plugin_'.'text_color') ?>" type="text" class="tswColorPicker">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="link_color">Link color</label></th>
					<td>
						<input id="link_color"
							   name="link_color"
							   value="<?php echo get_option('tsw_plugin_'.'link_color') ?>"
							   data-default-color="<?php echo get_option('tsw_plugin_'.'link_color') ?>" type="text" class="tswColorPicker">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="link_action">Link action color</label></th>
					<td>
						<input id="link_action"
							   name="link_action"
							   value="<?php echo get_option('tsw_plugin_'.'link_action') ?>"
							   data-default-color="<?php echo get_option('tsw_plugin_'.'link_action') ?>" type="text" class="tswColorPicker">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="custom_css">Custom CSS</label></th>
					<td>
						<textarea id="custom_css" name="custom_css" class="regular-text ltr" rows="7" cols="50"><?php echo get_option($plugin_id.'custom_css') ?></textarea>
						<p class="description"><strong>Example:</strong> If you want change font size for H2 tag, paste this code:<br><strong>#tsw_wrapper h2 { font-size: 20px !important; }</strong></p>
					</td>
				</tr>

			</tbody>
		</table>
		<p class="submit">
			<input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
		</p>
	</form>
<?php if ( tswUpdateSettings() == TRUE ) { ?>
	<script>
		window.location=document.location.href
	</script>
<?php } ?>
	<script>
		(function($){

			$(document).ready(function(){

				$('.tswColorPicker').wpColorPicker();

			});

		})(jQuery);
	</script>
<?php
?>