<?php

/*
        PORTFOLIO SECTION
*/

//# CUSTOM FIELDS
$portfolio_section_title = get_field( 'portfolio_section_title' );
$portfolio_section_text = get_field( 'portfolio_section_text' );
//====================================================================================//
?>   
   
    <section id="home_portfolio" class="portfolio-section">

        <div class="container">

            <!-- SECTION HEADER
            ====================================================================-->   
            <div class="row">
                <div class="col-sm-12 headline">

                    <h2><?php echo $portfolio_section_title; ?></h2>

                    <?php if( !empty( $portfolio_section_text ) ) : ?>

                        <p><?php echo $portfolio_section_text; ?></p>

                    <?php endif; ?>

                    <div class="page__divider">
                        <hr>
                    </div><!-- .page__divider -->

                </div><!-- .headline -->
            </div><!-- .row -->

            <div class="row">

                <!-- NAVIGATION
                ====================================================================-->   
                <div class="col-sm-12">

                    <?php //get_template_part( 'template-parts/navigation/navigation', 'portfolio-section-menu' ); ?>

                </div><!-- .col -->

                <!-- GALLERY - images/links
                ====================================================================-->   
                <div class="col-sm-12 portfolio-container masonry-layout">

                    <?php //+++     QUERY TO OBTAIN PANELS      +++//

                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                        $args = array(
                            'post_type' => 'portfolio_post',
                            'orderby'   => 'post_id',
                            'order'     => 'DESC',
                            'posts_per_page' => 9,
                            'paged'          => $paged,
                        );

                        $loop = new WP_QUERY( $args );

                        if( $loop->have_posts() ) :?>
                        
                             <?php while( $loop->have_posts() ) : $loop->the_post(); ?>
                        
                                <?php get_template_part( 'template-parts/post/content', 'portfolio-section-panel' ); ?>

                            <?php endwhile; wp_reset_query(); ?>


                        <?php else : ?>

                            <p>There are currently no posts to display for this category.</p>

                        <?php endif; wp_reset_query(); ?>
                
                </div><!-- .portfolio-container .col -->

            </div><!-- .row -->

        </div><!-- .container -->

    </section><!-- #home_portfolio -->