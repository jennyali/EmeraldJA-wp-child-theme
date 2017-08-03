<?php 

/*
     ADD CUSTOM IMAGE SIZES TO USE WITH 'the_post_thumbnail( $size )'
*/

add_action( 'after_setup_theme', 'custom_image_size_setup' );

function custom_image_size_setup() {
    add_image_size( 'footer-thumb', 125, 85, true );
}

?>