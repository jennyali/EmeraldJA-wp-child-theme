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

            <!-- SKILLS
            =======================================================================-->

            <div class="row bio-excerpt-section__skills">

                <div class="col-sm-4">

                    <h2>Skills</h2>
                    
                </div><!-- .col -->

                <div class="col-sm-4">

                    <ul class="list-unstyled">
                        <li><span></span>HTML</li>
                        <li><span></span>CSS</li>
                        <li><span></span>JQuery</li>
                        <li><span></span>Javascript</li>
                        <li><span></span>Bootstrap</li>
                        <li><span></span>Wordpress</li>
                        <li><span></span>PHP</li>
                    </ul>
                    
                </div><!-- .col -->

                <div class="col-sm-4">

                    <ul class="list-unstyled">
                        <li><span></span>GitHub</li>
                        <li><span></span>Visual Studio Code</li>
                        <li><span></span>Photoshop</li>
                        <li><span></span>Node.js / MongoDB</li>
                    </ul>
                    
                </div><!-- .col -->

            </div><!-- .row -->

        </div><!-- .container -->

        </div><!-- .container -->

    </section><!-- .bio-excerpt-section -->