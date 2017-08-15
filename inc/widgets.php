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

        //======== DATA CHECK ========//

        // Set widget ID.
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        // Post Type Filter
        $post_type = ( ! empty( $instance['post-type'] ) ) ? $instance['post-type'] : 'post';

        // Title filter.
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts');
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        // Number check / default number. 
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
        if ( ! $number ) {
            $number = 3;
        }

        //========== WP QUERY =========//

        $custom_query = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'        => $number,
            'no_found_rows'         => true,
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => true,
            'orderby'               => 'date',
            'post_type'             => $post_type

        ) ) );

        //========== DISPLAY ==========//

        if ( $custom_query->have_posts() ) :
        ?>

        <?php echo $args['before_widget']; ?>

        <?php if ( $title ) {
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
        } ?>

        <ul class="cpt-widget-list">
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

            <li class="cpt-widget-list__item">

                <?php if( has_post_thumbnail() ) : ?>

                    <div class="hidden-xs">
                        <?php the_post_thumbnail( 'footer-thumb' ); ?>
                    </div>

                <?php endif; ?>

                <a href="<?php the_permalink(); ?>" class="cpt-widget-list__item__title"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                
                <span class="cpt-widget-list__item__date"><?php echo get_the_date(); ?></span>


            </li><!-- .cpt-widget-list__item -->

        <?php endwhile; ?>

        </ul><!-- .cpt-widget-list -->

        <?php echo $args['after_widget']; ?>

        <?php 

        wp_reset_postdata();

        endif;
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



/*==============================================================

                   Skill Bar Widget

================================================================*/

class Ja_Skill_Bar_Widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'description' => 'Displays a "progress" like bar.'
        );

        parent::__construct( 'ja_skill_bar_widget', __( 'Skill Bar Widget' ), $widget_ops );
    }

    /**
    * Outputs the content for the current Display CPT widget instance.
    */

    public function widget( $args, $instance ) {

        //======== DATA CHECK ========//

        // Set widget ID.
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        // Title filter.
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Skill Bar');
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        // Number check / default number. 
        $skill_number = ( ! empty( $instance['skill-number'] ) ) ? absint( $instance['skill-number'] ) : 0;

        //========== DISPLAY ==========//


        ?>

        <?php echo $args['before_widget']; ?>

        <div class="skill-bar">
            <div class="skill-bar__title visible-xs"><?php echo $title; ?></div>
            <div class="skills" style="width: <?php echo $skill_number; ?>%"><?php echo $title; ?></div>
        </div>

        <?php echo $args['after_widget'];

    }

    /**
    * Handles updating the settings for the current Display CPT widget instance.
    */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['skill-number'] = (int) $new_instance['skill-number'];

        return $instance;
    }

    /**
    * Outputs the settings form for the Display CPT widget.
    */
 
    public function form( $instance ) {
        $title          = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $skill_number   = isset( $instance['skill-number'] ) ? absint( $instance['skill-number'] ) : 0 ;

?>

        <p><!-- $title -->
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Name of Skill:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p><!-- $num_of_posts -->
            <label for="<?php echo $this->get_field_id( 'skill-number' ); ?>"><?php _e( 'Number Skill Percentage:' ); ?></label>
            <input class="" id="<?php echo $this->get_field_id( 'skill-number' ); ?>" name="<?php echo $this->get_field_name( 'skill-number' ); ?>" type="number" value="<?php echo $skill_number; ?>" />
        </p>

<?php

    }

}

//# Register Widget

function register_ja_skill_bar_widget() {
    register_widget( 'Ja_Skill_bar_Widget' );
}

add_action( 'widgets_init', 'register_ja_skill_bar_widget' );

?>