<?php

class TSW_List extends WP_Widget {
	public function __construct() {
		parent::__construct('tsw_list', 'Awesome Widget - List', array(
			'description' => 'List section in top sliding bar.',
		));
	}
	public function widget( $args, $instance ) {

		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$point1 = $instance['point1'];
		$point2 = $instance['point2'];
		$point3 = $instance['point3'];
		$point4 = $instance['point4'];
		$point5 = $instance['point5'];
		$point6 = $instance['point6'];
		$point7 = $instance['point7'];
		$link = $instance['link'];
		$url = $instance['url'];
		// options
		$size = $instance['size'];
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

			echo '<div class="tsw_list tsw_col tsw_col_'.$size.'">'; // Display widget
			echo '<div class="tsw_col_inner">'; // Display widget inner

			// -- Start -- Content
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			echo '<ul>';

			if( $point1 ) {
				echo '<li>'.$point1.'</li>';
			}
			if( $point2 ) {
				echo '<li>'.$point2.'</li>';
			}
			if( $point3 ) {
				echo '<li>'.$point3.'</li>';
			}
			if( $point4 ) {
				echo '<li>'.$point4.'</li>';
			}
			if( $point5 ) {
				echo '<li>'.$point5.'</li>';
			}
			if( $point6 ) {
				echo '<li>'.$point6.'</li>';
			}
			if( $point7 ) {
				echo '<li>'.$point7.'</li>';
			}

			if( $url && $link ) {
				echo '<a href="'.$url.'" class="tsw_link">'.$link.'</a>';
			}

			echo '</ul>';
			// -- END -- Content

			echo "</div>"; // Close widget inner
			echo "</div>"; // Close widget

		}
	}
	public function form( $instance ) {
		// Check values
		if( $instance) {
			$title = esc_attr($instance['title']);
			$point1 = esc_attr($instance['point1']);
			$point2 = esc_attr($instance['point2']);
			$point3 = esc_attr($instance['point3']);
			$point4 = esc_attr($instance['point4']);
			$point5 = esc_attr($instance['point5']);
			$point6 = esc_attr($instance['point6']);
			$point7 = esc_attr($instance['point7']);
			$link = esc_attr($instance['link']);
			$url = esc_attr($instance['url']);
			// options
			$size = esc_attr($instance['size']);
			$show = esc_attr($instance['show']);
			$hide = esc_attr($instance['hide']);
		} else {
			$title = '';
			$point1 = '';
			$point2 = '';
			$point3 = '';
			$point4 = '';
			$point5 = '';
			$point6 = '';
			$point7 = '';
			$link = '';
			$url = '';
			// options
			$size = '1';
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
			<label for="<?php echo $this->get_field_id('point1'); ?>"><?php _e('Point 1:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('point1'); ?>" name="<?php echo $this->get_field_name('point1'); ?>" type="text" value="<?php echo $point1; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('point2'); ?>"><?php _e('Point 2:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('point2'); ?>" name="<?php echo $this->get_field_name('point2'); ?>" type="text" value="<?php echo $point2; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('point3'); ?>"><?php _e('Point 3:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('point3'); ?>" name="<?php echo $this->get_field_name('point3'); ?>" type="text" value="<?php echo $point3; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('point4'); ?>"><?php _e('Point 4:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('point4'); ?>" name="<?php echo $this->get_field_name('point4'); ?>" type="text" value="<?php echo $point4; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('point5'); ?>"><?php _e('Point 5:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('point5'); ?>" name="<?php echo $this->get_field_name('point5'); ?>" type="text" value="<?php echo $point5; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('point6'); ?>"><?php _e('Point 6:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('point6'); ?>" name="<?php echo $this->get_field_name('point6'); ?>" type="text" value="<?php echo $point6; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('point7'); ?>"><?php _e('Point 7:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('point7'); ?>" name="<?php echo $this->get_field_name('point7'); ?>" type="text" value="<?php echo $point7; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Link URL:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
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

		<p>
			<label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Select size', 'wp_widget_plugin'); ?></label>
			<select name="<?php echo $this->get_field_name('size'); ?>" id="<?php echo $this->get_field_id('size'); ?>" class="widefat">
				<?php
				if ( get_option('tsw_plugin_col_per_row') == 4 ) {
					$options = array(1, 2, 3, 4);
					$multiply = 3;
				} elseif ( get_option('tsw_plugin_col_per_row') == 3 ) {
					$options = array(1, 2, 3);
					$multiply = 4;
				} elseif ( get_option('tsw_plugin_col_per_row') == 2 ) {
					$options = array(1, 2);
					$multiply = 6;
				} else {
					$options = array(1);
					$multiply = 12;
				}
				foreach ($options as $option) {
					if($option != 1) {
						$count = 's';
					} else {
						$count = '';
					}
					echo '<option value="' . $option . '" id="size-' . $option . '"', $size == $option ? ' selected="selected"' : '', '> ', $option, ' column'.$count.' ('.($option * $multiply).'/12 = '.number_format((($option * $multiply / 12) * 100), 2, '.', '').'%)</option>';
				}
				?>
			</select>
		</p>

	<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['point1'] = strip_tags($new_instance['point1']);
		$instance['point2'] = strip_tags($new_instance['point2']);
		$instance['point3'] = strip_tags($new_instance['point3']);
		$instance['point4'] = strip_tags($new_instance['point4']);
		$instance['point5'] = strip_tags($new_instance['point5']);
		$instance['point6'] = strip_tags($new_instance['point6']);
		$instance['point7'] = strip_tags($new_instance['point7']);
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['url'] = strip_tags($new_instance['url']);
		// options
		$instance['size'] = strip_tags($new_instance['size']);
		$instance['show'] = strip_tags($new_instance['show']);
		$instance['hide'] = strip_tags($new_instance['hide']);
		return $instance;
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'TSW_List' );
});

?>