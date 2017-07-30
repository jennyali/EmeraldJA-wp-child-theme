<?php
/**
 * This template is for the front page of the site the user sees.
 *
 *===========  NOTE ===================
 * By Default it comes with a layout of sections and no page content or sidebar displayed
 * BUT these are flexible, the layout out sections can be displayed YES or NO. When the page has
 * filled in content and/or widgets they will be displayed too underneath the layout sections.
 *
 * @package EmeraldJA
 */

//# CUSTOM FIELDS

$show_hero_slider_section = get_field( 'show_hero_slider_section' );
$show_blurb_section = get_field( 'show_blurb_section' );
$show_portfolio_section = get_field( 'show_portfolio_section' );
$show_bio_excerpt_section = get_field( 'show_bio_excerpt_section' );
$show_contact_form = get_field( 'show_contact_form' );

get_header(); ?>


<!-- HERO - IMAGE
=======================================================================-->

<?php get_template_part( 'template-parts/page/content', 'hero-image' ); ?>


<!-- PORTFOLIO - gallery
=======================================================================-->

<?php if( $show_portfolio_section == 'Yes'): ?>

    <?php get_template_part( 'template-parts/page/content', 'portfolio-section' ); ?>

<?php endif; ?>

<!-- BIO EXCERPT
=======================================================================-->

<?php if( $show_bio_excerpt_section == 'Yes'): ?>

    <?php get_template_part( 'template-parts/page/content', 'bio-excerpt' ); ?>

<?php endif; ?>

<!-- SKILL LISTS
=======================================================================-->

<?php get_template_part( 'template-parts/page/content', 'skills'); ?>


<!-- CONTACT ME section
=======================================================================-->

<?php get_template_part( 'template-parts/page/content', 'contact-me-section' ); ?>

<!-- FRONT PAGE - PAGE CONTENT      !OPTIONAL!
//# displays ONLY if there is content written in the page.
=======================================================================-->

    <?php the_post(); ?>

        <?php 

        $theContent = get_the_content();
        
        if( !empty($theContent) ): ?>

        <div class="container">
            <div class="row">
        
                <article class="page-content col-sm-12">
                    
                    <?php the_content(); ?>

                </article><!-- .page-content -->

            </div><!-- .row -->
        </div><!-- .container -->

        <?php endif; ?>

<!-- WIDGET AREA (sidebar)          !OPTIONAL!
//# displays ONLY if there are widgets put into the FRONT PAGE SIDEBAR area.
=======================================================================-->

    <?php if(is_active_sidebar( 'sidebar-front-page' )) : ?> 

        <div id="front-page-widget-area" class="container">

            <?php dynamic_sidebar( 'sidebar-front-page' ); ?>

        </div><!-- #front-page-widget-area -->

    <?php endif; ?>


<!--======================= CONTENT END ===============================-->

<?php get_footer(); ?>