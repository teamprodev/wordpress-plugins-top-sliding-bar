<?php

class TSW_Opening extends WP_Widget {
	public function __construct() {
		parent::__construct('tsw_opening', 'Awesome Widget - Opening Times', array(
			'description' => 'Opening times section in top sliding bar.',
		));
	}
	public function widget( $args, $instance ) {

		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$working_days = $instance['working_days'];
		$working_days_times = $instance['working_days_times'];
		$saturday = $instance['saturday'];
		$saturday_times = $instance['saturday_times'];
		$sunday = $instance['sunday'];
		$sunday_times = $instance['sunday_times'];
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

		// show if can be display
		if ( $display == NULL || $display == 'show' ) {

			echo '<div class="tsw_opening tsw_col tsw_col_1">'; // Display widget
			echo '<div class="tsw_col_inner">'; // Display widget inner

			// -- Start -- Content
			if ( $title ) {
				echo $before_title .'<span class="textCenter">'. $title .'</span>'. $after_title;
			}

			echo '<section>';

			if( $working_days ) {
				echo '<p class="tsw_working_label textCenter"><strong>'.$working_days.'</strong></p>';
			}
			if( $working_days_times ) {
				echo '<h2 class="tswExtraColor textCenter w100">'.$working_days_times.'</h2>';
			}
			if( $saturday && $saturday_times ) {
				echo '<p class="textCenter">'.$saturday.' <strong>'.$saturday_times.'</strong></p>';
			}
			if( $sunday && $sunday_times ) {
				echo '<p class="textCenter">'.$sunday.' <strong>'.$sunday_times.'</strong></p>';
			}

			echo '</section>';
			// -- END -- Content

			echo "</div>"; // Close widget inner
			echo "</div>"; // Close widget

		}
	}
	public function form( $instance ) {
		// Check values
		if( $instance) {
			$title = esc_attr($instance['title']);
			$working_days = esc_attr($instance['working_days']);
			$working_days_times = esc_attr($instance['working_days_times']);
			$saturday = esc_attr($instance['saturday']);
			$saturday_times = esc_attr($instance['saturday_times']);
			$sunday = esc_attr($instance['sunday']);
			$sunday_times = esc_attr($instance['sunday_times']);
			// options
			$show = esc_attr($instance['show']);
			$hide = esc_attr($instance['hide']);
		} else {
			$title = '';
			$working_days = '';
			$working_days_times = '';
			$saturday = '';
			$saturday_times = '';
			$sunday = '';
			$sunday_times = '';
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
			<label for="<?php echo $this->get_field_id('working_days'); ?>"><?php _e('Working Days:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('working_days'); ?>" name="<?php echo $this->get_field_name('working_days'); ?>" type="text" value="<?php echo $working_days; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('working_days_times'); ?>"><?php _e('Times:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('working_days_times'); ?>" name="<?php echo $this->get_field_name('working_days_times'); ?>" type="text" value="<?php echo $working_days_times; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('saturday'); ?>"><?php _e('Saturday Label:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('saturday'); ?>" name="<?php echo $this->get_field_name('saturday'); ?>" type="text" value="<?php echo $saturday; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('saturday_times'); ?>"><?php _e('Saturday Times:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('saturday_times'); ?>" name="<?php echo $this->get_field_name('saturday_times'); ?>" type="text" value="<?php echo $saturday_times; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('sunday'); ?>"><?php _e('Sunday Label:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('sunday'); ?>" name="<?php echo $this->get_field_name('sunday'); ?>" type="text" value="<?php echo $sunday; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('sunday_times'); ?>"><?php _e('Sunday Times:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('sunday_times'); ?>" name="<?php echo $this->get_field_name('sunday_times'); ?>" type="text" value="<?php echo $sunday_times; ?>" />
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
		$instance['working_days'] = strip_tags($new_instance['working_days']);
		$instance['working_days_times'] = strip_tags($new_instance['working_days_times']);
		$instance['saturday'] = strip_tags($new_instance['saturday']);
		$instance['saturday_times'] = strip_tags($new_instance['saturday_times']);
		$instance['sunday'] = strip_tags($new_instance['sunday']);
		$instance['sunday_times'] = strip_tags($new_instance['sunday_times']);
		// options
		$instance['show'] = strip_tags($new_instance['show']);
		$instance['hide'] = strip_tags($new_instance['hide']);
		return $instance;
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'TSW_Opening' );
});

?>