<?php

class TSW_Shortcode extends WP_Widget {
    public function __construct() {
        parent::__construct('tsw_shortcode', 'Awesome Widget - Shortcode', array(
            'description' => 'Here you can add shortcode to top sliding bar.',
        ));
    }
    public function widget( $args, $instance ) {

        extract( $args );
        // these are the widget options
        $shortcode = $instance['shortcode'];
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

            echo '<div class="tsw_shortcode tsw_col tsw_col_'.$size.'">'; // Display widget
            echo '<div class="tsw_col_inner">'; // Display widget inner

            // -- Start -- Content
            if ( $shortcode != '' ) {
                echo do_shortcode( $shortcode );
            } else {
                echo 'Shortcode field is empty!';
            }
            // -- END -- Content

            echo "</div>"; // Close widget inner
            echo "</div>"; // Close widget

        }
    }
    public function form( $instance ) {
        // Check values
        if( $instance) {
            $shortcode = esc_attr($instance['shortcode']);
            // options
            $size = esc_attr($instance['size']);
            $show = esc_attr($instance['show']);
            $hide = esc_attr($instance['hide']);
        } else {
            $html = '';
            // options
            $size = '1';
            $show = '';
            $hide = '';
        }
        ?>

        <h3>Content</h3>

        <p>
            <label for="<?php echo $this->get_field_id('shortcode'); ?>"><?php _e('Shortcode', 'wp_widget_plugin'); ?></label><br>
            <input id="<?php echo $this->get_field_id('shortcode'); ?>" name="<?php echo $this->get_field_name('shortcode'); ?>" style="width:100%;" value="<?php echo $shortcode; ?>" />
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
        $instance['shortcode'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['shortcode']) ) );
        // options
        $instance['size'] = strip_tags($new_instance['size']);
        $instance['show'] = strip_tags($new_instance['show']);
        $instance['hide'] = strip_tags($new_instance['hide']);
        return $instance;
    }
}

add_action( 'widgets_init', function(){
    register_widget( 'TSW_Shortcode' );
});

?>