<?php

class TSW_Gallery_12 extends WP_Widget {
	public function __construct() {
		parent::__construct('tsw_gallery_12', 'Awesome Widget - Gallery 12', array(
			'description' => 'Gallery, max 12 images section in top sliding bar.',
		));
	}
	public function widget( $args, $instance ) {

		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$img1 = $instance['img1'];
		$url1 = $instance['url1'];
		$img2 = $instance['img2'];
		$url2 = $instance['url2'];
		$img3 = $instance['img3'];
		$url3 = $instance['url3'];
		$img4 = $instance['img4'];
		$url4 = $instance['url4'];
		$img5 = $instance['img5'];
		$url5 = $instance['url5'];
		$img6 = $instance['img6'];
		$url6 = $instance['url6'];
		$img7 = $instance['img7'];
		$url7 = $instance['url7'];
		$img8 = $instance['img8'];
		$url8 = $instance['url8'];
		$img9 = $instance['img9'];
		$url9 = $instance['url9'];
		$img10 = $instance['img10'];
		$url10 = $instance['url10'];
		$img11 = $instance['img11'];
		$url11 = $instance['url11'];
		$img12 = $instance['img12'];
		$url12 = $instance['url12'];
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

			echo '<div class="tsw_gallery_12 tsw_col tsw_col_1">'; // Display widget
			echo '<div class="tsw_col_inner">'; // Display widget inner

			// -- Start -- Content
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			if( $img1 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url1 ) {
					echo '<a href="'.$url1.'"><img src="'.$img1.'"/></a>';
				} else {
					echo '<img src="'.$img1.'"/>';
				}
				echo '</div>';
			}
			if( $img2 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url2 ) {
					echo '<a href="'.$url2.'"><img src="'.$img2.'"/></a>';
				} else {
					echo '<img src="'.$img2.'"/>';
				}
				echo '</div>';
			}
			if( $img3 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url3 ) {
					echo '<a href="'.$url3.'"><img src="'.$img3.'"/></a>';
				} else {
					echo '<img src="'.$img3.'"/>';
				}
				echo '</div>';
			}
			if( $img4 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url4 ) {
					echo '<a href="'.$url4.'"><img src="'.$img4.'"/></a>';
				} else {
					echo '<img src="'.$img4.'"/>';
				}
				echo '</div>';
			}
			if( $img5 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url5 ) {
					echo '<a href="'.$url5.'"><img src="'.$img5.'"/></a>';
				} else {
					echo '<img src="'.$img5.'"/>';
				}
				echo '</div>';
			}
			if( $img6 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url6 ) {
					echo '<a href="'.$url6.'"><img src="'.$img6.'"/></a>';
				} else {
					echo '<img src="'.$img6.'"/>';
				}
				echo '</div>';
			}
			if( $img7 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url7 ) {
					echo '<a href="'.$url7.'"><img src="'.$img7.'"/></a>';
				} else {
					echo '<img src="'.$img7.'"/>';
				}
				echo '</div>';
			}
			if( $img8 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url8 ) {
					echo '<a href="'.$url8.'"><img src="'.$img8.'"/></a>';
				} else {
					echo '<img src="'.$img8.'"/>';
				}
				echo '</div>';
			}
			if( $img9 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url9 ) {
					echo '<a href="'.$url9.'"><img src="'.$img9.'"/></a>';
				} else {
					echo '<img src="'.$img9.'"/>';
				}
				echo '</div>';
			}
			if( $img10 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url10 ) {
					echo '<a href="'.$url10.'"><img src="'.$img10.'"/></a>';
				} else {
					echo '<img src="'.$img10.'"/>';
				}
				echo '</div>';
			}
			if( $img11 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url11 ) {
					echo '<a href="'.$url11.'"><img src="'.$img11.'"/></a>';
				} else {
					echo '<img src="'.$img11.'"/>';
				}
				echo '</div>';
			}
			if( $img12 ) {
				echo '<div class="tsw_gallery_12_img">';
				if( $url12 ) {
					echo '<a href="'.$url12.'"><img src="'.$img12.'"/></a>';
				} else {
					echo '<img src="'.$img12.'"/>';
				}
				echo '</div>';
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
			$img1 = esc_attr($instance['img1']);
			$url1 = esc_attr($instance['url1']);
			$img2 = esc_attr($instance['img2']);
			$url2 = esc_attr($instance['url2']);
			$img3 = esc_attr($instance['img3']);
			$url3 = esc_attr($instance['url3']);
			$img4 = esc_attr($instance['img4']);
			$url4 = esc_attr($instance['url4']);
			$img5 = esc_attr($instance['img5']);
			$url5 = esc_attr($instance['url5']);
			$img6 = esc_attr($instance['img6']);
			$url6 = esc_attr($instance['url6']);
			$img7 = esc_attr($instance['img7']);
			$url7 = esc_attr($instance['url7']);
			$img8 = esc_attr($instance['img8']);
			$url8 = esc_attr($instance['url8']);
			$img9 = esc_attr($instance['img9']);
			$url9 = esc_attr($instance['url9']);
			$img10 = esc_attr($instance['img10']);
			$url10 = esc_attr($instance['url10']);
			$img11 = esc_attr($instance['img11']);
			$url11 = esc_attr($instance['url11']);
			$img12 = esc_attr($instance['img12']);
			$url12 = esc_attr($instance['url12']);
			// options
			$show = esc_attr($instance['show']);
			$hide = esc_attr($instance['hide']);
		} else {
			$title = '';
			$img1 = '';
			$url1 = '';
			$img2 = '';
			$url2 = '';
			$img3 = '';
			$url3 = '';
			$img4 = '';
			$url4 = '';
			$img5 = '';
			$url5 = '';
			$img6 = '';
			$url6 = '';
			$img7 = '';
			$url7 = '';
			$img8 = '';
			$url8 = '';
			$img9 = '';
			$url9 = '';
			$img10 = '';
			$url10 = '';
			$img11 = '';
			$url11 = '';
			$img12 = '';
			$url12 = '';
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
			<label for="<?php echo $this->get_field_id('img1'); ?>"><?php _e('Img src 1:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img1'); ?>" name="<?php echo $this->get_field_name('img1'); ?>" type="text" value="<?php echo $img1; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url1'); ?>"><?php _e('Img href 1:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url1'); ?>" name="<?php echo $this->get_field_name('url1'); ?>" type="text" value="<?php echo $url1; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img2'); ?>"><?php _e('Img src 2:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img2'); ?>" name="<?php echo $this->get_field_name('img2'); ?>" type="text" value="<?php echo $img2; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url2'); ?>"><?php _e('Img href 2:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url2'); ?>" name="<?php echo $this->get_field_name('url2'); ?>" type="text" value="<?php echo $url2; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img3'); ?>"><?php _e('Img src 3:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img3'); ?>" name="<?php echo $this->get_field_name('img3'); ?>" type="text" value="<?php echo $img3; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url3'); ?>"><?php _e('Img href 3:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url3'); ?>" name="<?php echo $this->get_field_name('url3'); ?>" type="text" value="<?php echo $url3; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img4'); ?>"><?php _e('Img src 4:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img4'); ?>" name="<?php echo $this->get_field_name('img4'); ?>" type="text" value="<?php echo $img4; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url4'); ?>"><?php _e('Img href 4:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url4'); ?>" name="<?php echo $this->get_field_name('url4'); ?>" type="text" value="<?php echo $url4; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img5'); ?>"><?php _e('Img src 5:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img5'); ?>" name="<?php echo $this->get_field_name('img5'); ?>" type="text" value="<?php echo $img5; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url5'); ?>"><?php _e('Img href 5:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url5'); ?>" name="<?php echo $this->get_field_name('url5'); ?>" type="text" value="<?php echo $url5; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img6'); ?>"><?php _e('Img src 6:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img6'); ?>" name="<?php echo $this->get_field_name('img6'); ?>" type="text" value="<?php echo $img6; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url6'); ?>"><?php _e('Img href 6:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url6'); ?>" name="<?php echo $this->get_field_name('url6'); ?>" type="text" value="<?php echo $url6; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img7'); ?>"><?php _e('Img src 7:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img7'); ?>" name="<?php echo $this->get_field_name('img7'); ?>" type="text" value="<?php echo $img7; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url7'); ?>"><?php _e('Img href 7:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url7'); ?>" name="<?php echo $this->get_field_name('url7'); ?>" type="text" value="<?php echo $url7; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img8'); ?>"><?php _e('Img src 8:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img8'); ?>" name="<?php echo $this->get_field_name('img8'); ?>" type="text" value="<?php echo $img8; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url8'); ?>"><?php _e('Img href 8:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url8'); ?>" name="<?php echo $this->get_field_name('url8'); ?>" type="text" value="<?php echo $url8; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img9'); ?>"><?php _e('Img src 9:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img9'); ?>" name="<?php echo $this->get_field_name('img9'); ?>" type="text" value="<?php echo $img9; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url9'); ?>"><?php _e('Img href 9:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url9'); ?>" name="<?php echo $this->get_field_name('url9'); ?>" type="text" value="<?php echo $url9; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img10'); ?>"><?php _e('Img src 10:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img10'); ?>" name="<?php echo $this->get_field_name('img10'); ?>" type="text" value="<?php echo $img10; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url10'); ?>"><?php _e('Img href 10:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url10'); ?>" name="<?php echo $this->get_field_name('url10'); ?>" type="text" value="<?php echo $url10; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img11'); ?>"><?php _e('Img src 11:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img11'); ?>" name="<?php echo $this->get_field_name('img11'); ?>" type="text" value="<?php echo $img11; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url11'); ?>"><?php _e('Img href 11:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url11'); ?>" name="<?php echo $this->get_field_name('url11'); ?>" type="text" value="<?php echo $url11; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img12'); ?>"><?php _e('Img src 12:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('img12'); ?>" name="<?php echo $this->get_field_name('img12'); ?>" type="text" value="<?php echo $img12; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url12'); ?>"><?php _e('Img href 12:', 'wp_widget_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id('url12'); ?>" name="<?php echo $this->get_field_name('url12'); ?>" type="text" value="<?php echo $url12; ?>" />
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
		$instance['img1'] = strip_tags($new_instance['img1']);
		$instance['url1'] = strip_tags($new_instance['url1']);
		$instance['img2'] = strip_tags($new_instance['img2']);
		$instance['url2'] = strip_tags($new_instance['url2']);
		$instance['img3'] = strip_tags($new_instance['img3']);
		$instance['url3'] = strip_tags($new_instance['url3']);
		$instance['img4'] = strip_tags($new_instance['img4']);
		$instance['url4'] = strip_tags($new_instance['url4']);
		$instance['img5'] = strip_tags($new_instance['img5']);
		$instance['url5'] = strip_tags($new_instance['url5']);
		$instance['img6'] = strip_tags($new_instance['img6']);
		$instance['url6'] = strip_tags($new_instance['url6']);
		$instance['img7'] = strip_tags($new_instance['img7']);
		$instance['url7'] = strip_tags($new_instance['url7']);
		$instance['img8'] = strip_tags($new_instance['img8']);
		$instance['url8'] = strip_tags($new_instance['url8']);
		$instance['img9'] = strip_tags($new_instance['img9']);
		$instance['url9'] = strip_tags($new_instance['url9']);
		$instance['img10'] = strip_tags($new_instance['img10']);
		$instance['url10'] = strip_tags($new_instance['url10']);
		$instance['img11'] = strip_tags($new_instance['img11']);
		$instance['url11'] = strip_tags($new_instance['url11']);
		$instance['img12'] = strip_tags($new_instance['img12']);
		$instance['url12'] = strip_tags($new_instance['url12']);
		// options
		$instance['show'] = strip_tags($new_instance['show']);
		$instance['hide'] = strip_tags($new_instance['hide']);
		return $instance;
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'TSW_Gallery_12' );
});

?>