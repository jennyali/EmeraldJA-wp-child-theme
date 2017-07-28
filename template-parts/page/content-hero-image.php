<?php

/*
        HERO IMAGE
*/

//# CUSTOM FIELDS
$fp_hero_image          = get_field('fp_hero_image');
$fp_hero_title          = get_field('fp_hero_image_title');
$fp_hero_sub_title      = get_field('fp_hero_image_sub_title');
$fp_hero_button_text    = get_field('fp_hero_button_text');
$fp_hero_button_url     = get_field('fp_hero_button_url');

//====================================================================================//
?>   
   
<section id="front-page-hero-image">

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <figcaption class="hero-image__caption">

                    <h5><?php echo $fp_hero_sub_title; ?></h5>

                    <h1 class="text-light"><?php echo $fp_hero_title; ?></h1>

                    <!-- <a href="<?php echo $fp_hero_button_url; ?>" class="btn-custom-1" ><?php echo $fp_hero_button_text; ?></a> -->
                
                </figcaption><!-- .hero-image__caption -->

                <figure class="hero-image__img">

                    <img src="<?php echo $fp_hero_image['url']; ?>" alt="<?php echo $fp_hero_image['alt']; ?>">

                </figure><!-- .hero-image__img -->

            
            </div><!-- .col -->

        </div><!-- .row -->

    </div><!-- .container -->

</section><!-- #front-page-hero-image -->