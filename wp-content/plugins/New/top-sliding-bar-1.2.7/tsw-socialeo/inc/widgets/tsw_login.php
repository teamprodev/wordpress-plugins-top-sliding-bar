<?php

class TSW_Login_Form extends WP_Widget {
	public function __construct() {
		parent::__construct('tsw_login', 'Awesome Widget - Login form', array(
			'description' => 'Login section in top sliding bar.',
		));
	}
	public function widget( $args, $instance ) {

		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$login = $instance['login'];
		$pass = $instance['pass'];
		$lost = $instance['lost'];
		$button = $instance['button'];
		$logged_title = $instance['logged_title'];
		$logged_profile = $instance['logged_profile'];
		$logged_edit = $instance['logged_edit'];
		$logout = $instance['logout'];
		// options
		$show = $instance['show'];
		$hide = $instance['hide'];

		$display = 'hide';
		if ( $show == '' && $hide == '' ) {
			$display = NULL;
		} else {
			if ( $show == '' && $hide != '' ) {
				if ( $hide == tswPermalink() ) {
					$display = 'hide';
				} else {
					$display = 'show';
				}
			}
			if ( $hide == '' && $show != '' ) {
				if ( $show == tswPermalink() ) {
					$display = 'show';
				} else {
					$display = 'hide';
				}
			}
		}

		// if not isset
		if ( $login == '' ) { $login = 'Username'; }
		if ( $pass == '' ) { $pass = 'Password'; }
		if ( $lost == '' ) { $lost = 'Lost your password?'; }
		if ( $button == '' ) { $button = 'Log In'; }
		if ( $logged_title == '' ) { $logged_title = 'Logged as '; }
		if ( $logged_profile == '' ) { $logged_profile = 'My Profile'; }
		if ( $logged_edit == '' ) { $logged_edit = 'Edit My Profile'; }
		if ( $logout == '' ) { $logout = 'Logout'; }

		// show if can be display
		if ( $display == NULL || $display == 'show' ) {

			echo '<div class="tsw_login tsw_col tsw_col_1">'; // Display widget
			echo '<div class="tsw_col_inner">'; // Display widget inner

			// -- Start -- Content

			global $current_user;
			get_currentuserinfo();
			if ( is_user_logged_in() ) {
				$title = $logged_title.$current_user->user_login;
			}
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			if ( is_user_logged_in() ) {

				global $current_user;
				echo '<div class="tsw_avatar">'.get_avatar( $current_user->ID, 50 ).'</div>';
				echo '<a href="'.get_site_url().'/wp-admin/profile.php">'.$logged_profile.'</a><br>';
				echo '<a href="'.get_site_url().'/wp-admin/profile.php">'.$logged_edit.'</a><br>';
				echo '<a style="clear:both;" href="'.get_site_url().'/wp-login.php?action=logout">'.$logout.'</a><br><br>';

			} else {
				echo '<form name="loginform" id="loginform" action="'.get_site_url().'/wp-login.php" method="post">
						<p>
							<label for="user_login">'.$login.'<br>
								<input type="text" name="log" id="user_login" class="input" value="" size="20"></label>
						</p>
						<p>
							<label for="user_pass">'.$pass.' / <a href="'.get_site_url().'/wp-login.php?action=register">'.$lost.'</a><br>
								<input type="password" name="pwd" id="user_pass" class="input" value="" size="20"></label>
						</p>
						<p class="submit">
							<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="'.$button.'">
							<input type="hidden" name="redirect_to" value="'.get_site_url().'/wp-admin/">
						</p>
					</form>';
			}

			// -- END -- Content

			echo "</div>"; // Close widget inner
			echo "</div>"; // Close widget

		}
	}
	public function form( $instance ) {
		// Check values
		if( $instance) {
			$title = esc_attr($instance['title']);
			$login = $instance['login'];
			$pass = $instance['pass'];
			$lost = $instance['lost'];
			$button = $instance['button'];
			$logged_title = $instance['logged_title'];
			$logged_profile = $instance['logged_profile'];
			$logged_edit = $instance['logged_edit'];
			$logout = $instance['logout'];
			// options
			$show = esc_attr($instance['show']);
			$hide = esc_attr($instance['hide']);
		} else {
			$title = '';
			$login = '';
			$pass = '';
			$lost = '';
			$button = '';
			$logged_title = '';
			$logged_profile = '';
			$logged_edit = '';
			$logout = '';
			// options
			$show = '';
			$hide = '';
		}
		?>

		<h3>Content</h3>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('login'); ?>"><?php _e('Username Label', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('login'); ?>" name="<?php echo $this->get_field_name('login'); ?>" type="text" value="<?php echo $login; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('pass'); ?>"><?php _e('Password Label', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('pass'); ?>" name="<?php echo $this->get_field_name('pass'); ?>" type="text" value="<?php echo $pass; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('lost'); ?>"><?php _e('Lost Label', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('lost'); ?>" name="<?php echo $this->get_field_name('lost'); ?>" type="text" value="<?php echo $lost; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Button Label', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" type="text" value="<?php echo $button; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('logged_title'); ?>"><?php _e('Logged Title', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('logged_title'); ?>" name="<?php echo $this->get_field_name('logged_title'); ?>" type="text" value="<?php echo $logged_title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('logged_profile'); ?>"><?php _e('Logged Profile', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('logged_profile'); ?>" name="<?php echo $this->get_field_name('logged_profile'); ?>" type="text" value="<?php echo $logged_profile; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('logged_edit'); ?>"><?php _e('Logged Edit', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('logged_edit'); ?>" name="<?php echo $this->get_field_name('logged_edit'); ?>" type="text" value="<?php echo $logged_edit; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('logout'); ?>"><?php _e('Logout', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('logout'); ?>" name="<?php echo $this->get_field_name('logout'); ?>" type="text" value="<?php echo $logout; ?>" />
		</p>

		<!-- options -->
		<hr>
		<h3>Options</h3>

		<p>
			<label for="<?php echo $this->get_field_id('show'); ?>"><?php _e('Show for permalink:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('show'); ?>" name="<?php echo $this->get_field_name('show'); ?>" type="text" value="<?php echo $show; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('hide'); ?>"><?php _e('Hide for permalink:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('hide'); ?>" name="<?php echo $this->get_field_name('hide'); ?>" type="text" value="<?php echo $hide; ?>" />
		</p>

	<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['login'] = strip_tags($new_instance['login']);
		$instance['pass'] = strip_tags($new_instance['pass']);
		$instance['lost'] = strip_tags($new_instance['lost']);
		$instance['button'] = strip_tags($new_instance['button']);
		$instance['logged_title'] = strip_tags($new_instance['logged_title']);
		$instance['logged_profile'] = strip_tags($new_instance['logged_profile']);
		$instance['logged_edit'] = strip_tags($new_instance['logged_edit']);
		$instance['logout'] = strip_tags($new_instance['logout']);
		// options
		$instance['show'] = strip_tags($new_instance['show']);
		$instance['hide'] = strip_tags($new_instance['hide']);
		return $instance;
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'TSW_Login_Form' );
});

?>