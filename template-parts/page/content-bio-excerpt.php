<?php

/*
        BIO EXCERPT SECTION
*/
//# CUSTOM FIELDS
$bio_excerpt_background_image   = get_field( 'bio_excerpt_background_image' );
$bio_excerpt_title              = get_field( 'bio_excerpt_title' );
$bio_excerpt_content            = get_field( 'bio_excerpt_content' );
$bio_excerpt_button_title       = get_field( 'bio_excerpt_button_title' );
$bio_excerpt_button_link        = get_field( 'bio_excerpt_button_link' );
//====================================================================================//
?>

    <section id="home-bio-excerpt" class="bio-excerpt-section" data-scroll="in-view-animation" >
        
        <div class="container">

            <div class="row">

                <!-- IMAGE
    		    =======================================================================-->
                <div class="col-sm-12 column text-center">

                    <!-- TITLE
    		        =======================================================================-->
                    <div class="headline">

                        <h2><?php echo $bio_excerpt_title; ?></h2>

                    </div><!-- .headline -->

                    <!-- IMAGE
    		        =======================================================================-->
                    <img src="<?php echo $bio_excerpt_background_image['url']; ?>" alt="<?php echo $bio_excerpt_background_image['alt']; ?>" class="img-responsive bio-excerpt-section__img">
               

                    <!-- TEXT
    		        =======================================================================-->
                    <div class="bio-excerpt-section__text">

                        <?php echo $bio_excerpt_content; ?>

                    </div><!-- .bio-excerpt-section__text -->

                </div><!-- .col -->

            </div><!-- .row -->

            <!-- 
    		=======================================================================-->
            <div class="row blurb-container">

                    <?php //+++     QUERY FOR DISPLAY BLURB POSTS   +++//

                    $args = array(
                        'post_type' => 'blurb_post',
                        'orderby'   => 'post_id',
                        'order'     => 'DESC',
                        'posts_per_page' => '3',
                    );

                    $loop = new WP_Query( $args );

                    if( $loop->have_posts() ) :?>

                        <?php while( $loop->have_posts() ) : $loop->the_post(); ?>

                            <?php get_template_part( 'template-parts/post/content' , 'blurb-post' ); ?>

                        <?php endwhile; wp_reset_query(); ?>

                    <?php else : ?>

                        <h3>Sorry there are no current Blurb Posts.</h3>

                    <?php endif; wp_reset_query(); ?>

            </div><!-- .row -->

        </div><!-- .container -->

        </div><!-- .container -->

    </section><!-- .bio-excerpt-section -->