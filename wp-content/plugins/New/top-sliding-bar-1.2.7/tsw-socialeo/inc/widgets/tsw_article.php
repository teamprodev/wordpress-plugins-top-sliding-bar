<?php

class TSW_Article extends WP_Widget {
	public function __construct() {
		parent::__construct('tsw_article', 'Awesome Widget - Article', array(
			'description' => 'Article section in top sliding bar.',
		));
	}
	public function widget( $args, $instance ) {

		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$article = $instance['article'];
		$img = $instance['img'];
		$link = $instance['link'];
		$url = $instance['url'];
		$article2 = $instance['article2'];
		$img2 = $instance['img2'];
		$link2 = $instance['link2'];
		$url2 = $instance['url2'];
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

			echo '<div class="tsw_article tsw_col tsw_col_'.$size.'">'; // Display widget
			echo '<div class="tsw_col_inner">'; // Display widget inner

			// -- Start -- Content
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			echo '<p>';

			if( $article && $img != '' ) {
				echo '<article>'.'<img src="'.$img.'" title="'.$title.'">'.$article.'</article>';
			} else {
				echo '<article>'.$article.'</article>';
			}

			if( $url && $link ) {
				echo '<a href="'.$url.'" class="tsw_link">'.$link.'</a>';
			}

			if( $article2 && $img2 != '' ) {
				echo '<article class="tsw_2nd_article">'.'<img src="'.$img2.'" title="'.$title.'">'.$article2.'</article>';
			} else {
				echo '<article>'.$article2.'</article>';
			}

			if( $url2 && $link2 ) {
				echo '<a href="'.$url2.'" class="tsw_link">'.$link2.'</a>';
			}

			echo '</p>';
			// -- END -- Content

			echo "</div>"; // Close widget inner
			echo "</div>"; // Close widget

		}
	}
	public function form( $instance ) {
		// Check values
		if( $instance) {
			$title = esc_attr($instance['title']);
			$article = esc_textarea($instance['article']);
			$img = esc_attr($instance['img']);
			$link = esc_attr($instance['link']);
			$url = esc_attr($instance['url']);
			$article2 = esc_textarea($instance['article2']);
			$img2 = esc_attr($instance['img2']);
			$link2 = esc_attr($instance['link2']);
			$url2 = esc_attr($instance['url2']);
			// options
			$size = esc_attr($instance['size']);
			$show = esc_attr($instance['show']);
			$hide = esc_attr($instance['hide']);
		} else {
			$title = '';
			$article = '';
			$img = '';
			$link = '';
			$url = '';
			$article2 = '';
			$img2 = '';
			$link2 = '';
			$url2 = '';
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
			<label for="<?php echo $this->get_field_id('article'); ?>"><?php _e('1st Article content:', 'wp_widget_plugin'); ?></label><br>
			<textarea id="<?php echo $this->get_field_id('article'); ?>" name="<?php echo $this->get_field_name('article'); ?>"><?php echo $article; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img'); ?>"><?php _e('1st Image URL:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="text" value="<?php echo $img; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('1st Link', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('1st Link URL:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('article2'); ?>"><?php _e('2nd Article content:', 'wp_widget_plugin'); ?></label><br>
			<textarea id="<?php echo $this->get_field_id('article2'); ?>" name="<?php echo $this->get_field_name('article2'); ?>"><?php echo $article2; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img2'); ?>"><?php _e('2nd Image URL:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img2'); ?>" name="<?php echo $this->get_field_name('img2'); ?>" type="text" value="<?php echo $img2; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link2'); ?>"><?php _e('2nd Link', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo $link2; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('url2'); ?>"><?php _e('2nd Link URL:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url2'); ?>" name="<?php echo $this->get_field_name('url2'); ?>" type="text" value="<?php echo $url2; ?>" />
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
		$instance['article'] = strip_tags($new_instance['article']);
		$instance['img'] = strip_tags($new_instance['img']);
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['url'] = strip_tags($new_instance['url']);
		$instance['article2'] = strip_tags($new_instance['article2']);
		$instance['img2'] = strip_tags($new_instance['img2']);
		$instance['link2'] = strip_tags($new_instance['link2']);
		$instance['url2'] = strip_tags($new_instance['url2']);
		// options
		$instance['size'] = strip_tags($new_instance['size']);
		$instance['show'] = strip_tags($new_instance['show']);
		$instance['hide'] = strip_tags($new_instance['hide']);
		return $instance;
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'TSW_Article' );
});

?>