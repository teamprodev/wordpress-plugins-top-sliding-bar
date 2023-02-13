<?php

/*
Plugin Name: Top Sliding Bar, Widgets Builder
Plugin URI: http://widgets.fanpagesmarket.com
Description: Top Sliding Bar, Widgets Builder - Awesome Widgets Area.
Author: Socialeo Team
Author URI: http://codecanyon.net/user/socialeo
Version: 1.2.7
License: GPL2
*/

// Require files
require_once 'inc/widgets.php';
require_once 'inc/menu.php';

class TopSlidingBarArea
{
	private $plugin_id = 'tsw_plugin_';
	private $plugin_version = '1.2.7';

	function __construct() {
		register_activation_hook(__FILE__, array($this, 'onActivate'));
		register_uninstall_hook(__FILE__, array('TopSlidingBarArea', 'onUninstall'));
	}

	static function onUninstall() {
		$plugin_id = 'tsw_plugin_';
		$ver_opt = $plugin_id.'version';
		delete_option($ver_opt);
	}

	function onActivate() {
		$plugin_id = 'tsw_plugin_';
		$ver_opt = $plugin_id.'version';
		$installed_version = get_option($ver_opt, NULL);

		if($installed_version == NULL) {

			// If not installed
			update_option($plugin_id.'col_per_row', 4);

		} else {

			switch(version_compare($installed_version, $this->plugin_version)) {

				case 0;
					// if the same
					//update_option($ver_opt, $this->plugin_version);
					break;

				case 1;
					// if newer
					//update_option($ver_opt, $this->plugin_version);
					break;

				case -1;
					// if older
					//update_option($ver_opt, $this->plugin_version);
					break;
			}
		}
	}
}

function tswPermalink(){
	$slug = basename(get_permalink());
	do_action('before_slug', $slug);
	$slug = apply_filters('slug_filter', $slug);
	do_action('after_slug', $slug);

	return $slug;
}

function TSW_add_stylesheet_and_script()
{
	wp_register_style('top_sliding_bar_stylesheet', plugins_url('frontend/css/tsw.css', __FILE__));
	wp_enqueue_style('top_sliding_bar_stylesheet');
	wp_register_script('top_sliding_bar_js_script', plugins_url('frontend/js/tsw.js', __FILE__), array('jquery','media-upload','thickbox'));
	wp_enqueue_script('top_sliding_bar_js_script');
}
add_action('wp_enqueue_scripts', 'TSW_add_stylesheet_and_script');

function tswCustom($name, $type) {
	$get_opt = get_option('tsw_plugin_'.$name);
	if ( $get_opt != '' ) {
		if ( $type == 'bg' ) {
			return 'background-color: '.$get_opt.' !important;';
		} elseif ( $type == 'c' ) {
			return 'color: '.$get_opt.' !important;';
		} elseif ( $type == 'a' ) {
			if ( $get_opt ) {
				return 'color: '.$get_opt.' !important;';
			} else {
				return 'color: inherit;';
			}
		} elseif ( $type == 'a:h' ) {
			if ( $get_opt ) {
				return 'color: '.$get_opt.' !important;';
			} else {
				return 'color: inherit;';
			}
		} elseif ( $type == 'bc' ) {
			return 'border-color: '.$get_opt.' !important;';
		} elseif ( $type == 'm-w' ) {
			return 'max-width: '.$get_opt.'px !important;';
		} elseif ( $type == 'o' ) {
			return 'opacity: '.$get_opt.' !important;';
		} elseif ( $type == 'b-t' ) {
			return 'border-top: 40px solid'.$get_opt.' !important;';
		}
	} else {
		return NULL;
	}
}

function TSW_add_google_font()
{
	if ( get_option('tsw_plugin_google_font') != NULL && get_option('tsw_plugin_google_font_url') != '' ) {
		$google_font_url = get_option('tsw_plugin_google_font_url');
		echo '<link href="'.$google_font_url.'" rel="stylesheet" type="text/css">';
	}
}
add_action('wp_enqueue_scripts', 'TSW_add_google_font');

function TSW_add_custom_stylesheet()
{
	echo "
	<style>

		/* Custom TSW Styles */

		/* main */
		#tsw_wrapper { ".str_replace(";", " !important;", get_option('tsw_plugin_google_font'))." }
		#tsw_wrapper .tsw_container .tsw_container_row { ".tswCustom('max_width', 'm-w')." }
		#tsw_wrapper .tsw_container .tsw_container_bg { ".tswCustom('transparent_background', 'o').tswCustom('bg_color', 'bg')." }
		#tsw_wrapper .tsw_toggle_button { ".tswCustom('bg_button', 'b-t')." }
		#tsw_wrapper .tsw_opening .tsw_col_inner,
		#tsw_wrapper .tsw_login .tsw_col_inner { ".tswCustom('bg_widgets', 'bg')." }

		/* colors */
		#tsw_wrapper .tswMainColor { ".tswCustom('main_color', 'c')." }
		#tsw_wrapper .tswExtraColor { ".tswCustom('extra_color', 'c')." }
		#tsw_wrapper .tsw_container,
		#tsw_wrapper .tswTextColor { ".tswCustom('text_color', 'c')." }
		#tsw_wrapper .tswLinkColor,
		#tsw_wrapper a { ".tswCustom('link_color', 'a')." }
		#tsw_wrapper a:hover,
		#tsw_wrapper a:focus,
		#tsw_wrapper a:active { ".tswCustom('link_action', 'a:h')." }

		".get_option('tsw_plugin_custom_css')."

	</style>
	";
}
add_action('wp_enqueue_scripts', 'TSW_add_custom_stylesheet');

function TSW_load_color_picker() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'TSW_load_color_picker' );

function TSW_bar_init() {
	register_sidebar( array(
		'name' => 'Awesome Top Sliding Bar',
		'id' => 'tsw_bar',
		'before_title' => '<h3 class="tswMainColor">',
		'after_title' => '</h3>',
		'before_extra' => '<h2 class="tswExtraColor">',
		'after_extra' => '</h2>',
		'before_content' => '<section class="tswTextColor">',
		'after_content' => '</section>'
	) );
}
add_action( 'widgets_init', 'TSW_bar_init' );

function TSW_init_function() {
	// set container breakpoints
	if ( get_option('tsw_plugin_col_per_row') != '' ) {
		if ( get_option('tsw_plugin_col_per_row') == 1 ) {
			$get_col_per_row = 1; // 1 column = (12/12) - width 100%
		} elseif ( get_option('tsw_plugin_col_per_row') == 2 ) {
			$get_col_per_row = 2; // 2 columns = (6/12) - width 50%
		} elseif ( get_option('tsw_plugin_col_per_row') == 3 ) {
			$get_col_per_row = 3; // 3 columns = (4/12) - width 33.33333%
		} elseif ( get_option('tsw_plugin_col_per_row') == 4 ) {
			$get_col_per_row = 4; // 4 columns = (3/12) - width 25%
		} else {
			$get_col_per_row = 3; // 3 columns = (4/12) - width 33.33333%
		}
		$col_per_row = 'tsw_container_'.$get_col_per_row; // custom columns
	} else {
		$col_per_row = 'tsw_container_3'; // default 3 columns
	}

	// dev version
	if ( get_option('tsw_plugin_dev_version') == 1 ) {
		$permalink = tswPermalink();
	} else {
		$permalink = NULL;
	}

	// check if logged
	if ( is_user_logged_in() ) {
		$tsw_is_logged = 'tswLogged';
	} else {
		$tsw_is_logged = '';
	}
	?>
	<?php if ( get_option('tsw_plugin_dev_version') == 0 || current_user_can( 'manage_options' ) ): ?>
	<div id="tsw_wrapper" class="<?php if ( get_option('tsw_plugin_fixed_position') == 1 ) { echo 'tsw_fixed'; } ?> <?php echo $tsw_is_logged; ?>">
		<section class="tsw_container">
			<div class="tsw_container_bg"></div>
			<div class="tsw_container_row <?php echo $col_per_row; ?>">
				<?php dynamic_sidebar( 'tsw_bar' ); ?>
				<?php if ( $permalink != NULL && current_user_can( 'manage_options' ) ): ?>
					<div class="tsw_dev">
						<b>Developer version is enabled.</b> Permalink for this page is <strong><?php echo $permalink; ?></strong>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<div class="tsw_toggle_button <?php if ( get_option('tsw_plugin_flashing_button') == 1 ) { echo 'flashing_animation'; } ?>">
			<a href="#" class="tsw_toggle_button_inner">
				<img src="<?php
							if ( get_option('tsw_plugin_custom_arrow') != '' ) { echo get_option('tsw_plugin_custom_arrow'); }
							else { echo plugins_url('/tsw-socialeo/frontend/img/arrow.png'); }
						  ?>" />
			</a>
		</div>
	</div><!-- #tsw_area -->
	<?php endif; ?>
	<?php
}

function tsw_open( $attr, $content = null ) {
	return '<a href="#" class="tsw_toggle_button tsw_open">' . $content . '</a>';
}
add_shortcode('tsw_open', 'tsw_open');

$TopSlidingBarArea = new TopSlidingBarArea();

?>