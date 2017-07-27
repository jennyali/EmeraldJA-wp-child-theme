<?php /* Template Name: Contact Page */ ?>

<?php
/**
 *
 *
 * 
 * @package EmeraldJA
 */

 // CUSTOM FIELDS


get_header(); ?>

<div class="container container--padding">
    <div class="row">

		<!-- PAGE CONTENT
		====================================================================-->
		<div id="primary" class="content-area col-sm-8 page-content__wrapper">
			<main id="main" class="site-main">

            <!-- CONTACT FORM
            =======================================================================-->

                <?php get_template_part( 'template-parts/page/content' , 'contact-form-2' ); ?>




			</main><!-- #main -->
		</div><!-- #primary .col -->

        <!-- ASIDE
        ======================================================================-->
        <div class="col-sm-4">

            <?php get_sidebar('contact'); ?>

        </div><!-- .col -->

	</div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();