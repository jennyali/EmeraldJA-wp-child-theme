<?php

/*
        SKILLS SECTION
*/
//# CUSTOM FIELDS

//====================================================================================//
?>

<section id="home-skills-section" class="skills-section">

    <div class="container">

        <!-- SKILL LISTS
        =======================================================================-->

        <div class="row bio-excerpt-section__skills">

            <div class="col-sm-4">

                <h2>Skills</h2>
                    
            </div><!-- .col -->

            <div class="col-xs-6 col-sm-4">

                    <?php dynamic_sidebar( 'skills-widget-area' ); ?>
                    
            </div><!-- .col -->

            <div class="col-xs-6 col-sm-4">

                <?php dynamic_sidebar( 'skills-widget-area-2' ); ?>

            </div><!-- .col -->

        </div><!-- .row -->

    </div><!-- .container -->

</section><!-- .skills-section -->