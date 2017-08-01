<?php 

/*
    FILE FOR HOLDING ALL WIDGETS ASSOCIATED WITH THIS THEME
*/


/*==============================================================

                   Display CPT Widget

================================================================*/

class Ja_Display_CPT_Widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'description' => 'Displays the 3 most recent posts.'
        );

        parent::__construct( 'ja_display_cpt_widget', __( 'Display CPT Widget' ), $widget_ops );
    }

    /**
    * Outputs the content for the current Display CPT widget instance.
    */

    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        echo $args['before_title'] . $instance['title'] . $args['after_title'];


        echo $args['after_widget'];
    }

    /**
    * Handles updating the settings for the current Display CPT widget instance.
    */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['post-type'] = sanitize_text_field( $new_instance['post-type'] );
        $instance['num-of-posts'] = (int) $new_instance['num-of-posts'];

        return $instance;
    }

    /**
    * Outputs the settings form for the Display CPT widget.
    */
 
    public function form( $instance ) {
        $title          = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $post_type      = isset( $instance['post-type'] ) ? $instance['post-type'] : '';
        $num_of_posts   = isset( $instance['num-of-posts'] ) ? absint( $instance['num-of-posts'] ) : 3 ;
?>

        <p><!-- $title -->
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p><!-- $post_type -->
            <label for="<?php echo $this->get_field_id( 'post-type' ); ?>"><?php _e( 'Choose Post Type:' ); ?></label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'post-type' ) ); ?>" id="<?php esc_attr( $this->get_field_id( 'post-type' ) ); ?>">
                <?php 
                    foreach ( get_post_types( '', 'names' ) as $this_post_type ) {
                        echo '<option value=' . $this_post_type .  ' '  . selected( $post_type, $this_post_type ) . ' >' . $this_post_type . '</option>';
                    }
                ?>
            </select>
        </p>

        <p><!-- $num_of_posts -->
            <label for="<?php echo $this->get_field_id( 'num-of-posts' ); ?>"><?php _e( 'Choose the Number of Posts:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'num-of-posts' ); ?>" name="<?php echo $this->get_field_name( 'num-of-posts' ); ?>" type="number" value="<?php echo $num_of_posts; ?>" />
        </p>

<?php

    }

}

//# Register Widget

function register_ja_display_cpt_widget() {
    register_widget( 'Ja_Display_CPT_Widget' );
}

add_action( 'widgets_init', 'register_ja_display_cpt_widget' );

?>
